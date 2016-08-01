var questApp = angular.module('questApp', ['ngRoute']);

questApp.config(['$routeProvider', '$httpProvider', '$locationProvider',
    function ($routeProvider, $httpProvider, $locationProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'partials/index.html',
                controller: 'indexController'
            })
            /*
             .when('/hi', {
             templateUrl: 'partials/hi.html',
             controller: 'indexController'
             })*/

            .when('/login', {
                templateUrl: 'partials/login.html',
                controller: 'loginController'
            })

            .otherwise({
                templateUrl: 'partials/404.html'
            });

        $httpProvider.interceptors.push('authInterceptor');
        $locationProvider.html5Mode(true);

    },
]);

questApp.factory('authInterceptor', function ($q, $window, $location) {
    return {
        request: function (config) {
            if ($window.sessionStorage.access_token) {
                //HttpBearerAuth
                config.headers.Authorization = 'Bearer ' + $window.sessionStorage.access_token;
            }
            return config;
        },
        responseError: function (rejection) {
            if (rejection.status === 401) {
                $location.path('/login').replace();
            }
            return $q.reject(rejection);
        }
    };
});