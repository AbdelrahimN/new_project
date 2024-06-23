<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Team\StoreRequest;
use App\Http\Requests\Admin\Team\UpdateRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::whereHas('supervisor')->where('supervisor_id',Auth::guard('supervisor')->user()->id)->paginate(10);
        return view('supervisor.teams.index',compact('teams'));
    }
    public function create()
    {
        return view('supervisor.teams.crete');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['supervisor_id'] = Auth::guard('supervisor')->user()->id;
        Team::create($data);
        return redirect()->route('supervisor.teams.index')->with(['success' => 'Store Team Successfully']);
    }
    public function change_status(Request $request)
    {
        $data = $request->validate([
            'status' => 'required|not_in:Select Team Status',
        ]);
        $projects = Team::whereHas('supervisor')->where('supervisor_id',Auth::guard('supervisor')->user()->id)->get();
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
        $record = Team::find($id);
        return view('supervisor.teams.edit',compact('record'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Team::find($id);
        $data = $request->validated();
        $record->update([
            'name'  => $request->name ? $data['name'] : $record->name,
        ]);
        return redirect()->route('supervisor.teams.index')->with(['update' => 'Update Team Successfully']);
    }
    public function delete($id)
    {
        $record = Team::find($id);
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete Team Successfully']);
    }
}
