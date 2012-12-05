
var app = angular.module( 'App', ['ngResource'] );

app.service('dataService', function($resource){

    this.Passwords = $resource(     '/api/password/:id',{
                        id:         '@id'
//                        apiKey:     '4f847ad3e4b08a2eed5f3b54'
                    },{
                        update:     { method: 'PUT'     },
                        remove:     { method: 'DELETE'  }
    });

//    this.Passwords.prototype.update = function(cb) {
//        return this.Passwords.update({id: this._id.$oid},
//            angular.extend({}, this, {_id:undefined}), cb);
//    };
//
//    this.Passwords.prototype.destroy = function(cb) {
//        return this.Passwords.remove({id: this._id.$oid}, cb);
//    };
});

app.controller('PasswordListCtrl', function PasswordListCtrl($scope, dataService){

    $scope.passwords = dataService.Passwords.query();

    $scope.favourite = function(password){
        password.favourite = !password.favourite;
    };

    $scope.editPassword = function(password, switchPage){
        //TODO: notify PasswordEditControl met: password

        if(switchPage === true){
            goto('edit', true);
        }
    }
});