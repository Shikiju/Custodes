app.controller('ListCtrl', function ListCtrl($scope, Credential) {

  //Vars
  $scope.credentials = [];
  $scope.credential = new Credential();

  //Functions
  $scope.getCredential = function(credential) {
    $scope.credential = new Credential(credential);
  }

  $scope.saveCredential = function() {
    //Create
    if ($scope.credential.Id === undefined) {
      $scope.credential.create(function() {
        $scope.credentials = Credential.query();
      });
    }
    //Update
    else {
      $scope.credential.update(function() {
        $scope.credentials = Credential.query();
      });
    }
  }

  $scope.newCredential = function () {
    $scope.credential = new Credential();
  }

  $scope.deleteCredential = function () {
    $scope.credential.remove(function () {
      $scope.credentials = Credential.query();
    })
  }

  //Events
  $scope.$on('login', function(event, message) {
    $scope.credentials = Credential.query(function(credentials) {
      $scope.credential = new Credential(credentials[0]);
      $scope.isViewLoading = false;
    });
  });
  
  $scope.$on('logout', function(event, message) {
    $scope.credentials = [];
    $scope.credential = new Credential();
    $scope.goToPage('login');
  });
});