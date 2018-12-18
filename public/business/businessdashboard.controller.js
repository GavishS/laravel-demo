(function() {
    'use strict';

    angular
            .module('app')
            .controller('BusinessDashboardController', BusinessDashboardController);

    BusinessDashboardController.$inject = ['$location', 'AuthenticationService', 'CommanService', 'FlashService', '$http', '$scope', '$rootScope'];
    function BusinessDashboardController($location, AuthenticationService, CommanService, FlashService, $http, $scope, $rootScope) {
        var vm = this;
        $scope.$CommanService = CommanService;
        CommanService.enableNavLinks();
        CommanService.check_business_login();

    }

})();