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

    return booking;

}]);