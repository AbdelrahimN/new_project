<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Traits\imageTrait;
use App\Models\Student_Team;
use App\Models\Studet_tame_task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class TaskController extends Controller
{
    use imageTrait;
    public function index()
    {
        $tasks = Studet_tame_task::whereHas('student')->whereHas('team')->paginate(10);
        return view('site.tasks.index',compact('tasks'));
    }
    public function create()
    {
        return view('site.tasks.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id'                     => 'nullable',
            'student_tame_id'                => 'nullable',
            'title'                          => 'required',
            'percentage_completed'           => 'required',
            'file'                           => 'nullable',
        ]);
        $student_team = Student_Team::whereHas('student')->where('student_id',Auth::guard('student')->user()->id)->first();
        $data['student_id'] = Auth::guard('student')->user()->id;
        $data['student_tame_id'] = $student_team->id;
        if(isset($data['file'])) {
            $data['file'] = $this->saveImage($data['file'],'uploads/images/students/tasks/file');
        }

        Studet_tame_task::create($data);
        return redirect()->route('site.tasks.index')->with(['success' => 'Store Task Successfully']);
    }
    public function download($id)
    {
        $record = Studet_tame_task::find($id);
        $filePath = public_path("uploads/images/students/tasks/file/".$record->file);
        if (File::exists($filePath)) {
            return Response::download($filePath);
        }
    }
    public function edit($id)
    {
        $record = Studet_tame_task::find($id);
        return view('site.tasks.edit',compact('record'));
    }
    public function update(Request $request , $id)
    {
        $data = $request->validate([
            'title'                          => 'required',
            'percentage_completed'           => 'nullable',
            'file'                           => 'nullable',
        ]);
        $record = Studet_tame_task::find($id);
        if(request()->hasFile('file')) {
            File::delete('uploads/images/students/tasks/file/'.$record->file);
        }
        if(isset($request->file)) {
            $data['file'] = $this->saveImage($request->file,'uploads/images/students/tasks/file');
        }
        if($data['percentage_completed'] == 'Select Percentage Completed') {
            $record->update([
                'title' => $request->title ? $data['title'] : $record->title,
                'file'  => $request->file  ? $data['file']  : $record->file,
            ]);
        } else {
            $record->update([
                'title'                 => $request->title ? $data['title'] : $record->title,
                'file'                  => $request->file  ? $data['file']  : $record->file,
                'percentage_completed'  => $request->percentage_completed  ? $data['percentage_completed']  : $record->percentage_completed,
            ]);
        }
        return redirect()->route('site.tasks.index')->with(['update' => 'Update Task Successfully']);
    }
    public function delete($id)
    {
        $record = Studet_tame_task::find($id);
        $path = 'uploads/images/students/tasks/file/'.$record->image;
        if(File::exists($path)) {
            File::delete('uploads/images/students/tasks/file/'.$record->image);
        }
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete Task Successfully']);
    }
}
