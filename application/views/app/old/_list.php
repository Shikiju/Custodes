<section ng-controller="PasswordCtrl" id="list" class="wrapper">
    <header>
        <a href="javascript:" onclick="goto('login', false);" class="left icon-off"></a>
        <h1>Custodes</h1>
        <a href="javascript:" ng-click="new(true)" class="right icon-plus compact_only"></a>
        <a href="javascript:" ng-click="new(false)" class="right icon-plus no_compact"></a>
    </header>
    <article>
        <?=render('app._part_list', array('page' => 'list'))?>
        <?=render('app._part_edit', array('page' => 'list'))?>
    </article>
    <footer>
        &copy; Sander Verkuijlen
    </footer>
</section>