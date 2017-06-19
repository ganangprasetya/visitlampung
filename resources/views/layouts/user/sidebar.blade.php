<ul id="slide-out" class="side-nav">
  <li>
    <div class="userView">
      <div class="background">
        <img src="img/background.png">
      </div>
      <a href="#"><img class="circle responsive-img" width="400" src="img/peta_20170616122359.png"></a>
      <a href="#"><span class="white-text name">John Doe</span></a>
      <a href="#"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div>
  </li>
    <li>
      <div class="divider">
        
      </div>
    </li>
    <li><a class="waves-effect" href="{{url('/profile')}}"><i class="material-icons">perm_identity</i>Profile</a></li>
    <li>
        <a " href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="material-icons">power_settings_new</i> Logout
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
    </li>
</ul>