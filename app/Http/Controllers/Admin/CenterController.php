<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Center\StoreRequest;
use App\Http\Requests\Admin\Center\UpdateRequest;
use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::orderBy('created_at','desc')->paginate(10);
        return view('admin.centers.index',compact('centers'));
    }
    public function create()
    {
        return view('admin.centers.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Center::create($data);
        return redirect()->route('admin.centers.index')->with(['success' => 'Store Center Successfully']);
    }
    public function edit($id)
    {
        $record = Center::find($id);
        return view('admin.centers.edit',compact('record'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Center::find($id);
        $data = $request->validated();
        $record->update([
            'name'     => $request->name     ? $data['name']     : $record->name,
            'location' => $request->location ? $data['location'] : $record->location,
            'contact'  => $request->contact  ? $data['contact']  : $record->contact,
        ]);
        return redirect()->route('admin.centers.index')->with(['update' => 'Update Center Successfully']);
    }
    public function delete($id)
    {
        $record = Center::find($id);
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete Center Successfully']);
    }
}
