<section ng-controller="PasswordCtrl" id="list" class="wrapper">
    <header>
        <span class="left">
            <a href="javascript:" ng-click="new(true)" class="icon-plus compact_only"></a>
            <a href="javascript:" ng-click="new(false)" class="icon-plus no_compact"></a>
        </span>
        <span class="right">
            <a href="javascript:" onclick="options();" class="icon-th-large"></a>
        </span>
        <h1>Custodes</h1>
    </header>
    <article>
        <?=render('app._part_list', array('page' => 'list'))?>
        <?=render('app._part_edit', array('page' => 'list'))?>
    </article>
    <footer>
        &copy; Sander Verkuijlen
    </footer>
</section>