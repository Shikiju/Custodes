angular.module('dataService', ['ngResource']).
    factory('Project', function($resource) {

      var self = this;

      var Project = $resource('http://localhost:49708\:49708/api/credential/:id',
          { apiKey: '4f847ad3e4b08a2eed5f3b54' }, {
            create: { method: 'POST' },
            update: { method: 'PUT' }
          }
      );

      Project.prototype.create = function(cb) {
        return Project.create({}, this, cb);
      };

      Project.prototype.update = function(cb) {
        return Project.update({ id: this.Id }, this, cb);
      };

      Project.prototype.destroy = function (cb) {
        //return Project.remove({ id: this._id.$oid }, cb);
      };

      return Project;
    }).
    factory('Authentication', function($http) {

      this.Login = function(email, password, succes, error) {

        //TODO: Hash
        var hashedEmail     = email;
        var hashedPassword  = password;

        $http.defaults.headers.common['Custodes-Email']     = hashedEmail;
        $http.defaults.headers.common['Custodes-Password']  = hashedPassword;

        $http({ method: 'GET', url: 'http://localhost:49708/api/authentication' }).
          success(function(data, status, headers, config) {

            console.log(data);
            succes();
            //error();
          }).
          error(function(data, status, headers, config) {

            error();
          });
      };

      return this;
    });