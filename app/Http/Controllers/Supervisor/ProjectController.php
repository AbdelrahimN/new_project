<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Http\Requests\Admin\Project\UpdateRequest;
use App\Models\Center;
use App\Models\Project;
use App\Models\ProjectTag;
use App\Models\Proposal;
use App\Models\Skil;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::whereHas('center')->whereHas('supervisor')->whereHas('team')->where('supervisor_id',Auth::guard('supervisor')->user()->id)->paginate(10);
        return view('supervisor.projects.index',compact('projects'));
    }
    public function create()
    {
        $centers = Center::all();
        $teams = Team::whereHas('supervisor')->get();
        $skils = Skil::all();
        return view('supervisor.projects.create',compact('centers','teams','skils'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['supervisor_id'] = Auth::guard('supervisor')->user()->id;
        $data['skil_id'] = $request->skil_id;
        $store = Project::create([
            'center_id' => $data['center_id'],
            'team_id' => $data['team_id'],
            'supervisor_id' => $data['supervisor_id'],
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
        if($data['skil_id']) {
            foreach($data['skil_id'] as $row)
            ProjectTag::create([
                'project_id' => $store->id,
                'skill_id' => $row
            ]);
        }
        return redirect()->route('supervisor.projects.index')->with(['success' => 'Store Project Successfully']);
    }
    public function edit($id)
    {
        $record = Project::find($id);
        $centers = Center::all();
        $teams = Team::whereHas('supervisor')->get();
        return view('supervisor.projects.edit',compact('record','centers','teams'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Project::find($id);
        $data = $request->validated();
        $record->update([
            'center_id'       => $request->center_id       ? $data['center_id']       : $record->center_id,
            'team_id'         => $request->team_id         ? $data['team_id']         : $record->team_id,
            'title'           => $request->title           ? $data['title']           : $record->title,
            'description'     => $request->description     ? $data['description']     : $record->description,
        ]);
        return redirect()->route('supervisor.projects.index')->with(['update' => 'Update Project Successfully']);
    }
    public function delete($id)
    {
        $record = Project::find($id);
        $proposals  = Proposal::where('project_id',$record->id)->get();
        foreach($proposals as $row) {
            $row->delete();
        }
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete Project Successfully']);
    }
}
