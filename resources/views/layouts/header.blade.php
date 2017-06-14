<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> <b>Panel</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              <i class="fa fa-fw fa-user"></i> Administrator <span class="caret"></span>   
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="#">
                      <i class="fa fa-btn fa-lock"></i> Ubah Password
                  </a>
               </li>
                <li class="divider"></li>
                  <li>
                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      <i class="fa fa-btn fa-power-off"></i> Logout
                    </a>
                  {{-- <form id="logout-form" action="#" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="RzCd6UNXuHj37wHh4awRe0ee2WrbpPrPvkRnWOKB">
                  </form> --}}
                  </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>