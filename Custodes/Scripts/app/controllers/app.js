app.controller('AppCtrl', function AppCtrl($scope, Authentication) {

  $scope.isViewLoading = false;

  $scope.page = 'login';

  $scope.goToPage = function(page, effect_in, effect_out) {

    $scope.page = page;

    //TODO: effect_in, effect_out
  }

  $scope.login = function(email, password) {

    Authentication.login(email, password, function(succes, data, status, headers, config) {

      if(succes) {
        $scope.isViewLoading = true;
        $scope.$broadcast('login', {});

        $scope.goToPage('list');
      }
      else {
        //TODO: show error stuff here
      }
    });
  }

  $scope.logout = function() {

    Authentication.logout();

    $scope.$broadcast('logout', {});
    $scope.goToPage('login');
  }
});