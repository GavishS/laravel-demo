(function() {
    'use strict';

    angular
            .module('app')
            .factory('RegisterService', RegisterService);

    RegisterService.$inject = ['$timeout', '$filter', '$q', '$http'];
    function RegisterService($timeout, $filter, $q, $http) {

        var service = {};

        service.check_unique_username_email = check_unique_username_email;
        service.get_all_primary_skills = get_all_primary_skills;
        service.get_all_secondary_skills = get_all_secondary_skills;
        service.verify_user_registration_service = verify_user_registration_service;

        return service;

        function check_unique_username_email(username, email) {
            return $http({
                method: 'POST',
                data: {
                    'username': username,
                    'email': email
                },
                url: 'api/user/check_unique_username_email'
            });
        }

        function get_all_primary_skills() {
            return $http({
                method: 'GET',
                url: '/api/primary_skills/get_all_primary_skills'
            });
        }

        function get_all_secondary_skills() {
            return $http({
                method: 'GET',
                url: '/api/secondary_skills/get_all_secondary_skills'
            });
        }

        function verify_user_registration_service(token) {
            return $http({
                method: 'POST',
                data: {
                    'token': token
                },
                url: '/api/user/verify_user_registration_token'
            });
        }
    }
})();