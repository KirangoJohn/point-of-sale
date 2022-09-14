<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-md">
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
    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Reports
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="{{'salesreports'}}">Sales Reports</a>
    <a class="dropdown-item" href="{{'/purchases'}}">Purchases Report</a>
    <a class="dropdown-item" href="{{'/stockReports'}}">Stock Report</a>
    <a class="dropdown-item" href="{{'/expReports'}}">Items Expiry Report</a>
  
  </div>
</div>
    @endif
    @if(checkPermission(['admin','superadmin']))
    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Settings
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="{{'/company'}}">Company</a>
    <a class="dropdown-item" href="{{'registration'}}">Register users</a>
  
  </div>
</div>
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