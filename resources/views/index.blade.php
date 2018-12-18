<!doctype html>
<html lang="en" ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Glocals</title>
        <?php $random_number = mt_rand(); ?>
        <link href="app-content/vendor/bootstrap/css/bootstrap.min.css?<?= $random_number ?>" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?<?= $random_number ?>"></script>
        <script src="app-content/vendor/bootstrap/js/bootstrap.min.js?<?= $random_number ?>"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?<?= $random_number ?>"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js?<?= $random_number ?>"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="app-content/css/app.css?<?= $random_number ?>" rel="stylesheet" />
        <link href="app-content/vendor/metisMenu/metisMenu.min.css?<?= $random_number ?>" rel="stylesheet" />
        <link href="app-content/vendor/morrisjs/morris.css?<?= $random_number ?>" rel="stylesheet" />
        <link href="app-content/vendor/font-awesome/css/font-awesome.min.css?<?= $random_number ?>" rel="stylesheet" type="text/css" />
        <link href="app-content/css/sb-admin-2.css?<?= $random_number ?>" rel="stylesheet" />
        <link href="app-content/css/style.css?<?= $random_number ?>" rel="stylesheet" />
        <link href="app-content/css/select2.min.css?<?= $random_number ?>" rel="stylesheet" />
        <link href="app-content/vendor/magnific-popup/magnific-popup.css?<?= $random_number ?>" rel="stylesheet" type="text/css" />

        <!-- Custom styles for this template -->
        <link href="app-content/css/freelancer.min.css" rel="stylesheet" />
        <link href="app-content/vendor/bootstrap/css/datepicker.css?<?= $random_number ?>" rel="stylesheet" />
        <script src="app-content/vendor/bootstrap/js/bootstrap-datepicker.js?<?= $random_number ?>"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>

        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    </head>
    <body id="page-top">
        <div id="wrapper">
            <div ng-class="{ 'alert': flash, 'alert-success': flash.type === 'success', 'alert-danger': flash.type === 'error' }" ng-if="flash" ng-bind="flash.message"></div>
            <div ng-view autoscroll="true"></div>
        </div>
        <!-- Navigation -->

        <script src="//code.angularjs.org/1.6.0/angular.min.js"></script>
        <script src="//code.angularjs.org/1.6.0/angular-route.min.js"></script>
        <script src="//code.angularjs.org/1.6.0/angular-cookies.min.js"></script>

        <script src="app.js?<?= $random_number ?>"></script>

        <script src="app-services/comman.service.js?<?= $random_number ?>"></script>
        <script src="app-services/authentication.service.js?<?= $random_number ?>"></script>
        <script src="app-services/flash.service.js?<?= $random_number ?>"></script>

        <!-- Real user service that uses an api -->
        <!-- <script src="app-services/user.service.js"></script> -->

        <!-- Fake user service for demo that uses local storage -->
        <script src="app-services/user.service.local-storage.js?<?= $random_number ?>"></script>
        <script src="app-services/register/register-services.js?<?= $random_number ?>"></script>
        <script src="app-services/projects/project-services.js?<?= $random_number ?>"></script>
        <script src="app-services/qualification_degrees/qualification-degrees-services.js?<?= $random_number ?>"></script>
        <script src="app-services/banks/banks-services.js?<?= $random_number ?>"></script>
        <script src="app-services/admin/admin-services.js?<?= $random_number ?>"></script>

        <script src="home/home.controller.js?<?= $random_number ?>"></script>
        <script src="login/login.controller.js?<?= $random_number ?>"></script>
        <script src="register/register.controller.js?<?= $random_number ?>"></script>
        <script src="business/businessdashboard.controller.js?<?= $random_number ?>"></script>
        <script src="business/business_my_project.controller.js?<?= $random_number ?>"></script>
        <script src="business/business_new_project.controller.js?<?= $random_number ?>"></script>
        <script src="business/business_my_profile.controller.js?<?= $random_number ?>"></script>
        <script src="forgotpassword/forgotpassword.controller.js?<?= $random_number ?>"></script>
        <script src="comman.js?<?= $random_number ?>"></script>
        <script src="user/user_profile.controller.js?<?= $random_number ?>"></script>
        <script src="user/search_freelancer.controller.js"></script>
        <script src="projects/project_list.controller.js"></script>
        <script src="projects/project_create.controller.js"></script>
        <script src="user/user_dashboard.controller.js?<?= $random_number ?>"></script>
        <script src="user/user.controller.js?<?= $random_number ?>"></script>
        <script src="admin/admin.controller.js?<?= $random_number ?>"></script>
        <script src="admin/admin_employee.controller.js?<?= $random_number ?>"></script>
        <script src="app-content/vendor/metisMenu/metisMenu.min.js?<?= $random_number ?>"></script>
        <script src="app-content/vendor/raphael/raphael.min.js?<?= $random_number ?>"></script>
        <script src="app-content/vendor/morrisjs/morris.min.js?<?= $random_number ?>"></script>

        <script src="app-content/vendor/bootstrap/js/bootstrap.bundle.min.js?<?= $random_number ?>"></script>

        <!-- Plugin JavaScript -->
        <script src="app-content/vendor/jquery-easing/jquery.easing.min.js?<?= $random_number ?>"></script>
        <script src="app-content/vendor/magnific-popup/jquery.magnific-popup.min.js?<?= $random_number ?>"></script>

        <!-- Contact Form JavaScript -->
        <script src="app-content/js/jqBootstrapValidation.js?<?= $random_number ?>"></script>
        <script src="app-content/js/contact_me.js?<?= $random_number ?>"></script>
        <script src="app-content/js/select2.full.min.js?<?= $random_number ?>"></script>
        <script src="app-content/js/alert.js?<?= $random_number ?>"></script>

        <!-- Custom scripts for this template -->
        <script src="app-content/js/freelancer.min.js?<?= $random_number ?>"></script>

        <script language="javascript">
            $(document).ready(function() {
                $(document).on('click', "input[name$='forjobdata']", function() {
                    var inputValue = $(this).attr("value");
                    var targetBox = $("." + inputValue);
                    $(".jobtypedata").not(targetBox).hide();
                    $(targetBox).show();
                });
                $(document).on('click', "input[name$='forbudgetdata']", function() {
                    var inputValue = $(this).attr("value");
                    var targetBox = $("." + inputValue);
                    $(".budgettypedata").not(targetBox).hide();
                    $(targetBox).show();
                });
                $(document).on('click', "input[name$='for_resource_data']", function() {
                    var inputValue = $(this).attr("value");
                    var targetBox = $("." + inputValue);
                    $(".resource_data").not(targetBox).hide();
                    $(targetBox).show();
                });
            });



            $(function() {
                $(document).on('change', '#countryname', function() {
                    var $dropdown = $(this);

                    $.getJSON("jsondata/data.json", function(data) {
                        console.log(data);
                        var key = $dropdown.val();
                        var vals = [];

                        switch (key) {
                            case 'IN':

                                vals = data.IN.split(",");
                                break;
                            case 'IS':
                                vals = data.IS.split(",");
                                break;
                            case 'DZ':
                                vals = data.DZ.split(",");
                                break;
                            case 'AL':
                                vals = data.AL.split(",");
                                break;
                            case 'AX':
                                vals = data.AX.split(",");
                                break;
                            case 'AF':
                                vals = data.AF.split(",");
                                break;
                            case 'base':
                                vals = ['Please Select one'];
                        }

                        var $jsontwo = $("#idproof");
                        $jsontwo.empty();
                        $.each(vals, function(index, value) {
                            console.log(value);
                            $jsontwo.append("<option>" + value + "</option>");
                        });

                    });
                });
            });
        </script>
    </body>
</html>