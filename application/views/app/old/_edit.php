<section ng-controller="PasswordCtrl" id="edit" class="wrapper">
    <header>
        <a href="javascript:" onclick="goto('list', false);" class="left icon-arrow-left"></a>
        <h1>Custodes</h1>
    </header>
    <article>
        <?=render('app._part_list', array('page' => 'edit'))?>
        <?=render('app._part_edit', array('page' => 'edit'))?>
    </article>
    <footer>
        &copy; Sander Verkuijlen
    </footer>
</section>