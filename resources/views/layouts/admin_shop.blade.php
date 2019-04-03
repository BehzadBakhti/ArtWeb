@include('includes.header')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<div class="container">
    <div class="row py-2">

    @if(Auth::CHECK())
        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{route('shop')}}"> Dashboard</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('admin.products')}}">Products</a>
                </li>

                <li class="list-group-item">
                    <a href="{{route('prod_cat.create')}}">Product Categories</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('prod_tag.create')}}">Product Tags</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('admin.events')}}"> Events</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('posts.trashed')}}"> Trashed Products</a>
                </li>
            </ul>
        </div>
    @endif

        <div class="col-lg-8">
            <main >
                @yield('content')
            </main>
        </div>
    </div>
</div>
        
    </div>
 <script src="{{asset('js/toastr.min.js')}}"></script>
 <script>
      
 @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}")
 @endif

  @if(Session::has('info'))
    toastr.info("{{Session::get('info')}}")
 @endif

 @if(Session::has('error'))
    toastr.error("{{Session::get('error')}}")
 @endif

 </script>
 @yield('scripts')
@include('includes.footer')
