<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Procedure;
use App\Models\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProceduresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('verified');
    }

    public function index(Request $request)
    {
//        if ($request) {
        $procedures = DB::table('procedures')
            ->join('states', 'procedures.state_id', '=', 'states.id')
            ->join('categories', 'categories.id', '=', 'procedures.category_id')
            ->select('procedures.*', 'states.name as state', 'categories.name as category')
            ->get();
//        $states = State::all();
//        $categories = Category::all();
        $users = User::all();

        return view('procedures.index', ['procedures' => $procedures, 'users' => $users]);
        //return view('procedures.index', ['procedures' => $procedures, 'states' => $states, 'categories' => $categories, 'users' => $users]);
//        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $procedure = new Procedure();
        $procedure->state_id = request('state_id');
        $procedure->category_id = request('category_id');
        $procedure->description = request('description');
        $procedure->save();
        $procedure->asignarUser($request->get('user'));

        return redirect('/tramites');
    }
}
