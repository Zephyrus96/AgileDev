@extends('layouts.app')


@section('content')
    <div class="list-group mt-5 col-sm-6 offset-sm-3">  
            @foreach ($questionnaires as $questionnaire)
                <a href="http://localhost:3000/questionnaires/{{$questionnaire->id}}" class="list-group-item list-group-item-action list__item">{{$questionnaire->title}}</a>
            @endforeach 
        </div>
    </div>
@endsection