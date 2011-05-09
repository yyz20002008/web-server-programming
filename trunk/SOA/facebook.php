<?php
include_once('appinclude.php');
?>
<html>
<body>
<fb:login-button></fb:login-button>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({
    appId  : '<?=$appId?>',
    status : true, // check login status
    cookie : true, // enable cookies to allow the server to access the session
    xfbml  : true  // parse XFBML
  });
  FB.Event.subscribe('auth.sessionChange', function(response) {
          location = "?" + response.session;
        });
  FB.getLoginStatus(function(response) {
          if (response.session) {
                 
                  location = "?" + response.session.access_token;
          } else {
            // no user session available, someone you dont know
          }
        });
 
</script>
</body></html>

