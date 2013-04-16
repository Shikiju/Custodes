angular.module('dataService', ['ngResource']).
    factory('Credential', function($resource) {

      var self = this;

      var Credential = $resource('http://localhost:49708\:49708/api/credential/:id',
          { apiKey: '4f847ad3e4b08a2eed5f3b54' }, {
            create: { method: 'POST' },
            update: { method: 'PUT' }
          }
      );

      Credential.prototype.create = function(cb) {
        return Credential.create({}, this, cb);
      };

      Credential.prototype.update = function(cb) {
        return Credential.update({ id: this.Id }, this, cb);
      };

      Credential.prototype.destroy = function (cb) {
        return Credential.remove({ id: this.Id }, this, cb);
      };

      return Credential;
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