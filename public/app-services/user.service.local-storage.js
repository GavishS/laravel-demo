(function () {
    'use strict';

    angular
        .module('app')
        .factory('UserService', UserService);

    UserService.$inject = ['$timeout', '$filter', '$q', '$http'];
    function UserService($timeout, $filter, $q, $http) {

        var service = {};

        return service;

    }
})();