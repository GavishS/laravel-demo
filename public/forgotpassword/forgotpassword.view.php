<?php include_once '../header_menu_2.html'; ?>
<section id="">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Retrieve password</h2>
        <hr class="star-dark mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form name="retrieve_password" id="retrieve_password_form" novalidate="novalidate">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>UserName / Email</label>
                            <input class="form-control" name="username_email" id="username_email" type="text" placeholder="UserName / Email" required="required" data-validation-required-message="Please enter your Username or Email.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl w-100per" id="submit_btn">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<?php include_once '../footer_2.html'; ?>