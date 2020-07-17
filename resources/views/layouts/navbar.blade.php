<header class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-left">
            <a href="{{ url('/home') }}">Home</a>
        </div>
        <div class="top-right">
            @auth
                <a href="{{route('createList')}}">Create List</a>
                <a href="{{route('showLists')}}">Show Lists </a>
                <a href="{{route('createNews')}}">Add News</a>
                <a>{{ Auth::user()->name }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-dark btn-font">Log out </button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</header>