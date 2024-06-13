<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Apply_member;
use App\Models\Student_Team;
use App\Models\Student_Team_member;
use App\Models\StudentProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    public function index()
    {
        $studentApplys = Apply::whereHas('supervisor')->where('supervisor_id',Auth::guard('supervisor')->user()->id)->paginate(10);
        return view('supervisor.applys.index',compact('studentApplys'));
    }

    public function fetch()
    {
        $notifications = Apply::latest()->limit(10)->get();
        return response()->json($notifications);
    }

    public function show($id)
    {
        $record = Apply::whereHas('student')->whereHas('supervisor')->where('id',$id)->where('supervisor_id',Auth::guard('supervisor')->user()->id)->first();
        $apply_members = Apply_member::whereHas('member')->where('apply_id',$id)->get();
        return view('supervisor.applys.show',compact('record','apply_members'));
    }
    public function change_status(Request $request , $id)
    {
        $data = $request->validate([
            'status' => 'required|not_in:Select Status',
        ]);
        $record = Apply::whereHas('student')->where('id',$id)->first();
        if($data['status'] == '1') {
            $record->update([
                'status' => '1'
            ]);
            $allApplyStudent = Apply::where('student_id',$record->student_id)->where('id','!=',$record->id)->get();
            foreach($allApplyStudent as $row) {
                $row->update([
                    'status' => '2'
                ]);
            }
            $store = Student_Team::create([
                'student_id'             => $record->student->id,
                'teaching_assistant_id'  => $record->teaching_assistants_id,
                'name'                   => $record->title
            ]);
            $members = Apply_member::where('apply_id',$record->id)->get();
            foreach($members as $row) {
                $Student_Team_member = Student_Team_member::create([
                    'student_team_id' => $store->id,
                    'member_id'       => $row->member_id
                ]);
            }
            StudentProject::create([
                'center_id'             => $record->student->center_id,
                'teaching_assistant_id' => $record->teaching_assistants_id,
                'student_team_id'       => $store->id,
                'title'                 => $record->title,
                'description'           => $record->description
            ]);

            return redirect()->route('supervisor.applys.index')->with(['success' => 'Approved Apply Successfully']);
        } elseif($data['status'] == '2') {
            $record->update([
                'status' => '2'
            ]);
            return redirect()->route('supervisor.applys.index')->with(['delete' => 'Approved Apply Successfully']);
        }

    }

}
