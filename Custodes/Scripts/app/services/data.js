angular.module('dataService', ['ngResource']).
    factory('Credential', function ($resource, $rootScope, Authentication) {

      var self = this;

      var Credential = $resource('http://localhost:49708\:49708/api/credential/:id',
          { apiKey: '4f847ad3e4b08a2eed5f3b54' }, {
            create: { method: 'POST' },
            update: { method: 'PUT' }
          }
      );

      Credential.queryDecrypt = function (cb) {

        Credential.query(function (results) {

          //Loop door encrypted results
          for (var i = 0; i < results.length; i++) {
            results[i]['Name'] = CryptoJS.AES.decrypt(results[i].Name, Authentication.requestPassword()).toString(CryptoJS.enc.Utf8);
            results[i]['Login'] = CryptoJS.AES.decrypt(results[i].Login, Authentication.requestPassword()).toString(CryptoJS.enc.Utf8);
            results[i]['Password'] = CryptoJS.AES.decrypt(results[i].Password, Authentication.requestPassword()).toString(CryptoJS.enc.Utf8);
          }

          cb(results);
        });
      };

      Credential.prototype.create = function (cb) {
        var encrypted = CryptoJS.AES.encrypt(this.Name, Authentication.requestPassword());
        this.Name = encrypted.toString();
        encrypted = CryptoJS.AES.encrypt(this.Login, Authentication.requestPassword());
        this.Login = encrypted.toString();
        encrypted = CryptoJS.AES.encrypt(this.Password, Authentication.requestPassword());
        this.Password = encrypted.toString();
        return Credential.create({}, this, cb);
      };

      Credential.prototype.update = function (cb) {
        var encrypted = CryptoJS.AES.encrypt(this.Name, Authentication.requestPassword());
        this.Name = encrypted.toString();
        encrypted = CryptoJS.AES.encrypt(this.Login, Authentication.requestPassword());
        this.Login = encrypted.toString();
        encrypted = CryptoJS.AES.encrypt(this.Password, Authentication.requestPassword());
        this.Password = encrypted.toString();
        return Credential.update({ id: this.Id }, this, cb);
      };

      Credential.prototype.destroy = function (cb) {
        return Credential.remove({ id: this.Id }, this, cb);
      };

      return Credential;
    }).
    factory('Authentication', function($http) {

      var authorized = false;
      var unencryptedPasswordKey;

      var self = this;

      this.isAuthorized = function() {
        return authorized;
      }

      this.requestPassword = function () {
        return unencryptedPasswordKey;
      }

      this.login = function(email, password, callback) {

        var hashedEmail = CryptoJS.SHA3(email, { outputLength: 256 });
        var hashedPassword = CryptoJS.SHA3(password, { outputLength: 256 });

        $http.defaults.headers.common['Custodes-Email']     = hashedEmail;
        $http.defaults.headers.common['Custodes-Password']  = hashedPassword;

        $http({ method: 'GET', url: 'http://localhost:49708/api/authentication' }).
          success(function(data, status, headers, config) {

            authorized = true;
            self.unencryptedPasswordKey = password;
            callback(true, data, status, headers, config);
          }).
          error(function(data, status, headers, config) {

            authorized = false;
            callback(false, data, status, headers, config);
          });
      };

      this.logout = function() {
        authorized = false;
        $http.defaults.headers.common['Custodes-Email'] = '';
        $http.defaults.headers.common['Custodes-Password'] = '';
      }

      return this;
    });