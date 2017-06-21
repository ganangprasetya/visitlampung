<ul id="slide-out" class="side-nav">
  <li>
    <div class="userView">
      <div class="background">
        <img src="{{ asset('img/background.png') }}">
      </div>
      <a href="#"><img class="circle responsive-img" width="400" src="{{ asset('img/'.Auth::user()->biodata->foto) }}"></a>
      <a href="{ url('/profile') }}"><span class="white-text name"> {{ Auth::user()->name }} </span></a>
      <a href="{ url('/profile') }}"><span class="white-text email">{{ Auth::user()->email }}</span></a>
    </div>
  </li>
    <li>
      <div class="divider">
        
      </div>
    </li>
    <li><a class="waves-effect" href="{{ route('biodata.index') }}"><i class="material-icons">perm_identity</i>Profile</a></li>
    <li>
        <a " href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="material-icons">power_settings_new</i> Logout
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
    </li>
</ul>