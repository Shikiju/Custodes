angular.module('api', ['ngResource']).

    factory('Api', function($resource) {

        var credentials = { user_id: 1 };   // <- TMP USER_ID

        var Api = $resource('https://api.mongolab.com/api/1/databases' + '/angularjs/collections/projects/:id', credentials,{
                query:  { },
                update: { },
                delete: { }
            }
        );

        Api.prototype.setCredentials = function(credentials){
            this.credentials = credentials;
        }

        return Api;
    });