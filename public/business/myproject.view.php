<?php require_once "../business_header_menu_after_login.html"; ?>
<div class="container-fluid">
   <div class="pad-1-per ng-scope">
      <div class="shadow">
         <div class="well padding0 bcolor-w border-3">
            <div class="container padding-bottom5 max-w-100-per">
               <h3 class=" font-s18 col-g padding-top15-px">                        <b> MY PROJECT </b>                    </h3>
            </div>
         </div>
      </div>
   </div>
   <div class="pad-1-per ng-scope">
      <div class="shadow">
         <div class="well padding0 bcolor-w border-3">
            <div class="row padding-bottom5 max-w-100-per">
               <div class="col-sm-10">
                  <form>
                     <div class="form-row align-items-center">
                        <div class="col-md-6">                                    <input type="text" class="form-control mb-1 mt-2" id="inlineFormInput" placeholder="Project Title">                                </div>
                        <div class="col-md-3">
                           <select class="form-control mb-1 mt-2">
                              <option>Active</option>
                              <option>Current</option>
                              <option>Past</option>
                           </select>
                        </div>
                        <div class="col-auto">                                    <button type="submit" class="btn btn-primary mb-1 mt-2">Search</button>                                </div>
                     </div>
                  </form>
               </div>
               <div class="col-sm-2">                        <a href="#!/projects/create" class="btn btn-info post_new_project_btn mt-2">Post New Project</a>                    </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row" id="project_list"></div>
   </div>
   <div class="container">
      <div class='row'>
         <div class='col-sm-12'>
            <div class='box bordered-box orange-border' style='margin-bottom:0;'>
               <div class='box-header' style="background-color: #18bc9c;color: #fff;">
                  <div class='title'>Projects</div>
                  <div class='actions'>                            <a class="btn box-remove btn-xs btn-link" href="#"><i class='icon-remove'></i>                            </a>                            <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>                            </a>                        </div>
               </div>
               <div class='box-content box-no-padding'>
                  <div class='responsive-table'>
                     <div class='table-responsive'>
                        <table class="table table-bordered " id="projects" style="width: 100%;">
                           <thead>
                              <th>Name</th>
                              <th>Payment</th>
                              <th>Location</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Action</th>
                           </thead>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container table-responsive max-w-100-per">
      <table class="table table-bordered" id="customer">
         <thead>
            <tr>
               <th>FreeLancer Bidding</th>
               <th>Reputation</th>
               <th> Bid Amount </th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td class="table-style2">                        <img src="public/app-content/images/person2.jpg"  class="img-circle width-5 width-10 mob-width-20pr">                        <span class="table-style padding-left12 mob-left">                            Justin Beiber                             <img src="public/app-content/images/medal.jpg" class="img-circle width-2 width-6pr">                             3 Minutes Ago                        </span>                        <span class="table-style1">                            <img src="public/app-content/images/flag.png" class="img-thumbnail width-5 table-style1 ma-left width-25">                         </span>                    </td>
               <td class="text-center" > 1000 Review </td>
               <td class="text-center" >  25555 RS </td>
            </tr>
            <tr>
               <td class="table-style2">                        <img src="public/app-content/images/person2.jpg" class="img-circle width-5 width-10 mob-width-20pr">                        <span class="table-style padding-left12 mob-left">                             Justin Beiber                             <img src="public/app-content/images/medal.jpg" class="img-circle width-2 width-6pr">                             3 Minutes Ago                        </span>                        <span class="table-style1">                            <img src="public/app-content/images/flag.png" class="img-thumbnail width-5 table-style1 ma-left width-25">                         </span>                    </td>
               <td class="text-center" > 1000 Review </td>
               <td class="text-center" >  25555 RS </td>
            </tr>
            <tr>
               <td class="table-style2">                        <img src="app-content/images/person2.jpg" class="img-circle width-5 width-10 mob-width-20pr">                        <span class="table-style padding-left12 mob-left">                             Justin Beiber                             <img src="app-content/images/medal.jpg" class="img-circle width-2 width-6pr">                             3 Minutes Ago                        </span> 	                        <span class="table-style1">                            <img src="app-content/images/flag.png" class="img-thumbnail width-5 table-style1 ma-left width-25">                         </span>                    </td>
               <td class="text-center"> 1000 Review </td>
               <td class="text-center">  25555 RS </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
<?php include_once '../footer_2.html'; ?>