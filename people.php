<?php
include('php/header.php');
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
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
include('php/standings.php')
?>
<div id="fb-root"></div>
<?php if(isset($basic)) { ?>

<div class="row centrale">
<div class="large-8 columns">
    <table width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>USER</th>
            <th>FOLLOW</th>
            <th>LAVERAGE</th>
            <th>CASH_WIN</th>

        </tr>
        </thead>
        <?php
        $i = 0;
        foreach($users as $us)
        {
        $i++;?>

        <tbody>
        <tr>
            <td align="center"><?php echo ''.$i; ?></td>
            <td><a href="#"><?php echo $us->name; ?></a></td>
            <td><a href="#" class="tiny button expand">Follow</a></td>
            <td align="center">x <?php echo $us->leaverage; ?></td>
            <?php
            if($i == 1)
            {
                ?><td align="center">400</td><?php
            }
            if($i == 2)
            {
                ?><td align="center">250</td><?php
            }
            if($i == 3)
            {
                ?><td align="center">100</td><?php
            }
            if($i == 4)
            {
                ?><td align="center">50</td><?php
            }
            if($i > 4)
            {
                ?><td align="center">0</td><?php
            }
            ?>


        </tr>

        </tbody>
        <?php } ?>
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
