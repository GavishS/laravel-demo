<?php require_once "../business_header_menu_after_login.html"; ?>
<section class="section_main">
    <div class="container-fluid">
        <div class="pad-1-per ng-scope ">
            <div class="shadow">
                <div class="well padding0 bcolor-w border-3 set_job_ham">
                    <div class="container padding-bottom5 max-w-100-per set_job_ham">
                        <h3 class=" font-s18 col-g padding-top15-px cust_breadcrumb font_job_mob">DASHBOARD &nbsp 
                            <i class="fa fa-caret-right"></i>
                            <b> &nbspProject </b>
                        </h3>
                        <button ng-click="$CommanService.openNav();" class="navbar-toggler humburger_btn" type="button">
                            <span class="white-text"><i class="fa fa-bars fa-1x"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- The overlay -->
        <div id="overlay_nav" class="overlay">

            <!-- Button to close the overlay navigation -->
            <a href="javascript:void(0)" class="closebtn" ng-click="$CommanService.closeNav();">&times;</a>

            <!-- Overlay content -->
            <div class="overlay-content">
                <a href="">Create a Project</a>
                <a href="">Create An RFP</a>
                <a href="">Create An RFI</a>
            </div>

        </div>
        <div class="padding1 " >
            <div class="shadow">

                <div class="col-sm-12 p-l-r">

                    <form id="create_project_form" enctype="multipart/form-data" name="create_project_form" method="POST">
                        <div class="col-sm-12 col-md-12 col-lg-12 create_project_mainform">
                            <div class="container box_main_project">
                                <div class="border-grey">
                                    <h4 class="header_inner"> 
                                        Post Your Job - Start Recieving Proposal Within Minutes 
                                    </h4>
                                </div>
                                <div class="createproject_main">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Give Name To Your Project:</label>
                                        <input type="text" class="form-control set_width" name="project_name" id="project_name" placeholder="Project Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="control-label">Give Some Description About Your Project:</label>
                                        <textarea class="form-control set_width" rows="5" id="description" name="description" placeholder="Description : Looking for an experienced front end developer for a 3-6 month project.I would like a web shop developed with the purpose of selling fashion merchandise directly through my website."></textarea>
                                    </div>


                                    <div class="form-group type_of_project">
                                        <label for="type_of_project" class="control-label">Tell us what type of work you want done ?</label>
                                        <select id="type_of_project" name="type_of_project" class="form-control set_width" ng-model="type_of_projects.type_of_project">
                                            <option value="" selected="" ng-selected>Select Project Type</option>
                                            <option ng-repeat="type in type_of_projects" value="{{type.id}}">
                                                {{type.type_of_project}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group technologies">
                                        <label for="technologies" class="control-label">Technology</label>
                                        <select id="technologies" name="technologies" class="form-control set_width" ng-model="technologies.technology">
                                            <option value="" selected="" ng-selected>Select Technology For Your Project</option>
                                            <option ng-repeat="technology in technologies" value="{{technology.id}}">
                                                {{technology.technology}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 set_pad">
                                        <label class="control-label">Upload Sample And Helpful Document</label>
                                        <input class="form-control" id="document" name="document[]" type="file" placeholder="Document" multiple=""/>
                                    </div>

                                </div>
                            </div>
                            <div class="container box_main_project">
                                <div class="border-grey">
                                    <h4 class="header_inner"> Freelancer Type & Skills </h4>
                                </div>
                                <div class="createproject_main">

                                    <div class="">
                                        <div class="form-group set_box_mob skills_required">
                                            <label for="skills_name" class="control-label">Which Are The Important Skills Required By Freelancers ?</label>
                                            <select id="skills_required" name="skills_required" class="form-control set_width" ng-model="filterSecondarySkillsCondition.skills" multiple ng-multiple="true">
                                                <option ng-selected="{{skill.value == filterSecondarySkillsCondition.skills}}" ng-repeat="skill in secondary_skills" value="{{skill.value}}">{{skill.displayName}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fraalancer_type" class="control-label set_radio"> What Type of Freelancer You Want To Hire:</label>
                                            <div class="col-sm-12 row"> 
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label class="radio_label">
                                                    <span class="radio_label_span">Individual</span>
                                                    <input type="radio" class="resource_type" name="fraalancer_type" value="Individual"  ng-checked="true" checked="checked">
                                                    <span class="radio_checkmark"></span>
                                                </label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label class="radio_label">
                                                    <span class="radio_label_span">Group</span>
                                                    <input type="radio" class="resource_type" name="fraalancer_type" value="Group">
                                                    <span class="radio_checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="resource_data Individual form-group col-sm-9 set_pad">
                                                <label for="fixed_total_budget" class="control-label">How Many Individual You Want to Hire:</label>
                                                <select class="form-control number_of_freelancers set_width" id="individual_resource_required" name="individual_resource_required">
                                                    <option value="">Select Number Of Users</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                            <div class="resource_data Group form-group col-sm-9 set_pad">
                                                <label for="hourly_rate" class="control-label">How Many People You Want In Group:</label>
                                                <select class="form-control number_of_freelancers set_width" id="group_resource_required" name="group_resource_required">
                                                    <option value="">Select Number Of Users In Group</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                            <div id="skills_of_freelancers_div" style="display: none;">
                                                <div class="form-group freelancer_skills resource_data col-sm-9 set_pad set_width">
                                                    <label for="certification" class="control-label" style="display: block;">Skills</label>
                                                    <select id="freelancer_skills" name="freelancer_skills" class="form-control set_width" ng-model="certification.skills" multiple ng-multiple="true">
                                                        <option ng-repeat="skill in freelancer_skills" value="{{skill.id}}">
                                                            {{skill.skill}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container box_main_project">
                                <div class="border-grey">
                                    <h4 class="header_inner"> Payments </h4>
                                </div>
                                <div class="createproject_main">
                                    <div>
                                        <div class="form-group">
                                            <label for="payment_type" class="control-label set_radio">How Would You Like To Pay ?</label>
                                            <div class="col-sm-12 row">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label class="radio_label">
                                                    <span class="radio_label_span">Fixed</span>
                                                    <input type="radio" name="payment_type" class="budget_type" value="Fixed" ng-checked="true" checked="checked">
                                                    <span class="radio_checkmark"></span>
                                                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label class="radio_label">
                                                    <span class="radio_label_span">Hourly</span>
                                                    <input type="radio" name="payment_type" class="budget_type" value="Hourly">
                                                    <span class="radio_checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="budgettypedata Fixed">
                                                <label for="fixed_total_budget" class="control-label">Total Budget:</label>
                                                <input type="text" class="form-control set_width" id="fixed_total_budget" name="fixed_total_budget" placeholder="Total Budget">
                                            </div>
                                            <div class="budgettypedata Hourly" style="display: none;">
                                                <label for="hourly_rate" class="control-label">Hourly Rate(Per Hour Rate):</label>
                                                <input type="text" class="form-control set_width" id="hourly_rate" name="hourly_rate" placeholder="Hourly Rate">
                                            </div>
                                        </div>
                                        <div class="form-group currency_select2 set_currency">
                                            <label for="currency" class="control-label">Currency:</label>
                                            <select name="currency" id="currency" class="form-control">
                                                <option value="USD" selected="selected">United States Dollars</option>
                                                <option value="EUR">Euro</option>
                                                <option value="GBP">United Kingdom Pounds</option>
                                                <option value="DZD">Algeria Dinars</option>
                                                <option value="ARP">Argentina Pesos</option>
                                                <option value="AUD">Australia Dollars</option>
                                                <option value="ATS">Austria Schillings</option>
                                                <option value="BSD">Bahamas Dollars</option>
                                                <option value="BBD">Barbados Dollars</option>
                                                <option value="BEF">Belgium Francs</option>
                                                <option value="BMD">Bermuda Dollars</option>
                                                <option value="BRR">Brazil Real</option>
                                                <option value="BGL">Bulgaria Lev</option>
                                                <option value="CAD">Canada Dollars</option>
                                                <option value="CLP">Chile Pesos</option>
                                                <option value="CNY">China Yuan Renmimbi</option>
                                                <option value="CYP">Cyprus Pounds</option>
                                                <option value="CSK">Czech Republic Koruna</option>
                                                <option value="DKK">Denmark Kroner</option>
                                                <option value="NLG">Dutch Guilders</option>
                                                <option value="XCD">Eastern Caribbean Dollars</option>
                                                <option value="EGP">Egypt Pounds</option>
                                                <option value="FJD">Fiji Dollars</option>
                                                <option value="FIM">Finland Markka</option>
                                                <option value="FRF">France Francs</option>
                                                <option value="DEM">Germany Deutsche Marks</option>
                                                <option value="XAU">Gold Ounces</option>
                                                <option value="GRD">Greece Drachmas</option>
                                                <option value="HKD">Hong Kong Dollars</option>
                                                <option value="HUF">Hungary Forint</option>
                                                <option value="ISK">Iceland Krona</option>
                                                <option value="INR">India Rupees</option>
                                                <option value="IDR">Indonesia Rupiah</option>
                                                <option value="IEP">Ireland Punt</option>
                                                <option value="ILS">Israel New Shekels</option>
                                                <option value="ITL">Italy Lira</option>
                                                <option value="JMD">Jamaica Dollars</option>
                                                <option value="JPY">Japan Yen</option>
                                                <option value="JOD">Jordan Dinar</option>
                                                <option value="KRW">Korea (South) Won</option>
                                                <option value="LBP">Lebanon Pounds</option>
                                                <option value="LUF">Luxembourg Francs</option>
                                                <option value="MYR">Malaysia Ringgit</option>
                                                <option value="MXP">Mexico Pesos</option>
                                                <option value="NLG">Netherlands Guilders</option>
                                                <option value="NZD">New Zealand Dollars</option>
                                                <option value="NOK">Norway Kroner</option>
                                                <option value="PKR">Pakistan Rupees</option>
                                                <option value="XPD">Palladium Ounces</option>
                                                <option value="PHP">Philippines Pesos</option>
                                                <option value="XPT">Platinum Ounces</option>
                                                <option value="PLZ">Poland Zloty</option>
                                                <option value="PTE">Portugal Escudo</option>
                                                <option value="ROL">Romania Leu</option>
                                                <option value="RUR">Russia Rubles</option>
                                                <option value="SAR">Saudi Arabia Riyal</option>
                                                <option value="XAG">Silver Ounces</option>
                                                <option value="SGD">Singapore Dollars</option>
                                                <option value="SKK">Slovakia Koruna</option>
                                                <option value="ZAR">South Africa Rand</option>
                                                <option value="KRW">South Korea Won</option>
                                                <option value="ESP">Spain Pesetas</option>
                                                <option value="XDR">Special Drawing Right (IMF)</option>
                                                <option value="SDD">Sudan Dinar</option>
                                                <option value="SEK">Sweden Krona</option>
                                                <option value="CHF">Switzerland Francs</option>
                                                <option value="TWD">Taiwan Dollars</option>
                                                <option value="THB">Thailand Baht</option>
                                                <option value="TTD">Trinidad and Tobago Dollars</option>
                                                <option value="TRL">Turkey Lira</option>
                                                <option value="VEB">Venezuela Bolivar</option>
                                                <option value="ZMK">Zambia Kwacha</option>
                                                <option value="EUR">Euro</option>
                                                <option value="XCD">Eastern Caribbean Dollars</option>
                                                <option value="XDR">Special Drawing Right (IMF)</option>
                                                <option value="XAG">Silver Ounces</option>
                                                <option value="XAU">Gold Ounces</option>
                                                <option value="XPD">Palladium Ounces</option>
                                                <option value="XPT">Platinum Ounces</option>
                                            </select>
                                        </div>											
                                    </div>

                                </div>
                            </div>
                            <div class="container box_main_project">
                                <div class="border-grey">
                                    <h4 class="header_inner"> Location </h4>
                                </div>
                                <div class="createproject_main">

                                    <div class="">
                                        <label for="location_type" class="control-label">Want To Limit This Job To a Specific Location ?</label>

                                        <div class="set_padding_job row">

                                            <label class="col-md-3 col-sm-4 col-xs-4 cbox_job cbox-p level_radio_label"> 
                                                <span class="level_radio_label_span">kjh</span>
                                                <input type="radio" name="location_type" value="Global" class="level location_type" checked="checked">
                                                <span class="level_radio_checkmark">
                                                    <span class="set_1 font_mob_job">$</span>
                                                    <span class="set_2 font_mob_job"> </span>
                                                    <span class="set_3 font_mob_job"> Global </span>
                                                    <span class="set_4 font_mob_job set_star_mob"> <i class="fa fa-star"> </i><i class="fa fa-star star_style"></i> <i class="fa fa-star"></i></span>


                                                </span>
                                            </label>
                                            <label class="col-md-3 col-sm-4 col-xs-4 cbox_job cbox-p level_radio_label"> 
                                                <span class="level_radio_label_span"></span>
                                                <input type="radio" name="location_type" value="Local" class="level location_type">
                                                <span class="level_radio_checkmark">
                                                    <span class="set_1 font_mob_job">$$</span>
                                                    <span class="set_2 font_mob_job">  </span>
                                                    <span class="set_3 font_mob_job"> Local </span>
                                                    <span class="set_4 font_mob_job set_star_mob"> <i class="fa fa-star"></i> <i class="fa fa-star star_style"></i> <i class="fa fa-star"></i><i class="fa fa-star"></i> </span>


                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group local_state_div" id="local_state_div">
                                        <label for="state" class="control-label " style="display: block;">State:</label>
                                        <select name="state" id="state" class="form-control set_width" multiple ng-multiple="true" ng-model="filterSecondarySkillsCondition.skillsa">
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Orissa">Orissa</option>
                                            <option value="Pondicherry">Pondicherry</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttaranchal">Uttaranchal</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="container box_main_project">
                                <div class="border-grey">
                                    <h4 class="header_inner"> Work Period </h4>
                                </div>
                                <div class="createproject_main">

                                    <div class="row">
                                        <div class="form-group col-sm-6 set_box_mob">
                                            <label for="start_date" class="control-label">Start Date:</label>
                                            <input type="text" name="start_date" id="start_date" class="form-control datepicker" placeholder="Project Start Date">
                                        </div>

                                        <div class="form-group col-sm-6 set_box_mob ">
                                            <label for="end_date" class="control-label">End Date:</label>
                                            <input type="text" name="end_date" id="end_date" class="form-control datepicker set_enddate" placeholder="Project End Date">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6 set_box_mob">
                                            <label for="end_date" class="control-label">What is The Deadline To Apply ?</label>
                                            <input type="text" name="last_date_of_bid" id="last_date_of_bid" class="form-control datepicker" placeholder="Last Date For Nomination">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container box_main_project">
                                <div class="border-grey">
                                    <h4 class="header_inner"> Availability </h4>
                                </div>
                                <div class="createproject_main">
                                    <div class="form-group">

                                        <label for="location_type" class="control-label"> What Type of Freelancer You Want To Hire ?</label>
                                        <div class="col-sm-12 row">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="radio_label">
                                                <span class="radio_label_span">Aspirant</span>
                                                <input type="radio" name="experience_type" value="Aspirant" class="experience_type" >
                                                <span class="radio_checkmark"></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="radio_label">
                                                <span class="radio_label_span">Experienced</span>
                                                <input type="radio" name="experience_type" value="Experienced" class="experience_type" checked="checked">
                                                <span class="radio_checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="experience_user_rate Experienced">
                                            <label for="experience_user_rate" class="control-label">Select The Level of Freelancer You Want To Hire</label>

                                            <div class="set_padding_job row">

                                                <label class="col-md-3 col-sm-4 col-xs-4 cbox_job cbox-p level_radio_label"> 
                                                    <span class="level_radio_label_span">kjh</span>
                                                    <input type="radio" name="experience_user_rate" value="Silver" class="level" checked="checked">
                                                    <span class="level_radio_checkmark">
                                                        <span class="set_1 font_mob_job">$</span>
                                                        <span class="set_2 font_mob_job"> </span>
                                                        <span class="set_3 font_mob_job"> Silver </span>
                                                        <span class="set_4 font_mob_job set_star_mob"> <i class="fa fa-star"> </i><i class="fa fa-star star_style"></i> <i class="fa fa-star"></i></span>


                                                    </span>
                                                </label>
                                                <label class="col-md-3 col-sm-4 col-xs-4 cbox_job cbox-p level_radio_label"> 
                                                    <span class="level_radio_label_span"></span>
                                                    <input type="radio" name="experience_user_rate" value="Gold" class="level">
                                                    <span class="level_radio_checkmark">
                                                        <span class="set_1 font_mob_job">$$</span>
                                                        <span class="set_2 font_mob_job">  </span>
                                                        <span class="set_3 font_mob_job"> Gold </span>
                                                        <span class="set_4 font_mob_job set_star_mob"> <i class="fa fa-star"></i> <i class="fa fa-star star_style"></i> <i class="fa fa-star"></i><i class="fa fa-star"></i> </span>


                                                    </span>
                                                </label>
                                                <label class="col-md-3 col-sm-4 col-xs-4 cbox_job cbox-p level_radio_label"> 
                                                    <span class="level_radio_label_span"></span>
                                                    <input type="radio" name="experience_user_rate" value="Platinum" class="level">
                                                    <span class="level_radio_checkmark">
                                                        <span class="set_1 font_mob_job">$$$</span>
                                                        <span class="set_2 font_mob_job">  </span>
                                                        <span class="set_3 font_mob_job"> Platinum </span>
                                                        <span class="set_4 font_mob_job set_star_mob"> <i class="fa fa-star"> </i><i class="fa fa-star star_style"> </i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </span>


                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--Weekly Availability of resource-->
                                        <div class="weekly_availability_of_resource">
                                            <label for="weekly_availability_of_resource" class="control-label">Weekly Availability of resource</label>

                                            <div class="set_padding_job row">

                                                <label class="col-md-3 col-sm-4 col-xs-4 cbox_job cbox-p level_radio_label"> 
                                                    <span class="level_radio_label_span">kjh</span>
                                                    <input type="radio" name="weekly_availability_of_resource" value="30" class="level" checked="checked">
                                                    <span class="level_radio_checkmark">
                                                        <span class="set_1 font_mob_job">30 Hours</span>
                                                        <span class="set_2 font_mob_job"> </span>
                                                        <span class="set_3 font_mob_job"> Per Week  </span>
                                                    </span>
                                                </label>
                                                <label class="col-md-3 col-sm-4 col-xs-4 cbox_job cbox-p level_radio_label"> 
                                                    <span class="level_radio_label_span"></span>
                                                    <input type="radio" name="weekly_availability_of_resource" value="20" class="level">
                                                    <span class="level_radio_checkmark">
                                                        <span class="set_1 font_mob_job">20 Hours</span>
                                                        <span class="set_2 font_mob_job"> </span>
                                                        <span class="set_3 font_mob_job"> Per Week  </span>
                                                    </span>
                                                </label>
                                                <label class="col-md-3 col-sm-4 col-xs-4 cbox_job cbox-p level_radio_label"> 
                                                    <span class="level_radio_label_span"></span>
                                                    <input type="radio" name="weekly_availability_of_resource" value="10" class="level">
                                                    <span class="level_radio_checkmark">
                                                        <span class="set_1 font_mob_job">10 Hours</span>
                                                        <span class="set_2 font_mob_job"> </span>
                                                        <span class="set_3 font_mob_job"> Per Week  </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container box_main_project">
                                <div class="border-grey">
                                    <h4 class="header_inner"> Education & Certificate</h4>
                                </div>
                                <div class="createproject_main">
                                    <div class="form-group">
                                        <label for="education" class="control-label">Describe your education.</label>
                                        <textarea class="form-control set_width" id="education" name="education" ng-model="education"></textarea>
                                    </div>

                                    <div class="form-group equivalent_relevant_skills">
                                        <label for="equivalent_relevant_skills" class="control-label" style="display: block;">Equivalent Relevant Skills</label>
                                        <select id="equivalent_relevant_skills" name="equivalent_relevant_skills" class="form-control set_width" ng-model="equivalent_relevant_skills.skills" multiple ng-multiple="true">
                                            <option ng-repeat="skill in equivalent_relevant_skills" value="{{skill.id}}">
                                                {{skill.skill}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="endorsement" class="control-label"> Endorsement</label>
                                        <div class="col-sm-12 row">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="radio_label">
                                                <span class="radio_label_span">Yes</span>
                                                <input type="radio" name="endorsement" value="1" checked="checked">
                                                <span class="radio_checkmark"></span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="radio_label">
                                                <span class="radio_label_span">No</span>
                                                <input type="radio" name="endorsement" value="0">
                                                <span class="radio_checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group certification">
                                        <label for="certification" class="control-label" style="display: block;">Certification</label>
                                        <select id="certification" name="certification" class="form-control set_width" ng-model="certification.skills" multiple ng-multiple="true">
                                            <option ng-repeat="certificate in certificates" value="{{certificate.id}}">
                                                {{certificate.certificat}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="awards" class="control-label">Awards</label>
                                        <input type="text" class="form-control set_width" id="awards" name="awards" ng-model="awards" />
                                    </div>

                                    <div>
                                        <button type="submit" id="post_project_btn" class="btn btn-primary padding-bottom5 col-sm-12 col-lg-4 offset-lg-4">Post My Project</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once '../footer_2.html'; ?>