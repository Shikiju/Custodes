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

  //Events
  $scope.$on('login', function(event, message) {
    console.log('test: login');

    $scope.credentials = Credential.query(function(credentials) {
      $scope.credential = new Credential(credentials[0]);
    });
  });
  
  $scope.$on('logout', function(event, message) {
    console.log('test: logout');
  });
});