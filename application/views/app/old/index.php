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

    <link rel="apple-touch-icon-precomposed" sizes="57x57"   href="../../../../public/img/touch-icon-114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../../public/img/touch-icon-114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"   href="../../../../public/img/touch-icon-144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../../public/img/touch-icon-144.png" />

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-startup-image" href="../../../../public/img/splash.png">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,600,800,700' rel='stylesheet' type='text/css'>

    <?=Asset::container('header')->styles()?>
    <?=Asset::container('header')->scripts()?>
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

    <?=Asset::container('footer')->scripts()?>

</body>
</html>