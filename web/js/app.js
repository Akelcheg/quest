var questApp = angular.module('questApp', ['ngRoute']);

questApp.config(['$routeProvider', '$httpProvider', '$locationProvider',
    function ($routeProvider, $httpProvider, $locationProvider) {

        $httpProvider.defaults.headers.post['Content-Type'] = 'application/json;charset=utf-8';
        $httpProvider.defaults.headers.post['X-CSRF-Token'] = $('meta[name="csrf-token"]').attr("content");

        $routeProvider
            .when('/', {
                templateUrl: 'partials/index.html',
                controller: 'indexController'
            })
            /*.when('/quests', {
             templateUrl: 'partials/quest_desc.html',
             controller: 'indexController'
             })*/
            .when('/quest/:quest_name', {
                templateUrl: 'partials/quest_desc.html',
                controller: 'questController'
            })
            .when('/contact', {
                templateUrl: 'partials/contact.html',
                controller: 'contactController'
            })
            .when('/franchize', {
                templateUrl: 'partials/franchize.html',
                //controller: 'aboutController'
            })
            .when('/about', {
                templateUrl: 'partials/about.html',
                controller: 'aboutController'
            })
            .when('/gift', {
                templateUrl: 'partials/gift.html',
                //controller: 'giftController'
            })

            .when('/login', {
                templateUrl: 'partials/login.html',
                controller: 'userController'
            })

        /*.otherwise({
         templateUrl: 'partials/404.html'
         });*/

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