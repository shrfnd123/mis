<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-male"></i>
          <span> Admin</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          <a href="{{route('AdminLogout')}}" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        
         
          <div class="dropdown-divider"></div>
     
        </div>
      </li>
      
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('adminDashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        
          <li class="nav-header">ITEM MANAGEMENT</li>
         
          <li class="nav-item">
            <a href="{{route('AddItemView')}}" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Add Item
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('AddStockView')}}" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Add Item Stock
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('UpdateItemView')}}" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Update Item
              </p>
            </a>
          </li>

          <li class="nav-header">ORDER MANAGEMENT</li>
            <li class="nav-item">
              <a href="{{route('ViewOrders')}}" class="nav-link">
                <i class="fas fa-box-open"></i>
                <p>
                  View Orders
                </p>
              </a>
            </li>

            <li class="nav-header">SALES MANAGEMENT</li>
            <li class="nav-item">
              <a href="{{route('Sales')}}" class="nav-link">
              <i class="fas fa-money-bill-alt"></i>
                <p>
                   View Sales
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('ProductReport')}}" class="nav-link">
              <i class="fas fa-truck"></i>
                <p>
                   Product Report
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('Forecasting')}}" class="nav-link">
              <i class="fas fa-chart-bar"></i>
                <p>
                   Forecasting
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
