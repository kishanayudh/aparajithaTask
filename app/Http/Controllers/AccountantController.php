<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AccountantController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view accountant', ['only' => ['index']]);
        $this->middleware('permission:create accountant', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit accountant', ['only' => ['edit','update']]);
        $this->middleware('permission:delete accountant', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::get();
        return view('role-permission.accountant.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.accountant.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect('/accountants')->with('status', 'Accountant created successfully with roles');
    }

    public function edit(User $accountant)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $accountant->roles->pluck('name', 'name')->all();
        return view('role-permission.accountant.edit', [
            'user' => $accountant,        
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $accountant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (!empty($request->password)) {
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $accountant->update($data);
        $accountant->syncRoles($request->roles);

        return redirect('/accountants')->with('status', 'Accountant Updated Successfully with roles');
    }

    public function destroy($accountantId)
    {
        $user = User::findOrFail($accountantId);
        $user->delete();

        return redirect('/accountants')->with('status', 'Accountant Deleted Successfully');
    }
}
