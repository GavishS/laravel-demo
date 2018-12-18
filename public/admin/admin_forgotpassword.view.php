<section>
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Retrieve password</h2>
        <hr class="star-dark mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form name="retrieve_password" id="retrieve_password_form" novalidate="novalidate">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>UserName / Email</label>
                            <input class="form-control" name="username_email" id="username_email" type="text" placeholder="UserName / Email" ng-model="signin.username_email">
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group mr-top">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <a class=" text-info" href="#!/admin">Login</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <input class="btn btn-primary" type="submit" id="retrieve_password_btn" name="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>