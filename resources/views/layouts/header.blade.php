<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="{{url('/home')}}">Zinofit</a>

  <!-- Links -->
  <ul class="navbar-nav">
  @if(checkPermission(['admin','superadmin','user']))
    <li class="nav-item">
      <a class="nav-link" href="{{url('/items')}}">All Items</a>
    </li>
    @endif
    @if(checkPermission(['user','admin','superadmin']))
    <li class="nav-item">
      <a class="nav-link" href="{{url('/pos')}}">POS</a>
    </li>
    @endif

    <!-- Dropdown -->
    @if(checkPermission(['admin','superadmin']))
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Products
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{'/retails'}}">Retail Products</a>
        <a class="dropdown-item" href="{{'/wholesales'}}">Wholesale Products</a>
      </div>
    </li>
    @endif
    @if(checkPermission(['admin','superadmin']))
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Stock
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{'/retailstocks'}}">Retail Stock</a>
        <a class="dropdown-item" href="{{'/wholesalestocks'}}">Wholesale Stock</a>
      </div>
    </li>
    @endif
    @if(checkPermission(['superadmin']))
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Reports
      </a>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="{{'/salesreports'}}">WholeSales Reports</a>
    <a class="dropdown-item" href="{{'/retailsalesreports'}}">Retail Sales Reports</a>
    <a class="dropdown-item" href="{{'/salesbydatereports'}}">WholeSales Reports by Date</a>
    <a class="dropdown-item" href="{{'/retailsalesbydatereports'}}">Retail Reports by Date</a>
    <a class="dropdown-item" href="{{'/expReports'}}">Items Expiry Report</a>
      </div>
    </li>
    @endif
    @if(checkPermission(['superadmin']))
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Settings
      </a>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="{{'/company'}}">Company</a>
    @if(checkPermission(['superadmin']))
    <a class="dropdown-item" href="{{'/users'}}">View users</a>
     @endif
      </div>
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
  </ul>
</nav>