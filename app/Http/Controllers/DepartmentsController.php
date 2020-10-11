<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{

    public function index()
    {
        $departments = Department::select('*')
            ->orderBy('id','asc')
            ->get();

        return view('departments.index', ['departments' => $departments]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $department = new Department();
        $department->name = request('name');
        $department->description = request('description');
        $department->save();

        return redirect('departamentos');
    }

    public function show($id)
    {
        return view('departments.show', ['department' => Department::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('departments.modal-edit', ['department' => Department::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->name = $request->get('name');
        $department->description = $request->get('description');
        $department->update();
        return redirect('/departamentos');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect('/departamentos');
    }
}
