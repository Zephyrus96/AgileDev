@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center pt-5">
            @if (session('projectSuccess'))
                <div class="alert alert-success">
                    {{session('projectSuccess')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Create a Project</div>
                <div class="card-body">
                    <form action="{{action('ProjectController@store')}}" method="POST">
                        @csrf
                        <div class="row form-group {{ $errors->has('title') ? 'has-error' :'' }}">
                            <div class="col-sm-3">
                                <label class="col-form-label">Title</label>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="offset-sm-3 col-sm-6">
                                @if ($errors->has('title'))
                                    @foreach ($errors->get('title') as $error)
                                        <label class="text-danger">{{$error}}</label>
                                    @endforeach 
                                @endif
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                            <div class="col-sm-3">
                                <label class="col-form-label">Description</label>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="description">
                            </div>
                            <div class="offset-sm-3 col-sm-6">
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <label class="text-danger">{{$error}}</label>
                                    @endforeach 
                                @endif
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('start_date') ? 'has-error' :'' }}">
                            <div class="col-sm-3">
                                <label class="col-form-label">Start Date</label>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="date" name="start_date">
                            </div>
                            <div class="offset-sm-3 col-sm-6">
                                @if ($errors->has('start_date'))
                                    @foreach ($errors->get('start_date') as $error)
                                        <label class="text-danger">{{$error}}</label>
                                    @endforeach 
                                @endif
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('end_date') ? 'has-error' :'' }}">
                            <div class="col-sm-3">
                                <label class="col-form-label">End Date</label>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="date" name="end_date">
                            </div>
                            <div class="offset-sm-3 col-sm-6">
                                @if ($errors->has('end_date'))
                                    @foreach ($errors->get('end_date') as $error)
                                        <label class="text-danger">{{$error}}</label>
                                    @endforeach 
                                @endif
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('duration') ? 'has-error' :'' }}">
                            <div class="col-sm-3">
                                <label class="col-form-label">Duration</label>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="number" step="0.5" name="duration">
                            </div>
                            <div class="offset-sm-3 col-sm-6">
                                @if ($errors->has('duration'))
                                    @foreach ($errors->get('duration') as $error)
                                        <label class="text-danger">{{$error}}</label>
                                    @endforeach 
                                @endif
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('department') ? 'has-error' :'' }}">
                            <div class="col-sm-3">
                                <label class="col-form-label">Department</label>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="department">
                            </div>
                            <div class="offset-sm-3 col-sm-6">
                                @if ($errors->has('department'))
                                    @foreach ($errors->get('department') as $error)
                                        <label class="text-danger">{{$error}}</label>
                                    @endforeach 
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class=" offset-sm-3 col-sm-4">
                                <input class="btn btn-primary" type="submit" name="createProject">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection