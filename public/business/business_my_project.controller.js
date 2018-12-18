(function() {
    'use strict';

    angular
            .module('app')
            .controller('BusinessMyProjectController', BusinessMyProjectController);

    BusinessMyProjectController.$inject = ['$location', 'AuthenticationService', 'FlashService', 'CommanService', '$http', '$scope', '$rootScope', 'ProjectService'];
    function BusinessMyProjectController($location, AuthenticationService, FlashService, CommanService, $http, $scope, $rootScope, ProjectService) {
        var vm = this;

        (function initController() {
            $scope.$CommanService = CommanService;
            CommanService.enableNavLinks();
            $scope.user = JSON.parse(localStorage.getItem("current_user"));

            $('#projects').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "/api/projects/allProjects",
                    "data": {user_id: $scope.user.id},
                    "dataType": "json",
                    "type": "POST",
                },
                "columns": [
                    {"data": "project_name"},
                    {"data": "payment_type"},
                    {"data": "location_type"},
                    {"data": "start_date"},
                    {"data": "end_date"},
                    {"data": "options"}
                ]

            });

            ProjectService.GetAll($scope.user.id).then(function success(e) {
                console.log("e");
                console.log(e);
                $("#project_list").html("");
                if (e != "" && e != "undefined" && e != null) {
                    if (e.data != "" && e.data != "undefined" && e.data != null) {
                        if (e.data.data != "" && e.data.data != "undefined" && e.data.data != null) {
                            var projects = e.data.data;
                            for (var i = 0; i < projects.length; i++) {
                                var time_ago = CommanService.timer(projects[i].created_at);
                                var payment_type = projects[i].payment_type;
                                var project_name = projects[i].project_name;
                                $("#project_list").append("<div class='col-sm-12'><p><strong>" + project_name + "</strong><br><span>" + time_ago + "</span><br><span>" + payment_type + "</span></p></div>");
                            }
                        }
                    }
                }
                console.log(e.data);
                console.log(e.data.data);
            }, function error(error) {
                console.log("error");
                console.log(error);
            });
        })();
    }

})();