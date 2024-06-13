<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamMember\StoreRequest;
use App\Models\Center;
use App\Models\Team_Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = Team_Member::whereHas('center')->whereHas('project')->whereHas('supervisor')->whereHas('team')->paginate(10);
        return view('admin.team_members.index',compact('teamMembers'));
    }
    public function create()
    {
        $centers = Center::all();
        return view('admin.team_members.create',compact('centers'));
    }
    public function supervisor_ajax($id)
    {
        $newSupervisor = DB::table('supervisors')
                ->where('center_id',$id)->get();
        return response()->json([
            'newSupervisor' => $newSupervisor
        ]);
    }
    public function team_ajax($id)
    {
        $newTeam = DB::table('teams')
                ->where('supervisor_id',$id)->get();
        return response()->json([
            'newTeam' => $newTeam
        ]);
    }
    public function project_ajax($id)
    {
        $newProject = DB::table('projects')
                ->where('team_id',$id)->get();
        return response()->json([
            'newProject' => $newProject
        ]);
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Team_Member::create($data);
        return redirect()->route('admin.team_members.index')->with(['success' => 'Store TeamMember Successfully']);
    }
    public function delete($id)
    {
        $record = Team_Member::find($id);
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete TeamMember Successfully']);
    }
}
