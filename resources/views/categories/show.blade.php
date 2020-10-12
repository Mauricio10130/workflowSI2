@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ $category->name }}</h1>
            <p class="lead">{{ $category->description }}</p>
        </div>
    </div>
@endsection

