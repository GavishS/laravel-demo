<div class="row">
	<div class="col-sm-4 col-sm-offset-1"  style="margin-bottom:5px" >	
		<h5 style="font-size: 80px;"> Glocals </h5>
	</div>
</div>
<div class="col-md-6 login_form_div">
    <h2>Login</h2>
    <form name="form" ng-submit="vm.login()" role="form">
        <div class="form-group" ng-class="{ 'has-error': form.username.$dirty && form.username.$error.required }">
		<div class="row">
				<label for="username" class="col-sm-3 col-form-label">Username</label>
			<div class="col-sm-9">	
				<input type="text" name="username" id="username" class="form-control" ng-model="vm.username" required />
				<span ng-show="form.username.$dirty && form.username.$error.required" class="help-block">Username is required</span>
			</div>	
		</div>	
        </div>
        <div class="form-group" ng-class="{ 'has-error': form.password.$dirty && form.password.$error.required }">
		<div class="row">
				<label for="password" class="col-sm-3 col-form-label">Password</label>
			<div class="col-sm-9">		
				<input type="password" name="password" id="password" class="form-control" ng-model="vm.password" required />
				<span ng-show="form.password.$dirty && form.password.$error.required" class="help-block">Password is required</span>
			</div>
		</div>	
        </div>
        <div class="form-group ">
		<div class="row">
				<div class="col-sm-12">
            <button type="submit" ng-disabled="form.$invalid || vm.dataLoading" class="form-control btn login_submit_btn">Login</button>
            <img ng-if="vm.dataLoading" src="data:image/gif;base64,R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==" />
			</div>
			</div>	
            
        </div>
		
		<div class="form-group ">
			<div class="row">
				<div class="col-sm-12">
						<a href="#!/register" class="form-control btn register_submit_btn" id="submit" name="submit" value="">Sign Up</a>
				</div>
			</div>
		</div>
		<div class="form-group ">
			<div class="row">
				<div class="col-sm-12">
						<a href="#" class="text-muted">Forgot Your Password ?</a>
				</div>
			</div>
		</div>
		
    </form>
</div>
