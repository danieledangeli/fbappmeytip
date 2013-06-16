<?php
include('php/headerIndex.php');
?>
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


            <a class="large button" target="_top" href="http://www.facebook.com/dialog/oauth/?
                   client_id=<?php echo AppInfo::appID(); ?>&
                   redirect_uri=https://apps.facebook.com/mymeytip/events.php&
                   scope=email,publish_stream
                   &state=1">Join</a>
        </div>
</div>
<script src="js/foundation.min.js"></script>
</body>
</html>
