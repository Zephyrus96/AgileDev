<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Agile') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Projects</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('myProject',['username'=>Auth::User()->username])}}">My Projects</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Teams</a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('myTeam',['username'=>Auth::User()->username])}}">My Team</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Questionnaires</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('viewQuestionnaires',['username'=>Auth::User()->username])}}">View Questionnaires</a>
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown notification__bell">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-bell"></i>
                    </a> 
                    <div class="dropdown-menu dropdown-menu-right notifications__container" aria-labelledby="navbarDropdown">
                        <div class="mark-as-read__container">
                            <span>Notifications</span>
                            @if(count($notifications) == 0)
                                <button class="disabled" onclick="#" disabled>Mark all as read</button>
                            @else
                                <a class="mark-as-read" href="{{route('markAllAsRead')}}">Mark all as read</a>
                            @endif
                        </div> 
                        <div class="user__notifications">
                          <ul>
                              @if(count($notifications) == 0)
                                <li class="no__notifications"><h5>No Notifications!</h5></li>
                              @else
                                @foreach ($notifications as $notification)
                                {{-- {{route('markNotificationAsRead',[ 'id' => $notification["id"] ])}} --}}
                                    <li class="notification-list-item" ><a href="/notifications/{{$notification['id']}}">{{$notification['data']['body']}}</a></li>
                                @endforeach
                              @endif
                          </ul>
                        </div>
                    </div>
                    <span class="badge badge-danger num__notifications">{{ count($notifications) }}</span>
                    
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <script>
        var notifications = {!! json_encode($notifications) !!};
        const numNotifications = document.querySelector('.num__notifications');
        if(numNotifications.innerHTML > 0){
            numNotifications.style.display = "inline-block"
        }
        else{
            numNotifications.style.display = "none";
        }    
    </script>