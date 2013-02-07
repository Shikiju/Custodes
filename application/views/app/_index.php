<?php
use Laravel\Asset;

Asset::container('header')->add('style',            'css/style.css');

Asset::container('header')->add('modernizr',        'js/lib/modernizr.min.js');
Asset::container('header')->add('respond',          'js/lib/respond.min.js');

Asset::container('footer')->add('jquery',           'js/lib/jquery.min.js');
Asset::container('footer')->add('angular',          'js/lib/angular.min.js');
Asset::container('footer')->add('angular-resource', 'js/lib/angular-resource.min.js');
Asset::container('footer')->add('paging',           'js/paging.js');
//Asset::container('footer')->add('modules',          'js/app/modules.js');
Asset::container('footer')->add('app',              'js/app/app.js');
?>
<!doctype html>
<html lang="en" ng-app="App">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Custodes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link rel="apple-touch-icon-precomposed" sizes="57x57"   href="img/touch-icon-114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/touch-icon-114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"   href="img/touch-icon-144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/touch-icon-144.png" />

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-startup-image" href="img/splash.png">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,600,800,700' rel='stylesheet' type='text/css'>

    <?=Asset::container('header')->styles()?>
    <?=Asset::container('header')->scripts()?>
</head>
<body>

<div id="pages">
    <?
    echo render('app.login', array('start' => true));
    echo render('app.favourites');
    echo render('app.list');
    echo render('app.edit');
    echo render('app.preferences');
    ?>
</div>

<footer>
    <nav>
        <a href="javascript:" data-login="false" onclick="goto('login', false);">       <i class="icon-signin"></i>     </a>
        <a href="javascript:" data-login="true" onclick="goto('favourites', true);">    <i class="icon-star"></i>       </a>
        <a href="javascript:" data-login="true" onclick="goto('list', true);">          <i class="icon-list"></i>       </a>
        <a href="javascript:" data-login="true" onclick="goto('preferences', true);">   <i class="icon-user"></i>       </a>
    </nav>
</footer>

<?=Asset::container('footer')->scripts()?>

</body>
</html>