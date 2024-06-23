<?php

namespace App\Http\Controllers\TeachingAssistants;

use App\Http\Controllers\Controller;
use App\Models\Student_Team;
use App\Models\Student_Team_member;
use App\Models\StudentProject;
use App\Models\TeamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentTeamController extends Controller
{
    public function index()
    {
        $student_teams = Student_Team::whereHas('student')->where('teaching_assistant_id',null)->whereRelation('student','center_id',Auth::guard('Teaching_Assistant')->user()->center_id)->get();
        return view('TeachingAssistants.team',compact('student_teams'));
    }
    public function approved($id)
    {
        $approved = TeamRequest::create([
            'teaching_id' => Auth::guard('Teaching_Assistant')->user()->id,
            'student_team_id' => $id
        ]);
        return redirect()->back();
    }


}
