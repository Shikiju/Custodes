<section id="edit" ng-controller="PasswordCtrl">

    <header>
        <a href="javascript:" class="left icon-arrow-left" onclick="goto(null, false);"></a>

        <h1>TODO: current credential label</h1>
    </header>

    <article>

        <?=render('app._part_list', array('page' => 'edit'))?>
        <?=render('app._part_edit', array('page' => 'edit'))?>

    </article>

</section>