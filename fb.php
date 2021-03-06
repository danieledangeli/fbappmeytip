<?php
include('php/header.php');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en" > <![endif]-->
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

    <script type="text/javascript">
        window.fbAsyncInit = function() {
        FB.init({
            appId      : '<?php echo AppInfo::appID(); ?>', // App ID
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
            //window.location = window.location;
        });

        FB.Canvas.setAutoGrow();
    };
  function postToFeed(description) {
        // call the API
        var user = "<?php echo $basic['name'];?>";
        description = user+' '+description;
        var obj = {
            method: 'feed',
            link: 'https://apps.facebook.com/mymeytip/index.php',
            picture: 'https://meytip.com/img/logo5.png',
            name: 'Meytip Bet',
            caption: 'https://meytip.com/img/logo5.png',
            actions: [
                {'name': 'get reward', 'link': 'https://apps.facebook.com/mymeytip/index.php'}
            ],
            description: description
        };

        function callback(response) {
            console.log(response);
        }

        FB.ui(obj, callback);
    }


    function sendRequestViaMultiFriendSelector() {
        FB.ui({method: 'apprequests',
            message: 'Hi, prova Meytip e impara a scommettere sfidando i tuoi amici'
        }, requestCallback);

    }
    function requestCallback(response) {
        console.log(response);
    }


   (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1&appId=388078441305162";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<?php

include('php/init.php');
include('php/userpanel.php');
?>

<?php if(isset($basic)) { ?>
<div id="myModal" class="reveal-modal small">
    <div class="large-12 columns">
        <h2>Bravo <?php echo $meytipuser->name;?></h2>
    </div>
    <div class="large-12 columns"><h5>Your bet has been registered successfully</h5></div>
    <a class="close-reveal-modal">&#215;</a>
    <div class="large-5 right columns">
        <div class="large-6 columns"><a class="small success expand button" id="modalok" onClick="closeModal();">Ok</a></div>
        <div class="large-6 collapsecolumns"><a class="small success button" id="modalshare" onClick="postToFeed('has placed a bet on Meytip')">Share</a></div>
    </div>
</div>

<div class="row centrale">
    <div class="large-8 columns">
        <!--CTA -->
        <div class="panel">
            <h11>Invite your friends and we'll get you 10C for eac invited friend</h11>
            <a href="#" onclick="sendRequestViaMultiFriendSelector()" class="small success button invita"> Invite </a>
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
                        <div class="row">
                            <div class="large-12 columns">

                                <div class="testo">Yield <h11><span class="green"><b><?php echo $f->moltiplicatore; ?></b></span> Amount <h11><span class="black"></b><?php echo $f->amount; ?></b></span> </h11></div>
                                <div class="testo">Winning <h11><span class="green"><b><?php echo $f->vincita; ?></b></span></h11></div>
                            </div>

                        </div>

                    <table style="width:100%">

                        <?php if($f->quote[0]->prono == "finale sì" ||$f->quote[0]->prono == "finale no") {?>
                        <thead>

                        <tr>
                            <th><h6>INNOVACTION LAB FINAL EVENT</h6></th>
                            <th><h6> Final YES</h6></th>
                            <th><h6> Final NO</h6></th>
                            <th><h6>1</h6></th>
                            <th><h6>X</h6></th>
                            <th><h6>2</h6></th>
                        </tr>
                        </thead>
                        <?php }
                        else { ?>
                            <thead>

                            <tr>
                                <th><h6>INNOVACTION LAB FINAL EVENT</h6></th>
                                <th><h6>Podium</h6></th>
                                <th><h6>No Podium</h6></th>
                                <th><h6>1</h6></th>
                                <th><h6>X</h6></th>
                                <th><h6>2</h6></th>
                            </tr>
                            </thead>

                        <?php }?>
                        <tbody>
                        <?php
                        foreach($f->quote as $quota){

                            if($quota->prono == "finale sì" || $quota->prono == "finale no"){
                            ?>
                            <tr event="<?php echo $quota->quote->team->id; ?>" eventname="<?php echo $quota->quote->team->name; ?>">

                                <td> <span data-tooltip class="tip-right" title="<?php echo "<p class=blue>".$quota->quote->team->tagline."</p>".$quota->quote->team->teewtidea; ?>"><a href="#" ><?php echo $quota->quote->team->name ?></a></span></td>
                                <td><a href="#"  <?php if($quota->prono == "finale sì") echo "class=\"tiny success button event\""; else echo "class=\"tiny secondary button event\""; ?> value="<?php echo $quota->quote->final; ?>" bet="finale sì" betid="222" bettype="finale sì/no" ><?php echo $quota->quote->final; ?></a></td>
                                <td><a href="#" <?php if($quota->prono == "finale no") echo"class=\"tiny success button event\""; else echo "class=\"tiny secondary button event\"";?> value="<?php echo $quota->quote->nofinal; ?>" bet="finale no" betid="223" bettype="finale sì/no" ><?php echo $quota->quote->nofinal; ?></a></td>
                                <td><a href="#" class="tiny button secondary disabled ">ND</a></td>
                                <td><a href="#" class="tiny button secondary disabled">ND</a></td>
                                <td><a href="#" class="tiny button secondary disabled">ND</a></td>
                            </tr>
                            <?php
                            } else
                            {
                                ?>
                                <tr event="<?php echo $quota->quote->team->id; ?>" eventname="<?php echo $quota->quote->team->name; ?>">

                                <td> <span data-tooltip class="tip-right" title="<?php echo "<p class=blue>".$quota->quote->team->tagline."</p>".$quota->quote->team->teewtidea; ?>"><a href="#" ><?php echo $quota->quote->team->name ?></a></span></td>
                                <td><a href="#"  <?php if($quota->prono == "podio") echo "class=\"tiny success button event\""; else echo "class=\"tiny secondary button event\""; ?> value="<?php echo $quota->quote->podio; ?>" bet="podio" betid="222" bettype="finale sì/no" ><?php echo $quota->quote->podio; ?></a></td>
                                <td><a href="#" <?php if($quota->prono == "nopodio") echo"class=\"tiny success button event\""; else echo "class=\"tiny secondary button event\"";?> value="<?php echo $quota->quote->nopodio; ?>" bet="nopodio" betid="223" bettype="finale sì/no" ><?php echo $quota->quote->nopodio; ?></a></td>
                                <td><a href="#" class="tiny button secondary disabled ">ND</a></td>
                                <td><a href="#" class="tiny button secondary disabled">ND</a></td>
                                <td><a href="#" class="tiny button secondary disabled">ND</a></td>
                            </tr>
                            <?php
                            }
                            ?>

                        <?php } ?>


                        </tbody>
                    </table>



                    </div>
                    <div>
                    <?php } ?>

                <h11><a id="show" onclick="loadfeeds()" class="expand secondary button">SHOW MORE </a></h11>
            </section>
            <section class="section">
                <p class="title"><a href="#">Your Bet</a></p>
                <div class="content">

                    <?php foreach($userfeed as $f){ ?>
                    <div class="feed">
                        <div class="row">
                            <div class="large-12 columns">
                                <div class="foto"><img src="https://graph.facebook.com/<?php echo $meytipuser->facebookid; ?>/picture?type=square" alt="" width="30" height="30"></div>
                                <div class="testo"><h11><span class="blu"><a href=""><?php echo $meytipuser->name; ?></a> </span> ha effettuato questa scommessa </h11></div>
                            </div>

                        </div>

                        <table style="width:100%">
                            <thead>
                            <tr>
                                <th><h6>INNOVACTION LAB FINAL EVENT</h6></th>
                                <th><h6> Prediction</h6></th>
                                <th><h6> Odds</h6></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($f->quote as $quota){ ?>

                            <tr event="1031" eventname="<?php echo $quota->quote->team->name; ?>">
                                <td><a href="#" ><?php echo $quota->quote->team->name; ?></a></td>
                                <td><a href="#" value="1.75" bet="finale sì" betid="221" bettype="finale sì/no" class="tiny secondary disabled button expand"><?php echo $quota->prono; ?></a></td>
                                <td><a href="#" class="tiny secondary disabled button expand"><?php echo $quota->odds; ?></a></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <?php } ?>
                </div>
            </section>
            </div>
    </div>
    <!-- /EVENTS-->

    <div class="large-4 columns">
        <ul class="pricing-table nomargine" id="curbet">
            <li class="title"><h9>Your bets</h9></li>
        </ul>
        <table class="betting">
            <tbody>
            <tr>
                <td><h13>Odds</h13></td>
                <td><h13 id="quotatotale">0</h13></td>
            </tr>
            <tr>
                <td><h13>Amount</h13></td>
                <td><form><input type="text" id="stake" placeholder="Inserire importo"></form></td>
            </tr>
            <tr>
                <td><h13>Winning</h13></td>
                <td><h13 id="potenziale">0</h13></td>
            </tr>
            </tbody>
        </table>

        <a class=" success button expand marginebottom" href="#" onclick="bet('<?php echo $meytipuser->facebookid; ?>');" id="play">BET</a>

        <ul class="pricing-table">
            <li class="title"><h9>Comments</h9></li>
            <li>
                <div class="fb-comments" data-href="https://apps.facebook.com/mymeytip/index.php" data-width="300" data-num-posts="15"></div>
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

<script type="text/javascript" src="js/meytip.js"></script>
</body>


</html>
<?php } ?>
