<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        Role::create($request->validate([
                'name'=>'required',
                'description'=>'required'
            ])
        );

        return redirect()->route('roles.index')->with('success', 'Role saved!');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id)->update($request->validate([
            'name'=>'required',
            'description'=>'required'
        ]));
        return redirect()->route('roles.index')->with('success', 'Role updated!');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role->delete()) {
            return redirect()->route('roles.index')->with('success', 'Role deleted!');
        }
    }
}
