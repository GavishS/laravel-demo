<?php 
if ($_SERVER['PHP_SELF'] == "public/home/verify_registration.view.php" || $_SERVER['PHP_SELF'] == "/public/home/verify_registration.view.php")
    include_once '../header_menu_2.html';
?>
<section data-ng-init="verify_user_registration()">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0"></h2>
        <hr class="star-dark mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">

                <div id="return_message_div">
                    <div id="success_message_alert_div" class="alert alert-success">
                        <div class="text-center" id="loader">
                            <h1><i class="fa fa-circle-o-notch fa-spin"></i></h1>
                        </div>
                        <div class="text-center" id="message" style="display: none;">
                            <h3>Your email address has been verified successfully.</h3>
                            <A href="#!/signin">Click here to login.</A>
                        </div>
                    </div>

                    <div id="error_message_alert_div" class="alert alert-danger" style="display: none;">
                        <div class="text-center" id="message">
                            <h3>Something went wrong.</h3>
                            <span>Please try again later.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="star-dark mb-5">
    </div>
</section>
<?php 
if ($_SERVER['PHP_SELF'] == "public/home/verify_registration.view.php" || $_SERVER['PHP_SELF'] == "/public/home/verify_registration.view.php")
    include_once '../footer_2.html'; ?>