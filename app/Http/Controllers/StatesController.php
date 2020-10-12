<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('verified');
    }

    public function index()
    {
        $states = State::select('*')
            ->orderBy('id','asc')
            ->get();

        return view('states.index',['states' => $states]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $state = new State();
        $state->name = request('name');
        $state->description = request('description');
        $state->save();

        return redirect('estados');
    }

    public function show($id)
    {
        return view('states.show', ['state' => State::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('states.modal-edit', ['state' => State::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $state = State::findOrFail($id);
        $state->name = $request->get('name');
        $state->description = $request->get('description');
        $state->update();

        return redirect('/estados');
    }

    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->delete();

        return redirect('/estados');
    }
}
