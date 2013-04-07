app.controller('LoginCtrl', function LoginCtrl($scope){

    $scope.email    = '';
    $scope.username = '';
    $scope.password = '';

    $scope.errors   = {
    };

    $scope.login = function(){

        //Think positive!
        var succes = true;

        //Reset previous error messages
        $scope.errors = {
            generic:    [],
            email:      [],
            username:   [],
            password:   []
        };

        //Check e-mail
        if($scope.email == ''){
            $scope.errors.email.push('Please fill in your e-mailadress');
            succes = false;
        }
        //TODO: validate e-mailadress

        //Check username
        if($scope.username == ''){
            $scope.errors.username.push('Please fill in your username');
            succes = false;
        }

        //Check password
        if($scope.password == ''){
            $scope.errors.password.push('Please fill in your password');
            succes = false;
        }

        if(succes){
            //So far, so good: try logging in now
           //TODO: Do API stuff here
            if($scope.username == 'test'){
                $scope.errors.generic.push('Placeholder for API errors');
                succes = false;
            }
        }

        if(succes){
            //Yeah! go to the list
            $scope.goToPage('list');
        }
    }
});