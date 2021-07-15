@php $current_params = Route::currentRouteAction(); @endphp

<section class="header-area">
    <div class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{asset('assets/images/logo.png')}}" alt="Logo">
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item {{ strpos($current_params, 'HomeController@index') ? 'active' : '' }} ">
                                    <a class="page-scroll" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item {{ strpos($current_params, 'NotesController@index') ? 'active' : '' }} ">
                                    <a class="page-scroll" href="{{url('notes')}}">Notes</a>
                                </li>
                                @auth
                                    <li class="nav-item {{ strpos($current_params, 'NotesController@create') ? 'active' : '' }} ">
                                        <a class="page-scroll" href="{{url('notes/create')}}">Paste Note</a>
                                    </li>
                                @endauth

                                @guest
                                    <li class="nav-item">
                                        <a href="{{url('login')}}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('register')}}">Register</a>
                                    </li>
                                @endguest

                                @auth
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle user-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="lni-user size-sm"></i>
                                            </span>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item text-dark m-0" href="{{url('my-notes')}}">MyNotes</a>
                                                <a class="dropdown-item text-dark m-0" href="javascript::;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none;">
                                                    @csrf
                                                    {{-- <input type="hidden" name="_token" value="LSFVCDVFaODHtHQtEDCKM8TeBOcW1zjEaiR9B0NN">                         --}}
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endauth
                            </ul>
                        </div>

                        {{-- <div class="navbar-btn d-none mt-15 d-lg-inline-block">
                            <a class="menu-bar" href="#side-menu-right"><i class="lni-menu"></i></a>
                        </div> --}}

                        

                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- navbar area -->
</section>