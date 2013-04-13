<!doctype html>
<html lang="en" ng-app="App">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Custodes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link rel="apple-touch-icon-precomposed" sizes="57x57"   href="img/touch-icon-114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/touch-icon-114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"   href="img/touch-icon-144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/touch-icon-144.png" />

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-startup-image" href="img/splash.png">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

    <link href="Content/Site.css" media="all" rel="stylesheet" type="text/css">
    <script src="Scripts/lib/modernizr.min.js"></script>
    <script src="Scripts/lib/respond.min.js"></script>
    <script src="Scripts/lib/angular.min.js"></script>
    <script src="Scripts/lib/angular-resource.min.js"></script>
    <script src="Scripts/app/app.js"></script>
    <script src="Scripts/app/services/api.js"></script>
    <script src="Scripts/app/controllers/app.js"></script>
    <script src="Scripts/app/controllers/login.js"></script>
    <script src="Scripts/app/controllers/list.js"></script>
</head>
<body>
    <div id="pages" ng-controller="AppCtrl">
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

        <section ng-controller="ListCtrl" ng-class="{current_page: page == 'list'}">
            <header>
                <a href="javascript:" class="left icon-chevron-left"></a>

                <h1><?=$title?></h1>

                <a href="javascript:" class="right icon-th-large" ng-click="goToPage('login')"></a>
            </header>

            <article>
                <ul>
                    <li ng-repeat="project in projects | orderBy:'GroupName'">
                        <h2>{{project.GroupName}}</h2>
                        <a href="javascript:">
                            <b>{{project.Name}}</b>
                            <small>{{project.Login}}</small>
                            <i class="icon-chevron-right"></i>
                        </a>
                    </li>
<%--                    <li>
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
                    </li>--%>

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
    </div>
</body>
</html>s