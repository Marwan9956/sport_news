<header class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-left">
            <a href="{{ url('/home') }}">Home</a>
        </div>
        <div class="top-right">
            @auth
                <div class="dropdown show">
                    <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        News lists
                    </a>
                
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('createList')}}">Create List</a>
                        <a class="dropdown-item" href="{{route('showLists')}}">Show Lists </a>
                    </div>
                </div>
                
                <a href="{{route('createNews')}}">Add News</a>

                <div class="dropdown show">
                    <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categories
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('categories')}}">display</a>
                        <a class="dropdown-item" href="{{route('categories_form')}}">add</a>
                    </div>
                </div>


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