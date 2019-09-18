@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="justify-content-sm-center mb-4" style="text-align: center">
            <h1>{{$questionnaire->title}}</h1>
        </div>
        <form action="" method="POST">
            @csrf
        @php
            $i=1
        @endphp
        <input name="title" type="hidden" value="{{$questionnaire->title}}">
        @foreach ($questions as $question)
           <div class="form-group">  
                <h3>Question {{$i}}</h3>   
               <div class="col-sm-12">
                <label style="font-size: 16px">{{$question->question}}<label>
                <input type="hidden" value="{{$question->question}}" name="questions[]">
               </div>
                <div class="col-sm-3">
                <input class="form-control" placeholder="out of 5" type="number" step="0.5" max="5" min="1" name="answers[]" required>
               </div>
            </div> 
            <br><br>
            @php
                $i++
            @endphp   
        @endforeach
        <div class="form-group" style="text-align: center">
            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
        </div>
        </form>
    </div>
@endsection