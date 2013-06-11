<!-- HEADER -->
<nav class="top-bar">
    <ul class="title-area">
        <li class="name logo"><a href="https://apps.facebook.com/mymeytip/"><img src="img/logo.png"></a></li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <ul class="left">
            <li class="divider"></li>
            <li class="active"><a href="https://apps.facebook.com/mymeytip/events.php">events</a></li>
            <li class="divider"></li>
            <li><a href="https://apps.facebook.com/mymeytip/people.html">people</a></li>
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
