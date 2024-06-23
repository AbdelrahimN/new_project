<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Project;
use App\Models\Student_Team;
use App\Models\Teaching_Assistant;
use App\Models\Team;
use App\Models\Team_Member;
use App\Models\TeamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $student_team = Student_Team::whereHas('student')->where('student_id', Auth::guard('student')->user()->id)->first();
        $team_members = Team::all();
        return view('site.teams.index', compact('student_team', 'team_members'));
    }
    public function supervisor_teme()
    {
        $teams = Team::whereHas('supervisor')->paginate(10);
        return view('site.teams.supervisor_teme', compact('teams'));
    }
    public function supervisor_join($id)
    {
        $record = Team::whereHas('supervisor')->where('id', $id)->first();
        $project = Project::whereHas('team')->where('team_id', $record->id)->first();
        $store = Team_Member::create([
            'center_id' => $record->supervisor->center->id,
            'supervisor_id' => $record->supervisor->id,
            'team_id' => $record->id,
            'project_id' => $project->id,
            'student_id' => Auth::guard('student')->user()->id
        ]);
        $stuednt_count = $record->stuednt_count - 1;
        $record->update([
            'stuednt_count' => $stuednt_count
        ]);
        return redirect()->back();
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
        $Teaching_Assistant = Teaching_Assistant::where('center_id', Auth::guard('student')->user()->center_id)->get();
        return view('site.teams.create', compact('Teaching_Assistant'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'teaching_assistant_id' => 'nullable',
            'name'                  => 'required',
            'student_id'            => 'nullable'
        ]);
        if ($request->teaching_assistant_id == 'optional') {
            $data['student_id'] = Auth::guard('student')->user()->id;
            Student_Team::create([
                'student_id' => $data['student_id'],
                'name'       => $data['name']
            ]);
            return redirect()->route('site.team.index');
        } else {
            $data['student_id'] = Auth::guard('student')->user()->id;
            $store = Student_Team::create([
                'teaching_assistant_id' => $data['teaching_assistant_id'],
                'student_id'            => $data['student_id'],
                'name'                  => $data['name']
            ]);
            if ($store) {
                TeamRequest::create([
                    'teaching_id'     => $data['teaching_assistant_id'],
                    'student_team_id' => $store->id
                ]);
            }
        }
        $data['student_id'] = Auth::guard('student')->user()->id;
        Student_Team::create($data);
        return redirect()->route('site.team.index');
    }
}
