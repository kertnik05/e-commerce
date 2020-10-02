<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('userDetail')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        $role = Role::firstWhere('name', 'customer');
        $userDetail = new UserDetail([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'shipping_address' => $request->shipping_address,
        ]);

        $user = new User([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user->save()) {
            if ($role) $user->roles()->sync($role);
            $user->userDetail()->save($userDetail);
            return redirect()->route('users.index')->with('success', 'User saved!');
        }
    }

    public function show($id)
    {
        $user = User::find($id)->load(['userDetail', 'roles']);
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id)->load('userDetail');
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'suffix' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'shipping_address' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($id)->load('userDetail');
        $user->update([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->userDetail()->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'shipping_address' => $request->shipping_address,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        $user = User::find($id)->load('userDetail');
        $user->roles()->sync([]);
        $user->userDetail->delete();
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted');
    }
}
