var questApp = angular.module('questApp', ['ngRoute']);

questApp.config(['$routeProvider', '$locationProvider',
    function ($routeProvider, $locationProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'partials/index.html',
                controller: 'indexController'
            })

            .when('/hi', {
                templateUrl: 'partials/hi.html',
                controller: 'indexController'
            })

            .otherwise({
                templateUrl: 'partials/404.html'
            });

        $locationProvider.html5Mode(true);
    },
]);