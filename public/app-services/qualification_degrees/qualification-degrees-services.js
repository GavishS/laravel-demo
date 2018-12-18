(function() {
    'use strict';

    angular
            .module('app')
            .factory('QualificationDegreesService', QualificationDegreesService);

    QualificationDegreesService.$inject = ['$timeout', '$filter', '$q', '$http'];
    function QualificationDegreesService($timeout, $filter, $q, $http) {

        var service = {};

        service.get_all_qualification_degrees = get_all_qualification_degrees;

        return service;

        function get_all_qualification_degrees() {
            return $http({
                method: 'GET',
                url: '/api/qualification_degrees/get_all_qualification_degrees'
            });
        }
    }
})();