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

          for (var i = 0; i < results.length; i++) {
            results[i]['Name'] = CryptoJS.AES.decrypt(results[i].Name, Authentication.requestPassword()).toString(CryptoJS.enc.Utf8);
            results[i]['Login'] = CryptoJS.AES.decrypt(results[i].Login, Authentication.requestPassword()).toString(CryptoJS.enc.Utf8);
            results[i]['Password'] = CryptoJS.AES.decrypt(results[i].Password, Authentication.requestPassword()).toString(CryptoJS.enc.Utf8);
          }

          cb(results);
        });
      };


      Credential.getDecrypt = function (params) {
        return Credential.get(params, function (result) {
          result.Name = CryptoJS.AES.decrypt(result.Name, Authentication.requestPassword()).toString(CryptoJS.enc.Utf8);
          result.Login = CryptoJS.AES.decrypt(result.Login, Authentication.requestPassword()).toString(CryptoJS.enc.Utf8);
          result.Password = CryptoJS.AES.decrypt(result.Password, Authentication.requestPassword()).toString(CryptoJS.enc.Utf8);
        });
      };

      Credential.createEncrypt = function (cb) {
        var encrypted = CryptoJS.AES.encrypt(this.Name, Authentication.requestPassword());
        this.Name = encrypted.toString();
        encrypted = CryptoJS.AES.encrypt(this.Login, Authentication.requestPassword());
        this.Login = encrypted.toString();
        encrypted = CryptoJS.AES.encrypt(this.Password, Authentication.requestPassword());
        this.Password = encrypted.toString();
        return Credential.create({}, this, cb);
      };

      Credential.updateEncrypt = function (cb) {
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
      this.unencryptedPasswordKey;

      var self = this;

      this.isAuthorized = function() {
        return authorized;
      }

      this.requestPassword = function () {
        return self.unencryptedPasswordKey;
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