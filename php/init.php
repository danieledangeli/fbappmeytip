<?php if (isset($basic)) {
    $data = json_encode($basic);
    $us = CallAPI('POST','https://meytip.com/back/meytip/web/app.php/login.json',$data);
    $meytipuser = json_decode($us);
    ?>
<?php } else { ?>


<?php } ?>