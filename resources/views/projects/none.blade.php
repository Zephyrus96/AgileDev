@extends('layouts.app')

@section('content')
    <div class="container not-found">
        <div class="row">
            <div class="col-sm-4">
                <i class="fas fa-exclamation-circle fa-7x"></i>
            </div>
        </div>
        <div class="row">
            <div class="pt-2 col-sm-12">
                <h3>You have no projects assigned.</h3>
            </div>
        </div>
    </div>
@endsection