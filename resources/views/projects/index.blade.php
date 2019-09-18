@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="display-4">Projects</h1>
        <div class="list-group">
            @foreach ($projects as $project)
                <a href="projects/assign/{{$project->id}}" class="list-group-item list__item">{{$project->title}}</a>                 
            @endforeach
        </div>
    </div>
@endsection