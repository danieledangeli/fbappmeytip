<?php
include('php/header.php');
?>
<?php if(isset($basic)) {
   include('events.php');

} else{ ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1&appId=388078441305162";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <script type="text/javascript">
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '<?php echo AppInfo::appID(); ?>', // App ID

                status     : true, // check login status
                cookie     : true, // enable cookies to allow the server to access the session
                xfbml      : true // parse XFBML
            });

            // Listen to the auth.login which will be called when the user logs in
            // using the Login button
            FB.Event.subscribe('auth.login', function(response) {
                 //window.location.href='https://meytip.com/fbappmeytip/index.php';
                // We want to reload the page now so PHP can read the cookie that the
                // Javascript SDK sat. But we don't want to use
                // window.location.reload() because if this is in a canvas there was a
                // post made to this page and a reload will trigger a message to the
                // user asking if they want to send data again.
               window.location = window.location;
            });

            FB.Canvas.setAutoGrow();
        };


        // Load the SDK Asynchronously
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Meytip</title>
     <link rel="stylesheet" href="css/login.css" />
</head>
<body>
<div class="row">
    <div class="large-12 columns">
        <div class="large-6 large-offset-3 columns">
            <img src="img/logo5.png">
        </div>
    </div>
    <div align="center" class="large-12 columns">
        <h3 class="hlog">Join Meytip</h3>
        <h3 class="hlog">discover a new sport betting experience</h3>
    </div>
    <div class="large-12 columns">
        <div class="large-2 large-offset-5 columns">

            <div class="fb-login-button" size="xlarge" length="xlarge" data-scope="publish_stream,user_likes,user_photos"></div>
        </div>
</div>
<script src="js/foundation.min.js"></script>
</body>
</html>
<?php } ?>