<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Http\Requests\Admin\Project\UpdateRequest;
use App\Models\Center;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Supervisor;
use App\Models\Team;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::whereHas('center')->whereHas('supervisor')->whereHas('team')->paginate(10);
        return view('admin.projects.index',compact('projects'));
    }
    public function create()
    {
        $centers = Center::all();
        $teams = Team::all();
        $supervisors = Supervisor::all();
        return view('admin.projects.create',compact('centers','teams','supervisors'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Project::create($data);
        return redirect()->route('admin.projects.index')->with(['success' => 'Store Project Successfully']);
    }
    public function edit($id)
    {
        $record = Project::find($id);
        $centers = Center::all();
        $teams = Team::all();
        $supervisors = Supervisor::all();
        return view('admin.projects.edit',compact('record','centers','teams','supervisors'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Project::find($id);
        $data = $request->validated();
        $record->update([
            'center_id'       => $request->center_id       ? $data['center_id']       : $record->center_id,
            'team_id'         => $request->team_id         ? $data['team_id']         : $record->team_id,
            'supervisor_id'   => $request->supervisor_id   ? $data['supervisor_id']   : $record->supervisor_id,
            'title'           => $request->title           ? $data['title']           : $record->title,
            'description'     => $request->description     ? $data['description']     : $record->description,
        ]);
        return redirect()->route('admin.projects.index')->with(['update' => 'Update Project Successfully']);
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
