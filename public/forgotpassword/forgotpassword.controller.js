(function () {
    'use strict';

    angular
        .module('app')
        .controller('ForgotPasswordController', ForgotPasswordController);

    ForgotPasswordController.$inject = ['$location', 'AuthenticationService', 'FlashService'];
    function ForgotPasswordController($location, AuthenticationService, FlashService) {
        var vm = this;

        (function initController() {
            // reset login status
        })();

    }

})();
