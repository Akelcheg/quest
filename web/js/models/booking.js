questApp.factory('booking', ['$http', '$location', '$window', function ($http, $location, $window) {

    var booking = {};


    booking.isTimeBooked = function () {
        console.log("--------------------------------");
        console.log(this);
        return false;
    };

    booking.showBookingError = function (message) {
        return true;
    };

    booking.initBooking = function (timeObj) {
        this.time = timeObj['value'];
        this.is_booked = timeObj['is_booked'];
        this.price = timeObj['price'];
    };

    booking.clearBooking = function () {
        this.time = '';
        this.is_booked = '';
        this.price = '';
        this.userPhone = '';
        this.userName = '';
        this.userRequest = '';
    };

    booking.bookTime = function () {
        console.log("booking");
        console.log(this);
    };

    return booking;

}]);