<?php

namespace App\Http\Controllers\TeachingAssistants;

use App\Http\Controllers\Controller;
use App\Models\Student_Team;
use App\Models\Student_Team_member;
use App\Models\StudentProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentTeamController extends Controller
{
    public function index()
    {
        $student_teams = Student_Team::whereHas('teaching_assistant')->whereHas('student')->where('teaching_assistant_id',Auth::guard('Teaching_Assistant')->user()->id)->get();
        return view('TeachingAssistants.team',compact('student_teams'));
    }
    public function project($id)
    {
        $record = Student_Team::find($id);
        $student_team_project = StudentProject::whereHas('student_team')->where('student_team_id',$record->id)->first();
        $members = Student_Team_member::whereHas('student_team')->whereHas('member')->where('student_team_id',$record->id)->get();
        return view('TeachingAssistants.team_project',compact('record','student_team_project','members'));
    }
    public function delete($id)
    {
        $record = Student_Team::find($id);
        $record->delete();
        return redirect()->back();
    }
}
