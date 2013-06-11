<?php

/**
 * This sample app is provided to kickstart your experience using Facebook's
 * resources for developers.  This sample app provides examples of several
 * key concepts, including authentication, the Graph API, and FQL (Facebook
 * Query Language). Please visit the docs at 'developers.facebook.com/docs'
 * to learn more about the resources available to you
 */

// Provides access to app specific values such as your app id and app secret.
// Defined in 'AppInfo.php'
require_once('AppInfo.php');
// Enforce https on production
if (substr(AppInfo::getUrl(), 0, 8) != 'https://' && $_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
    header('Location: https://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}
// This provides access to helper functions defined in 'utils.php'
require_once('utils.php');


/*****************************************************************************
 *
 * The content below provides examples of how to fetch Facebook data using the
 * Graph API and FQL.  It uses the helper functions defined in 'utils.php' to
 * do so.  You should change this section so that it prepares all of the
 * information that you want to display to the user.
 *
 ****************************************************************************/

require_once('sdk/src/facebook.php');
$facebook = new Facebook(array(
    'appId'  => AppInfo::appID(),
    'secret' => AppInfo::appSecret(),
    'sharedSession' => true,
    'trustForwarded' => true,
));
$user_id = $facebook->getUser();
if ($user_id) {
    try {
// Fetch the viewer's basic information
        $basic = $facebook->api('/me');
    } catch (FacebookApiException $e) {
// If the call fails we check if we still have a user. The user will be
// cleared if the error is because of an invalid accesstoken
        if (!$facebook->getUser()) {
            header('Location: '. AppInfo::getUrl($_SERVER['REQUEST_URI']));
            exit();
        }
    }

// This fetches some things that you like . 'limit=*" only returns * values.
// To see the format of the data you are retrieving, use the "Graph API
// Explorer" which is at https://developers.facebook.com/tools/explorer/
    $likes = idx($facebook->api('/me/likes?limit=4'), 'data', array());

// This fetches 4 of your friends.
    $friends = idx($facebook->api('/me/friends?limit=4'), 'data', array());

// And this returns 16 of your photos.
//$photos = idx($facebook->api('/me/photos?limit=16'), 'data', array());

// Here is an example of a FQL call that fetches all of your friends that are
// using this app
    $app_using_friends = $facebook->api(array(
        'method' => 'fql.query',
        'query' => 'SELECT uid, name FROM user WHERE uid IN(SELECT uid2 FROM friend WHERE uid1 = me()) AND is_app_user = 1'
    ));
}

// Fetch the basic info of the app that they are using
$app_info = $facebook->api('/'. AppInfo::appID());

$app_name = idx($app_info, 'name', '');


function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    return curl_exec($curl);
}

?>
<!-- HEADER -->
<nav class="top-bar">
    <ul class="title-area">
        <li class="name logo"><a href="fbapp.php"><img src="img/logo.png"></a></li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <ul class="left">
            <li class="divider"></li>
            <li class="active"><a href="#">events</a></li>
            <li class="divider"></li>
            <li><a href="#">people</a></li>
            <li class="divider"></li>
        </ul>
    </section>
</nav>
<!-- /HEADER -->
<!--USER PANEL -->


<div class="userpanel">
    <div class="row">
        <!-- NOME -->
        <div class="large-3 columns verticaldivider">
            <div class="large-5 small-6 columns">
                <img src="https://graph.facebook.com/<?php echo $user_id; ?>/picture?type=square" alt="<?php echo $basic['name'];?>">
            </div>
            <div class="large-7 small-6 collapsecolumns">
                <h4 class="white"><?php echo $basic['name']; ?></h4>
                <div><h8>Pending Bets</h8> <div class="valuesmall" id="pending"><?php echo $meytipuser->pending; ?></div></div>
                <div><h8>Challenge</h8> <div class="valuesmall">0</div></div>
            </div>
        </div>
        <!-- /NOME -->
        <!-- SALVADANAIO -->
        <div class="large-2 columns verticaldivider">
            <div class="row">
                <div class="large-5 small-6 columns"><i><img src="img/porco.png" alt=""></i></div>
                <div class="large-7 small-6 collapsecolumns">
                    <h4>Salvadanaio</h4>
                    <div class="value" id="cash"><?php echo $meytipuser->cash; ?></div>
                </div>
            </div>
        </div>
        <!-- /SALVADANAIO -->
        <!-- BEST CASE -->
        <div class="large-2 columns verticaldivider">
            <div class="row">
                <div class="large-5 small-6 columns"><i><img src="img/win.png" alt=""></i></div>
                <div class="large-7 small-6 collapsecolumns">
                    <h4>Best Case</h4>
                    <div class="value">0</div>
                </div>
            </div>
        </div>
        <!-- /BEST CASE -->
        <!-- WORST CASE -->
        <div class="large-2 columns verticaldivider">
            <div class="row">
                <div class="large-5 small-6 columns"><i><img src="img/lose.png" alt=""></i></div>
                <div class="large-7 small-6 collapsecolumns">
                    <h4>Worst Case</h4>
                    <div class="value">0</div>
                </div>
            </div>
        </div>
        <!-- /WORST CASE -->
        <!-- COIN -->
        <div class="large-3 columns">
            <div class="large-6 small-6 columns left">
                <h4>Daily Coins</h4>
                <a class="tiny button expand disabled" href="#">Ritira</a>
            </div>
            <div class="large-6 small-6 columns">
                <h4>Extra Coins</h4>
                <a class="tiny success button expand disabled" href="#">Ritira</a>
            </div>
        </div>
        <!--/COIN-->
    </div>
</div>
<!--/USER PANEL -->

