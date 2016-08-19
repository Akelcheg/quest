'use strict';

questApp.controller('questController', ['$scope', '$routeParams', 'quest', 'booking', function ($scope, $routeParams, quest, booking) {

    angular.extend($scope, {
        booking: booking,
        quest: null,
        bookingData: null,
        modalBookingTime: []

    });

    quest.getQuestData($routeParams.quest_name, function (questsObj) {

        $scope.quest = questsObj['data'];
        $scope.bookingData = questsObj['booking_data'];

        //$scope.modalBookingTime = $scope.booking[0];
    });


    //$('#booking_modal').modal('show');

    angular.extend($scope, {

        availableTimesCount: function (timeArray) {
            var count = 0;
            angular.forEach(timeArray['time'], function (time) {
                count += time.is_booked == 'false' ? 1 : 0;
            });
            return count;
        },

        showBookingModal: function (bookingTimeArray, availableTimes) {
            if (availableTimes > 0) {
                $scope.modalBookingTime = bookingTimeArray;
                $('#booking_modal').modal('show');
            }
            return false;
        },

        updateSelection: function (position, timeArray) {

            var selectedBookingTime = timeArray[position];

            booking.initBooking(selectedBookingTime);

            angular.forEach(timeArray, function (time, index) {
                if (position != index)
                    time.selected = false;
            });
        },

        bookTime: function () {
            //if (booking.isTimeBooked()) booking.showBookingError("Время уже забронировано");
            booking.bookTime();
            return true;
        }

    });

}]);