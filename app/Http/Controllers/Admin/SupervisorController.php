<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Supervisor\StoreRequest;
use App\Http\Requests\Admin\Supervisor\UpdateRequest;
use App\Models\Center;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SupervisorController extends Controller
{
    public function index()
    {
        $supervisors = Supervisor::whereHas('center')->paginate(10);
        return view('admin.supervisors.index',compact('supervisors'));
    }
    public function create()
    {
        
        $centers = Center::all();
        return view('admin.supervisors.create',compact('centers'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        Supervisor::create($data);
        return redirect()->route('admin.supervisors.index')->with(['success' => 'Store Supervisor Successfully']);
    }
    public function edit($id)
    {
        $record = Supervisor::find($id);
        $centers = Center::all();
        return view('admin.supervisors.edit',compact('record','centers'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Supervisor::find($id);
        $data = $request->validated();
        $record->update([
            'name'          => $request->name          ? $data['name']          : $record->name,
            'email'         => $request->email         ? $data['email']         : $record->email,
            'phone'         => $request->phone         ? $data['phone']         : $record->phone,
            'university_id' => $request->university_id ? $data['university_id'] : $record->university_id,
            'center_id'     => $request->center_id     ? $data['center_id']     : $record->center_id,
        ]);
        return redirect()->route('admin.supervisors.index')->with(['update' => 'Update Supervisor Successfully']);
    }
    public function delete($id)
    {
        $record = Supervisor::find($id);
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete Supervisor Successfully']);
    }
}
