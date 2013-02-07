
<section id="list" ng-controller="PasswordCtrl">

    <header>
        <a href="javascript:" class="left icon-signout" onclick="goto('login', false);"></a>

        <h1>All credentials</h1>

        <a href="javascript:" class="right icon-plus" onclick="goto('edit', true);"></a>
    </header>

    <article>

        <?=render('app._part_list', array('page' => 'list'))?>
        <?=render('app._part_edit', array('page' => 'list'))?>

    </article>

</section>