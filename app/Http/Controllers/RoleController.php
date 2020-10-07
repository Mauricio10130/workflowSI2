<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::select('*')
            ->orderBy('id','asc')
            ->get();

        return view('roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = request('name');
        $role->save();

        return redirect('roles');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('roles.edit', ['role' => Role::findOrFail($id)]);
    }


    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->get('name');
        $role->update();
        return redirect('/roles');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect('/roles');
    }
}
