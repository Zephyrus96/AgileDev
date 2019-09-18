@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('teamSuccess'))
            <div class="alert alert-success mt-4">
                {{session('teamSuccess')}}
            </div>
        @endif
        @if (session('teamFail'))
            <div class="alert alert-danger mt-4">
                {{session('teamFail')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Create a team</div>
            <div class="card-body">
                <form action="{{action('TeamController@store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="col-form-label">Scrum Master</label>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control" name="scrum_masters">
                                @foreach ($users as $user)
                                    @if ($user->position == "Scrum Master" && $user->team_id == null)
                                        <option>{{$user->username}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="col-form-label">Developer</label>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control" name="developers">
                                @foreach ($users as $user)
                                    @if ($user->position == "Developer" && $user->team_id == null)
                                        <option>{{$user->username}}</option>
                                    @endif
                                @endforeach
                            </select>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="col-form-label">Product Owner</label>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control" name="product_owners">
                                @foreach ($users as $user)
                                    @if ($user->position == "Product Owner" && $user->team_id == null)
                                        <option>{{$user->username}}</option>
                                    @endif
                                @endforeach
                            </select>    
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-4">
                            <input type="submit" class="btn btn-primary" name="create_team">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection