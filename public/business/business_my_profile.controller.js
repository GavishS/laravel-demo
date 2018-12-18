(function() {
    'use strict';

    angular
            .module('app')
            .controller('BusinessMyProfileController', BusinessMyProfileController);

    BusinessMyProfileController.$inject = ['$location', 'AuthenticationService', 'FlashService', 'CommanService', '$http', '$scope', '$rootScope', 'ProjectService'];
    function BusinessMyProfileController($location, AuthenticationService, FlashService, CommanService, $http, $scope, $rootScope, ProjectService) {
        var vm = this;

        (function initController() {
            $scope.$CommanService = CommanService;
            CommanService.enableNavLinks();
            $scope.user = JSON.parse(localStorage.getItem("current_user"));
        })();
    }

})();