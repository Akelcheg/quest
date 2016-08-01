'use strict';

questApp.controller('loginController', ['$scope','user', function ($scope,user) {

    angular.extend($scope, {
        login: function () {
            $scope.submitted = true;
            $scope.error = {};
            user.login($scope.userModel,function (status) {
              console.log (status);
            });
        }
    });

}]);