<!-- Add new tax start -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>




<style>
     .logo-9 i{
    font-size:80px;
    position:absolute;
    z-index:0;
    text-align:center;
    width:100%;
    left:0;
    top:-10px;
    color:#34495e;
    -webkit-animation:ring 2s ease infinite;
    animation:ring 2s ease infinite;
}
.logo-9 h1{
    font-family: 'Lora', serif;
    font-weight:600;
    text-transform:uppercase;
    font-size:40px;
    position:relative;
    z-index:1;
    color:#e74c3c;
    text-shadow: 3px 3px 0 #fff, -3px -3px 0 #fff, 3px -3px 0 #fff, -3px 3px 0 #fff;
}
   
   
  
   .logo-9{
    position:relative;
} 
   
   /*//side*/
   
.bar {
  float: left;
  width: 25px;
  height: 3px;
  border-radius: 4px;
  background-color: #4b9cdb;
}


.load-10 .bar {
  animation: loadingJ 2s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
}


@keyframes loadingJ {
  0%,
  100% {
    transform: translate(0, 0);
  }

  50% {
    transform: translate(80px, 0);
    background-color: #f5634a;
    width: 100px;
  }

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
}
</style>













<div class="content-wrapper">
<section class="content-header" style="height: 70px;">
   <div class="header-icon" style="margin-top: -8px;">
  
	   <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/tax.png"  class="headshotphoto" style="height:50px;" />      </div>
   

   
   
   
   
   
   
   
       <!--<h1 style="margin-top: 10px;font-weight: bold;"><?php echo display('add_tax') ?></h1>-->
     
     
         <div class="header-title">
          <div class="logo-holder logo-9">
	        <h1><?php echo display('add_tax') ?></h1>
       </div>
	     
     
     
     
     
     
      <small></small>
      <ol class="breadcrumb" style="border:2px solid #d7d4d6;" >
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('accounts') ?></a></li>
         <li class="active" style="color:orange;"><?php echo display('add_tax') ?></li>
     
     
     
     
      <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
     
     
      </ol>
   </div>
</section>
<section class="content">
   <!-- Alert Message -->
   <?php
      $message = $this->session->userdata('message');
      
      if (isset($message)) {
      
      ?>
   <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $message ?>                    
   </div>
   <?php 
      $this->session->unset_userdata('message');
      
      }
      
      $error_message = $this->session->userdata('error_message');
      
      if (isset($error_message)) {
      
      ?>
   <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $error_message ?>                    
   </div>
   <?php 
      $this->session->unset_userdata('error_message');
      
      }
      
      ?>
            <div class="panel panel-bd lobidrag">
            <div class="panel-heading" style="height: 60px;border: 3px solid #D7D4D6;">
            <div class="col-sm-18">

            <a href="<?php  echo base_url(); ?>/Caccounts/manage_tax" class="btnclr btn btn-default dropdown-toggle"   style="height:fit-content;float:inline-end;"><i class="ti-align-justify"> </i> &nbsp;<?php echo  ('Manage Tax') ?></a>                  
                  
            </div>
            </div>
            </div>
   <!-- new tax -->
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-bd lobidrag"  style="border:3px solid #d7d4d6;"  >
            <div class="panel-heading">
               <div class="panel-title">
               </div>
          
            <?php echo form_open_multipart('Caccounts/tax_entry',array('class' => 'form-vertical frm','id' => 'tax_entry' ))?>
            <div class="panel-body">
               <!-- <p><?php //echo display('Create a name for your tax rate, and give us a few details about how you want to apply it') ?>.</p> -->
               <div class="form-group row">
                  <div class="col-sm-6 sale_checkbox">
                     <div class="col-sm-1"> 
                        <input type="checkbox" name="status_type" id="one" class="form-control myCheckbox" value="sales">
                     </div>
                     <label for="isshow" class="col-sm-1 col-form-label"><?php echo display('Sales') ?></label>
                  </div>

                  <div class="col-sm-6 sale_checkbox">
                     <div class="col-sm-1"> 
                        <input type="checkbox" name="status_type" id="two"   style="border:2px solid #d7d4d6;"   class="form-control myCheckbox" value="expenses">
                     </div>
                     <label for="isshow" class="col-sm-1 col-form-label">Expenses</label>
                  </div>
               </div>
               <input type="hidden" name="status_type" class="myInput">
               <div class="form-group row">
                  <label for="enter_tax" class="col-sm-3 col-form-label">Enter Tax percent<i class="text-danger">*</i></label>
                  <div class="col-sm-1">
                     <input type="text" class="form-control" name="enter_tax" id="enter_tax" step="0.01"  style="border:2px solid #d7d4d6;width:270px;margin-left: 10px;"  required="" placeholder="" />
                  </div>
                  <div class="col-sm-2">
                  
                                   <i class="text" style="margin-left:160px;font-size: 18px;">%</i>

                  </div>
               </div>
               <div class="form-group row"> 
                  <label for="description" class="col-sm-3 col-form-label"><?php echo display('Description') ?></label>
                  <div class="col-sm-6">
                     <textarea class="form-control" name="description"  style="border:2px solid #d7d4d6;width:297px;height:38px;margin-left: 10px;"   id="description"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="tax_agency" class="col-sm-3 col-form-label">State<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                    <select name="state" class="form-control"   style="width:300px;border:2px solid #d7d4d6; margin-left:10px;"   required>
                        <option selected="true" disabled="disabled" value="">Please Select State</option>
                        <option value="Alabama">AL - State of Alabama</option>
                        <option value="Alaska">AK - State of Alaska</option>
                        <option value="Arizona">AZ - State of Arizona</option>
                        <option value="Arkansas">AR - State of Arkansas</option>
                        <option value="California">CA - State of California</option>
                        <option value="Colorado">CO - State of Colorado</option>
                        <option value="Connecticut">CT - State of Connecticut</option>
                        <option value="Delaware">DE - State of Delaware</option>
                        <option value="Florida">FL - State of Florida</option>
                        <option value="Georgia">GA - State of Georgia</option>
                        <option value="Hawaii">HI - State of Hawaii</option>
                        <option value="Idaho">ID - State of Idaho</option>
                        <option value="Illinois">IL - State of Illinois</option>
                        <option value="Indiana">IN - State of Indiana</option>
                        <option value="Iowa">IA - State of Iowa</option>
                        <option value="Kansas">KS - State of Kansas</option>
                        <option value="Kentucky">KY - State of Kentucky</option>
                        <option value="Louisiana">LA - State of Louisiana</option>
                        <option value="Maine">ME - State of Maine</option>
                        <option value="Maryland">MD - State of Maryland</option>
                        <option value="Massachusetts">MA - State of Massachusetts</option>
                        <option value="Michigan">MI - State of Michigan</option>
                        <option value="Minnesota">MN - State of Minnesota</option>
                        <option value="Mississippi">MS - State of Mississippi</option>
                        <option value="Missouri">MO - State of Missouri</option>
                        <option value="Montana">MT - State of Montana</option>
                        <option value="Nebraska">NE - State of Nebraska</option>
                        <option value="Nevada">NV - State of Nevada</option>
                        <option value="New Hampshire">NH - State of New Hampshire</option>
                        <option value="New Jersey">NJ - State of New Jersey</option>
                        <option value="New Mexico">NM - State of New Mexico</option>
                        <option value="New York">NY - State of New York</option>
                        <option value="North Carolina">NC - State of North Carolina</option>
                        <option value="North Dakota">ND - State of North Dakota</option>
                        <option value="Ohio">OH - State of Ohio</option>
                        <option value="Oklahoma">OK - State of Oklahoma</option>
                        <option value="Oregon">OR - State of Oregon</option>
                        <option value="Pennsylvania">PA - State of Pennsylvania</option>
                        <option value="Rhode Island">RI - State of Rhode Island</option>
                        <option value="South Carolina">SC - State of South Carolina</option>
                        <option value="South Dakota">SD - State of South Dakota</option>
                        <option value="Tennessee">TN - State of Tennessee</option>
                        <option value="Texas">TX - State of Texas</option>
                        <option value="Utah">UT - State of Utah</option>
                        <option value="Vermont">VT - State of Vermont</option>
                        <option value="Virginia">VA - State of Virginia</option>
                        <option value="Washington">WA - State of Washington</option>
                        <option value="West Virginia">WV - State of West Virginia</option>
                        <option value="Wisconsin">WI - State of Wisconsin</option>
                        <option value="Wyoming">WY - State of Wyoming</option>
                    </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="tax_agency" class="col-sm-3 col-form-label"><?php echo display('Tax Agency') ?> <i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                    <select name="tax_agency"   style="width:300px;border:2px solid #d7d4d6; margin-left:10px;"    class="form-control" required>
                        <option selected="true" disabled="disabled" value="">Please Select Taxes</option>
                        <option value="Federal Taxes">Federal Taxes</option>
                        <option value="State Taxes">State Taxes</option>
                        <option value="Municipal Taxes">Municipal Taxes</option>
                    </select>
                  </div>
               </div>
               
               <div class="checkbox_toggle">
                  <div class="form-group row">
                     <!-- <div class="form-group row">
                        <label for="sale_rate" class="col-sm-3 col-form-label"><?php //echo display('Sales Rate') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input type="text" name="sale_rate" id="sale_rate" placeholder="%"   style="border:2px solid #d7d4d6;"    style="width:100%;" class="form-control">
                        </div>
                     </div> -->
                     <div class="form-group row">
                        <label for="account" class="col-sm-3 col-form-label"><?php echo display('Account') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <select name="account" style="width:300px;border:2px solid #d7d4d6; margin-left:5px;" class="form-control" required>
                              <option selected="true" disabled="disabled" value="">Please Select Accounts</option>
                              <option value="Accounts receivable">Accounts receivable</option>
                              <option value="Sales tax payable">Sales tax payable</option>
                               <option value="Tax Account Payable">Tax Account Payable</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="show_taxonreturn" class="col-sm-3 col-form-label"><?php echo display('Show Tax On Return Line') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <select name="show_taxonreturn" style="width:300px;border:2px solid #d7d4d6; margin-left:5px;" class="form-control" required>
                              <option selected="true" disabled="disabled" value="">Please Select tax on return line</option>
                              <option>Tax collected on sales</option>
                              <option>Adjustments to tax on sales</option>
                              <option>Other adjustments</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-6 sale_checkbox">
                     <div class="checkbox_toggle2">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                     <div class="col-sm-6">
                        <input type="submit" id="add-deposit" class="btnclr btn"   style="margin-left: 15px;" name="add-deposit" value="<?php echo display('save') ?>" />
                     </div>
                  </div>
               </div>
               <?php echo form_close()?>
            </div>
         </div>
      </div>
</section>
</div>
 
<style>
   .sale_checkbox label{
   margin-top: 6px;
   padding: 0;
   margin-left: -21px;
   }
   .sale_checkbox input {
   width: 18px;
   margin: 0px !important;
   }
   .checkbox_toggle input {
   width: 57px;
   }
   .checkbox_toggle2 input {
   width: 57px;
   }
   .checkbox_toggle {
   margin-left: 15px;
   }
   .checkbox_toggle2 {
   margin-left: 15px;
   }
   .select2-container .select2-selection--single {
   height: 40px;
   }
   .select2-container--default .select2-selection--single .select2-selection__rendered {
   line-height: 38px !important;
   }
   .select2-container--default .select2-selection--single .select2-selection__arrow {
   line-height: 38px !important;
   height: 38px !important;
   }
   #select2-tax_agency-hd-container{
   display:none;
   }
   .select2-selection__rendered{
   display:none;
   }
</style> 

<script type="text/javascript">
   $(document).ready(function(){
 

    $("#add-deposit").on("click", function() {
      if ($('#tax_entry :checkbox:checked').length > 0){
    $('input[name="status_type"]:checked').each(function(){
      var checkboxValue = $(this).val();
      if(checkboxValue){
        $(".myInput").val(checkboxValue); 
     }
    });

}else{
     $(".myInput").val("Both"); 
}



  });
});



 $(document).on('click', 'input[type="checkbox"]', function() {      
    $('input[type="checkbox"]').not(this).prop('checked', false);      
});  


</script>  
 