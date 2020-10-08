<?php

namespace App\Http\Controllers;

//use App\Models\User;
use App\Http\Requests\UserEditFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('verified');
    }

    //  Mostrando una lista de los registros
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('search'));
            $users = User::where('name', 'LIKE', '%' . $query . '%')
                ->orderBy('id','asc')
                ->get();

            return view('customers.index', ['users' => $users, 'search' => $query]);
        }
    }

    //  Método oara crear
    public function create()
    {
        $roles = Role::all();
        return view('customers.create', ['roles' => $roles]);
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
        $usuario->email = $request->email;
        $usuario->password = bcrypt(request('password'));
        if ($request->hasFile('imagen')) {
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }

        $usuario->save();

        $usuario->asignarRol($request->get('rol'));

        return redirect('/clientes');
    }

    //  Método para mostrar un registro en específico
    public function show($id)
    {
        return view('customers.show', ['user' => User::findOrFail($id)]);
    }

    //  Método para editar un registro, muestra el formulario con los datos a editar
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('customers.edit', ['user' => $user, 'roles' => $roles]);
    }

    //  Método para actualizar un registro
    public function update(UserEditFormRequest $request, $id)
    {
        $this->validate(\request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id]]);
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');

        if ($request->hasFile('imagen')) {
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }
        $pass = $request->get('password');
        if ($pass != null) {
            $usuario->password = bcrypt($request->get('password'));
        } else {
            unset($usuario->password);
        }

        $role = $usuario->roles;
        if (count($role) > 0) {
            $role_id = $role[0]->id;
            User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
        } else {
            $usuario->asignarRol($request->get('rol'));
        }
        //User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);

        $usuario->update();

        return redirect('/clientes');
    }

    //  Método para eliminar un registro específico
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect('/clientes');
    }
}
