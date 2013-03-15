
<section id="favourites" ng-controller="PasswordCtrl">

    <header>
        <a href="javascript:" class="left icon-signout" onclick="goto('login', false);"></a>

        <h1>Favourites</h1>

        <a href="javascript:" class="right icon-plus" onclick="goto('edit', true);"></a>
    </header>

    <article>

        <?=render('app.pages/_list', array('page' => 'list'))?>
        <?=render('app.pages/_edit', array('page' => 'list'))?>

    </article>

</section>