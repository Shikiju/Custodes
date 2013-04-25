app.controller('LoginCtrl', function LoginCtrl($scope, Authentication) {


  $scope.login = function() {

    var succes = false;

    //TMP: dit moet in de AppCtrl of Authentification service
    Authentication.Login($scope.loginForm.email, $scope.loginForm.password, function() {

      console.log('login succes');
      $scope.appLogin();

    }, function() {
      console.log('login error');
      succes = false;
    });

    if (succes) {
      //Yeah! go to the list
      $scope.goToPage('list');
    }
  }
});