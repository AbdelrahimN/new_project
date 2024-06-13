<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeachingAssistant\StoreRequest;
use App\Http\Requests\Admin\TeachingAssistant\UpdateRequest;
use App\Models\Center;
use App\Models\Supervisor;
use App\Models\Teaching_Assistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TeachingAssistantController extends Controller
{
    public function index()
    {
        $TeachingAssistants = Teaching_Assistant::whereHas('center')->whereHas('supervisor')->paginate(10);
        return view('admin.teaching_assistants.index',compact('TeachingAssistants'));
    }
    public function create()
    {
        $roles = Role::all();
        $centers = Center::all();
        return view('admin.teaching_assistants.create',compact('roles','centers'));
    }
    public function supervisor_ajax($id)
    {
        $supervisors = DB::table('supervisors')
                ->where('center_id',$id)->get();
        return response()->json([
            'supervisors' => $supervisors
        ]);
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->pasword);
        Teaching_Assistant::create($data);
        return redirect()->route('admin.TeachingAssistants.index')->with(['success' => 'Store TeachingAssistant Successfully']);
    }
    public function edit($id)
    {
        $record = Teaching_Assistant::find($id);
        return view('admin.teaching_assistants.edit',compact('record'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Teaching_Assistant::find($id);
        $data = $request->validated();
        $record->update([
            'name'          => $request->name          ? $data['name']          : $record->name,
            'email'         => $request->email         ? $data['email']         : $record->email,
            'phone'         => $request->phone         ? $data['phone']         : $record->phone,
            'university_id' => $request->university_id ? $data['university_id'] : $record->university_id,
        ]);
        return redirect()->route('admin.TeachingAssistants.index')->with(['update' => 'Update TeachingAssistant Successfully']);
    }
    public function delete($id)
    {
        $record = Teaching_Assistant::find($id);
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete TeachingAssistant Successfully']);
    }
}
