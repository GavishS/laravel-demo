(function() {
    'use strict';

    angular
            .module('app')
            .controller('ProjectController', ProjectController);

    ProjectController.$inject = ['$location', 'AuthenticationService', 'FlashService', 'CommanService', '$http', '$scope', '$rootScope', 'ProjectService', 'config'];
    function ProjectController($location, AuthenticationService, FlashService, CommanService, $http, $scope, $rootScope, ProjectService, config) {
        var vm = this;

        CommanService.check_business_login();
        $scope.$CommanService = CommanService;
        CommanService.enableNavLinks();
        $scope.user = JSON.parse(localStorage.getItem("current_user"));
        $("#equivalent_relevant_skills").select2({});
        $("#certification").select2({});
        $("#technologies").select2({});
        $("#type_of_project").select2({});
        $("#skills_required").select2({});
        $("#currency").select2({});
        $("#state").select2({});
        $("#freelancer_skills").select2({});

        (function initController() {
            ProjectService.get_type_of_projects().then(function success(e) {
                $scope.type_of_projects = e.data;
            }, function error(error) {

            });

            ProjectService.get_all_technologies().then(function success(e) {
                $scope.technologies = e.data;
            }, function error(error) {

            });

            ProjectService.get_all_equivalent_relevant_skills().then(function success(e) {
                $scope.equivalent_relevant_skills = e.data;
            }, function error(error) {

            });

            ProjectService.get_all_certificates().then(function success(e) {
                $scope.certificates = e.data;
            }, function error(error) {

            });

            ProjectService.get_all_freelancer_skills().then(function success(e) {
                $scope.freelancer_skills = e.data;
                console.log("$scope.freelancer_skills");
                console.log($scope.freelancer_skills);
            }, function error(error) {

            });
        })();

        $scope.filterSecondarySkillsCondition = {
            skills: 'PHP'
        };
        $scope.secondary_skills = [
            {value: 'PHP', displayName: 'PHP'},
            {value: 'ASP.net', displayName: 'ASP.net'},
            {value: 'VB.Net', displayName: 'VB.Net'},
            {value: 'Python', displayName: 'Python'},
            {value: 'Ruby', displayName: 'Ruby'},
            {value: 'Java', displayName: 'Java'},
            {value: 'AngularJS', displayName: 'AngularJS'},
            {value: 'NodeJs', displayName: 'NodeJs'},
            {value: 'Jquery', displayName: 'Jquery'},
            {value: 'JavaScript', displayName: 'JavaScript'},
            {value: 'Bootstrap', displayName: 'Bootstrap'},
            {value: 'PayPal', displayName: 'PayPal'},
            {value: 'BrainTree', displayName: 'BrainTree'}
        ];

        $('.datepicker').datepicker({startDate: '-0d'}).on('changeDate', function(ev) {
            $(this).datepicker('hide');
        });
        $("#local_state_div").hide();
        $(".resource_data.Group").hide();

        $(".location_type").click(function() {
            if ($('input[name=location_type]:checked').val() == "Local") {
                $("#local_state_div").slideDown("slow");
            } else {
                $("#local_state_div").slideUp("slow");
            }
        });

        $(".resource_type").click(function() {
            $("#skills_of_freelancers_div").hide();
            if ($('input[name=fraalancer_type]:checked').val() == "Group") {
                $(".resource_data.Group").slideDown("slow");
                $(".resource_data.Individual").slideUp("slow");

                if ($("#group_resource_required").val() > 0) {
                    $("#skills_of_freelancers_div").show();
                }
            } else {
                $(".resource_data.Individual").slideDown("slow");
                $(".resource_data.Group").slideUp("slow");

                if ($("#individual_resource_required").val() > 0) {
                    $("#skills_of_freelancers_div").show();
                }
            }
        });

        $(".experience_type").click(function() {
            if ($('input[name=experience_type]:checked').val() == "Experienced") {
                $(".experience_user_rate.Experienced").slideDown("slow");
            } else {
                $(".experience_user_rate.Experienced").slideUp("slow");
            }
        });

        $(".budget_type").click(function() {
            if ($('input[name=payment_type]:checked').val() == "Fixed") {
                $(".budgettypedata.Hourly").slideUp("slow");
                $(".budgettypedata.Fixed").slideDown("slow");
            } else {
                $(".budgettypedata.Hourly").slideDown("slow");
                $(".budgettypedata.Fixed").slideUp("slow");
            }
        });

        $(".number_of_freelancers").change(function() {
            if ($(this).val() > 0) {
                $("#skills_of_freelancers_div").show();
            }
        });

        $.validator.addMethod("noSpaceAtFirstCharacter", function(value, element, arg) {
            if (value.substring(0, 1) == " ")
                return false;
            else
                return true;
        }, "Invalid Name.");

        $.validator.addMethod("chk_fixed_total_budget", function(value, element, arg) {
            if ($('input[name=payment_type]:checked').val() == "Fixed") {

                if (value == " " || value == null || value == "null" || value == "undefined")
                    return false;
                else if (!$.isNumeric(value))
                    return false;
                else if (value <= 0)
                    return false;
                else
                    return true;
            } else {
                return true;
            }
        }, "Invalid Budget.");

        $.validator.addMethod("chk_hourly_rate", function(value, element, arg) {
            if ($('input[name=payment_type]:checked').val() == "Hourly") {

                if (value == " " || value == null || value == "null" || value == "undefined")
                    return false;
                else if (!$.isNumeric(value))
                    return false;
                else if (value <= 0)
                    return false;
                else
                    return true;
            } else {
                return true;
            }
        }, "Invalid Budget.");

        $.validator.addMethod("chk_individual_resource", function(value, element, arg) {

            if ($('input[name=fraalancer_type]:checked').val() == "Individual") {

                if (value == " " || value == null || value == "null" || value == "undefined")
                    return false;
                else if (!$.isNumeric(value))
                    return false;
                else if (value <= 0)
                    return false;
                else
                    return true;
            } else {
                return true;
            }
        }, "Invalid Value.");

        $.validator.addMethod("chk_group_resource", function(value, element, arg) {

            if ($('input[name=fraalancer_type]:checked').val() == "Group") {

                if (value == " " || value == null || value == "null" || value == "undefined")
                    return false;
                else if (!$.isNumeric(value))
                    return false;
                else if (value <= 0)
                    return false;
                else
                    return true;
            } else {
                return true;
            }
        }, "Invalid Value.");

        $.validator.addMethod("chk_state", function(value, element, arg) {

            if ($('input[name=location_type]:checked').val() == "Local") {

                if (value == " " || value == null || value == "null" || value == "undefined" || value == "")
                    return false;
                else
                    return true;
            } else {
                return true;
            }
        }, "Invalid value of state.");

        $.validator.addMethod("chk_type_of_project", function(value, element, arg) {
            if (value == " " || value == null || value == "null" || value == "undefined" || value == "" || value == 0)
                return false;
            else
                return true;
        }, "Invalid value work type.");

        $.validator.addMethod("chk_technologies", function(value, element, arg) {
            if (value == " " || value == null || value == "null" || value == "undefined" || value == "" || value == 0)
                return false;
            else
                return true;
        }, "Invalid technology.");

        $.validator.addMethod("chk_currency", function(value, element, arg) {
            if (value == " " || value == null || value == "null" || value == "undefined" || value == "" || value == 0)
                return false;
            else
                return true;
        }, "Invalid currency.");

        $.validator.addMethod("chk_equivalent_relevant_skills", function(value, element, arg) {
            if (value == " " || value == null || value == "null" || value == "undefined" || value == "" || value == 0)
                return false;
            else
                return true;
        }, "Invalid equivalent relevant skills.");

        $.validator.addMethod("chk_certification", function(value, element, arg) {
            if (value == " " || value == null || value == "null" || value == "undefined" || value == "" || value == 0)
                return false;
            else
                return true;
        }, "Invalid certification.");

        $.validator.addMethod("chk_document", function(value, element, arg) {

            var $fileUpload = $("#document");
            if (parseInt($fileUpload.get(0).files.length) > 3) {
                return false;
            } else {
                return true;
            }
        }, "Maximum 3 documents can be uploaded.");

        $.validator.addMethod("chk_document_size", function(value, element, arg) {

            var files = $('#document').get(0).files;

            var show_error = 0;

            for (var i = 0; i < files.length; i++) {

                var file_size = files[i].size / 1024 / 1024;
                if (file_size > 5) {
                    show_error = 1;
                }
            }

            if (show_error == 1)
                return false;
            else
                return true;
        }, "Max upload size is 5MB.");

        $.validator.addMethod("chk_end_date", function(value, element, arg) {

            var start_date = new Date($("#start_date").val());
            var end_date = new Date(value);
            var start_date_timestamp = start_date.valueOf();
            var end_date_timestamp = end_date.valueOf();

            if (end_date_timestamp <= start_date_timestamp)
                return false;

            if (value == " " || value == null || value == "null" || value == "undefined" || value == "")
                return false;
            else
                return true;

        }, "Invalid date. Last date must be greater then start date.");

        $("#create_project_form").validate({
            rules: {
                project_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 100,
                    noSpaceAtFirstCharacter: true
                },
                payment_type: {
                    required: true
                },
                description: {
                    required: true
                },
                fixed_total_budget: {
                    chk_fixed_total_budget: true
                },
                hourly_rate: {
                    chk_hourly_rate: true
                },
                individual_resource_required: {
                    chk_individual_resource: true
                },
                group_resource_required: {
                    chk_group_resource: true
                },
                state: {
                    chk_state: true
                },
                skills_required: {
                    required: true
                },
                start_date: {
                    required: true
                },
                end_date: {
                    required: true,
                    chk_end_date: true
                },
                last_date_of_bid: {
                    required: true
                },
                'user_skill[]': {
                    required: true
                },
                document: {
                    chk_document: true,
                    chk_document_size: true
                },
                type_of_project: {
                    required: true,
                    chk_type_of_project: true
                },
                technologies: {
                    required: true,
                    chk_technologies: true
                },
                currency: {
                    required: true,
                    chk_currency: true
                },
                education: {
                    required: true,
                },
                equivalent_relevant_skills: {
                    required: true,
                    chk_equivalent_relevant_skills: true
                },
                certification: {
                    required: true,
                    chk_certification: true
                },
                awards: {
                    required: true
                }
            },
            submitHandler: function(form) {
                $("#post_project_btn").addClass("loader_on_button");
                var fd = new FormData();
                fd.append("user_id", $scope.user.id);
                var count_document = document.getElementById('document').files.length;
                for (var x = 0; x < count_document; x++) {
                    fd.append("documents[]", document.getElementById('document').files[x]);
                }
                fd.append("project_name", $("#project_name").val() ? $("#project_name").val() : "null");
                fd.append("description", $("#description").val() ? $("#description").val() : "null");
                fd.append("payment_type", $('input[name=payment_type]:checked').val() ? $('input[name=payment_type]:checked').val() : "null");

                if ($('input[name=payment_type]:checked').val() == "Fixed")
                    fd.append("amount", $('#fixed_total_budget').val() ? $('#fixed_total_budget').val() : "null");
                else if ($('input[name=payment_type]:checked').val() == "Hourly")
                    fd.append("amount", $('#hourly_rate').val() ? $('#hourly_rate').val() : "null");
                else
                    fd.append("amount", "0");

                fd.append("fraalancer_type", $('input[name=fraalancer_type]:checked').val() ? $('input[name=fraalancer_type]:checked').val() : "null");

                if ($('input[name=fraalancer_type]:checked').val() == "Group")
                    fd.append("number_of_freelancer", $('#group_resource_required').val() ? $('#group_resource_required').val() : 1);
                else if ($('input[name=fraalancer_type]:checked').val() == "Individual")
                    fd.append("number_of_freelancer", $('#individual_resource_required').val() ? $('#individual_resource_required').val() : 1);
                else
                    fd.append("number_of_freelancer", 1);


                var user_skill_arr = [];
                $("input.user_skill").each(function() {
                    user_skill_arr.push($(this).val());
                });
                fd.append("skills_of_freelancers", JSON.stringify(user_skill_arr));
                fd.append("location_type", $('input[name=location_type]:checked').val() ? $('input[name=location_type]:checked').val() : "null");

                if ($('input[name=location_type]:checked').val() == "Local")
                    fd.append("locations", $('#state').val() ? $('#state').val() : "null");
                else if ($('input[name=location_type]:checked').val() == "Global")
                    fd.append("locations", "");
                else
                    fd.append("locations", "");

                fd.append("skills_required", $('#skills_required').val() ? $('#skills_required').val() : "null");
                fd.append("start_date", $('#start_date').val() ? $('#start_date').val() : "null");
                fd.append("end_date", $('#end_date').val() ? $('#end_date').val() : "null");

                fd.append("experience_type", $('input[name=experience_type]:checked').val() ? $('input[name=experience_type]:checked').val() : "null");
                fd.append("last_date_of_bid", $('#last_date_of_bid').val() ? $('#last_date_of_bid').val() : "");
                fd.append("currency", $('#currency').val() ? $('#currency').val() : "");

                if ($('input[name=experience_type]:checked').val() == "Aspirant")
                    fd.append("experience_user_rate", "");
                else if ($('input[name=experience_type]:checked').val() == "Experienced")
                    fd.append("experience_user_rate", $('input[name="experience_user_rate"]:checked').val() ? $('input[name="experience_user_rate"]:checked').val() : "Silver");
                else
                    fd.append("experience_user_rate", "");

                fd.append("type_of_project", $('#type_of_project').val() ? $('#type_of_project').val() : "");
                fd.append("technologies", $('#technologies').val() ? $('#technologies').val() : "");

                var certification = [];
                $("#certification").each(function() {
                    certification.push($(this).val());
                });
                fd.append("certification", JSON.stringify(certification[0]));

                fd.append("endorsement", $('input[name="endorsement"]:checked').val() ? $('input[name="endorsement"]:checked').val() : "1");
                fd.append("weekly_availability_of_resource", $('input[name="weekly_availability_of_resource"]:checked').val() ? $('input[name="weekly_availability_of_resource"]:checked').val() : "30");

                var equivalent_relevant_skills = [];
                $("#equivalent_relevant_skills").each(function() {
                    equivalent_relevant_skills.push($(this).val());
                });
                fd.append("equivalent_relevant_skills", JSON.stringify(equivalent_relevant_skills[0]));

                fd.append("education", $('#education').val() ? $('#education').val() : "");
                fd.append("awards", $('#awards').val() ? $('#awards').val() : "");

                ProjectService.create(fd).then(function success(e) {
                    $("#post_project_btn").removeClass("loader_on_button");
                    if (e.data == "1") {
                        $('#create_project_form')[0].reset();
                        $.alert('Project posted successfully!', {
                            title: 'Success!',
                            closeTime: 5000,
                            autoClose: true,
                            position: ["top-right"],
                            type: "success"
                        });
                    }
                }, function error(error) {
                    $("#post_project_btn").removeClass("loader_on_button");
                    $.alert('Something went wrong!', {
                        title: 'Danger!',
                        closeTime: 3000,
                        autoClose: true,
                        position: ["top-right"],
                        type: "danger"
                    });
                });
            }
        });

    }

})();