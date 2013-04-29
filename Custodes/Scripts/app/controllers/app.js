app.controller('AppCtrl', function AppCtrl($scope, Authentication, $location) {

  $scope.isViewLoading = false;

  $scope.login = function(email, password) {

    Authentication.login(email, password, function(succes, data, status, headers, config) {

      if(succes) {
        $scope.isViewLoading = true;
        $scope.$broadcast('login', {});

        $location.path('/credentials');
      }
      else {
        //TODO: show error stuff here
      }
    });
  }

  $scope.logout = function() {

    Authentication.logout();

    $scope.$broadcast('logout', {});

    $location.path('/');
  }
});