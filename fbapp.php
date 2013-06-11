<?php
include('php/header.php');
?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Meytip</title>


    <link rel="stylesheet" href="css/foundation.css" />


    <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>
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
            channelUrl : '//<?php echo $_SERVER["HTTP_HOST"]; ?>/channel.html', // Channel File
            status     : true, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            xfbml      : true // parse XFBML
        });

        // Listen to the auth.login which will be called when the user logs in
        // using the Login button
        FB.Event.subscribe('auth.login', function(response) {
            // We want to reload the page now so PHP can read the cookie that the
            // Javascript SDK sat. But we don't want to use
            // window.location.reload() because if this is in a canvas there was a
            // post made to this page and a reload will trigger a message to the
            // user asking if they want to send data again.
            window.location = window.location;
        });

        FB.Canvas.setAutoGrow();
    };

    function sendRequestViaMultiFriendSelector() {
        FB.ui({method: 'apprequests',
            message: 'Hi, try Meytip'
        }, requestCallback);

    }
    function requestCallback(response) {
        console.log(response);
    }


    // Load the SDK Asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<header class="clearfix">
    <?php if (isset($basic)) {
        $data = json_encode($basic);
        $us = CallAPI('POST','https://meytip.com/back/meytip/web/app.php/login.json',$data);
        $meytipuser = json_decode($us);


        $feed = CallAPI('GET','https://meytip.com/back/meytip/web/app.php/feeds/10.json');
        $feed = json_decode($feed);


        ?>



    <?php } else { ?>
    <div>
        <h1>Please login in</h1>
        <div class="fb-login-button" data-scope="user_likes,user_photos"></div>
    </div>
    <?php } ?>
</header>

<?php if(isset($basic)) { ?>

<div id="myModal" class="reveal-modal small">
    <span class="success label">Success!</span><br>
    <span class="radius secondary label"><?php echo $meytipuser->name;?></span>
    <span class="radius secondary label">La tua scommessa è stata registrata con successo!</span>


    <a class="close-reveal-modal">&#215;</a>
</div>

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
                <a class="tiny button expand" href="#">Ritira</a>
            </div>
            <div class="large-6 small-6 columns">
                <h4>Extra Coins</h4>
                <a class="tiny success button expand" href="#">Ritira</a>
            </div>
        </div>
        <!--/COIN-->
    </div>
</div>
<!--/USER PANEL -->


<div class="row centrale">
    <div class="large-8 columns">
        <!--CTA -->
        <div class="panel">
            <h11>Invita i tuoi amici e guadagna 10C per ogni amico invitato</h11>
            <a href="#" onclick="sendRequestViaMultiFriendSelector()" class="small success button invita"> Invita </a>
        </div>
        <!--/CTA-->

        <!-- FEED/STORICO -->
        <div class="section-container auto" data-section>
            <section class="section">
                <p class="title"><a href="#">Home Feed</a></p>
                <div class="content" id="contentfeed">

                    <?php foreach($feed as $f){ ?>
                    <div class="feed">
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="foto"><img src="https://graph.facebook.com/<?php echo $f->fbid; ?>/picture?type=square" alt="" width="30" height="30"></div>
                            <div class="testo"><h11><span class="blu"><a href=""><?php echo $f->createdAt.' '. $f->name; ?></a> </span> ha effettuato questa scommessa </h11></div>
                        </div>

                    </div>

                    <table style="width:100%">
                        <thead>
                        <tr>
                            <th><h6>INNOVACTION LAB FINAL EVENT</h6></th>
                            <th><h6> Finale SI</h6></th>
                            <th><h6> Finale NO</h6></th>
                            <th><h6> 1</h6></th>
                            <th><h6>X</h6></th>
                            <th><h6>2</h6></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($f->quote as $quota){

                        ?>
                            <tr event="<?php echo $quota->quote->team->id; ?>" eventname="<?php echo $quota->quote->team->name; ?>">

                                <td> <span data-tooltip class="tip-right" title="<?php echo "<p class=blue>".$quota->quote->team->tagline."</p>".$quota->quote->team->teewtidea; ?>"><a href="#" ><?php echo $quota->quote->team->name ?></a></span></td>
                                <td><a href="#"  <?php if($quota->prono == "finale sì") echo "class=\"tiny success button event\""; else echo "class=\"tiny button event\""; ?> value="<?php echo $quota->quote->final; ?>" bet="finale sì" betid="222" bettype="finale sì/no" ><?php echo $quota->quote->final; ?></a></td>
                                <td><a href="#" <?php if($quota->prono == "finale no") echo"class=\"tiny success button event\""; else echo "class=\"tiny button event\"";?> value="<?php echo $quota->quote->nofinal; ?>" bet="finale no" betid="223" bettype="finale sì/no" ><?php echo $quota->quote->nofinal; ?></a></td>
                                <td><a href="#" class="tiny button disabled ">ND</a></td>
                                <td><a href="#" class="tiny button disabled">ND</a></td>
                                <td><a href="#" class="tiny button disabled">ND</a></td>
                            </tr>

                        <?php } ?>


                        </tbody>
                    </table>
                    </div>
                    <div>
                    <?php } ?>

                <h11><a id="show" onclick="loadfeeds()" class="expand secondary button">SHOW MORE </a></h11>
            </section>
            <section class="section">
                <p class="title"><a href="#">Your Events</a></p>
                <div class="content">
                    <h5>This is the title of tab 2</h5>
                    <p>This is the paragraf whitin tab2</p>
                </div>
            </section>
            </div>
    </div>
    <!-- /EVENTS-->

    <div class="large-4 columns">
        <ul class="pricing-table nomargine" id="curbet">
            <li class="title"><h9>Le tue scommesse</h9></li>
        </ul>
        <table class="betting">
            <tbody>
            <tr>
                <td><h13>Quota totale:</h13></td>
                <td><h13 id="quotatotale">0</h13></td>
            </tr>
            <tr>
                <td><h13>Importo</h13></td>
                <td><form><input type="text" id="stake" placeholder="10"></form></td>
            </tr>
            <tr>
                <td><h13>Vincita</h13></td>
                <td><h13 id="potenziale">0</h13></td>
            </tr>
            </tbody>
        </table>
        <a class=" success button expand marginebottom" href="#" onclick="bet('<?php echo $meytipuser->facebookid; ?>');" id="play">Scommetti</a>

        <ul class="pricing-table">
            <li class="title"><h9>Commenti</h9></li>
            <li>
                <div class="fb-comments" data-href="http://meytip.com" data-width="300" data-num-posts="10"></div>
            </li>
        </ul>
        <ul class="pricing-table">
            <li class="title"><h9>TOP 10</h9></li>
            <li>
                <table style="width:100%; margin-bottom:0px">
                    <thead>
                    <tr>
                        <th><h6>#</h6></th>
                        <th><h6>USER</h6></th>
                        <th><h6>YIELD</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td><a href="#">Ivan Minutillo</a></td>
                        <td>75%</td>
                    </tr>
                    </tbody>
                </table>
            </li>
        </ul>
    </div>


</div>
</div>
<script>
    document.write('<script src=' +
            ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
            '.js><\/script>')
</script>

<script src="js/foundation.min.js"></script>
<script src="js/foundation/foundation.tooltips.js"></script>

<!--

<script src="js/foundation/foundation.js"></script>

<script src="js/foundation/foundation.alerts.js"></script>

<script src="js/foundation/foundation.clearing.js"></script>

<script src="js/foundation/foundation.cookie.js"></script>

<script src="js/foundation/foundation.dropdown.js"></script>

<script src="js/foundation/foundation.forms.js"></script>

<script src="js/foundation/foundation.joyride.js"></script>

<script src="js/foundation/foundation.magellan.js"></script>

<script src="js/foundation/foundation.orbit.js"></script>

<script src="js/foundation/foundation.placeholder.js"></script>

<script src="js/foundation/foundation.reveal.js"></script>

<script src="js/foundation/foundation.section.js"></script>



<script src="js/foundation/foundation.topbar.js"></script>

<script src="js/foundation/foundation.interchange.js"></script>

-->
<script type="text/javascript" src="js/meytip.js"></script>
</body>


</html>
<?php } ?>
