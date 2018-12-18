(function() {
    'use strict';

    angular
            .module('app')
            .controller('HomeController', HomeController);

    HomeController.$inject = ['UserService', '$rootScope', '$http', '$scope', '$location', 'RegisterService', 'config'];
    function HomeController(UserService, $rootScope, $http, $scope, $location, RegisterService, config) {
        var vm = this;
        console.log(window.location.origin + window.location.pathname);
        console.log(config);

        $("#signinform").validate({
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
                    is_verified: '1',
                    user_type: '1'
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

                        if (e.data.user.user_type == 1)/* Business User*/
                            $location.path('/business/dashboard');
                        else if (e.data.user.user_type == 2)/* Freelancers */
                            $location.path('/user/dashboard');
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
    }

})();