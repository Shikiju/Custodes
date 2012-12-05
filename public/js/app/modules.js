angular.module('api', ['ngResource']).

    factory('Api', function($resource) {
        var Api = $resource('https://api.mongolab.com/api/1/databases' + '/angularjs/collections/projects/:id',{
                apiKey: '4f847ad3e4b08a2eed5f3b54'
            },{
                update: { method: 'PUT' }
            }
        );

        Api.prototype.update = function(cb) {
            return Api.update({id: this._id.$oid},
                angular.extend({}, this, {_id:undefined}), cb);
        };

        Api.prototype.destroy = function(cb) {
            return Api.remove({id: this._id.$oid}, cb);
        };

        return Api;
    });