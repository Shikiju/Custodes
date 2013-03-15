<ul <?=($page != 'list' ? 'class="no_compact"' : '')?>>
    <li ng-repeat="password in passwords | orderBy:['-favourite','service','username']">
        <a href="javascript:" class="favourite" ng-click="favourite(password)" ng-class="{checked: password.favourite == 1}"></a>
        <hgroup>
            <h2>{{password.service}}</h2>
            <h3>{{password.username}}</h3>
        </hgroup>
        <a class="button compact_only" href="javascript:" ng-click="edit(password, true)">View</a>
        <a class="button no_compact" href="javascript:" ng-click="edit(password)">View</a>
    </li>
</ul>