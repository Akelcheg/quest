'use strict';

questApp.controller('indexController', ['$scope', 'quest', function ($scope, quest) {

    quest.getQuestList(function (questsList) {
        $scope.quests = questsList;
    });

    angular.extend($scope, {

       /* questList: function () {

            quest.getQuestList(function (questsList) {
                $scope.quests = questsList;
            });

        }*/

    });

}]);