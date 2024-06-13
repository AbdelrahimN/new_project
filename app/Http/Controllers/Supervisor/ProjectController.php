<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreRequest;
use App\Http\Requests\Admin\Project\UpdateRequest;
use App\Models\Center;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::whereHas('center')->whereHas('supervisor')->where('supervisor_id',Auth::guard('supervisor')->user()->id)->paginate(10);
        return view('supervisor.projects.index',compact('projects'));
    }
    public function create()
    {
        $centers = Center::all();
        $teams = Team::all();
        return view('supervisor.projects.create',compact('centers','teams'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['supervisor_id'] = Auth::guard('supervisor')->user()->id;
        Project::create($data);
        return redirect()->route('supervisor.projects.index')->with(['success' => 'Store Project Successfully']);
    }
    public function change_status(Request $request)
    {
        $data = $request->validate([
            'status' => 'required|not_in:Select Projects Status',
        ]);
        $projects = Project::whereHas('supervisor')->where('supervisor_id',Auth::guard('supervisor')->user()->id)->get();
        foreach($projects as $row)
        {
            if($data['status'] == 1) {
                $row->update([
                    'status' => '1'
                ]);
            } elseif($data['status'] == 0) {
                $row->update([
                    'status' => '0'
                ]);
            }
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $record = Project::find($id);
        $centers = Center::all();
        return view('supervisor.projects.edit',compact('record','centers'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Project::find($id);
        $data = $request->validated();
        $record->update([
            'center_id'       => $request->center_id       ? $data['center_id']       : $record->center_id,
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
