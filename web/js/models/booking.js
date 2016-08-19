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

    };

    booking.bookTime = function () {
        console.log ("booking");
    };

    return booking;

}]);