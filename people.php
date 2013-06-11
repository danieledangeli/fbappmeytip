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
<?php
include('php/init.php');
include('php/userpanel.php');
?>
<div id="fb-root"></div>
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

    // Load the SDK Asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<?php if(isset($basic)) { ?>

<div class="row centrale">
<div class="large-8 columns">
    <table width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>USER</th>
            <th>FOLLOW</th>
            <th>YIELD</th>
            <th>AVERAGE</th>
            <th>BEST WIN</th>
            <th>N° BETS</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="center">1</td>
            <td><a href="#">Stefano Foglietta</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">70%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">2</td>
            <td><a href="#">Daniele D'Angeli</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">68%</td>
            <td align="center">444</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">3</td>
            <td><a href="#">Roberto Montinaro</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">64%</td>
            <td align="center">432</td>
            <td align="center">33</td>
            <td align="center">3</td>
        </tr>
        <tr>
            <td align="center">4</td>
            <td><a href="#">Ivan Minutillo</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">64%</td>
            <td align="center">321</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">5</td>
            <td><a href="#">Arnaldo Stanzione</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">63%</td>
            <td align="center">320</td>
            <td align="center">76</td>
            <td align="center">3</td>
        </tr>
        <tr>
            <td align="center">6</td>
            <td><a href="#">Andrea Curci</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">60%</td>
            <td align="center">311</td>
            <td align="center">56</td>
            <td align="center">7</td>
        </tr>
        <tr>
            <td align="center">7</td>
            <td><a href="#">Chris Repici</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">58%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">8</td>
            <td><a href="#">Braccio Zook</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">55%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">9</td>
            <td><a href="#">Luca Melcarne</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">54%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">10</td>
            <td><a href="#">Marco Minutillo</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">53%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">11</td>
            <td><a href="#">Pierse Stajano</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">51%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">12</td>
            <td><a href="#">Gianluca Beglini</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">50%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">13</td>
            <td><a href="#">Carlo Freccero</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">48%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">14</td>
            <td><a href="#">Andrea Monte</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">48%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">15</td>
            <td><a href="#">Sergio Ricci</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">46%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">16</td>
            <td><a href="#">Andrea Cucchetti</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">44%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">17</td>
            <td><a href="#">Milan Stenos</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">44%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">18</td>
            <td><a href="#">Domenico Dotti</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">43%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">19</td>
            <td><a href="#">Attilio Mandola</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">41%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        <tr>
            <td align="center">20</td>
            <td><a href="#">Roberto Camilleri</a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">40%</td>
            <td align="center">569</td>
            <td align="center">144</td>
            <td align="center">14</td>
        </tr>
        </tbody>
    </table>
</div>
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
                <td><form><input type="text" id="stake" placeholder="Inserire importo"></form></td>
            </tr>
            <tr>
                <td><h13>Vincita</h13></td>
                <td><h13 id="potenziale">0</h13></td>
            </tr>
            </tbody>
        </table>


        <a class="success button expand marginebottom" href="#" onclick="bet('<?php echo $meytipuser->facebookid; ?>');" id="play">Scommetti</a>




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
