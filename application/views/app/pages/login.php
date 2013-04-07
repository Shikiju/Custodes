<section ng-controller="LoginCtrl" ng-class="{current_page: page == 'login'}">

    <header>
        <h1>Custodes</h1>

        <a href="javascript:" class="right icon-th-large"></a>
    </header>

    <article>
        <div>

            <div>
                <div class="error" ng-hide="errors.generic.length == 0">{{errors.generic.join(', ');}}</div>

                <label>E-mail</label><br>
                <input type="text" name="email" ng-model="email"> <span class="error" ng-hide="errors.email.length == 0">{{errors.email.join(', ');}}</span><br>

                <br>

                <label>Username</label><br>
                <input type="text" name="username" ng-model="username"> <span class="error" ng-hide="errors.username.length == 0">{{errors.username.join(', ');}}</span><br>

                <br>

                <label>Password</label><br>
                <input type="text" name="password" ng-model="password"> <span class="error" ng-hide="errors.password.length == 0">{{errors.password.join(', ');}}</span><br>

                <br>

                <a href="javascript:" class="button" ng-click="login();">Login</a>
            </div>

        </div>
    </article>
</section>