<?php if (isset($basic)) {
    $data = json_encode($basic);
    $us = CallAPI('POST','https://meytip.com/back/meytip/web/app.php/login.json',$data);
    $meytipuser = json_decode($us);
    ?>
<?php } else { ?>
    <body>
    <div class = "row">
        <div class="fb-login-button" size="xlarge" length="xlarge" data-scope="publish_stream,user_likes,user_photos"></div>
    </div>
    </body>
<?php } ?>