<?php if (isset($basic)) {

    $users = CallAPI('POST','https://meytip.com/back/meytip/web/app.php/stands/innlab.json');
    $users = json_decode($users);
    die(var_dump($users));


} else { ?>


<?php }