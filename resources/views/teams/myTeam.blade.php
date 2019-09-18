@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>My Team</h2>
        <hr>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Scrum Master</th>
                <th>Product Owner</th>
                <th>Developer</th>
            </tr>
            <tr>
                <td>{{$team->name}}</td>
                <td>{{$team->scrum_master}}</td>
                <td>{{$team->product_owner}}</td>
                <td>{{$team->developer}}</td>
            </tr>
        </table>
    </div>
@endsection