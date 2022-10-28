<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
    <img src="{{asset('images/logo.jpeg')}}" alt="logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">Zinofit</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('images/admin_images/user.jpg')}}" class="img-circle elevation-2" alt="User Image" style="margin-top: 5px; border-radius: 50px; height: 40px; width: 40px;">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{request()->is(['home'])?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- All items --------------->

          <li class="nav-item">
              <a href="{{ route('items.index') }}" class="nav-link {{request()->is(['items','items/*'])?'active':''}}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                      All Items
                  </p>
              </a>
          </li>

          <!-- Products --------------->

          <li class="nav-item has-treeview {{request()->is(['retails','retails/*','wholesales','wholesales/*'])?'menu-open':''}}">

            <a href="#" class="nav-link {{request()->is(['retails','retails/*','wholesales','wholesales/*'])?'active':''}}">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{ route('retails.index') }}" class="nav-link {{request()->is(['retails','retails/*'])?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Retail</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('wholesales.index') }}" class="nav-link {{request()->is(['wholesales','wholesales/*'])?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wholesale</p>
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
