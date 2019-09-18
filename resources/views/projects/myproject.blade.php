@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>My Project</h2>
        <hr>
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Duration</th>
                <th>Department</th>  
            </tr>
            <tr>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->start_date}}</td>
                <td>{{$project->end_date}}</td>
                <td>{{$project->duration}}</td>
                <td>{{$project->department}}</td>
            </tr>
        </table>
    </div>
@endsection