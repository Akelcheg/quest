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
        this.date = timeObj['date'];
        this.quest_id = '1';
        this.is_booked = timeObj['is_booked'];
        this.price = timeObj['price'];
    };

    booking.clearBooking = function () {
        this.time = '';
        this.is_booked = '';
        this.price = '';
        this.date = '';
        this.quest_id = '';
        this.userPhone = '';
        this.userName = '';
        this.userRequest = '';
    };

    booking.hasErrorForm = function () {

        var errorMessagesArray = [];
        if (!this.userName) errorMessagesArray.push("Укажите ваше имя");
        if (!this.userPhone) errorMessagesArray.push("Укажите ваш номер телефона");
        if (!this.time) errorMessagesArray.push("Выберите время");
        return errorMessagesArray;

    };

    booking.bookTime = function (cb) {

        var self = this;
        console.log (self);
        $http({
            method: "POST",
            url: "api/booking/book",
            data: self
        }).then(function success(response) {
            cb(response.data);
        }, function error(error) {
            console.log(error);
            cb(false);
        });

    };

    return booking;

}]);