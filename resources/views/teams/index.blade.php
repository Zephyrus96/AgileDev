@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <div class="col-sm-3">
                        <th>Team</th>
                    </div>
                    <div class="col-sm-3">
                        <th>Scrum Master</th>
                    </div>
                    <div class="col-sm-3">
                        <th>Product Owner</th>
                    </div>
                    <div class="col-sm-3">
                        <th>Developer</th>
                    </div>  
                </tr>
            </thead>
            @foreach ($teams as $team)
              <tr>
                  <div class="col-sm-3">
                    <td>{{$team->name}}</td>
                  </div>
                  <div class="col-sm-3">
                    <td>{{$team->scrum_master}}</td>
                  </div>
                  <div class="col-sm-3">
                    <td>{{$team->product_owner}}</td>
                  </div>
                  <div class="col-sm-3">
                    <td>{{$team->developer}}</td>
                  </div>    
              </tr>    
            @endforeach 
        </table>
    </div>
@endsection