'use strict';

questApp.controller('questController', ['$scope', '$routeParams', 'quest', function ($scope, $routeParams, quest) {

    angular.extend($scope, {

        quest: null,
        booking: null,
        modalBookingTime: []

    });

    quest.getQuestData($routeParams.quest_name, function (questsObj) {

        $scope.quest = questsObj['data'];
        $scope.booking = questsObj['booking_data'];

        $scope.modalBookingTime = $scope.booking[0];
    });


    $('#booking_modal').modal('show');

    angular.extend($scope, {

        showBookingModal: function (bookingTimeArray) {
            $scope.modalBookingTime = bookingTimeArray;
            $('#booking_modal').modal('show');
        },

        updateSelection: function (position, timeArray) {
            angular.forEach(timeArray, function (time, index) {
                if (position != index)
                    time.selected = false;
            });
        }

    });


}]);