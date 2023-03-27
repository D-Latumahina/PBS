<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="dashNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Welkom {{Auth()->user()->name}}</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">Inkomsten</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Uitgaven</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Wishlist</a></li>
                        <li class="nav-item"><a class="nav-link" action="{{ route('logout') }}" method="POST" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Uitloggen') }}</a>
                                    </li>

                             <li class="nav-item dropdown">

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div> 
                         </li>
                    </ul>
                </div>
            </div>
</nav>