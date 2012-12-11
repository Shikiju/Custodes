
var app = angular.module( 'App', ['ngResource'] );

app.service('Data', function($resource){
    var self = this;

    self.params = {
        user_id:    -1,  // <- TMP
        id:         '@id'
    };

    self.api  = $resource(  '/api/password/:id',
                            self.params, {
                                save: {
                                    method: 'POST'
                                }
                            });

    self.passwords  = [];
    self.password   = {};//self.api.get({id: -1});

    self.login = function(succes, error){

        //TODO: check if the login is correct, if so:
        //Succes
        if(true){
            self.params.user_id = 1;

            //Clear all previously set passwords, without breaking the link with the controllers
            self.passwords.length = 0;

            //Get the passwords and add them to the array, again without breaking the link to the controllers
            self.api.query(function(data){
                data.forEach(function(item){
                    self.passwords.push(item);
                });
            });

            succes();
        }
        //Error
        else{
            error();
        }
    }

    self.setPassword = function(newPassword){

//        var newPassword = self.api.get({id: id});
//
//        console.log(newPassword);
//        console.log(self.password);

        //Clean up the current password object
        for(prop in self.password){
            if(self.password.hasOwnProperty(prop)){
                delete self.password[prop];
            }
        }

//        console.log(self.password);

        //Set all properties from newPassword, effectively turning Data.password into newPassword
        for(var prop in newPassword){
            self.password[prop] = newPassword[prop];
        }

//        console.log(self.password);
    }
});

app.controller('LoginCtrl', function LoginCtrl($scope, Data){

    $scope.login = function(){

        Data.login(function(){

            //Succes
            goto('list', true);

        }, function(){

            //Error
            // :(

        });
    }
});

app.controller('PasswordCtrl', function PasswordListCtrl($scope, Data){

    $scope.passwords    = Data.passwords;
    $scope.password     = Data.password;

    $scope.favourite = function(password){

        password.favourite = !password.favourite;
        password.$save();
    }

    $scope.new = function(switchPage){

        Data.setPassword();

        if(switchPage === true){
            goto('edit', true);
        }
    }

    $scope.edit = function(password, switchPage){

        Data.setPassword(password);
//        console.log(password);
//        console.log(Data.password);
//        console.log($scope.password);

        if(switchPage === true){
            goto('edit', true);
        }
    }

    $scope.save = function(password, switchPage){

        password.$save();

        if(switchPage === true){
            goto('list', false);
        }
    }
});