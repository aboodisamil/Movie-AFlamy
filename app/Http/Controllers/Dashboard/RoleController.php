<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{


    public function index()
    {
        $roles=Role::WhereRoleNot(['super_admin'])->WhenSearch(request()->search)->paginate(5);
        return view('dashboard.roles.index' , compact('roles'));
    }


    public function create()
    {
        return view('dashboard.roles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles,name' ,
            'persmissions'=>'required|array|min:1'
        ]);

       $role= Role::create($request->all());
       $role->attachPermissions($request->persmissions);
        session()->flash('Added','Data Added Successfully');
        return redirect()->route('dashboard.roles.index');
    }

    public function show(Role $category)
    {
        //
    }


    public function edit(Role $role)
    {
        return view('dashboard.roles.edit',compact('role'));
    }


    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required|unique:roles,name,'.$role->id,
            'persmissions'=>'required|array|min:1'
        ]);

        $role->update($request->all());
        $role->syncPermissions($request->persmissions);

        session()->flash('Added','Data Updated Successfully');
        return redirect()->route('dashboard.roles.index');

    }


    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('Added','Data Removed Successfully');
        return redirect()->back();

    }
}
