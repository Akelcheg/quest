'use strict';

questApp.controller('questController', ['$scope', '$routeParams', 'quest', 'booking', function ($scope, $routeParams, quest, booking) {

    angular.extend($scope, {
        //userBooking: {},
        quest: null,
        booking: null,
        modalBookingTime: []

    });

    quest.getQuestData($routeParams.quest_name, function (questsObj) {

        $scope.quest = questsObj['data'];
        $scope.booking = questsObj['booking_data'];

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

        showBookingModal: function (bookingTimeArray) {
            $scope.modalBookingTime = bookingTimeArray;
            $('#booking_modal').modal('show');
        },

        updateSelection: function (position, timeArray) {
            console.log(timeArray[position]);
            var selectedBookingTime = timeArray[position];

            booking['time'] = selectedBookingTime['value'];
            booking.isTimeBooked();
            /*$scope.userBooking['time'] = selectedBookingTime['value'];
             $scope.userBooking['price'] = selectedBookingTime['price'];
             $scope.userBooking['is_booked'] = selectedBookingTime['is_booked'];*/

            angular.forEach(timeArray, function (time, index) {
                if (position != index)
                    time.selected = false;
            });
        },

        bookTime: function (time) {
            console.log(booking);
            return true;
        }

    });


}]);