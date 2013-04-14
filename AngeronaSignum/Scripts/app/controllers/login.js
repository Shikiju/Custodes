app.controller('LoginCtrl', function LoginCtrl($scope, Authentication){

    $scope.email    = 'sander@gmail.com';
    $scope.password = 'sander';

    $scope.errors   = {
    };

    $scope.login = function(){

        //Think positive!
        var succes = true;

        //Reset previous error messages
        $scope.errors = {
            generic:    [],
            email:      [],
            password:   []
        };

        //Check e-mail
        if($scope.email == ''){
            $scope.errors.email.push('Please fill in your e-mailadress');
            succes = false;
        }
        //TODO: validate e-mailadress

        //Check password
        if($scope.password == ''){
            $scope.errors.password.push('Please fill in your password');
            succes = false;
        }

        if(succes){
          //So far, so good: try logging in now

          //TMP: dit moet in de AppCtrl of Authentification service
          Authentication.Login($scope.email, $scope.password, function() {

            console.log('login succes');
            $scope.appLogin();

          }, function() {
            console.log('login error');
            succes = false;
          });

          //TODO: Do API stuff here
          if ($scope.email == 'test') {
            $scope.errors.generic.push('Placeholder for API errors');
            succes = false;
          }
          //END TMP
        }

        if (succes) {
            //Yeah! go to the list
            $scope.goToPage('list');
        }
    }
});