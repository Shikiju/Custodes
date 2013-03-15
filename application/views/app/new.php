<?php
use Laravel\Asset;

Asset::container('header')->add('style_new',        'css/style_new.css');

Asset::container('header')->add('modernizr',        'js/lib/modernizr.min.js');
Asset::container('header')->add('respond',          'js/lib/respond.min.js');

Asset::container('footer')->add('jquery',           'js/lib/jquery.min.js');
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

    <script type="text/javascript">
        $("*").live("touchstart", function() {
            $(this).addClass("active");
        }).live("touchend", function() {
            $(this).removeClass("active");
        });
    </script>
</head>
<body>

<div id="pages"<?/*ng-view*/?>>

    <section class="current_page">

        <header>
            <a href="javascript:" class="left icon-chevron-left"></a>

            <h1>Favourites</h1>

            <a href="javascript:" class="right icon-th-large"></a>
        </header>

        <article>

            <ul>

                <li class="group">
                    <h2>Gaming</h2>
                </li>
                <li class="credential">
                    <hgroup>
                        <h3>Origin</h3>
                        <h4>hatseflats25</h4>
                    </hgroup>
                    <i class="icon-chevron-right"></i>
                </li>
                <li class="credential">
                    <hgroup>
                        <h3>Steam</h3>
                        <h4>hatseflats</h4>
                    </hgroup>
                    <i class="icon-chevron-right"></i>
                </li>

                <li class="group">
                    <h2>Mail</h2>
                </li>
                <li class="credential">
                    <hgroup>
                        <h3>Gmail</h3>
                        <h4>sanderverkuijlen@gmail.com</h4>
                    </hgroup>
                    <i class="icon-chevron-right"></i>
                </li>
                <li class="credential">
                    <hgroup>
                        <h3>Gmail</h3>
                        <h4>sanderverkuijlen86@gmail.com</h4>
                    </hgroup>
                    <i class="icon-chevron-right"></i>
                </li>
                <li class="credential">
                    <hgroup>
                        <h3>Outlook</h3>
                        <h4>sanderverkuijlen@outlook.com</h4>
                    </hgroup>
                    <i class="icon-chevron-right"></i>
                </li>

            </ul>
            <div>

                <label>Name</label><br>
                <input type="text" name="name" value="Gmail"><br>

                <br>

                <label>Login</label><br>
                <input type="text" name="login" value="sanderverkuijlen@outlook.com"><br>

                <br>

                <label>Password</label><br>
                <input type="text" name="password" value="hatseflats"><br>

                <br>

                <label>Group</label><br>
                <input type="text" name="group" value="Mail"><br>

                <br>

                <label>Favourite</label><br>
                <input type="checkbox" name="favourite" value="1" checked="checked"><br>

            </div>

        </article>
    </section>
</div>

<?=Asset::container('footer')->scripts()?>

</body>
</html>