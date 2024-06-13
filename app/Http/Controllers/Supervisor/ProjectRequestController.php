<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectRequest;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectRequestController extends Controller
{
    public function index()
    {
        $projects = ProjectRequest::whereHas('sender')
        ->whereHas('recipient')
        ->whereHas('project')
        ->where('status',0)

        ->where(function($query) {
            $query->where('sender_id', Auth::guard('supervisor')->user()->id)
                  ->orWhere('recipient_id', Auth::guard('supervisor')->user()->id);
        })->paginate(10);
        return view('supervisor.requests.index',compact('projects'));
    }
    public function create()
    {
        $supervisors = Supervisor::where('center_id',Auth::guard('supervisor')->user()->center_id)->where('id','!=',Auth::guard('supervisor')->user()->id)->get();
        return view('supervisor.requests.create',compact('supervisors'));
    }
    public function ajax($id)
    {
        $project = DB::table('projects')
                ->where('supervisor_id',$id)->get();
        return response()->json([
            'project' => $project
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'sender_id' => 'nullable',
            'recipient_id' => 'required',
            'project_id' => 'required'
        ]);
        $data['sender_id'] = Auth::guard('supervisor')->user()->id;
        ProjectRequest::create($data);
        return redirect()->route('supervisor.projects.requests.index');
    }
    public function approved($id)
    {
        $record = ProjectRequest::find($id);
        $project = Project::where('id',$record->project_id)->first();
        $project->update([
            'supervisor_id' => $record->sender_id
        ]);
        $record->update([
            'status' => '1'
        ]);
        return redirect()->back();
    }
}
