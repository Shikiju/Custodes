<?php
use Laravel\Asset;

Asset::container('header')->add('demo',         'css/demo.css');

Asset::container('header')->add('modernizr',    'js/modernizr.min.js');
Asset::container('header')->add('respond',      'js/respond.min.js');

Asset::container('footer')->add('jquery',       'js/jquery.min.js');
Asset::container('footer')->add('angular',      'js/angular.min.js');
Asset::container('footer')->add('demo',         'js/demo.js');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <?=Asset::container('header')->styles()?>
    <?=Asset::container('header')->scripts()?>
    <?//wtf? ?>

</head>
<body>
    <header>

        <div class="page_register">
        </div>

    </header>

    <div id="pages">

        <section class="page_one wrapper start">
            <a href="javascript:" onclick="goto('two', true, false);"><img src="/img/1.png"></a>
        </section>

        <section class="page_two wrapper">
            <a href="javascript:" onclick="goto('three', true, true);"><img src="/img/2.png"></a><br>
            <a href="javascript:" onclick="goto('one', false, true);"><img src="/img/2.png"></a>
        </section>

        <section class="page_three wrapper">
            <a href="javascript:" onclick="goto('one', false, true);"><img src="/img/3.png"></a><br>
            <a href="javascript:" onclick="goto('two', false, false);"><img src="/img/3.png"></a>
        </section>

        <?/*
        <section class="page_login page_in">
            <h1>login</h1>
            <a href="javascript:" onclick="goto('credential_list',  true);">    credentials     </a><br>
            <a href="javascript:" onclick="goto('register',         true);">    register        </a><br>
            <a href="javascript:" onclick="goto('forgot_password',  true);">    forgot_password </a><br>
            <a href="javascript:" onclick="goto('verify_user',      true);">    verify_user     </a><br>
            <a href="javascript:" onclick="goto('verify_location',  true);">    verify_location </a><br>
        </section>

        <section class="page_register">
            <h1>register</h1>
            <a href="javascript:" onclick="goto('verify_user',      true);">    verify_user     </a><br>
            <a href="javascript:" onclick="goto('login',            false);">   login           </a><br>
        </section>

        <section class="page_verify_user">
            <h1>verify_user</h1>
            <a href="javascript:" onclick="goto('credential_list',  true);">    credential_list </a><br>
            <a href="javascript:" onclick="goto('login',            false);">   login           </a><br>
        </section>

        <section class="page_verify_location">
            <h1>verify_location</h1>
            <a href="javascript:" onclick="goto('credential_list',  true);">    credential_list </a><br>
            <a href="javascript:" onclick="goto('login',            false);">   login           </a><br>
        </section>

        <section class="page_forgot_password">
            <h1>forgot_password</h1>
            <a href="javascript:" onclick="goto('change_password',  true);">    change_password </a><br>
            <a href="javascript:" onclick="goto('login',            false);">   login           </a><br>
        </section>

        <section class="page_change_password">
            <h1>change_password</h1>
            <a href="javascript:" onclick="goto('credential_list',  true);">    credential_list </a><br>
            <a href="javascript:" onclick="goto('forgot_password',  false);">   forgot_password </a><br>
        </section>

        <section class="page_credential_list">
            <h1>credential_list</h1>
            <a href="javascript:" onclick="goto('credential',       true);">    credential      </a><br>
            <a href="javascript:" onclick="goto('login',            false);">   login           </a><br>
        </section>

        <section class="page_credential">
            <h1>credential</h1>
            <a href="javascript:" onclick="goto('credential_list',  false);">   credential_list </a><br>
            <a href="javascript:" onclick="goto('login',            false);">   login           </a><br>
        </section>
        */?>

    </div>

    <?=Asset::container('footer')->scripts()?>

</body>
</html>