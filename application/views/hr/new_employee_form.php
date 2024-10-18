<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>

<div id="myDiv" class="content-wrapper">
    
 
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag" >
         <div class="panel-body " >
           <?php //echo form_open('Chrm/employee_create', array('onsubmit' => 'return validateForm()')); ?>
   <?php echo form_open_multipart('Chrm/employee_create',array('onsubmit' => 'return validateForm()') ) ?>
       <div class="row" id="news">
         <div style="width:40px;" class="form-group row col-md-1 col-xs-1">

</div>

 
 
<div class="col-sm-0"><img src="<?php echo  base_url().$logo; ?>"   style='width:25%;margin-top:-60px;margin-left:265px;'  /></div>

 

 <div  style=" margin-top:-70px;text-align: center;" id='company_info'>

          <h1 style="font-size: 50px;margin-bottom: 1px;" > <?php echo $company_content[0]['company_name']; ?> </h1> 
         <?php echo display('Address') ?>  : <?php echo $company_content[0]['address'];   ?><br>
           <?php echo display('Email') ?>  : <?php echo $company_content[0]['email'];    ?><br>
           <?php echo display('Contact') ?>  :<?php echo $company_content[0]['mobile'];  ?><br>
       </div>
 
       <!-- <div class="col-sm-0"><img src="<?php //echo  base_url().$logo; ?>"   style='width: 10%;'  /></div> -->
<br>
             <h4 style="text-align: center;text-decoration: underline;"> <b> Employee Information Form </b></h4>

<br>
<br>
<br>
<br>
<div style="margin-top: -55px;">
                                 <div class="form-group row col-md-4 col-xs-4" style="margin-left:1px;" >
                                <label class="normal-label">First Name</label>    
                            <input type="text" name="Branch" id="Branch" style="width: 108%;" class="form-control new-select">          
                            </div>
                                <div class="col-md-4 col-xs-4">
                                    <label>Middle Name</label>
                               
                                   <input type="text" name="Branch" id="Branch" style="width: 116%;" class="form-control new-select">
                                        
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <label>Last Name</label>
                                   <input type="text" name="Branch" id="Branch" style="width: 104%;" class="form-control new-select">
                                </div>
                            </div>
                            </div>
                            <div class="row" >
                                <div class="col-md-6 col-xs-6">
                                    <label>Phone</label>
                                <input type="text" class="form-control new-select" name="employee_email" id="employee_email" style="width: 100%;">
                                </div>
                              

                               

                                <div class="col-md-6 col-xs-6">
                                    <label>Emergency Contact Person</label>
                                     <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label>Email</label>
                                <input type="text" name="employee_code" id="employee_code" class="form-control new-select" style="width: 100%;">
                                </div>
                                
                                <div class="col-md-6 col-xs-6">
                                    <label>Emergency Contact Number</label>
                                     <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">
                                </div>



                            </div>                         
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label for='upload'>Address Line 1:</label>
                                   <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">

                                </div>
                           
                                <div class="col-md-6 col-xs-6">
                                    <label>Social Security Number</label>
                                     <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label for='upload'>Address Line 2:</label>
                                   <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">

                                </div>

                                <div class="col-md-6 col-xs-6">
                                    <label>Bank</label>
                                   <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">
                                </div>
                                



                               
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label for='upload'>City</label>
                                    <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">

                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <label>Employee Type</label>
                                     <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label for='upload'>State</label>
                                    <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">

                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <label>Routing Number</label>
                                  <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label for='upload'>Zip code</label>
                                    <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">

                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <label>Account Number</label>
                                     <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label for='upload'>Country</label>
                                    <input type="text" name="Branch" id="Branch" style="width: 100%;" class="form-control new-select">

                                </div>
                          
                            </div>
 

               </div>
         

      </div>
   </div>
</div>
<script>
// Show the div for printing when the page loads
window.onload = function() {
    var divToPrint = document.getElementById('news');
    if (divToPrint) {
        // Show the div
        divToPrint.style.display = 'block';
        
        // Hide all other elements
        var allOtherElements = document.body.children;
        for (var i = 0; i < allOtherElements.length; i++) {
            var element = allOtherElements[i];
            if (element.id !== 'news') {
                element.style.display = 'none';
            }
        }
        
        // Print the page
        window.print();
        
        // Show all elements again
        for (var i = 0; i < allOtherElements.length; i++) {
            var element = allOtherElements[i];
            element.style.display = '';
        }
 
        setTimeout(function() {
    window.location.href = '<?php echo base_url('Chrm/manage_employee') ?>';
}, 500);



    } else {
        console.error("Element with id 'news' not found.");
    }
};

 

</script>

<style>
label{
    font-weight:normal;
    margin-top: 5px;
}
.normal-label {
    font-weight: normal;
}
.main-header , .main-footer{
    display:none;
}
   </style>
   