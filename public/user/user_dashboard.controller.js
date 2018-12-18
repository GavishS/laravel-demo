(function() {
    'use strict';

    angular
            .module('app')
            .controller('UserDashboardController', UserDashboardController);

    UserDashboardController.$inject = ['$location', 'AuthenticationService', 'FlashService', 'CommanService', '$http', '$scope', '$rootScope'];
    function UserDashboardController($location, AuthenticationService, FlashService, CommanService, $http, $scope, $rootScope) {
        var vm = this;
        $scope.$CommanService = CommanService;
        if (localStorage.getItem("current_user") === null) {
            $location.path('/');
        } else if (localStorage.getItem("current_user_type") != "2") {
            $location.path('/');
        }
        $scope.user = JSON.parse(localStorage.getItem("current_user"));
        $scope.logout = function() {
            localStorage.removeItem("current_user");
            localStorage.removeItem("login_token");
            localStorage.removeItem("current_user_type");
            $location.path('/');
        }
    }

})();