<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Student_Team;
use App\Models\StudentProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::whereHas('supervisor')->where('status','1')->get();
        return view('site.projects.index',compact('projects'));
    }
    public function join($id)
    {
        $record = Project::find($id);
        $student_tame = Student_Team::where('student_id',Auth::guard('student')->user()->id)->first();
        StudentProject::create([
            'center_id'              => Auth::guard('student')->user()->center_id,
            'teaching_assistant_id'  => $student_tame->teaching_assistant_id,
            'student_team_id'        => $student_tame->id,
            'title'                  => $record->title,
            'description'            => $record->description,
        ]);
        return redirect()->back()->with(['join' => 'Join Project Successfully']);
    }
}
