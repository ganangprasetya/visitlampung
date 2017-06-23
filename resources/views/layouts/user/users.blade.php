<!DOCTYPE html>
<html>
<head>
<style>
  #map{
    display: block;
    height: 500px;
    width: 100%;
    margin: 0 auto;
    -moz-box-shadow: 0px 5px 20px #ccc;
    -webkit-box-shadow: 0px 5px 20px #ccc;
    box-shadow: 0px 5px 10px #ccc;
  }
   body {
     display: flex;
     min-height: 100vh;
     flex-direction: column;
 }
 main {
     flex: 1 0 auto;
 }
 .tengah{
  margin-top: 20px;
 }

  header, main{
      padding-right: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-right: 0;
      }
    }
  h1 {
    text-align: center;
    font-family: bebas neue;
    text-shadow: 2px 2px #424242;
    color: white;
  }
  h2 {
    text-align: center;
    font-family: bebas neue;
    text-shadow: 2px 2px #424242;
    color: white;
  }
  h4 {
    text-align: center;
    font-family: bebas neue;
    padding-top: 10px;
  }
  h3 {
    text-align: center;
    font-family: bebas neue;
    padding-top: 10px;
  }
  .siji {
    font-size: 20px;
    font-family: bebas neue;
    margin-top:45px;
  }
</style>
  <title>Visit Lampung</title>
  <!--Import Google Icon Font-->
  <link href="{{ asset('http://fonts.googleapis.com/icon?family=Material+Icons') }}" rel='stylesheet'>
  <!--Import materialize.css-->
  <link href="{{ asset('materialize/css/materialize.min.css') }}" rel='stylesheet' media='screen,projection'>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    @yield('navbar')
    @yield('sidebar')
    @yield('searchbar')
      <div>
        @yield('content')
      </div>
      @yield('footer')

  <!--Import jQuery before materialize.js-->
  <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  <script src="{{ asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true // Choose whether you can drag to open on touch screens
          }
      );
      $('.collapsible').collapsible();
      $('.carousel').carousel();
      $('.materialboxed').materialbox();
      $('.modal').modal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .10, // Opacity of modal background
        inDuration: 200, // Transition in duration
        outDuration: 200, // Transition out duration
        startingTop: '4%', // Starting top style attribute
        endingBottom: '10%', // Ending top style attribute
        ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
          console.log(modal, trigger);
        }
       }
     );
  });
  </script>
  @yield('script')
</body>

</html>