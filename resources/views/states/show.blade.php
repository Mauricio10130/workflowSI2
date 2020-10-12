@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ $state->name }}</h1>
            <p class="lead">{{ $state->description }}</p>
        </div>
    </div>
@endsection

