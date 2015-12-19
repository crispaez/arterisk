var app = angular.module('arterisk', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}).constant('API_URL', 'http://localhost/arterisk/laravel/public/');