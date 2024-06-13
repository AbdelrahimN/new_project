<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Proposal\StoreRequest;
use App\Http\Requests\Admin\Proposal\UpdateRequest;
use App\Models\Project;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::whereHas('project')->orderBy('project_id','asc')->paginate(10);
        return view('admin.proposals.index',compact('proposals'));
    }
    public function create()
    {
        $projects = Project::all();
        return view('admin.proposals.create',compact('projects'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Proposal::create($data);
        return redirect()->route('admin.proposals.index')->with(['success' => 'Store Proposal Successfully']);
    }
    public function edit($id)
    {
        $record = Proposal::find($id);
        $projects = Project::all();
        return view('admin.proposals.edit',compact('record','projects'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Proposal::find($id);
        $data = $request->validated();
        $record->update([
            'project_id'      => $request->project_id      ? $data['project_id']      : $record->project_id,
            'title'           => $request->title           ? $data['title']           : $record->title,
            'description'     => $request->description     ? $data['description']     : $record->description,
        ]);
        return redirect()->route('admin.proposals.index')->with(['update' => 'Update Proposal Successfully']);
    }
    public function delete($id)
    {
        $record = Proposal::find($id);
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete Proposal Successfully']);
    }
}
