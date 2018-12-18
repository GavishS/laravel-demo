(function() {
    'use strict';
    angular
            .module('app')
            .controller('RegisterController', RegisterController);
    RegisterController.$inject = ['UserService', '$location', '$rootScope', 'FlashService', '$http', '$scope', 'RegisterService', 'CommanService', 'QualificationDegreesService', 'BanksService', '$routeParams'];
    function RegisterController(UserService, $location, $rootScope, FlashService, $http, $scope, RegisterService, CommanService, QualificationDegreesService, BanksService, $routeParams) {
        var vm = this;

        $(".add_new_card").click(function() {
            $("#second_credit_card_info_div").slideToggle();
        });

        (function initController() {
            $("#secondary_skills_name").select2({maximumSelectionLength: 4});
            $("#country").select2({});
            $("#state").select2({});
            $("#city").select2({});
            $scope.$CommanService = CommanService;
            $scope.years_for_credit_card = [];
            $scope.current_year = new Date().getFullYear();
            $scope.current_year = parseInt($scope.current_year);
            $scope.limit_number_of_year = $scope.current_year + 20;
            $scope.limit_number_of_year = parseInt($scope.limit_number_of_year);
            for (var i = $scope.current_year; i <= $scope.limit_number_of_year; i++) {
                $scope.years_for_credit_card.push(i);
            }

            CommanService.get_all_countries().then(function success(e) {
                $scope.countries_array = e.data;
            }, function error(error) {
            });

            RegisterService.get_all_primary_skills().then(function success(e) {
                $scope.primary_skills_array = e.data;
            }, function error(error) {
            });

            RegisterService.get_all_secondary_skills().then(function success(e) {
                $scope.secondary_skills_array = e.data;
            }, function error(error) {
            });

            QualificationDegreesService.get_all_qualification_degrees().then(function success(e) {
                $scope.qualification_degrees_array = e.data;
            }, function error(error) {
            });

            BanksService.get_all_banks().then(function success(e) {
                $scope.banks_list_array = e.data;
            }, function error(error) {
            });

        })();

        $scope.verify_user_registration = function() {
            RegisterService.verify_user_registration_service($routeParams.token).then(function success(e) {
                if (e.data == "1") {
                    $("#success_message_alert_div #loader").hide();
                    $("#success_message_alert_div #message").show();
                } else {
                    $("#success_message_alert_div").hide();
                    $("#error_message_alert_div").show();
                }
            }, function error() {
                $("#success_message_alert_div").hide();
                $("#error_message_alert_div").show();
            });
        };

        $scope.state = function() {
            CommanService.get_states_from_country($scope.personaldetail.country).then(function success(e) {
                $scope.statelist = e.data;
            }, function error(error) {
            });
        };

        $scope.city = function() {
            CommanService.get_cities_from_state($scope.personaldetail.state).then(function success(e) {
                $scope.citylist = e.data;
            }, function error(error) {
            });
        };
        $scope.filterSkillsCondition = {
            skills: 'PHP'
        };

        $scope.filterSecondarySkillsCondition = {
            skills: 'PHP'
        };

        $scope.skills = {
            type: '1'
        };

        $scope.main_skills = [
            {value: '1', displayName: 'Primary'},
            {value: '2', displayName: 'Secondary'}
        ];

        $scope.primary_skills = [
            {value: 'PHP', displayName: 'PHP'},
            {value: 'neq', displayName: 'ASP.net'},
            {value: 'VB.Net', displayName: 'VB.Net'},
            {value: 'Python', displayName: 'Python'},
            {value: 'Ruby', displayName: 'Ruby'},
            {value: 'Java', displayName: 'Java'},
            {value: 'AngularJS', displayName: 'AngularJS'},
            {value: 'NodeJs', displayName: 'NodeJs'}
        ];

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

        $scope.isObjectEmpty = function(card) {
            return Object.keys(card).length === 0;
        };

        $("#prev_to_billing_details").click(function() {
            $("#personaldetail").removeClass("active");
            $("#skills").removeClass("active");
            $("#billingdetail").addClass("active");
            $("#tab_personaldetail").removeClass("active");
            $("#tab_skills").removeClass("active");
            $("#tab_billingdetail").addClass("active");
        });
        $("#prev_to_personal_details").click(function() {
            $("#skills").removeClass("active");
            $("#billingdetail").removeClass("active");
            $("#personaldetail").addClass("active");
            $("#tab_skills").removeClass("active");
            $("#tab_billingdetail").removeClass("active");
            $("#tab_personaldetail").addClass("active");
        });
        $.validator.addMethod("invalid_country", function(value, element, arg) {
            if (value == "" || value == "0")
                return false;
            else
                return arg !== value;
        }, "Please select Country.");
        $.validator.addMethod("invalid_state", function(value, element, arg) {
            if (value == "" || value == "0")
                return false;
            else
                return arg !== value;
        }, "Please select State.");
        $.validator.addMethod("invalid_city", function(value, element, arg) {
            if (value == "" || value == "0")
                return false;
            else
                return arg !== value;
        }, "Please select City.");
        $.validator.addMethod("invalid_degree", function(value, element, arg) {
            if (value == "")
                return false;
            else
                return arg !== value;
        }, "Please select Degree.");
        $.validator.addMethod("invalid_bank_name", function(value, element, arg) {
            if (value == "")
                return false;
            else
                return arg !== value;
        }, "Please select Bank.");
        $.validator.addMethod("invalid_account_type", function(value, element, arg) {
            if (value == "")
                return false;
            else
                return arg !== value;
        }, "Please select your bank account type.");
        $.validator.addMethod("chk_primary_skills", function(value, element, arg) {
            return arg !== value;
        }, "Please select your bank account type.");
        $.validator.addMethod("chk_secondary_skills", function(value, element, arg) {
            if (value.length == 0)
                return false;
            else
                return true;
        }, "Please select skills.");
        $.validator.addMethod("job_availability", function(value, element, arg) {
            if (value.length == 0)
                return false;
            else
                return true;
        }, "Please select your availability for job.");
        $.validator.addMethod("part_time_job_availability", function(value, element, arg) {
            if (value.length == 0)
                return false;
            else
                return true;
        }, "Please select your availability for job.");

        $.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || (value.match(/[a-zA-Z]/) && value.match(/[0-9]/));
        }, "Password must be a combination of characters & numbers.");

        $.validator.addMethod("chk_cvv", function(value, element) {
            if (value == "") {
                return true;
            } else if (value != "" || value != "null" || value != null || value != "undefined") {
                if (value.length == 3) {
                    return true;
                } else {
                    return false;
                }
            }
        }, "Invalid CVV.");


        $("#personaldetail_form").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 3,
                    maxlength: 15
                },
                lastname: {
                    required: true,
                    minlength: 3,
                    maxlength: 15
                },
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                    minlength: 6,
                    maxlength: 15
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    alphanumeric: true
                },
                confirm_password: {
                    equalTo: "#password"
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                address: {
                    required: true,
                    minlength: 15,
                    maxlength: 200
                },
                country: {
                    invalid_country: "0"
                },
                state: {
                    invalid_state: "0"
                },
                city: {
                    invalid_city: "0"
                },
                degree: {
                    invalid_degree: "0"
                },
                availability: {
                    job_availability: "0"
                },
                part_time_availability: {
                    part_time_job_availability: "0"
                },
                organizationname: {
                    required: true
                },
                organizationadd: {
                    required: true,
                    maxlength: 300
                },
                organizationtime: {
                    required: true
                },
                user_photo: {
                    required: true
                }
            },
            messages: {
                firstname: {
                    minlength: "Minimum 3 characters.",
                    maxlength: "Maximum 15 characters."
                },
                lastname: {
                    minlength: "Minimum 3 characters.",
                    maxlength: "Maximum 15 characters."
                },
                email: {
                    email: "Invalid Email Address"
                },
                username: {
                    minlength: "Minimum 6 characters.",
                    maxlength: "Maximum 15 characters."
                },
                password: {
                    minlength: "Minimum 8 characters.",
                    maxlength: "Maximum 20 characters."
                },
                confirm_password: {
                    equalTo: "Enter Confirm Password Same as Password."
                },
                phone: {
                    minlength: "Minimum 10 characters.",
                    maxlength: "Maximum 10 characters.",
                    number: "Invalid Phone Number."
                },
                address: {
                    minlength: "Minimum 15 characters.",
                    maxlength: "Maximum 200 characters."
                },
                organizationadd: {
                    maxlength: "Maximum 300 characters."
                }
            },
            submitHandler: function(form) {
                $("#personaldetail_form_submit").addClass("loader_on_button");
                RegisterService.check_unique_username_email($scope.personaldetail.username, $scope.personaldetail.email).
                        then(function success(e) {
                    $("#personaldetail_form_submit").removeClass("loader_on_button");
                    if (e.data == 1) {
                        $("#personaldetail_error p").html("This email address is not available.");
                        $("#personaldetail_error").show().delay(7000).fadeOut();
                        $('html, body').animate({scrollTop: ($('#personaldetail_error').offset().top - 300)}, 2000);
                    } else if (e.data == 2) {
                        $("#personaldetail_error p").html("This username is not available.");
                        $("#personaldetail_error").show().delay(7000).fadeOut();
                        $('html, body').animate({scrollTop: ($('#personaldetail_error').offset().top - 300)}, 2000);
                    } else {
                        $("#personaldetail").removeClass("active");
                        $("#billingdetail").addClass("active");
                        $('html, body').animate({scrollTop: ($('#billingdetail').offset().top - 300)}, 2000);
                        var step = 33;
                        var percent = (parseInt(step) / 100) * 100;

                        $('.progress-bar').css({width: percent + '%'});
                        $('.progress-bar').text("33%");
                    }
                }, function error(error) {
                    $("#personaldetail_form_submit").removeClass("loader_on_button");
                });
            }
        });

        $("#billingdetail_form").validate({
            rules: {
                first_card_number: {
                    number: true
                },
                second_card_number: {
                    number: true
                },
                first_card_month: {
                    number: true
                },
                second_card_month: {
                    number: true
                },
                first_card_cvv: {
                    number: true,
                    chk_cvv: true
                },
                second_card_cvv: {
                    number: true,
                    chk_cvv: true
                },
                first_card_exp_year: {
                    number: true
                },
                second_card_exp_year: {
                    number: true
                }
            },
            submitHandler: function(form) {
                $("#personaldetail").removeClass("active");
                $("#billingdetail").removeClass("active");
                $("#skills").addClass("active");
                $('html, body').animate({scrollTop: ($('#skills').offset().top - 300)}, 2000);
                if ($("#first_card_owner").val() != "undefined" && $("#first_card_owner").val() != "" && $("#first_card_owner").val() != "null"
                        && $("#first_card_cvv").val() != "undefined" && $("#first_card_cvv").val() != "" && $("#first_card_cvv").val() != "null" &&
                        $("#first_card_number").val() != "undefined" && $("#first_card_number").val() != "" && $("#first_card_number").val() != "null" &&
                        $("#first_card_exp_month").val() != "undefined" && $("#first_card_exp_month").val() != "" && $("#first_card_exp_month").val() != "null" &&
                        $("#first_card_exp_year").val() != "undefined" && $("#first_card_exp_year").val() != "" && $("#first_card_exp_year").val() != "null") {
                    var step = 66;
                    var percent = (parseInt(step) / 100) * 100;

                    $('.progress-bar').css({width: percent + '%'});
                    $('.progress-bar').text("66%");
                } else {
                    var step = 33;
                    var percent = (parseInt(step) / 100) * 100;

                    $('.progress-bar').css({width: percent + '%'});
                    $('.progress-bar').text("33%");
                }
            }
        });
        $("#skills_form").validate({
            rules: {
                primary_skills_name: {
                    required: true
                },
                secondary_skills_name: {
                    required: true
                }
            },
            submitHandler: function(form) {
                $("#submit_user_register_btn").addClass("loader_on_button");
                $("#personaldetail_form_submit").addClass("loader_on_button");
                $(".previous_btn").attr("disabled",true);
                var user_photo = document.getElementById('user-photo');
                var bank_proof = document.getElementById('bank_proof');
                var identity_proof = document.getElementById('identity_proof');
                var fd = new FormData();
                fd.append("user_photo", user_photo.files[0] ? user_photo.files[0] : null);
                fd.append("firstname", $scope.personaldetail.firstname ? $scope.personaldetail.firstname : null);
                fd.append("lastname", $scope.personaldetail.lastname ? $scope.personaldetail.lastname : null);
                fd.append("user_type", 2);
                fd.append("email", $scope.personaldetail.email ? $scope.personaldetail.email : null);
                fd.append("username", $scope.personaldetail.username ? $scope.personaldetail.username : null);
                fd.append("password", $scope.personaldetail.password ? $scope.personaldetail.password : null);
                fd.append("phone", $scope.personaldetail.phone ? $scope.personaldetail.phone : null);
                fd.append("address", $scope.personaldetail.address ? $scope.personaldetail.address : null);
                fd.append("address2", $scope.personaldetail.address2 ? $scope.personaldetail.address2 : "");
                fd.append("country", $scope.personaldetail.country ? $scope.personaldetail.country : null);
                fd.append("state", $scope.personaldetail.state ? $scope.personaldetail.state : null);
                fd.append("city", $scope.personaldetail.city ? $scope.personaldetail.city : null);
                fd.append("degree", $scope.personaldetail.degree ? $scope.personaldetail.degree : null);
                fd.append("job_type", $("input[name='forjobdata']:checked").val());

                fd.append("organizationname", $scope.personaldetail.organizationname ? $scope.personaldetail.organizationname : null);
                fd.append("organizationadd", $scope.personaldetail.organizationadd ? $scope.personaldetail.organizationadd : null);
                fd.append("organizationtime", $scope.personaldetail.organizationtime ? $scope.personaldetail.organizationtime : null);
                fd.append("availability", $scope.personaldetail.availability ? $scope.personaldetail.availability : null);

                fd.append("first_card_owner", $("#first_card_owner").val() ? $("#first_card_owner").val() : null);
                fd.append("first_card_cvv", $("#first_card_cvv").val() ? $("#first_card_cvv").val() : null);
                fd.append("first_card_number", $("#first_card_number").val() ? $("#first_card_number").val() : null);
                fd.append("first_card_exp_month", $("#first_card_exp_month").val() ? $("#account_number").val() : null);
                fd.append("first_card_exp_year", $("#first_card_exp_year").val() ? $("#first_card_exp_year").val() : null);

                fd.append("second_card_owner", $("#second_card_owner").val() ? $("#second_card_owner").val() : null);
                fd.append("second_card_cvv", $("#second_card_cvv").val() ? $("#second_card_cvv").val() : null);
                fd.append("second_card_number", $("#second_card_number").val() ? $("#second_card_number").val() : null);
                fd.append("second_card_exp_month", $("#second_card_exp_month").val() ? $("#second_card_exp_month").val() : null);
                fd.append("second_card_exp_year", $("#second_card_exp_year").val() ? $("#second_card_exp_year").val() : null);

                var secondary_skill_arr = [];
                $.each($("#secondary_skills_name  option:selected"), function() {
                    secondary_skill_arr.push($(this).val());
                });
                fd.append("secondary_skill", JSON.stringify(secondary_skill_arr));
                fd.append("primary_skill", $scope.filterSkillsCondition.skills ? $scope.filterSkillsCondition.skills : "");
                $("#personaldetail_form_submit").addClass("loader_on_button");
                $http.post('/api/user/store', fd, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).then(function success(e) {
                    $("#submit_user_register_btn").removeClass("loader_on_button");
                    $("#personaldetail_form_submit").removeClass("loader_on_button");
                    $(".previous_btn").removeAttr("disabled");

                    if ($("#first_card_owner").val() != "undefined" && $("#first_card_owner").val() != "" && $("#first_card_owner").val() != "null"
                            && $("#first_card_cvv").val() != "undefined" && $("#first_card_cvv").val() != "" && $("#first_card_cvv").val() != "null" &&
                            $("#first_card_number").val() != "undefined" && $("#first_card_number").val() != "" && $("#first_card_number").val() != "null" &&
                            $("#first_card_exp_month").val() != "undefined" && $("#first_card_exp_month").val() != "" && $("#first_card_exp_month").val() != "null" &&
                            $("#first_card_exp_year").val() != "undefined" && $("#first_card_exp_year").val() != "" && $("#first_card_exp_year").val() != "null") {
                        var step = 100;
                        var percent = (parseInt(step) / 100) * 100;

                        $('.progress-bar').css({width: percent + '%'});
                        $('.progress-bar').text("100%");
                    } else {
                        var step = 66;
                        var percent = (parseInt(step) / 100) * 100;

                        $('.progress-bar').css({width: percent + '%'});
                        $('.progress-bar').text("66%");
                    }

                    $('#personaldetail_form')[0].reset();
                    $('#billingdetail_form')[0].reset();
                    $('#skills_form')[0].reset();
                    $.alert(" <strong>A verification link has been sent to your email address. Please verify your account.</strong> ", {
                        title: 'Thank You For Registring!',
                        closeTime: 5000,
                        autoClose: true,
                        position: ["top-center"],
                        type: "success"
                    });
                }, function error(error) {
                    $("#submit_user_register_btn").removeClass("loader_on_button");
                    $("#personaldetail_form_submit").removeClass("loader_on_button");
                    $(".previous_btn").removeAttr("disabled");
                    alert("Something Went Wrong! Please try again later.")
                });
            }
        });


        $(document).on("change", ".chk_image", function() {
            var ext = $('.chk_image').val().split('.').pop().toLowerCase();
            if (this.files[0].size >= 5242880) {
                alert("Your file was larger than 5 Megabytes in size.");
                $(this).val('');
            } else if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert('invalid file! Upload only images.');
                $(this).val('');
            }
        });

        $("#business_personaldetail_form").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 3,
                    maxlength: 15
                },
                lastname: {
                    required: true,
                    minlength: 3,
                    maxlength: 15
                },
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                    minlength: 6,
                    maxlength: 15
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    alphanumeric: true
                },
                confirm_password: {
                    equalTo: "#password"
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                address: {
                    required: true,
                    minlength: 15,
                    maxlength: 200
                },
                country: {
                    invalid_country: "0"
                },
                state: {
                    invalid_state: "0"
                },
                city: {
                    invalid_city: "0"
                },
                user_photo: {
                    required: true
                }
            },
            messages: {
                firstname: {
                    minlength: "Minimum 3 characters.",
                    maxlength: "Maximum 15 characters."
                },
                lastname: {
                    minlength: "Minimum 3 characters.",
                    maxlength: "Maximum 15 characters."
                },
                email: {
                    email: "Invalid Email Address"
                },
                username: {
                    minlength: "Minimum 6 characters.",
                    maxlength: "Maximum 15 characters."
                },
                password: {
                    minlength: "Minimum 8 characters.",
                    maxlength: "Maximum 20 characters."
                },
                confirm_password: {
                    equalTo: "Enter Confirm Password Same as Password."
                },
                phone: {
                    minlength: "Minimum 10 characters.",
                    maxlength: "Maximum 10 characters.",
                    number: "Invalid Phone Number."
                },
                address: {
                    minlength: "Minimum 15 characters.",
                    maxlength: "Maximum 200 characters."
                }
            },
            submitHandler: function(form) {
                $("#business_personaldetail_submit").addClass("loader_on_button");
                RegisterService.check_unique_username_email($scope.personaldetail.username, $scope.personaldetail.email).
                        then(function success(e) {
                    $("#business_personaldetail_submit").removeClass("loader_on_button");
                    if (e.data == 1) {
                        $("#personaldetail_error p").html("This email address is not available.");
                        $("#personaldetail_error").show().delay(7000).fadeOut();
                        $('html, body').animate({scrollTop: ($('#personaldetail_error').offset().top - 300)}, 2000);
                    } else if (e.data == 2) {
                        $("#personaldetail_error p").html("This username is not available.");
                        $("#personaldetail_error").show().delay(7000).fadeOut();
                        $('html, body').animate({scrollTop: ($('#personaldetail_error').offset().top - 300)}, 2000);
                    } else {
                        $("#personaldetail").removeClass("active");
                        $("#billingdetail").addClass("active");
                        $('html, body').animate({scrollTop: ($('#billingdetail').offset().top - 300)}, 2000);
                        var step = 50;
                        var percent = (parseInt(step) / 100) * 100;

                        $('.progress-bar').css({width: percent + '%'});
                        $('.progress-bar').text("50%");
                    }
                }, function error(error) {
                    $("#business_personaldetail_submit").removeClass("loader_on_button");
                });
            }
        });

        $("#business_billingdetail_form").validate({
            rules: {
                first_card_number: {
                    number: true
                },
                second_card_number: {
                    number: true
                },
                first_card_month: {
                    number: true
                },
                second_card_month: {
                    number: true
                },
                first_card_cvv: {
                    number: true,
                    chk_cvv: true
                },
                second_card_cvv: {
                    number: true,
                    chk_cvv: true
                },
                first_card_exp_year: {
                    number: true
                },
                second_card_exp_year: {
                    number: true
                }
            },
            submitHandler: function(form) {
                $("#submit_billing_details").addClass("loader_on_button");
                $(".previous_btn").attr("disabled",true);
                var user_photo = document.getElementById('user-photo');
                var bank_proof = document.getElementById('bank_proof');
                var identity_proof = document.getElementById('identity_proof');
                var fd = new FormData();
                fd.append("user_photo", user_photo.files[0] ? user_photo.files[0] : "");
                fd.append("firstname", $("#firstname").val() ? $("#firstname").val() : "");
                fd.append("lastname", $("#lastname").val() ? $("#lastname").val() : "");
                fd.append("user_type", 1);
                fd.append("email", $("#email").val() ? $("#email").val() : "");
                fd.append("username", $("#username").val() ? $("#username").val() : "");
                fd.append("password", $("#password").val() ? $("#password").val() : "");
                fd.append("phone", $("#phone").val() ? $("#phone").val() : "");
                fd.append("address", $("#address").val() ? $("#address").val() : "");
                fd.append("address2", $("#address2").val() ? $("#address2").val() : "");
                fd.append("country", $("#country").val() ? $("#country").val() : "");
                fd.append("state", $("#state").val() ? $("#state").val() : "");
                fd.append("city", $("#city").val() ? $("#city").val() : "");

                fd.append("first_card_owner", $("#first_card_owner").val() ? $("#first_card_owner").val() : "");
                fd.append("first_card_cvv", $("#first_card_cvv").val() ? $("#first_card_cvv").val() : "");
                fd.append("first_card_number", $("#first_card_number").val() ? $("#first_card_number").val() : "");
                fd.append("first_card_exp_month", $("#first_card_exp_month").val() ? $("#first_card_exp_month").val() : "");
                fd.append("first_card_exp_year", $("#first_card_exp_year").val() ? $("#first_card_exp_year").val() : "");

                fd.append("second_card_owner", $("#second_card_owner").val() ? $("#second_card_owner").val() : "");
                fd.append("second_card_cvv", $("#second_card_cvv").val() ? $("#second_card_cvv").val() : "");
                fd.append("second_card_number", $("#second_card_number").val() ? $("#second_card_number").val() : "");
                fd.append("second_card_exp_month", $("#second_card_exp_month").val() ? $("#second_card_exp_month").val() : "");
                fd.append("second_card_exp_year", $("#second_card_exp_year").val() ? $("#second_card_exp_year").val() : "");

                $http.post('/api/user/storeBusinessUser', fd, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).then(function success(e) {
                    $("#submit_billing_details").removeClass("loader_on_button");
                    $(".previous_btn").removeAttr("disabled");
                    if ($("#first_card_owner").val() != "undefined" && $("#first_card_owner").val() != "" && $("#first_card_owner").val() != "null"
                            && $("#first_card_cvv").val() != "undefined" && $("#first_card_cvv").val() != "" && $("#first_card_cvv").val() != "null" &&
                            $("#first_card_number").val() != "undefined" && $("#first_card_number").val() != "" && $("#first_card_number").val() != "null" &&
                            $("#first_card_exp_month").val() != "undefined" && $("#first_card_exp_month").val() != "" && $("#first_card_exp_month").val() != "null" &&
                            $("#first_card_exp_year").val() != "undefined" && $("#first_card_exp_year").val() != "" && $("#first_card_exp_year").val() != "null") {
                        var step = 100;
                        var percent = (parseInt(step) / 100) * 100;

                        $('.progress-bar').css({width: percent + '%'});
                        $('.progress-bar').text("100%");
                    } else {
                        var step = 50;
                        var percent = (parseInt(step) / 100) * 100;

                        $('.progress-bar').css({width: percent + '%'});
                        $('.progress-bar').text("50%");
                    }
                    $('#business_personaldetail_form')[0].reset();
                    $('#business_billingdetail_form')[0].reset();
                    $.alert(" <strong>A verification link has been sent to your email address. Please verify your account.</strong> ", {
                        title: 'Thank You For Registring!',
                        closeTime: 5000,
                        autoClose: true,
                        position: ["top-center"],
                        type: "success"
                    });
                }, function error(error) {
                    $("#submit_billing_details").removeClass("loader_on_button");
                    $(".previous_btn").removeAttr("disabled");
                    alert("Something Went Wrong! Please try again later.");
                });
            }
        });
    }

})();
