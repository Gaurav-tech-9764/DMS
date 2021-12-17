<aside class="main-sidebar" id="topheader">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- search form -->
   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           
          </a>
        
        </li>
        <li>
          <a href="{{url('/userlist/profile')}}">
            <i class="glyphicon glyphicon-user"></i> <span>User Profile</span>
            
          </a>
        </li>
     
        <li>
          <a href="{{ route('userlist') }}">
            <i class="fa fa-th"></i> <span>User Management</span>
            
          </a>
        </li>
        @if(Auth::user()->role_id == 2)
        <li>
          <a href="{{ route('category') }}">
          <i class="fa fa-list-alt" aria-hidden="true"></i> <span>Category Management</span>
            
          </a>
        </li>
        <li>
          <a href="{{ route('products') }}">
          <i class="fa fa-product-hunt" aria-hidden="true"></i><span>Product Management</span>
            
          </a>
        </li>

        @endif
     
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>