@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <form action="" method="POST">
            @csrf
            <table class="table">
                <caption style="caption-side:top;"><h4>Questionnaire</h4></caption>
                <tr>
                    <td><label class="col-form-label">Title</label></td>
                    <td><input class="form-control" type="text" name="title" required></td>
                </tr>
                <tr>
                    <td><label class="col-form-label">Question 1</label></td>
                    <td><input class="form-control" type="text" name="questions[]" required></td>
                    <td><a href="javascript:void(0);" class="add_button" title="Add Field"><i class="fas fa-plus-circle fa-2x"></i></a></td>
                </tr>
            </table>
            <div class="form-group row">
                <div class="col-sm-3 ml-3">
                    <label class="col-form-label">Target</label>
                </div>
                <div class="col-sm-4">
                    <select class="form-control selected_target" name="target">
                        <option>Everyone</option>
                        <option>Scrum Master</option>
                        <option>Product Owner</option>
                        <option>Developer</option>
                    </select>
                </div>
            </div>
            <div class="form-group row team">
                <div class="col-sm-3 ml-3">
                    <label class="col-form-label">Teams</label>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" name="teams[]" multiple="multiple">
                        <option value="" disabled selected>Select the teams</option>
                        @foreach ($teams as $team)
                            <option>{{$team->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div id="teams" class="form-group row team">
                <div class="col-sm-3 ml-3">
                    <label>Selected Teams</label>
                </div>
                <div class="col-sm-4">
                    <ul class="list-group">
                    </ul>
                </div>
            </div> --}}
            <div class="form-group row">
                <div class="col-sm-3 ml-3"></div>
                <div class="col-sm-4">
                    <input class="btn btn-outline-primary btn-block" type="submit" value="Create">
                </div>
            </div>
        </form>
    </div> 
    
    <script>
        var count = 1;
        var maxFields = 5;
        var html;
        $(function(){
            $(".selected_target").change(function(){
                var option = $(this).children("option:selected").val();
                if(option == "Everyone"){
                    $(".team").show();
                }
                else{
                    $(".team").hide();
                }
            });

            $(".add_button").on("click",function(){
                if(count < maxFields){
                    count++;
                    html = '<tr><td><label class="col-form-label">Question ' +count+ '</label></td><td><input class="form-control" type="text" name="questions[]" required></td><td><a href="javascript:void(0);" class="remove_button" title="Delete Field"><i class="fas fa-minus-circle fa-2x"></i></a></td></tr>';
                    $(".table").append(html);
                }
            });

            $(".table").on("click",".remove_button",function(){
                $("tr:last").remove();
                count--;
            });

            // $(".multiple-team").change(function(){
            //     var selected;
            //     var option = $(this).children("option:selected").val();
            //     selected = '<li class="list-group-item list-group-item-action list-group-item-info" name="selected_teams[]"><a href="#">'+option+'</a></li>';
            //     var element = $(".list-group li:contains("+option+")");
            //     if(element.length <= 0){
            //         $(".list-group").append(selected);
            //     }
            // });

            // $("#teams").on("click",".list-group-item a",function(){
            //     $(this).parent().remove();
            // });
        });
    </script>
@endsection