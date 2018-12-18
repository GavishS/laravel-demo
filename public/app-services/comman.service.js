(function() {
    'use strict';

    angular
            .module('app')
            .factory('CommanService', CommanService);

    CommanService.$inject = ['$timeout', '$filter', '$q', '$http', '$location'];
    function CommanService($timeout, $filter, $q, $http, $location) {

        var service = {};

        service.enableNavLinks = enableNavLinks;
        service.logout = logout;
        service.openNav = openNav;
        service.closeNav = closeNav;
        service.get_all_countries = get_all_countries;
        service.get_states_from_country = get_states_from_country;
        service.get_cities_from_state = get_cities_from_state;
        service.check_business_login = check_business_login;
        service.check_user_login = check_user_login;
        service.timer = timer;


        var templates = {
            prefix: "",
            suffix: " ago",
            seconds: "less than a minute",
            minute: "about a minute",
            minutes: "%d minutes",
            hour: "about an hour",
            hours: "about %d hours",
            day: "a day",
            days: "%d days",
            month: "about a month",
            months: "%d months",
            year: "about a year",
            years: "%d years"
        };
        function template(t, n) {
            return templates[t] && templates[t].replace(/%d/i, Math.abs(Math.round(n)));
        }
        ;
        function timer(time) {
            if (!time)
                return;
            time = time.replace(/\.\d+/, ""); // remove milliseconds
            time = time.replace(/-/, "/").replace(/-/, "/");
            time = time.replace(/T/, " ").replace(/Z/, " UTC");
            time = time.replace(/([\+\-]\d\d)\:?(\d\d)/, " $1$2"); // -04:00 -> -0400
            time = new Date(time * 1000 || time);

            var now = new Date();
            var seconds = ((now.getTime() - time) * .001) >> 0;
            var minutes = seconds / 60;
            var hours = minutes / 60;
            var days = hours / 24;
            var years = days / 365;

            return templates.prefix + (
                    seconds < 45 && template('seconds', seconds) || seconds < 90 && template('minute', 1) || minutes < 45 && template('minutes', minutes) || minutes < 90 && template('hour', 1) || hours < 24 && template('hours', hours) || hours < 42 && template('day', 1) || days < 30 && template('days', days) || days < 45 && template('month', 1) || days < 365 && template('months', days / 30) || years < 1.5 && template('year', 1) || template('years', years)) + templates.suffix;
        }
        ;

        return service;

        function enableNavLinks() {
            $(".nav-link").trigger('click');
        }

        function logout() {
            localStorage.removeItem("current_user");
            localStorage.removeItem("login_token");
            localStorage.removeItem("current_user_type");
            $location.path('/');
        }

        /* Open when someone clicks on the span element */
        function openNav() {
            document.getElementById("overlay_nav").style.width = "100%";
        }

        /* Close when someone clicks on the "x" symbol inside the overlay */
        function closeNav() {
            document.getElementById("overlay_nav").style.width = "0%";
        }

        function get_all_countries() {
            return $http({
                method: 'GET',
                url: 'api/countries/get_all_countries'
            });
        }

        function get_states_from_country(country_id) {
            return $http({
                method: 'POST',
                data: {
                    'country_id': country_id,
                },
                url: '/api/states/get_country_state'
            });
        }

        function get_cities_from_state(state_id) {
            return $http({
                method: 'POST',
                data: {
                    'state_id': state_id,
                },
                url: '/api/cities/get_state_city'
            });
        }

        function check_business_login() {
            if (localStorage.getItem("current_user") === null) {
                $location.path('/');
            } else if (localStorage.getItem("current_user_type") != "1") {
                $location.path('/');
            }
        }

        function check_user_login() {
            if (localStorage.getItem("current_user") === null) {
                $location.path('/');
            } else if (localStorage.getItem("current_user_type") != "2") {
                $location.path('/');
            }
        }
    }
})();