<?php if (isset($basic)) {
    $data = json_encode($basic);
    $us = CallAPI('POST','https://meytip.com/back/meytip/web/app.php/login.json',$data);
    $meytipuser = json_decode($us);
    ?>
<?php } else { ?>

    <div class="row">
        <div class="large-12 columns">
            <div class="large-6 large-offset-3 columns">
                <img src="img/logo5.png">
            </div>
        </div>
        <div class="large-12 columns">
            <h3 class="hlog">Iscriviti ora e comincia a scommettere sul serio</h3>
        </div>
        <div class="large-12 columns">
            <div class="large-6 large-offset-3 columns">
                <div class="fb-login-button" size="xlarge" length="xlarge" data-scope="publish_stream,user_likes,user_photos"></div>
            </div></div>
    </div>

<?php } ?>