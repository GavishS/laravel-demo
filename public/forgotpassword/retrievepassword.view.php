<?php include_once '../header_menu_2.html'; ?>
<!-- About Section -->
<section id="">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">New Password</h2>
        <hr class="star-dark mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form name="set_new_password_form" id="set_new_password_form" novalidate="novalidate">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>New Password</label>

                            <input class="form-control" id="new_password" type="password" placeholder="New Password" required="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Re-Type Password</label>

                            <input class="form-control" id="retype_password" type="password" placeholder="Re-Type Password" required="required" />
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