<ul ng-controller="PasswordListCtrl" <?=($page != 'list' ? 'class="no_compact"' : '')?>>
    <li ng-repeat="password in passwords | orderBy:['-favourite','service','username']">
        <a href="javascript:" class="favourite" ng-click="password.favourite = !password.favourite" ng-class="{checked: password.favourite}"></a>
        <hgroup>
            <h2>{{password.service}}</h2>
            <h3>{{password.username}}</h3>
        </hgroup>
        <a class="button compact_only" href="javascript:" ng-click="editPassword(password, true)">View</a>
        <a class="button no_compact" href="javascript:" ng-click="editPassword(password)">View</a>
    </li>
</ul>