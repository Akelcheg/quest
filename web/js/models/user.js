questApp.factory('user', ['$http', '$location', '$window', function ($http, $location, $window) {
    var user = {};

    user.isLogedIn = function () {
        return Boolean($window.sessionStorage.access_token);
    };

    user.logout = function () {
        delete $window.sessionStorage.access_token;
        $location.path('/login').replace();
    };

    user.getPrivate = function () {
        $http.get('api/private').success(function (data) {

            console.log(data);

        }).error(function (data, status) {

                console.log(data);

            }
        );
    };

    user.login = function (loginForm, cb) {

        $http.post('api/login', loginForm).success(function (data) {

            $window.sessionStorage.access_token = data.access_token;
            return cb(true);

        }).error(function (data, status) {

                var errorsObj = {};

                angular.forEach(data, function (error) {
                    errorsObj[error.field] = error.message;
                });

                return cb(false, errorsObj);

            }
        );
    };

    user.signup = function (signupForm, cb) {
        $http.post('api/signup', signupForm).success(function (data) {

            $window.sessionStorage.access_token = data.access_token;
            return cb(true);

        }).error(function (data, status) {

                var errorsObj = {};

                angular.forEach(data, function (error) {
                    errorsObj[error.field] = error.message;
                });

                return cb(false, errorsObj);

            }
        );
    };

    return user;

}]);