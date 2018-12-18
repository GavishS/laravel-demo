(function() {
    'use strict';

    angular
            .module('app')
            .factory('ProjectService', ProjectService);

    ProjectService.$inject = ['$timeout', '$filter', '$q', '$http', 'config'];
    function ProjectService($timeout, $filter, $q, $http, config) {

        var service = {};

        service.GetAll = GetAll;
        service.GetById = GetById;
        service.create = create;
        service.Update = Update;
        service.Delete = Delete;
        service.get_type_of_projects = get_type_of_projects;
        service.get_all_technologies = get_all_technologies;
        service.get_all_equivalent_relevant_skills = get_all_equivalent_relevant_skills;
        service.get_all_certificates = get_all_certificates;
        service.get_all_freelancer_skills = get_all_freelancer_skills;

        return service;


        function get_type_of_projects() {
            return $http({
                method: 'GET',
                url: config.site_url + 'api/projects/get_type_of_projects'
            });
        }

        function get_all_technologies() {
            return $http({
                method: 'GET',
                url: config.site_url + 'api/projects/get_all_technologies'
            });
        }

        function get_all_equivalent_relevant_skills() {
            return $http({
                method: 'GET',
                url: config.site_url + 'api/projects/get_all_equivalent_relevant_skills'
            });
        }

        function get_all_certificates() {
            return $http({
                method: 'GET',
                url: config.site_url + 'api/projects/get_all_certificates'
            });
        }

        function get_all_freelancer_skills() {
            return $http({
                method: 'GET',
                url: config.site_url + 'api/projects/get_all_freelancer_skills'
            });
        }

        function GetAll(user_id) {
            return $http({
                method: 'GET',
                url: config.site_url + 'api/projects?user_id=' + user_id
            });
        }

        function GetById(id) {
            var deferred = $q.defer();
            var filtered = $filter('filter')(getUsers(), {id: id});
            var user = filtered.length ? filtered[0] : null;
            deferred.resolve(user);
            return deferred.promise;
        }

        function create(form) {

            return $http.post(config.site_url + 'api/projects/store', form, {
                withCredentials: true,
                headers: {'Content-Type': undefined},
                transformRequest: angular.identity
            });
        }

        function Update(user) {
            var deferred = $q.defer();

            var users = getUsers();
            for (var i = 0; i < users.length; i++) {
                if (users[i].id === user.id) {
                    users[i] = user;
                    break;
                }
            }
            setUsers(users);
            deferred.resolve();

            return deferred.promise;
        }

        function Delete(id) {
            var deferred = $q.defer();

            var users = getUsers();
            for (var i = 0; i < users.length; i++) {
                var user = users[i];
                if (user.id === id) {
                    users.splice(i, 1);
                    break;
                }
            }
            setUsers(users);
            deferred.resolve();

            return deferred.promise;
        }

        // private functions

        function getUsers() {
            console.log("aaa");
            if (!localStorage.users) {
                localStorage.users = JSON.stringify([]);
            }

            return JSON.parse(localStorage.users);
        }

        function setUsers(users) {
            localStorage.users = JSON.stringify(users);
        }
    }
})();