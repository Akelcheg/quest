questApp.factory('user', ['$http', '$location', '$window', function ($http, $location, $window) {
    var user = {};

    user.login = function (loginForm, cb) {

        $http.post('api/login', loginForm).success(function (data) {

            $window.sessionStorage.access_token = data.access_token;
            //$location.path('/dashboard').replace();
            console.log(data);
            return cb(true);

        }).error(function (data, status) {

                var errorsArray = [];

                angular.forEach(data, function (error) {
                    errorsArray[error.field] = error.message;
                });

                console.log(errorsArray);
                return cb(false, errorsArray);

            }
        );
    };

    user.signup = function (signupForm,cb) {
        $http.post('api/signup', signupForm).success(function (data) {

            $window.sessionStorage.access_token = data.access_token;
            //$location.path('/dashboard').replace();
            console.log(data);
            return cb(true);

        }).error(function (data, status) {

                var errorsArray = [];

                angular.forEach(data, function (error) {
                    errorsArray[error.field] = error.message;
                });

                console.log(errorsArray);
                return cb(false, errorsArray);

            }
        );
    };

    return user;

}]);