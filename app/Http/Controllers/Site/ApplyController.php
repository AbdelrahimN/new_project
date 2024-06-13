<?php

namespace App\Http\Controllers\Site;

use App\Events\PusherEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Apply\StoreRequest;
use App\Http\Requests\Site\Apply\UpdateRequest;
use App\Models\Apply;
use App\Models\Apply_member;
use App\Models\Notification;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use App\Notifications\PusherNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{
    public function index()
    {
        $applies = Apply::whereHas('student')->whereHas('supervisor')->whereHas('teaching_assistants')->where('student_id', Auth::guard('student')->user()->id)->get();
        return view('site.applies.index', compact('applies'));
    }
    public function create()
    {
        $supervisors = Supervisor::where('center_id', Auth::guard('student')->user()->center_id)->get();
        $students = Student::where('center_id', Auth::guard('student')->user()->center_id)->where('id', '!=', Auth::guard('student')->user()->id)->get();
        return view('site.applies.create', compact('supervisors', 'students'));
    }
    public function teaching_assistants_ajax($id)
    {
        $newTeachingAssistants = DB::table('teaching__assistants')
            ->where('supervisor_id', $id)->get();
        return response()->json([
            'newTeachingAssistants' => $newTeachingAssistants
        ]);
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['student_id'] = Auth::guard('student')->user()->id;
        $stoer = Apply::create([
            'supervisor_id'          => $data['supervisor_id'],
            'teaching_assistants_id' => $data['teaching_assistants_id'],
            'student_id'             => Auth::guard('student')->user()->id,
            'title'                  => $data['title'],
            'description'            => $data['description'],
        ]);
        if ($stoer) {
            $members = $data['member_id'];
            foreach ($members as $row) {
                Apply_member::create([
                    'apply_id'  => $stoer->id,
                    'member_id' => $row
                ]);
            }
            
        }

        return redirect()->route('site.apply')->with(['success' => 'Store Apply Successfully']);
    }
    public function edit($id)
    {
        $record = Apply::find($id);
        $supervisors = Supervisor::all();
        return view('site.applies.edit', compact('record', 'supervisors'));
    }
    public function update(UpdateRequest $request, $id)
    {
        $record = Apply::find($id);
        $data = $request->validated();
        $record->update([
            'title'         => $request->title         ? $data['title']         : $record->title,
            'description'   => $request->description   ? $data['description']   : $record->description
        ]);
        return redirect()->route('site.apply')->with(['update' => 'Update Apply Successfully']);
    }
}
