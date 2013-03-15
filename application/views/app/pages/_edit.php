<div <?=($page == 'list' ? 'class="no_compact"' : '')?>>
    <input type="hidden" ng-model="password.id">

    <input type="text" ng-model="password.service"><br>

    <input type="text" ng-model="password.username"><br>

    <input type="text" ng-model="password.password"><br>

    <textarea ng-model="password.notes"></textarea>

    <button ng-click="save(password);">Save</button>
</div>