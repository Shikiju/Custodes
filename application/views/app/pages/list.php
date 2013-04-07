<section ng-controller="ListCtrl" ng-class="{current_page: page == 'list'}">

    <header>
        <a href="javascript:" class="left icon-chevron-left"></a>

        <h1><?=$title?></h1>

        <a href="javascript:" class="right icon-th-large" ng-click="goToPage('login')"></a>
    </header>

    <article>
        <ul>

            <li>
                <h2>Gaming</h2>

                <a href="javascript:">
                    <b>Origin</b>
                    <small>hatseflats25</small>
                    <i class="icon-chevron-right"></i>
                </a>
                <a href="javascript:">
                    <b>Steam</b>
                    <small>hatseflats</small>
                    <i class="icon-chevron-right"></i>
                </a>
            </li>

            <li>
                <h2>Mail</h2>

                <a href="javascript:">
                    <b>Gmail</b>
                    <small>sanderverkuijlen@gmail.com</small>
                    <i class="icon-chevron-right"></i>
                </a>
                <a href="javascript:">
                    <b>Gmail</b>
                    <small>sanderverkuijlen86@gmail.com</small>
                    <i class="icon-chevron-right"></i>
                </a>
                <a href="javascript:">
                    <b>Outlook</b>
                    <small>sanderverkuijlen@outlook.com</small>
                    <i class="icon-chevron-right"></i>
                </a>
            </li>

        </ul>
        <div>

            <div>
                <label>Name</label><br>
                <input type="text" name="name" value="Gmail"><br>

                <br>

                <label>Login</label><br>
                <input type="text" name="login" value="sanderverkuijlen@outlook.com"><br>

                <br>

                <label>Password</label><br>
                <input type="text" name="password" value="hatseflats"><br>

                <br>

                <label>Group</label><br>
                <input type="text" name="group" value="Mail"><br>

                <br>

                <label>Favourite</label><br>
                <input type="checkbox" name="favourite" value="1" checked="checked"><br>
            </div>

        </div>
    </article>
</section>