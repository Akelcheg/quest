'use strict';

questApp.controller('questController', ['$scope', '$routeParams', 'quest', 'booking', '$timeout',
    function ($scope, $routeParams, quest, booking, $timeout) {

        angular.extend($scope, {
            bookingMessage: "",
            formErrorMessage: "",
            booking: booking,
            quest: null,
            bookingData: null,
            modalBookingTime: [],
            bookingByTime: true,
            bookingByDate: false,
            bookingType: "Бронирование - вид по времени"
        });

        quest.getQuestData($routeParams.quest_name, function (questsObj) {
            $scope.quest = questsObj['data'];
            $scope.bookingData = questsObj['booking_data'];
        });

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

            bookTime: function (modalBookingTime) {
                booking.date = modalBookingTime['date'];
                booking.quest_id = $scope.quest['id'];
                if (booking.hasErrorForm().length > 0) {
                    $scope.formErrorMessage = booking.hasErrorForm();
                } else booking.bookTime(function (result) {
                    $scope.formErrorMessage = [];
                    if (result == true) {
                        $scope.bookingMessage = "Время успешно забронировано";
                        $timeout(function () {
                            $scope.bookingMessage = "";
                            $('#booking_modal').modal('hide');
                            booking.clearBooking();
                        }, 3000);

                        quest.getQuestData($routeParams.quest_name, function (questsObj) {
                            //$('#booking_modal').modal('hide');
                            $scope.quest = questsObj['data'];
                            $scope.bookingData = questsObj['booking_data'];
                        });
                    }
                });
                return true;
            },

            setDateBookingView: function () {
                this.bookingByDate = true;
                this.bookingByTime = false;
                this.bookingType = "Бронирование - вид по дням";
            },

            setTimeBookingView: function () {
                this.bookingByTime = true;
                this.bookingByDate = false;
                this.bookingType = "Бронирование - вид по времени";
            }

        });

    }]);