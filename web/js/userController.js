'use strict';

questApp.controller('userController', ['$scope', '$location', 'user', function ($scope, $location, user) {

    angular.extend($scope, {

        loggedIn: function () {
            return user.isLogedIn();
        },

        private: function () {
            user.getPrivate();
        },

        logout: function () {
            user.logout();
        },

        login: function () {

            $scope.submitted = true;
            $scope.error = {};

            user.login($scope.userModel, function (status, errorsObj) {

                if (status == true) {
                    $location.path('/').replace();
                } else $scope.error = errorsObj;
            });
        },

        signup: function () {

            user.signup($scope.signupModel, function (status, errorsObj) {
                if (status == true) {
                    $location.path('/').replace();
                } else $scope.error = errorsObj;
            });

        }
    })
    ;

}]);