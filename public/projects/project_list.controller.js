(function() {
    'use strict';

    angular
            .module('app')
            .controller('ProjectListController', ProjectListController);

    ProjectListController.$inject = ['$location', 'AuthenticationService', 'FlashService', 'CommanService', '$http', '$scope', '$rootScope', 'ProjectService'];
    function ProjectListController($location, AuthenticationService, FlashService, CommanService, $http, $scope, $rootScope, ProjectService) {
        var vm = this;
        $scope.$CommanService = CommanService;
        CommanService.enableNavLinks();
        $scope.user = JSON.parse(localStorage.getItem("current_user"));

        $scope.fn_load = function() {
            console.log("page load")
        };
    }

})();