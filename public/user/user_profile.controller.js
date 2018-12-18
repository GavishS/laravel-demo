(function() {
    'use strict';

    angular
            .module('app')
            .controller('UserProfileController', UserProfileController);

    UserProfileController.$inject = ['$location', 'AuthenticationService', 'FlashService', '$scope', '$http', '$rootScope'];
    function UserProfileController($location, AuthenticationService, FlashService, $scope, $http, $rootScope) {
        var vm = this;
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