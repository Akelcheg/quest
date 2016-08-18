'use strict';

questApp.controller('questController', ['$scope', '$routeParams', 'quest', function ($scope, $routeParams, quest) {

    quest.getQuestData($routeParams.quest_name, function (questsObj) {

        $scope.quest = questsObj['data'];
        $scope.booking = questsObj['booking_data'];

    });


}]);