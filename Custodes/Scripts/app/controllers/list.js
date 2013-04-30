app.controller('ListCtrl', function ListCtrl($scope, Credential, $location) {

  //Vars
  $scope.groups = [];
  $scope.credentials = Credential.query(function() {
    $scope.groupCredentials();
  });


  //TMP: dit verhuist uiteindelijk naar een eigen pagina/controller
  $scope.credential = new Credential();
  //END TMP


  //Functions
  $scope.groupCredentials = function() {

    //Start fresh
    $scope.groups = [];

    //Sort the credentials by GroupName
    $scope.credentials.sort(function(a, b) {

      if (a['GroupName'] <= b['GroupName']) {
        return -1;
      }
      return 1;
    });

    //The current group
    var groupValue = null;

    for(var i = 0; i < $scope.credentials.length; i++) {

      var credential = $scope.credentials[i];

      //Does this credential belong to the current group?
      if (credential.GroupName !== groupValue) {

        //It's a new group
        groupValue = credential.GroupName;

        var group = {
          name:         groupValue,
          credentials:  []
        };

        //Add the new group
        $scope.groups.push(group);
      }

      //Add this credential to the correct group
      group.credentials.push(credential);
    }
  }


  //TMP: dit verhuist uiteindelijk naar een eigen pagina
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
  //END TMP


  //Events
  /*$scope.$on('login', function(event, message) {
    $scope.credentials = Credential.query(function(credentials) {
      $scope.credential = new Credential(credentials[0]);
      $scope.isViewLoading = false;
    });
  });*/
  
  $scope.$on('logout', function(event, message) {

    $scope.groups = [];
    $scope.credentials = [];


    //TMP: dit verhuist uiteindelijk naar een eigen pagina
    $scope.credential = new Credential();
    //END TMP
  });
});