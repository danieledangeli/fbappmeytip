<?php if (isset($basic)) {

    $users = CallAPI('GET','https://meytip.com/back/meytip/web/app.php/stands/innlab.json');

    $users = json_decode($users);
    foreach($users as $meytipuser)
    {
        $attachment = array( 'score' => $meytipuser->leaverage, 'access_token' => $facebook->getAccessToken());
        $attachmentget = array( 'access_token' => $facebook->getAccessToken());

        $permissions = $facebook->api('/'.$meytipuser->facebookid.'/permissions');
        $scores = array();
        if( array_key_exists('publish_stream', $permissions['data'][0]) ) {

            $postscore = $facebook->api('/'.$meytipuser->facebookid.'/scores','POST',$attachment);
            $scores = $facebook->api('/388078441305162/scores','GET',$attachmentget);
        }
    }



} else { ?>


<?php }