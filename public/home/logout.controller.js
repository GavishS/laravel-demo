(function() {
    'use strict';

    angular
            .module('app')
            .controller('LogoutsController', LogoutsController);

    LogoutsController.$inject = ['$rootScope', '$http', '$scope', '$location'];
    function LogoutsController($rootScope, $http, $scope, $location) {
        alert("A");
        initController();
        function initController() {
        }
    }

})();