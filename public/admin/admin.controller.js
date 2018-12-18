(function() {
    'use strict';

    angular
            .module('app')
            .controller('AdminController', AdminController);

    AdminController.$inject = ['$location', 'AuthenticationService', 'FlashService', 'CommanService', '$http', '$scope', '$rootScope', 'ProjectService', 'config'];
    function AdminController($location, AuthenticationService, FlashService, CommanService, $http, $scope, $rootScope, ProjectService, config) {
        var vm = this;
        $scope.$CommanService = CommanService;
        CommanService.enableNavLinks();
        $scope.user = JSON.parse(localStorage.getItem("current_user"));
        $scope.fn_load = function() {
            console.log("page load")
        };

        $("#admin-login").validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            submitHandler: function(form) {
                $("#sign_in_btn").addClass("loader_on_button");
                $("#invalid_login_div").hide();
                $http.post(config.site_url + 'api/authenticate', {
                    username: $scope.signin.username,
                    password: $scope.signin.password,
                    user_type: 3,
                    is_verified: '1'
                }).then(function success(e) {
                    localStorage.setItem("login_token", e.data.token);
                    var login_token = localStorage.getItem("login_token");
                    $http.get(config.site_url + 'api/authenticate/user?token=' + login_token, {}).then(function success(e) {
                        $scope.user = e.data.user;
                        localStorage.setItem("current_user", JSON.stringify(e.data.user));
                        localStorage.setItem("current_user_type", e.data.user.user_type);
                        $rootScope.globals = {
                            currentUser: e.data.user,
                            userType: e.data.user.user_type
                        };
                        $("#sign_in_btn").removeClass("loader_on_button");
                        $location.path('/admin/dashboard');
                    }, function error(error) {
                        $("#sign_in_btn").addClass("remove_on_button");
                        $location.path('/');
                    });

                }, function error(error) {
                    $("#sign_in_btn").removeClass("loader_on_button");
                    $("#invalid_login_div").show().delay(5000).fadeOut();
                });
            }
        });
        
        $("#retrieve_password_form").validate({
            rules: {
                username_email: {
                    required: true
                }
            },
            submitHandler: function(form) {
                $("#retrieve_password_btn").addClass("loader_on_button");
                $("#invalid_login_div").hide();
                $http.post(config.site_url + 'api/user/retrieve_password', {
                    username_email: $scope.signin.username_email,
                    is_admin: 1
                }).then(function success(e) {
                    
                }, function error(error) {
                    $("#sign_in_btn").removeClass("loader_on_button");
                    $("#invalid_login_div").show().delay(5000).fadeOut();
                });
            }
        });
    }

})();