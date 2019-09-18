@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->position == "Product Owner")
                        You are logged in as a product owner.
                    @endif  
                    @if (Auth::user()->position == "Coach")
                        You are logged in as a coach.
                    @endif  
                    @if (Auth::user()->position == "Developer")
                        You are logged in as a developer.
                    @endif  
                    @if (Auth::user()->position == "Scrum Master")
                        You are logged in as a scrum master.
                    @endif     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
