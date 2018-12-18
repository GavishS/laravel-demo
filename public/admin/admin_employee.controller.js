(function() {
    'use strict';

    angular
            .module('app')
            .controller('AdminEmployeeController', AdminEmployeeController);

    AdminEmployeeController.$inject = ['$location', 'AuthenticationService', 'FlashService', 'CommanService', '$http', '$scope', '$rootScope', 'ProjectService', 'config', 'AdminService'];
    function AdminEmployeeController($location, AuthenticationService, FlashService, CommanService, $http, $scope, $rootScope, ProjectService, config, AdminService) {
        var vm = this;
        $scope.$CommanService = CommanService;
        CommanService.enableNavLinks();
        $scope.user = JSON.parse(localStorage.getItem("current_user"));

        (function initController() {
            console.log("!");
            var myTable = $("#employees").DataTable({
                "deferRender": true,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "sDom": 'lfrtip'
            });
            AdminService.get_all_employee().then(function success(e) {
                //$scope.type_of_projects = e.data;
                console.log("e");
                console.log(e);
                var jsonObject = e.data;
                var result = jsonObject.map(function(item) {
                    var result = [];
                    result.push(item.id);
                    result.push(item.name);
                    result.push(item.user_type);
                    result.push(item.firstname);
                    result.push(item.lastname);
                    result.push("CPCPCP");
                    //result.push(item.email);
                    return result;
                });
                console.log(result);
                myTable.rows.add(result); // add to DataTable instance
                myTable.draw(); // always redraw
            }, function error(error) {

            });

//            $('#employees').DataTable({
//                "processing": true,
//                "serverSide": true,
//                "ajax": {
//                    "url": "api/projects/allProjects",
//                    "data": {user_id: 21},
//                    "dataType": "json",
//                    "type": "POST",
//                },
//                "columns": [
//                    {"data": "project_name"},
//                    {"data": "payment_type"},
//                    {"data": "location_type"},
//                    {"data": "start_date"},
//                    {"data": "end_date"},
//                    {"data": "options"}
//                ]
//
//            });
        })();

        $scope.getEmployee = function() {
            console.log("page load");
        };
    }

})();