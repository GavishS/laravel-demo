(function() {
    'use strict';
    var site_url = window.location.origin + window.location.pathname;
    angular.module('app', ['ngRoute', 'ngCookies']).config(config).run(run).constant('config',{site_url:site_url});
    config.$inject = ['$routeProvider', '$locationProvider'];

    function config($routeProvider, $locationProvider) {
        $routeProvider.when('/', {
            controller: 'HomeController',
            templateUrl: 'home/home.view.php',
            controllerAs: 'vm'
        }).when('/login', {
            controller: 'LoginController',
            templateUrl: 'login/login.view.php',
            controllerAs: 'vm'
        }).when('/forgotpassword', {
            controller: 'ForgotPasswordController',
            templateUrl: 'forgotpassword/forgotpassword.view.php',
            controllerAs: 'fp'
        }).when('/verify_registration/:token', {
            controller: 'RegisterController',
            templateUrl: 'home/verify_registration.view.php',
            controllerAs: 'fp'
        }).when('/how_it_works', {
            controller: 'HomeController',
            templateUrl: 'home/how_it_works.view.php',
            controllerAs: 'vm'
        }).when('/about', {
            controller: 'HomeController',
            templateUrl: 'home/about.view.php',
            controllerAs: 'vm'
        }).when('/signin', {
            controller: 'HomeController',
            templateUrl: 'home/signin.view.php',
            controllerAs: 'vm'
        }).when('/contact', {
            controller: 'HomeController',
            templateUrl: 'home/contact.view.php',
            controllerAs: 'vm'
        }).when('/retrievepassword/:token', {
            controller: 'ForgotPasswordController',
            templateUrl: 'forgotpassword/retrievepassword.view.php',
            controllerAs: 'fp'
        }).when('/register_as_user', {
            controller: 'RegisterController',
            templateUrl: 'register/register.view.php',
            controllerAs: 'vm'
        }).when('/register_as_business', {
            controller: 'RegisterController',
            templateUrl: 'register/register_as_business.view.php',
            controllerAs: 'vm'
        }).when('/registeras', {
            controller: 'RegisterController',
            templateUrl: 'register/registeras.view.php',
            controllerAs: 'regc'
        }).when('/business/dashboard', {
            controller: 'BusinessDashboardController',
            templateUrl: 'business/dashboard.view.php',
            controllerAs: 'bd'
        }).when('/business/myprofile', {
            controller: 'BusinessMyProfileController',
            templateUrl: 'business/myprofile.view.php',
            controllerAs: 'bd'
        }).when('/business/myproject', {
            controller: 'BusinessMyProjectController',
            templateUrl: 'business/myproject.view.php',
            controllerAs: 'bmp'
        }).when('/projects/create', {
            controller: 'ProjectController',
            templateUrl: 'projects/create_project.view.php',
            controllerAs: 'bnp'
        }).when('/user/profile', {
            controller: 'UserProfileController',
            templateUrl: 'user/profile.view.php',
            controllerAs: 'uprfl'
        }).when('/user/dashboard', {
            controller: 'UserDashboardController',
            templateUrl: 'user/dashboard.view.php',
            controllerAs: 'ud'
        }).when('/search_freelancer', {
            controller: 'SearchFreelancerController',
            templateUrl: 'user/search_freelancer.view.php',
            controllerAs: 'sflr'
        }).when('/freelancer_profile', {
            controller: 'SearchFreelancerController',
            templateUrl: 'user/freelancer_profile.view.php',
            controllerAs: 'sflr'
        }).when('/project/list', {
            controller: 'ProjectListController',
            templateUrl: 'projects/project_list.view.php',
            controllerAs: 'plc'
        }).when('/admin', {
            controller: 'AdminController',
            templateUrl: 'admin/adminlogin.view.php',
            controllerAs: 'sflr'
        }).when('/admin/login', {
            controller: 'AdminController',
            templateUrl: 'admin/adminlogin.view.php',
            controllerAs: 'sflr'
        }).when('/admin/dashboard', {
            controller: 'AdminController',
            templateUrl: 'admin/admindashboard.view.php',
            controllerAs: 'sflr'
        }).when('/admin/change_password', {
            controller: 'AdminController',
            templateUrl: 'admin/admin_forgotpassword.view.php',
            controllerAs: 'sflr'
        }).when('/admin/employee', {
            controller: 'AdminEmployeeController',
            templateUrl: 'admin/employee.view.php',
            controllerAs: 'sflr'
        }).otherwise({
            redirectTo: '/'
        });
    }
    run.$inject = ['$rootScope', '$location', '$cookies', '$http'];

    function run($rootScope, $location, $cookies, $http) {
        $rootScope.globals = $cookies.getObject('globals') || {};
        if ($rootScope.globals.currentUser) {
            $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata;
        }
        $rootScope.$on('$locationChangeStart', function(event, next, current) {
            var restrictedPage = $.inArray($location.path(), ['/login', '/register']) === -1;
            var loggedIn = $rootScope.globals.currentUser;
            if (restrictedPage && !loggedIn) {}
        });
    }
})();