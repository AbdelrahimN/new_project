<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Student_Team;
use App\Models\Teaching_Assistant;
use App\Models\Team;
use App\Models\Team_Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $student_team = Student_Team::whereHas('student')->where('student_id',Auth::guard('student')->user()->id)->first();
        $team_members = Team::all();
        return view('site.teams.index',compact('student_team','team_members'));
    }
    public function join($id)
    {
        $store = Member::create([
            'team_id' => $id,
            'student_id' => Auth::guard('student')->user()->id,
        ]);
        return redirect()->back()->with(['join' => 'Join Team Successfully']);
    }
    public function create()
    {
        $Teaching_Assistant = Teaching_Assistant::all();
        return view('site.teams.create',compact('Teaching_Assistant'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'teaching_assistant_id' => 'required|not_in:Select Teaching Assistant',
            'name'                  => 'required',
            'student_id'            => 'nullable'
        ]);
        $data['student_id'] = Auth::guard('student')->user()->id;
        Student_Team::create($data);
        return redirect()->route('site.team.index');
    }
}
