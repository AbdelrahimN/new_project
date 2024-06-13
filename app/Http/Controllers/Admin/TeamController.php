<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Team\StoreRequest;
use App\Http\Requests\Admin\Team\UpdateRequest;
use App\Models\Supervisor;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::whereHas('supervisor')->paginate(10);
        return view('admin.teams.index',compact('teams'));
    }
    public function create()
    {
        $supervisors = Supervisor::all();
        return view('admin.teams.crete',compact('supervisors'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Team::create($data);
        return redirect()->route('admin.teams.index')->with(['success' => 'Store Team Successfully']);
    }
    public function editAll()
    {
        return view('admin.teams.editAll');
    }
    public function updateAll(Request $request)
    {
        $data = $request->validate([
            'stuednt_count' => 'nullable|integer'
        ]);
        $teams = Team::all();
        foreach($teams as $row) {
            $row->update([
                'stuednt_count' => $request->stuednt_count !== null ? $data['stuednt_count'] : $row->stuednt_count
            ]);
        }
        return redirect()->route('admin.teams.index');
    }
    public function edit($id)
    {
        $record = Team::find($id);
        $supervisors = Supervisor::all();
        return view('admin.teams.edit',compact('record','supervisors'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Team::find($id);
        $data = $request->validated();
        $record->update([
            'supervisor_id' => $request->supervisor_id ? $data['supervisor_id'] : $record->supervisor_id,
            'name'          => $request->name          ? $data['name']          : $record->name,
        ]);
        return redirect()->route('admin.teams.index')->with(['update' => 'Update Team Successfully']);
    }
    public function delete($id)
    {
        $record = Team::find($id);
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete Team Successfully']);
    }
}
