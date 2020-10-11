<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditFormRequest;
use App\Http\Requests\UserFormRequest;
<<<<<<< HEAD
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
=======
use App\Models\Department;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
>>>>>>> Mauricio

class EmployeesController extends Controller
{
    //2da Forma de Validar
<<<<<<< HEAD
    public function __construct(){
=======
    public function __construct()
    {
>>>>>>> Mauricio
        $this->middleware('auth');
        //$this->middleware('verified');
    }

    //  Mostrando una lista de los registros
    public function index(Request $request)
    {
        if($request){
<<<<<<< HEAD
            $query = trim($request->get('search'));
            $users = User::where('name','LIKE','%' .$query . '%')
                ->orderBy('id','asc')
                ->get();

            return view('employees.index', ['users' => $users, 'search' => $query]);
=======
            $users = DB::table('users')
                ->join('departments', 'users.department_id', '=', 'departments.id')
                ->select('users.id', 'users.name', 'users.email', 'users.imagen', 'departments.name as department')
//                ->where('us.name')
                ->orderBy('id', 'asc')
                ->get();
            //dd($users);
            $roles = Role::all();

            //return view('employees.index', compact('users','roles'));
            return view('employees.index', ['users' => $users,'roles'=>$roles]);
>>>>>>> Mauricio
        }
    }

    //  Método oara crear
    public function create()
    {
        $roles = Role::all();
<<<<<<< HEAD
        return view('employees.create', ['roles' => $roles]);
=======
        $departments = Department::all();
        return view('employees.create', ['roles' => $roles, 'departments' => $departments]);
>>>>>>> Mauricio
    }

    //  Método para guardar los registros creados
    public function store(UserFormRequest $request)
    {
        $usuario = new User();
        // Version 6
//        $usuario->name = $request('name');
//        $usuario->email = $request('email');
//        $usuario->password = $request('password');
        $usuario->name = $request->name;
<<<<<<< HEAD
        $usuario->email = $request->email;
        $usuario->password = bcrypt(request('password'));
        if ($request->hasFile('imagen')){
=======

        //$usuario->department_id = auth()->id();
        $usuario->department_id = $request->department_id;

        $usuario->email = $request->email;
        $usuario->password = bcrypt(request('password'));
        if ($request->hasFile('imagen')) {
>>>>>>> Mauricio
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }

        $usuario->save();

        $usuario->asignarRol($request->get('rol'));

        return redirect('/empleados');
    }

    //  Método para mostrar un registro en específico
    public function show($id)
    {
        return view('employees.show', ['user' => User::findOrFail($id)]);
    }

    //  Método para editar un registro, muestra el formulario con los datos a editar
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
<<<<<<< HEAD
        return view('employees.edit', ['user' => $user, 'roles' => $roles]);
=======
        $departments = Department::all();
        return view('employees.edit', ['user' => $user, 'roles' => $roles, 'departments' => $departments]);
>>>>>>> Mauricio
    }

    //  Método para actualizar un registro
    public function update(UserEditFormRequest $request, $id)
    {
<<<<<<< HEAD
        $this->validate(\request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id ]]);
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');

        if ($request->hasFile('imagen')){
=======
        $this->validate(\request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id]]);
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->department_id = $request->get('department_id');
        $usuario->email = $request->get('email');

        if ($request->hasFile('imagen')) {
>>>>>>> Mauricio
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }
        $pass = $request->get('password');
<<<<<<< HEAD
        if($pass != null){
            $usuario->password = bcrypt($request->get('password'));
        }else{
=======
        if ($pass != null) {
            $usuario->password = bcrypt($request->get('password'));
        } else {
>>>>>>> Mauricio
            unset($usuario->password);
        }

        $role = $usuario->roles;
<<<<<<< HEAD
        if (count($role) > 0){
            $role_id = $role[0]->id;
            User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
        }else{
=======
        if (count($role) > 0) {
            $role_id = $role[0]->id;
            User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
        } else {
>>>>>>> Mauricio
            $usuario->asignarRol($request->get('rol'));
        }
        //User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);

        $usuario->update();

        return redirect('/empleados');
    }

    //  Método para eliminar un registro específico
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect('/empleados');
    }
}
