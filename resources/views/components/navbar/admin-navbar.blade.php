<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarSeries" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                       Séries
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarSeries">
                        <li><a class="dropdown-item" href="{{ route('title.index', ['type' => 'series']) }}">Todas</a></li>
                        <li><a class="dropdown-item" href="{{ route('title.create', ['type' => 'series']) }}">Nova</a></li>
                    </ul>
                </li>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarMovies" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Filmes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarMovies">
                            <li><a class="dropdown-item" href="{{ route('title.index', ['type' => 'filmes']) }}">Todos</a></li>
                            <li><a class="dropdown-item" href="{{ route('title.create', ['type' => 'filme']) }}">Novo</a></li>
                        </ul>
                    </li>
                </ul>
            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    <a id="navbarUser" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUser">
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