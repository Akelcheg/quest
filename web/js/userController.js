'use strict';

questApp.controller('userController', ['$scope','user', function ($scope,user) {

    angular.extend($scope, {

        login: function () {

            $scope.submitted = true;
            $scope.error = {};

            user.login($scope.userModel,function (status) {
              console.log (status);
            });
        },

        signup : function () {

          user.signup($scope.signupModel,function (status) {
              console.log (status);
          });

        }
    });

}]);