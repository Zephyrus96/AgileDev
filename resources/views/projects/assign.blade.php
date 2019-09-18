@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form action="{{action('ProjectController@changeID',$project->id)}}" method="post">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration</th>
                    <th>Teams Assigned</th>
                    <th>Assign Team</th>
                </tr>
                <tr>
                    <td>{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->start_date}}</td>
                    <td>{{$project->end_date}}</td>
                    <td>{{$project->duration}}</td>
                    <td>
                        @foreach ($teams as $team)
                            @if ($team->project_id == $project->id)
                                {{$team->name.' '}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <select name="teamName">
                            @foreach ($teams as $team)
                                @if ($team->project_id == null)
                                    <option>{{$team->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <div class="offset-sm-4 col-sm-4">
                <input class="btn btn-primary" type="submit" name="assignTeam" value="Assign">
            </div>
        </form>
    </div>
@endsection