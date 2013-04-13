app.controller('AppCtrl', function AppCtrl($scope){

    $scope.page = 'list';

    $scope.goToPage = function(page, effect_in, effect_out){

        $scope.page = page;

        //TODO: effect_in, effect_out
    }
});