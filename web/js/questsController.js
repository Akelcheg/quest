'use strict';

questApp.controller('questsController', ['$scope', 'quest', function ($scope, quest) {

    quest.getQuestList(function (questsList) {
        $scope.quests = questsList;
    });

}]);