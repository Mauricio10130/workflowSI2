@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ $department->name }}</h1>
            <p class="lead">{{ $department->description }}</p>
        </div>
    </div>
@endsection

