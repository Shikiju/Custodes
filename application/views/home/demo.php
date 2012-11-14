<?php
use Laravel\Asset;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Password</title>
    <meta name="viewport" content="width=device-width">

    <?php
    Asset::add('demo',      'css/demo.css');

    Asset::add('html5shiv', 'js/html5shiv.min.js');
    Asset::add('respond',   'js/respond.min.js');
    Asset::add('jquery',    'js/jquery.min.js');
    Asset::add('angular',   'js/angular.min.js');
    Asset::add('demo',   'js/demo.js');

    echo Asset::styles();
    echo Asset::scripts();
    ?>

</head>
<body>


    <div id="pages" class="wrapper">

        <section id="login" class="page">
            login
        </section>
        <section id="verify_register" class="page">
            verify_register
        </section>
        <section id="verify_user" class="page">
            verify_user
        </section>
        <section id="verify_location" class="page">
            verify_location
        </section>
        <section id="forgot_password" class="page">
            forgot_password
        </section>
        <section id="change_password" class="page">
            change_password
        </section>
        <section id="credential_list" class="page">
            credential_list
        </section>
        <section id="credential_detail" class="page">
            credential_detail
        </section>
        <section id="credential_edit" class="page">
            credential_edit
        </section>
    </div>
</body>
</html>