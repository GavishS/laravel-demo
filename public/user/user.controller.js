(function () {
    'use strict';

    angular
        .module('app')
        .controller('UserController', UserController);

    UserController.$inject = ['$location', 'AuthenticationService', 'FlashService'];
    function UserController($location, AuthenticationService, FlashService) {
        var vm = this;
		alert("1");
        vm.login = login;
		console.log("111");
		localStorage.clear();
			$location.path('/');
        function logout() {
            
        };
		logout();
    }

})();