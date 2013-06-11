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

<div id="myModal" class="reveal-modal small">
    <span class="success label">Success!</span><br>
    <span class="radius secondary label"><?php echo $meytipuser->name;?></span>
    <span class="radius secondary label">La tua scommessa è stata registrata con successo!</span>
    <a class="close-reveal-modal">&#215;</a>
</div>

    <div class="row centrale">
    	<!-- CAMPIONATI -->
    	<div class="large-2 columns">
        <div class="section-container accordion" data-section="accordion">
              <section class="section active">
                <p class="title"><a href="#panel1">Italia</a></p>
                <div class="content" data-slug="panel1">
                <ul class="side-nav">
                <li><h11><b><a href="#">Innovaction Lab</a></b></h11></li>
                <li><h11><a href="#">Serie A</a></h11></li>
                <li><h11><a href="#">Serie B</a></h11> </li>
                <li><h11><a href="#">Lega Pro</a></h11>  </li>
                </ul>
                </div>
              </section>
              <section class="section">
                <p class="title"><a href="#panel2">Spagna</a></p>
                <div class="content" data-slug="panel2">
             		   <ul class="side-nav">
                <li><h11><a href="#">Ligue 1</a></h11></li>
                <li><h11><a href="#">Ligue 2</a></h11> </li>
                </ul>
                </div>
              </section>
              <section class="section">
                <p class="title"><a href="#panel3">Francia</a></p>
                <div class="content" data-slug="panel3">
                 	<ul class="side-nav">
                <li><h11><a href="#">Ligue 1</a></h11></li>
                <li><h11><a href="#">Ligue 2</a></h11> </li>
                </ul>
                </div>
              </section>
              <section class="section">
                <p class="title"><a href="#panel4">Inghilterra</a></p>
                <div class="content" data-slug="panel4">
                  	<ul class="side-nav">
                <li><h11><a href="#">Ligue 1</a></h11></li>
                <li><h11><a href="#">Ligue 2</a></h11> </li>
                </ul>
                </div>
              </section>
              <section class="section">
                <p class="title"><a href="#panel5">Germania</a></p>
                <div class="content" data-slug="panel5">
                  	<ul class="side-nav">
                <li><h11><a href="#">Ligue 1</a></h11></li>
                <li><h11><a href="#">Ligue 2</a></h11> </li>
                </ul>
                </div>
              </section>
              <section class="section">
                <p class="title"><a href="#panel6">Mondiali</a></p>
                <div class="content" data-slug="panel6">
                  <ul class="side-nav">
                <li><h11><a href="#">Ligue 1</a></h11></li>
                <li><h11><a href="#">Ligue 2</a></h11> </li>
                </ul>
                </div>
              </section>
            </div>
        </div>
       <!-- /CAMPIONATI -->
            <!-- EVENTS-->
            <div class="large-6 columns">
				<table style="width:100%" id="betevent">





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

                    $resp = CallAPI('GET','https://meytip.com/back/meytip/web/app.php/quotes.json',false);
                    $team = json_decode($resp);
                    foreach($team as $t){ ?>

                        <tr event="<?php echo $t->team->id; ?>" eventname="<?php echo $t->team->name; ?>">

                        <td> <span data-tooltip class="tip-top" title="<?php echo "<p class=blue>".$t->team->tagline ."</p>".$t->team->teewtidea; ?>"><a href="#" ><?php echo $t->team->name; ?></a></span></td>
                        <td><a href="#" value="<?php echo $t->final; ?>" bet="finale sì" betid="222" bettype="finale sì/no" class="tiny button event"><?php echo $t->final; ?></a></td>
                        <td><a href="#"  value="<?php echo $t->nofinal; ?>" bet="finale no" betid="223" bettype="finale sì/no" class="tiny button event" class="tiny button"><?php echo $t->nofinal; ?></a></td>
                        <td><a href="#" class="tiny button secondary disabled">ND</a></td>
                        <td><a href="#" class="tiny button secondary disabled">ND</a></td>
                        <td><a href="#" class="tiny button secondary disabled">ND</a></td>
                    </tr>
                    <?
                    }
                    ?>


                    </tbody>
                </table>	                
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
                     <td><form><input type="text" id="stake" placeholder="Inserire importo"></form></td>
                </tr>
                <tr>
                     <td><h13>Vincita</h13></td>
                     <td><h13 id="potenziale">0</h13></td>
                </tr>
                </tbody>
             </table>


             <a class=" success button expand marginebottom" href="#" onclick="bet('<?php echo $meytipuser->facebookid; ?>');" id="play">Scommetti</a>




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
