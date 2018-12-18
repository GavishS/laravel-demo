(function() {
    'use strict';

    angular
            .module('app')
            .factory('BanksService', BanksService);

    BanksService.$inject = ['$timeout', '$filter', '$q', '$http'];
    function BanksService($timeout, $filter, $q, $http) {

        var service = {};

        service.get_all_banks = get_all_banks;

        return service;

        function get_all_banks() {
            return $http({
                method: 'GET',
                url: '/api/banks/get_all_banks'
            });
        }
    }
})();