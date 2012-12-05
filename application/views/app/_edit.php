<section id="edit" class="wrapper">
    <header>
        <span class="left">
            <a href="javascript:" onclick="goto('list', false);" class="icon-arrow-left"></a>
        </span>
        <span class="right">
            <a href="javascript:" onclick="options();" class="icon-th-large"></a>
        </span>
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