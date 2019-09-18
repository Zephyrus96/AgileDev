@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="list-group">
            @foreach ($user->questionnaire as $quest)
                @foreach ($questionnaires as $questionnaire)
                    @if ($quest->pivot->questionnaire_id == $questionnaire->id)
                        <a href="{{route('answerQuestionnaire',['username'=>$user->username , 'id'=>$questionnaire->id])}}" class="list-group-item list-group-item-action list__item">{{$questionnaire->title}}</a>
                    @endif
                @endforeach 
            @endforeach
        </div>
    </div>
@endsection