<?php

namespace App\Http\Controllers\TeachingAssistants;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Student_Team;
use App\Models\Student_Team_member;
use App\Models\StudentProject;
use App\Models\TeamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamRequestController extends Controller
{
    public function index()
    {
        $teams = TeamRequest::whereHas('teaching')->whereHas('student_team')->where('teaching_id',Auth::guard('Teaching_Assistant')->user()->id)->get();
        return view('TeachingAssistants.team_request',compact('teams'));
    }
    public function project($id)
    {
        $record = Student_Team::find($id);
        $student_team_project = StudentProject::whereHas('student_team')->where('student_team_id',$record->id)->first();
        $members = Student_Team_member::whereHas('student_team')->whereHas('member')->where('student_team_id',$record->id)->get();
        $students = Student::where('center_id',Auth::guard('Teaching_Assistant')->user()->center_id)->get();
        return view('TeachingAssistants.team_project',compact('record','students','student_team_project','members'));
    }
    public function project_store(Request $request , $id)
    {
        $request->validate([
            'member_id' => 'required'
        ]);
        Student_Team_member::create([
            'student_team_id' => $id,
            'member_id'       => $request->member_id
        ]);
        return redirect()->back();
    }
    public function project_delete($id)
    {
        $record = Student_Team_member::find($id);
        $record->delete();
        return redirect()->back();
    }
    public function delete($id)
    {
        $record = Student_Team::find($id);
        $record->update([
            'teaching_assistant_id' => null
        ]);
        $team_request = TeamRequest::where('student_team_id',$record->id)->first();
        $team_request->delete();
        return redirect()->back();
    }
}
