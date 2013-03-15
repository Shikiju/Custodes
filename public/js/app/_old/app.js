angular.module('ApiResource', ['ngResource']).
    factory('Api', function($resource){
        var Api = $resource(    '/api/password/:id',
                                {
                                    id:         '@id'
                                },
                                {
                                    save: {
                                        method: 'POST'
                                    }
                                }
        );

        Api.prototype.param = function(key, val){
            return Api.update({id: this.id},
                angular.extend({}, this, {id:undefined}), cb);
        };

        Api.prototype.update = function(cb) {
            return Api.update({id: this.id},
                angular.extend({}, this, {id:undefined}), cb);
        };

        Api.prototype.destroy = function(cb) {
            return Api.remove({id: this.id}, cb);
        };

        return Api;
    });

var app = angular.module( 'App', ['ApiResource'] );

app.service('Data', function($resource, Api){
    var self = this;

    self.params = {
        user_id:    -1  // <- TMP
    };

    /*self.api  = $resource(  '/api/password/:id',
                            self.params, {
                                save: {
                                    method: 'POST'
                                }
                            });*/

    self.passwords  = [];
    self.password   = {};//self.api.get({id: -1});

    self.login = function(succes, error){

        //TODO: check if the login is correct, if so:
        //Succes
        if(true){

            self.params.user_id = 1;    //TODO: user_id baseren op login

            //Clear all previously set passwords, without breaking the link with the controllers
            self.passwords.length = 0;

            //Get the passwords and add them to the array, again without breaking the link to the controllers
            /*self.api*/Api.query(self.params, function(data){
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

        if(newPassword != undefined){

            //Clean up the current password object
            for(prop in self.password){
                if(self.password.hasOwnProperty(prop)){
                    delete self.password[prop];
                }
            }

            //Set all properties from newPassword, effectively turning Data.password into newPassword
            for(var prop in newPassword){
                self.password[prop] = newPassword[prop];
            }
        }
        else{
            //TODO: set clean password
        }
    }

    self.new = function(password){

        //TODO: save

        //TODO: toevoegen aan self.passwords

//        password.service = 'New';
//
//        self.save(password, function(password){
//
//            console.log(password);
//
//            self.passwords.push(password);
//        });
    };

    self.save = function(password){

        Api.save(self.params, password);

        //TODO: wijzigingen updaten in self.passwords
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

        Data.save(password);
    };

    $scope.new = function(switchPage){

//        Data.save($scope.password);
//
//        Data.setPassword();

        if(switchPage === true){
            goto('edit', true);
        }
    };

    $scope.edit = function(password, switchPage){

//        Data.setPassword(password);
//        console.log(password);
//        console.log(Data.password);
//        console.log($scope.password);

        if(switchPage === true){
            goto('edit', true);
        }
    };

    $scope.save = function(password, switchPage){

        Data.save(password);

        if(switchPage === true){
            goto('list', false);
        }
    };
});