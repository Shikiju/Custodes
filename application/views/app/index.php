<?php
use Laravel\Asset;

Asset::container('header')->add('style',            'css/style.css');

Asset::container('header')->add('modernizr',        'js/lib/modernizr.min.js');
Asset::container('header')->add('respond',          'js/lib/respond.min.js');

Asset::container('footer')->add('jquery',           'js/lib/jquery.min.js');
Asset::container('footer')->add('angular',          'js/lib/angular.min.js');
Asset::container('footer')->add('angular-resource', 'js/lib/angular-resource.min.js');
Asset::container('footer')->add('paging',           'js/paging.js');
Asset::container('footer')->add('modules',          'js/app/modules.js');
Asset::container('footer')->add('app',              'js/app/app.js');
?>
<!doctype html>
<html lang="en" ng-app="App">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?/*<link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">*/?>

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <?/*<link rel="apple-touch-startup-image" href="img/start-screen-320x460.png">*/?>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,600,800,700' rel='stylesheet' type='text/css'>

    <?=Asset::container('header')->styles()?>
    <?=Asset::container('header')->scripts()?>
    <?//wtf? ?>

</head>
<body>
    <div id="pages">
        <?
        echo render('app._login', array('start' => true));
        echo render('app._verify_location');
        echo render('app._verify_user');
        echo render('app._forgot_password');
        echo render('app._change_password');
        echo render('app._register');
        echo render('app._list');
        echo render('app._edit');
        echo render('app._profile');
        echo render('app._info');
        ?>
    </div>

    <ul id="options">
        <li><a href="javascript:" onclick="goto('profile', true);">Profile</a></li>
        <?/*<li><a href="javascript:" onclick="">Settings</a></li>*/?>
        <li><a href="javascript:" onclick="goto('login', false);">Logout</a></li>
    </ul>

    <?=Asset::container('footer')->scripts()?>

</body>
</html>