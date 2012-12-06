
var app = angular.module( 'App', ['ngResource'] );

app.service('dataService', function($resource){

    this.Passwords = $resource(     '/api/password/:id',{
                        id:         '@id'
                    },{});
});

app.controller('PasswordListCtrl', function PasswordListCtrl($scope, dataService){

    $scope.passwords = dataService.Passwords.query();

    $scope.favourite = function(password){

        password.favourite = !password.favourite;
        password.$save();
    }

    $scope.editPassword = function(password, switchPage){
        //TODO: notify PasswordEditControl met: password

        if(switchPage === true){
            goto('edit', true);
        }
    }
});

app.controller('PasswordEditCtrl', function PasswordEditCtrl($scope, dataService){

    $scope.password = {};

    $scope.save = function(){

        $scope.password.$save();
    }

    $scope.delete = function(){

        $scope.password.$delete();
    }
});