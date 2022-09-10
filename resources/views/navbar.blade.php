<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/home')}}">Zinofit</a>
        <button class="navbar-toggler">
</button>
<div class="collapse navbar-collapse">
<div class="navbar-nav">
@if(checkPermission(['admin','superadmin']))
<a class="nav-item nav-link" href="{{url('/items')}}">Products</a>
@endif
@if(checkPermission(['user','admin','superadmin']))
    <a class="nav-item nav-link" href="{{url('/pos')}}">POS</a>
    @endif
    @if(checkPermission(['admin','superadmin']))
    <a class="nav-item nav-link" href="{{url('/stocks')}}">Stock in Store</a>
    @endif
    @if(checkPermission(['admin','superadmin']))
    <a class="nav-item nav-link" href="{{url('/purchases')}}">Purchases</a>
    @endif
    @if(checkPermission(['admin','superadmin']))
    <a class="nav-item nav-link" href="{{'salesreports'}}">Sales Reports</a>
</li>
    @endif
    <ul class="navbar-nav ms-auto" style="float:right">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  WELCOME:     {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('/login')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
</div>
</div>
    </div>
</nav>