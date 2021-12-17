<header class="main-header">
    <!-- Logo -->
    <a href="{{route('dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b> <img src="{{asset('./dist/img/dmslogo.png')}}" class="img-circle" alt="User Image"></b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>D</b>MS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
    <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        @if(Auth::user()->picture==0)
            <img src="{{asset('./dist/img/avat.png')}}" class="user-image" alt="User Image">
            @else
              <img src="../uploads/profilepicture/{{Auth::user()->picture}}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              @if(Auth::user()->picture==0)
                <img src="{{asset('./dist/img/avat.png')}}" class="img-circle" alt="User Image">
                @else
              <img src="../uploads/profilepicture/{{Auth::user()->picture}}" class="user-image" alt="User Image">
              @endif
                <p>
                {{ Auth::user()->name }}
                 
                </p>
                <span class="hidden-xs">Available</span>
              </li>
             
              <li class="user-footer">
                     <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-power-off mr-2"></i>
                                        {{ __('Logout') }}
                      </a>
               
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>