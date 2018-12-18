<section>
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Sign In</h2>
        <hr class="star-dark mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form id="admin-login" name="admin-login">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>UserName</label>
                            <input class="form-control" id="username" name="username" ng-model="signin.username" type="text" placeholder="UserName">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Password</label>
                            <input class="form-control" id="password" name="password" ng-model="signin.password" type="password" placeholder="Password">
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div id="invalid_login_div" style="text-align: center;position:absolute;display:none;" class="text-danger">
                        <label>Invalid Credentials!</label>
                    </div>
                    <div class="form-group mr-top">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <a class=" text-info" href="#!/admin/change_password">Change Password</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <input class="btn btn-primary" type="submit" id="sign_in_btn" name="submit" value="Sign In">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>