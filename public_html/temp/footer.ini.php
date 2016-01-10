    <footer class="section white_color" id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1>Contact&nbsp;</h1>
            <p>Facebook: <a href="https://www.facebook.com/SteamStores">SteamStore</a></h5></p>
          </div>
          <div class="col-sm-6">
            <h1>Steam Store</h1>
            <p>Copyright © 2016 SteamStore.in.th</p>
            <p>Powered by SteamStore.in.th</p>
          </div>
        </div>
      </div>
    </footer>

 <!-- Modals login -->
    <div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h2>
          </div>

          <div class="modal-body">
           <form>
              <div class="row">

                   <div class="col-xs-12 col-sm-6">
                     <div class="form-group" >
                       <label for="recipient-name" class="control-label"></label><br>
                       <fb:login-button size="large" scope="public_profile,email" onlogin="checkLoginState();">
                       เข้าสู่ระบบด้วย Facebook
                       </fb:login-button>
                       <!--<div id="status"></div>-->
                     </div>
                   </div>


                   <div class="col-xs-12 col-sm-6">
                     <div class="form-group" >
                       <label for="recipient-name" class="control-label">Username:</label>
                       <input type="text" class="form-control" id="recipient-name">
                     </div>
                     
                     <div class="form-group" >
                       <label for="message-text" class="control-label">Password:</label>
                       <input type="text" class="form-control" id="recipient-name">
                     </div>
                     
                     <div class="form-group" >
                        <button class="btn btn-primary pull-right" type="submit">Go</button>
                     </div>
                   </div>

                 </div>

           </form>

          </div>

        </div>
      </div>
    </div>

    <!-- Modal reg -->

    <div class="modal fade reg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="reg">Register</h2>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-xs-12">
                
                
                <div class="form-group" >
                  <label for="message-text" class="control-label">Username:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>

                <div class="form-group" >
                  <label for="message-text" class="control-label">Password:</label>
                  <input type="password" class="form-control" id="recipient-name">
                </div>

                <div class="form-group" >
                  <label for="message-text" class="control-label">Re-password:</label>
                  <input type="password" class="form-control" id="recipient-name">
                </div>
                
                <div class="form-group" >
                  <label for="message-text" class="control-label">E-mail:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>

                <div class="form-group" >
                   <button class="btn btn-primary pull-right" type="submit">Submit</button>
                </div>


              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

      <!-- Modal logout -->

    <div class="modal fade logout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="reg"><center>ออกจากระบบเรียบร้อยแล้ว</center></h4>
          </div>

        </div>
      </div>
    </div>

    <script src="js/search.js"></script>
    <script type="js/main.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <script>
    $(function() {
      $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 10000,
        values: [ 0, 10000 ],
        slide: function( event, ui ) {
          $( "#amountMin" ).val( ui.values[ 0 ] );
          $( "#amountMax" ).val( ui.values[ 1 ] );
        }
      });
      $( "#amountMin" ).val( $( "#slider-range" ).slider( "values", 0 ));
      $( "#amountMax" ).val( $( "#slider-range" ).slider( "values", 1 ));
    });
    </script>

    <!-- Facebook -->
  <?php 
  if(isset($_GET['role'])) {
    if($_GET['role'] == 'logout') {
        session_destroy();
    }
    echo "<script type='text/javascript'>window.location.href = './index.php';</script>";
  }
 ?>

<script>
  //FACEBOOK AUTH
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.  
      
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
      testAPI();
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1083986394957168',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {

      // ajax receive data .mart
      $.ajax({
        url:'fbAjax.php',
        type:'POST',
        data:{fbpost:response},
        success:function(steamstoreResponse) {
          //alert(steamstoreResponse);
          //window.location.href = './index.php';
          if(steamstoreResponse == 1) {
            window.location.href = './index.php';
          }
        }
      });
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  </body>
</html>

