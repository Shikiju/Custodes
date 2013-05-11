app.controller('DetailCtrl', function DetailCtrl($scope, Credential, $location, $routeParams) {

  //Vars
  if ($routeParams.credentialId > 0) {
    $scope.credential = Credential.getDecrypt({ id: $routeParams.credentialId });
  }
  else {
    $scope.credential = new Credential();
  }

  console.log($scope.credential);


  //Functions
  $scope.new = function() {
    $location.path('/credential/new');
  };
  $scope.save = function() {
    //Create
    if ($scope.credential.Id === undefined) {

      $scope.credential.createEncrypt(function () {
        $location.path('/list');
      });
    }
    //Update
    else {

      $scope.credential.updateEncrypt(function() {
        $location.path('/list');
      });
    }
  }

  $scope.delete = function() {

    console.log($scope.credential);

    $scope.credential.remove(function() {
      $location.path('/list');
    });
  }


  //Events
  /*$scope.$on('login', function(event, message) {
    $scope.credentials = Credential.query(function(credentials) {
      $scope.credential = new Credential(credentials[0]);
      $scope.isViewLoading = false;
    });
  });*/

  $scope.$on('logout', function(event, message) {

    $scope.credential = new Credential();
  });
});