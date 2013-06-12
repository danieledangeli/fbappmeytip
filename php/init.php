<?php if (isset($basic)) {
    $data = json_encode($basic);
    $us = CallAPI('POST','https://meytip.com/back/meytip/web/app.php/login.json',$data);
    $meytipuser = json_decode($us);


    $feed = CallAPI('GET','https://meytip.com/back/meytip/web/app.php/feeds/10.json');
    $feed = json_decode($feed);

    $userdata = CallAPI('GET','https://meytip.com/back/meytip/web/app.php/users/'.$meytipuser->facebookid.'/feeds.json');
    $userfeed = json_decode($userdata);

    $attachment = array( 'score' => $meytipuser->cash, 'access_token' => $facebook->getAppId().'|'.$facebook->getApiSecret());
    $attachmentget = array( 'access_token' => $facebook->getAppId().'|'.$facebook->getApiSecret());

    $postscore = $facebook->api('/'.$meytipuser->facebookid.'/score/','POST',$attachment);

    $scores = $facebook->api('/'.$meytipuser->facebookid.'/scores','GET',$attachmentget);


} else { ?>


<?php }