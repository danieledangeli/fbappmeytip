<?php if (isset($basic)) {

    $users = CallAPI('GET','https://meytip.com/back/meytip/web/app.php/stands/innlab.json');

    $users = json_decode($users);
   

} else { ?>


<?php }