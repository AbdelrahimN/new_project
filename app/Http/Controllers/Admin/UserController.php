<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=',Auth::user()->id)->paginate(10);
        return view('admin.users.index',compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('admin.users.index')->with(['success' => 'Store User Successfully']);
    }
    public function edit($id)
    {
        $record = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit',compact('record','roles'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = User::find($id);
        $record->update([
            'first_name'  => $request->first_name  ?  $request->first_name  : $record->first_name,
            'last_name'   => $request->last_name   ?  $request->last_name   : $record->last_name,
            'email'       => $request->email       ?  $request->email       : $record->email,
            'role'        => $request->role        ?  $request->role        : $record->role,
        ]);
        return redirect()->route('admin.users.index')->with(['update' => 'Update User Successfully']);
    }
    public function delete($id)
    {
        $record = User::find($id);
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete User Successfully']);
    }
}
