<section ng-controller="LoginCtrl" id="login" class="wrapper <?=($start ? 'start' : '')?>">
    <header>
        <h1>Custodes</h1>
        <a href="javascript:" class="right icon-info-sign" onclick="goto('info', true);"></a>
    </header>
    <article>
        <div>
            <a href="javascript:" onclick="goto('verify_location', true);">     verify_location     </a><br>
            <a href="javascript:" onclick="goto('verify_user', true);">         verify_user         </a><br>
            <a href="javascript:" onclick="goto('register', true);">            register            </a><br>
            <a href="javascript:" onclick="goto('forgot_password', true);">     forgot_password     </a><br>
            <br>
            <br>
            <a ng-click="login()">DEBUG</a>
        </div>
    </article>
    <footer>
        &copy; Sander Verkuijlen
    </footer>
</section>