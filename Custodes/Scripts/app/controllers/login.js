app.controller('LoginCtrl', function LoginCtrl($scope, Authentication) {
  $scope.email = 'sander@gmail.com';
  $scope.password = 'sander';

  $scope.login = function() {

    console.log($scope.loginForm.email);

    var succes = true;

    //TMP: dit moet in de AppCtrl of Authentification service
    Authentication.Login($scope.loginForm.email.$modelValue, $scope.loginForm.password.$modelValue, function() {

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