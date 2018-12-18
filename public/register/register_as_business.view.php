<?php include_once '../header_menu_2.html'; ?>
<section id="">
   <div class="container box_main">
      <h2 class="register_title text-center text-uppercase text-secondary mb-0">BUSINESS REGISTRATION</h2>
      <hr class="star-dark mb-5">
      <div class="row">
         <div class="col-lg-8 mx-auto">
            <div class="col-sm-12 row customer_main">
               <form id="msform">
                  <div class="progress progress_main">
                     <div class="progress-bar progress-bar-success progress_bar_main" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 0%;">                                <span class="fixed_set">0&nbsp;%</span>                            </div>
                  </div>
               </form>
            </div>
            <div class="tab-content" >
               <div role="tabpanel" class="tab-pane active" id="personaldetail">
                  <form name="business_personaldetail_form" id="business_personaldetail_form" novalidate="novalidate" class="ng-pristine ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength" enctype="multipart/form-data">
                     <div class="alert alert-danger alert-dismissible" id="personaldetail_error" style="display: none;">
                        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>                                
                        <p class="text_message"></p>
                     </div>
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">                                    <label>first Name</label>                                    <input class="form-control required" ng-model="personaldetail.firstname" id="firstname" name="firstname" type="text" placeholder="First Name" required="required" data-validation-required-message="Please enter your User name.">                                </div>
                     </div>
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">                                    <label>Last Name</label>                                    <input class="form-control" ng-model="personaldetail.lastname" id="lastname" name="lastname" type="text" placeholder="Last Name" required="required" data-validation-required-message="Please enter your User name.">                                </div>
                     </div>
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">                                    <label>Email Address</label>                                    <input class="form-control" ng-model="personaldetail.email" id="email" name="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">                                </div>
                     </div>
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">                                    <label>User Name</label>                                    <input class="form-control" ng-model="personaldetail.username" id="username" name="username" type="text" placeholder="User Name" required="required" data-validation-required-message="Please enter your User name.">                                </div>
                     </div>
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">                                    <label>Password</label>                                    <input class="form-control" ng-model="personaldetail.password" id="password" name="password" type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your Password.">                                </div>
                     </div>
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">                                    <label>Password</label>                                    <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password" required="required" data-validation-required-message="Please enter your Password.">                                </div>
                     </div>
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">                                    <label>Phone Number</label>                                    <input class="form-control" ng-model="personaldetail.phone" id="phone" name="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">                                </div>
                     </div>
                     <div class="control-group">
                        <div class="form-group">                                    <label>Photo</label>                                    <input class="form-control chk_image" ng-model="personaldetail.user_photo" id="user-photo" name="user_photo" type="file" placeholder="Photo"  accept="image/*" />                                </div>
                     </div>
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">                                    <label for="address">Address Line 1</label>                                    <textarea class="form-control" ng-model="personaldetail.address" id="address" name="address"  placeholder="Address Line 1" required="required"></textarea>                                </div>
                     </div>
                     <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">                                    <label for="address2">Address Line 2</label>                                    <textarea class="form-control" ng-model="personaldetail.address_line_2" id="address2" name="address2"  placeholder="Address Line 2"></textarea>                                </div>
                     </div>
                     <div class="control-group registeration_select2">
                        <div class="form-group mb-0 pb-2">
                           <select class="form-control reg-dropdown" ng-model="personaldetail.country"  id="country" name="country" ng-change="state()">
                              <option value="">Please Select Country</option>
                              <option data-ng-repeat="obj in countries_array" value="{{obj.id}}">{{obj.name}}</option>
                           </select>
                        </div>
                     </div>
                     <div class="control-group registeration_select2">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                           <select class="form-control reg-dropdown" ng-model="personaldetail.state" id="state" name="state" ng-change="city()">
                              <option value="">Please Select State</option>
                              <option data-ng-repeat="t in statelist" value="{{t.id}}">{{t.name}}</option>
                           </select>
                        </div>
                     </div>
                     <div class="control-group registeration_select2">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                           <select class="form-control reg-dropdown" ng-model="personaldetail.city" id="city" name="city">
                              <option value="">Please Select City</option>
                              <option data-ng-repeat="t in citylist" value="{{t.id}}">{{t.name}}</option>
                           </select>
                        </div>
                     </div>
                     <div id="success"></div>
                     <div class="form-group">                                <button type="submit" id="business_personaldetail_submit" class="btn btn-primary btn-xl w-100per">Next</button>                            </div>
                  </form>
               </div>
               <div role="tabpanel" class="tab-pane" id="billingdetail">
                  <form name="business_billingdetail_form" id="business_billingdetail_form" novalidate="novalidate" class="ng-pristine ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength" enctype="multipart/form-data">
                     <div id="first_credit_card_info_div">
                        <div class="creditCardForm">
                           <div class="heading">
                              <h1>Card #1</h1>
                           </div>
                           <div class="payment">
                              <div class="form-group owner">                                            <label for="first_card_owner">Owner</label>                                            <input type="text" class="form-control" id="first_card_owner" name="first_card_owner" ng-model="billingdetail.first_card_owner">                                        </div>
                              <div class="form-group CVV">                                            <label for="first_card_cvv">CVV</label>                                            <input type="text" class="form-control" id="first_card_cvv" name="first_card_cvv" ng-model="billingdetail.first_card_cvv">                                        </div>
                              <div class="form-group" id="card-number-field">                                            <label for="cardNumber">Card Number</label>                                            <input type="text" class="form-control" id="first_card_number" name="first_card_number" ng-model="billingdetail.first_card_number">                                        </div>
                              <div class="form-group" id="expiration-date">
                                 <label>Expiration Date</label>                                            
                                 <select name="first_card_exp_month" id="first_card_exp_month" ng-model="billingdetail.first_card_exp_month">
                                    <option value="" >Month</option>
                                    <option value="01" >January</option>
                                    <option value="02">February </option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                 </select>
                                 <select name="first_card_exp_year" id="first_card_exp_year" ng-model="billingdetail.first_card_exp_year">
                                    <option value="">Year</option>
                                    <option ng-repeat="year in years_for_credit_card" value="{{year}}">{{year}}</option>
                                 </select>
                              </div>
                              <div class="form-group" id="credit_cards">
                                 <img src="public/app-content/images/visa.jpg" id="visa">                                            <img src="public/app-content/images/mastercard.jpg" id="mastercard">                                            <img src="public/app-content/images/amex.jpg" id="amex">                                            
                                 <div class="flt_r add_new_card">                                                <span class="text-info"><i class="fa fa-plus"></i> Add new card</span>                                            </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="second_credit_card_info_div" style="display: none;">
                        <div class="creditCardForm">
                           <div class="heading">
                              <h1>Card #2</h1>
                           </div>
                           <div class="payment">
                              <div class="form-group owner">                                            <label for="second_card_owner">Owner</label>                                            <input type="text" class="form-control" id="second_card_owner" name="second_card_owner" ng-model="billingdetail.second_card_owner">                                        </div>
                              <div class="form-group CVV">                                            <label for="second_card_cvv">CVV</label>                                            <input type="text" class="form-control" id="second_card_cvv" name="second_card_cvv" ng-model="billingdetail.second_card_cvv">                                        </div>
                              <div class="form-group" id="card-number-field">                                            <label for="cardNumber">Card Number</label>                                            <input type="text" class="form-control"  id="second_card_number" name="second_card_number" ng-model="billingdetail.second_card_number">                                        </div>
                              <div class="form-group" id="expiration-date">
                                 <label>Expiration Date</label>                                            
                                 <select id="second_card_exp_month" name="second_card_exp_month" ng-model="billingdetail.second_card_month">
                                    <option value="">Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February </option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                 </select>
                                 <select id="second_card_exp_year" name="second_card_exp_year" ng-model="billingdetail.second_card_exp_year">
                                    <option value="">Year</option>
                                    <option ng-repeat="year in years_for_credit_card" value="{{year}}">{{year}}</option>
                                 </select>
                              </div>
                              <div class="form-group" id="credit_cards">                                            <img src="app-content/images/visa.jpg" id="visa">                                            <img src="app-content/images/mastercard.jpg" id="mastercard">                                            <img src="app-content/images/amex.jpg" id="amex">                                        </div>
                           </div>
                        </div>
                     </div>
                     <div id="success"></div>
                     <div class="form-group">                                <button type="submit" id="submit_billing_details" class="btn btn-primary btn-xl w-100per">Next</button>                            </div>
                     <div class="form-group">                                <button id="prev_to_personal_details" type="button" class="btn btn-info w-100per previous_btn"><< Prev</button>                            </div>
                  </form>
               </div>
               <div role="tabpanel" class="tab-pane " id="skills">
                  <form name="skills_form" id="skills_form" novalidate="novalidate" class="ng-pristine ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength">
                     <div class="control-group skilss_div">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                           <label>Add your Skills</label>                                    
                           <select id="skill_type" name="skill_type" class="form-control" ng-model="skills.type">
                              <option ng-selected="{{skill.value == skills.type}}" ng-repeat="skill in main_skills" value="{{skill.value}}">{{skill.displayName}}                                        </option>
                           </select>
                        </div>
                     </div>
                     <div id="primary_skills_div" class="control-group skilss_div">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                           <label for="skills_name">Primary Skills</label>                                    
                           <select id="primary_skills_name" name="primary_skills_name" class="form-control" ng-model="filterSkillsCondition.skills">
                              <option ng-selected="{{skill.value == filterSkillsCondition.skills}}" ng-repeat="skill in primary_skills" value="{{skill.value}}">{{skill.displayName}}                                        </option>
                           </select>
                        </div>
                     </div>
                     <div id="secondary_skills_div" class="control-group select2_div skilss_div" style="display:none;">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                           <label for="skills_name">Secondary Skills</label>                                    
                           <select id="secondary_skills_name" name="secondary_skills_name" class="form-control" ng-model="filterSecondarySkillsCondition.skills" multiple ng-multiple="true">
                              <option ng-selected="{{skill.value == filterSecondarySkillsCondition.skills}}" ng-repeat="skill in secondary_skills" value="{{skill.value}}">{{skill.displayName}}                                        </option>
                           </select>
                        </div>
                     </div>
                     <div id="success"></div>
                     <div class="form-group">                                <button type="submit" class="btn btn-primary btn-xl w-100per">Submit</button>                            </div>
                     <div class="form-group">                                <button id="prev_to_billing_details" type="button" class="btn btn-info w-100per previous_btn"><< Prev</button>                            </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>        $("[type=file]").on("change", function() {
      var file = this.files[0].name;
      var dflt = $(this).attr("placeholder");
      if ($(this).val() != "") {
          $(this).next().text(file);
      } else {
          $(this).next().text(dflt);
      }
      });
   </script>    <script>        $(document).one('focus.autoExpand', 'textarea.autoExpand', function() {
      var savedValue = this.value;
      this.value = '';
      this.baseScrollHeight = this.scrollHeight;
      this.value = savedValue;
      }).on('input.autoExpand', 'textarea.autoExpand', function() {
      var minRows = this.getAttribute('data-min-rows') | 0, rows;
      this.rows = minRows;
      rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
      this.rows = minRows + rows;
      });
   </script>
</section>
<!-- Contact Section -->