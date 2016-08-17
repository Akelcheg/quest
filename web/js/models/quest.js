questApp.factory('quest', ['$http', '$location', '$window', function ($http, $location, $window) {
    var quest = {};

    quest.getQuestList = function (cb) {
        $http.get('api/quest/list').success(function (data) {

            cb(data);

        }).error(function (data, status) {

                console.log(data);
                cb([]);

            }
        );
    };


    return quest;

}]);