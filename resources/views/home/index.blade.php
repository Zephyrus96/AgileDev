@extends('layouts.app')

@section('content')
    {{-- Carousel --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="overlay">
                <h1 class="display-3">Agile Development</h1>
                <h3>Scrum. Agile. Lean.</h3>
            </div>
            <div class="carousel-item active">
                <img class="d-block image" src="https://i.imgur.com/IvSJupG.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 image" src="https://i.imgur.com/lojatDi.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 image" src="https://i.imgur.com/YXEu5TM.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{-- Jumbotron --}}
    <div class="container-fluid padding">
        <div class="row jumbotron">
            <div class="col-sm-12">
               <h1 class="display-4">For Developers By Developers.</h1>
            </div>
            <hr>
            <div class="col-sm-12">
                <p class="lead">This website is made to help team members with their work in agile development.</p>
            </div>
        </div>
    </div>
    
    {{-- Title --}}
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-sm-12">
                <h1 class="display-4">Contents</h1>
            </div>
            <hr>
        </div>
    </div>

    {{-- Cards --}}
    <div class="container-fluid padding">
        <div class="row mt-0 padding">
            <div class="col-sm-4">
                <div class="card mt-0 info">
                    <img class="card-img-top" src="https://i.imgur.com/0TDKvtt.jpg" alt="Team">
                    <div class="card-body">
                        <h4 class="card-title">Teams</h4>
                        <p class="card-text">View info about your team.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mt-0 info">
                    <img class="card-img-top" src="https://i.imgur.com/MUz9CvJ.jpg" alt="Project">
                    <div class="card-body">
                        <h4 class="card-title">Projects</h4>
                        <p class="card-text">Check the details of the project your team got assigned.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mt-0 info">
                    <img class="card-img-top" src="https://i.imgur.com/6j4TDYq.jpg" alt="Questionnaire">
                    <div class="card-body">
                        <h4 class="card-title">Questionnaires</h4>
                        <p class="card-text">Give your feedback on questionnaires set up by your coach.</p>
                    </div>
                </div>
            </div>
            <hr class="my-4">
        </div>
    </div>

    <div class="container-fluid">
        <div class="row padding">
            <div class="col-sm-6">
                <h1 class="display-4">Learn More</h1> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, mollitia? Doloremque ipsa porro obcaecati enim, recusandae nostrum natus eum quos temporibus eos esse quis dignissimos. Natus accusamus ullam obcaecati aut?</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis quasi fuga excepturi necessitatibus doloremque quo. Quasi quam asperiores dicta tempora labore consequuntur fugiat ratione nisi quibusdam? Tempore inventore maiores sed!</p>
                <br>
            </div>
            <div class="col-sm-6">
                <img src="https://i.imgur.com/EkP13aH.jpg" class="img-fluid">
            </div>
        </div>
    </div>
@endsection