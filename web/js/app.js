var questApp = angular.module('questApp', ['ngRoute']);

questApp.config(['$routeProvider', '$locationProvider',
    function ($routeProvider, $locationProvider) {
        $routeProvider.when('/', {
            templateUrl: 'partials/test.html',
            controller: 'indexController'
        });

        $routeProvider.otherwise('/');
        $locationProvider.html5Mode(true);
    },
]);