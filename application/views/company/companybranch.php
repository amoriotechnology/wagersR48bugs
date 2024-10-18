


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />


<style>
    .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>




<!-- Add User start -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('Create Company Branch' )?></h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active" style="color:orange;" ><?php echo ('Company Branch')?></li>
            </ol>
        </div>
    </section>
<style>
.select2{
    display:none;
}
    </style>
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


        <div class='row'> 
                    
        </div>
        <!-- New user -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
              

                    <div class="panel-heading">
                        <div class="panel-title">
                        </div>
                    </div>
                    
                    <div class="panel-body">
                   <?php echo form_open_multipart('User/company_insert_branch');?>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('Company Name') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="company_name" id="company_name" placeholder="Enter your Company name" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('email') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="email" tabindex="1" class="form-control" name="email" id="email" required placeholder="Enter your Company email" />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('Mobile') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="number" tabindex="1" class="form-control" name="mobile" id="mobile" required placeholder="Enter your mobile" />
                            </div>
                        </div>
<div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo 'City'; ?><i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="c_city" id="c_city" required placeholder="Enter your city" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo 'State'; ?><i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="c_state" id="c_state" required placeholder="Enter your state" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('Address') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="address" id="address" required placeholder="Enter your address" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('Website') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="website" id="website" placeholder="Enter your website" required />
                            </div>
                        </div>

                 





                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('Bank_Name') ?><i class="text-danger"></i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="Bank_Name" id="Bank_Name"  placeholder="Enter your Bank Name" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo 'Account Number'?><i class="text-danger"></i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="Account_Number" id="Account_Number"  placeholder="Enter your Account Number" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo 'Bank Routing Number' ?><i class="text-danger"></i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="Bank_Routing_Number" id="Bank_Routing_Number"  placeholder="Enter your Bank Routing Number" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo 'Bank Address' ?><i class="text-danger"></i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="Bank_Address" id="Bank_Address"  placeholder="Enter your Bank Address" />
                            </div>
                        </div>

                     
                        <div class="form-group row">
                     <label class="col-sm-3 col-form-label"><?php echo 'Federal Identification Number' ?><i class="text-danger"></i></label>
                     <div class="col-sm-6">
                        <input type="number" tabindex="1" class="form-control" name="Federal_Pin_Number" id="Federal_Pin_Number"  placeholder="Enter  Federal Identification Number" />
                     </div>
                  </div>




                  <div class="form-group row">
    <label class="col-sm-3 col-form-label"><?php echo 'User Name' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="text" tabindex="1" class="form-control" name="user_name[]" id="user_name" placeholder="Enter User Name" />
    </div>
    
    
    <label class="col-sm-1 col-form-label"><?php echo 'Password' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="text" tabindex="1" class="form-control" name="password[]" id="password" placeholder="Enter password" />
    </div>

    <label class="col-sm-1 col-form-label"><?php echo 'Pin Number' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="number" tabindex="1" class="form-control" name="pin_number[]" id="pin_number" placeholder="Enter Pin Number" />
    </div>
</div>

<div class="form-group row" id="url-group-1">
    <label class="col-sm-3 col-form-label">URL<i class="text-danger"></i></label>
    <div class="col-sm-6">
        <input type="url" tabindex="1" class="form-control" name="url[]" id="url" placeholder="Enter URL" />
    </div>
    <div class="col-sm-2">
        <button type="button" class="btnclr client-add-btn btn" onclick="addUrlField()"><i class="fa fa-plus"></i></button>
    </div>
</div>
<div id="output"></div>


<div class="form-group row">
                     <label for="statetx" class="col-sm-3 col-form-label"><?php echo 'State Tax ID Number'?><i class="text-danger"></i></label>
                     <div class="col-sm-6">
                        <input list="magic_state_tax_id" name="statetx"  id="statetx" class="form-control" placeholder="Enter your State Tax ID Number"    onchange="this.blur();" />
                        <datalist id="magic_state_tax_id">
                           <?php  foreach($state as $st){  ?>
                           <option value="<?php echo $st->state_tax_id;?>"><?php echo $st->state_tax_id;?></option>
                           <?php  } ?>
                        </datalist>
                     </div>
                     <div class="col-sm-2">
                        <a  class="btnclr client-add-btn btn" aria-hidden="true"     data-toggle="modal" data-target="#state_tax_id" ><i class="fa fa-plus"></i></a>
                     </div>
                  </div>



                  <div class="form-group row">
    <label class="col-sm-3 col-form-label"><?php echo 'User Name(State tax)' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="text" tabindex="1" class="form-control" name="user_name_st[]" id="user_name_st" placeholder="Enter User Name" />
    </div>
    
    
    <label class="col-sm-1 col-form-label"><?php echo 'Password' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="text" tabindex="1" class="form-control" name="password_st[]" id="password_st" placeholder="Enter password" />
    </div>

    <label class="col-sm-1 col-form-label"><?php echo 'Pin Number' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="number" tabindex="1" class="form-control" name="pin_number_st[]" id="pin_number_st" placeholder="Enter Pin Number" />
    </div>
</div>

<div class="form-group row" id="urlst-group-1">
    <label class="col-sm-3 col-form-label">URL(State tax)<i class="text-danger"></i></label>
    <div class="col-sm-6">
        <input type="url" tabindex="1" class="form-control" name="url_st[]" id="url_st" placeholder="Enter URL" />
    </div>
    <div class="col-sm-2">
        <button type="button" class="btnclr client-add-btn btn" onclick="addUrlstField()"><i class="fa fa-plus"></i></button>
    </div>
</div>
<div id="outputst"></div>



<div class="form-group row">
                     <label for="localtx" class="col-sm-3 col-form-label"><?php echo 'Local Tax ID Number'?><i class="text-danger"></i></label>
                     <div class="col-sm-6">
                        <input list="magic_local_tax_id" name="localtx"  id="localtx" class="form-control" placeholder="Enter your State Tax ID Number"    onchange="this.blur();" />
                        <datalist id="magic_local_tax_id">
                           <?php foreach($local as $st){  ?>
                           <option value="<?php  echo $st->local_tax_id ;?>"><?php  echo $st->local_tax_id ;?></option>
                           <?php  } ?>
                        </datalist>
                     </div>
                     
                     <div class="col-sm-2">
                        <a  class="btnclr client-add-btn btn" aria-hidden="true"     data-toggle="modal" data-target="#local_tax_id" ><i class="fa fa-plus"></i></a>
                     </div>
                  </div>





                  
                  <div class="form-group row">
    <label class="col-sm-3 col-form-label"><?php echo 'User Name(Local tax)' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="text" tabindex="1" class="form-control" name="user_name_lctx[]" id="user_name_lctx" placeholder="Enter User Name" />
    </div>
    
    
    <label class="col-sm-1 col-form-label"><?php echo 'Password' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="text" tabindex="1" class="form-control" name="password_lctx[]" id="password_lctx" placeholder="Enter password" />
    </div>

    <label class="col-sm-1 col-form-label"><?php echo 'Pin Number' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="number" tabindex="1" class="form-control" name="pin_number_lctx[]" id="pin_number_lctx" placeholder="Enter Pin Number" />
    </div>
</div>

<div class="form-group row" id="urllctx-group-1">
    <label class="col-sm-3 col-form-label">URL(Local tax)<i class="text-danger"></i></label>
    <div class="col-sm-6">
        <input type="url" tabindex="1" class="form-control" name="url_lctx[]" id="url_lctx" placeholder="Enter URL" />
    </div>
    <div class="col-sm-2">
        <button type="button" class="btnclr client-add-btn btn" onclick="addUrllctxField()"><i class="fa fa-plus"></i></button>
    </div>
</div>
<div id="outputlctx"></div>


<div class="form-group row">
                     <label class="col-sm-3 col-form-label"><?php echo 'State Sales Tax Number' ?><i class="text-danger"></i></label>
                     <div class="col-sm-6">
                        <input type="text" tabindex="1" class="form-control" name="State_Sales_Tax_Number" id="State_Sales_Tax_Number"  placeholder="Enter your State Sales Tax Number" />
                     </div>
                  </div>
                        
                      

                 
                  <div class="form-group row">
    <label class="col-sm-3 col-form-label"><?php echo 'User Name(State Sales Tax)' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="text" tabindex="1" class="form-control" name="user_name_sstx[]" id="user_name_sstx" placeholder="Enter User Name" />
    </div>
    
    
    <label class="col-sm-1 col-form-label"><?php echo 'Password' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="text" tabindex="1" class="form-control" name="password_sstx[]" id="password_sstx" placeholder="Enter password" />
    </div>

    <label class="col-sm-1 col-form-label"><?php echo 'Pin Number' ?><i class="text-danger"></i></label>
    <div class="col-sm-2">
        <input type="number" tabindex="1" class="form-control" name="pin_number_sstx[]" id="pin_number_sstx" placeholder="Enter Pin Number" />
    </div>
</div>

<div class="form-group row" id="urlsstx-group-1">
    <label class="col-sm-3 col-form-label">URL(State sales tax)<i class="text-danger"></i></label>
    <div class="col-sm-6">
        <input type="url" tabindex="1" class="form-control" name="url_sstx[]" id="url_sstx" placeholder="Enter URL" />
    </div>
    <div class="col-sm-2">
        <button type="button" class="btnclr client-add-btn btn" onclick="addUrlsstxField()"><i class="fa fa-plus"></i></button>
    </div>
</div>
<div id="outputsstx"></div>





                  

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="submit" id="add-customer" style="color:white;" class="btnclr btn m-b-5 m-r-2" name="add-user" value="<?php echo display('save') ?>" tabindex="6"/>
              
								
                            </div>
                        </div>
                   <?php echo form_close(); ?>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
</div>
<!------ add new state tax id -->
<div class="modal fade" id="state_tax_id" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo 'Add New State Tax ID ' ?></h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_state_tax_id" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo 'New State Tax ID ' ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_state_tax_id" id="new_state_tax_id" type="text" placeholder="New State Tax ID  "  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr "  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!------ add new local tax id -->
<div class="modal fade" id="local_tax_id" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo 'Add New Local Tax ID ' ?></h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_local_tax_id" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo 'New Local Tax ID ' ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_local_tax_id" id="new_local_tax_id" type="text" placeholder="New Local Tax ID  "  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr "  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   //state tax id number
   $(document).ready(function () {
        $('#add_state_tax_id').submit(function (e) {
            e.preventDefault();
            var formData = $("#add_state_tax_id").serialize();
            formData += "&" + $.param({ csrf_test_name: csrfHash });
            $.ajax({
                type: 'POST',
                data: formData,
                dataType: "json",
                url: '<?php echo base_url(); ?>Cinvoice/add_state_tax_id',
                success: function (data1, statut) {
                    var $datalist = $('#magic_state_tax_id');
                    // Clear existing options
                    $datalist.empty();
                    // Add new options
                    for (var i = 0; i < data1.length; i++) {
                        var option = $('<option/>').attr('value', data1[i].state_tax_id).text(data1[i].state_tax_id);
                        $datalist.append(option);
                    }
                    $('#new_state_tax_id').val('');
                    $("#bodyModal1").html("state tax id number Tax Added Successfully");
                    $('#state_tax_id').modal('hide');
                    $('#statetx').show();
                    $('#myModal1').modal('show');
                    window.setTimeout(function () {
                        $('#state_tax_id').modal('hide');
                        $('#myModal1').modal('hide');
                    }, 2000);
                }
            });
        });
    });
    //local tax id number
    $(document).ready(function () {
        $('#add_local_tax_id').submit(function (e) {
            e.preventDefault();
            var formData = $("#add_local_tax_id").serialize();
            formData += "&" + $.param({ csrf_test_name: csrfHash });
            $.ajax({
                type: 'POST',
                data: formData,
                dataType: "json",
                url: '<?php echo base_url(); ?>Cinvoice/add_local_tax_id',
                success: function (data1, statut) {
                    var $datalist = $('#magic_local_tax_id');
                    // Clear existing options
                    $datalist.empty();
                    // Add new options
                    for (var i = 0; i < data1.length; i++) {
                        var option = $('<option/>').attr('value', data1[i].local_tax_id).text(data1[i].local_tax_id);
                        $datalist.append(option);
                    }
                    $('#new_local_tax_id').val('');
                    $("#bodyModal1").html("local tax id number Tax Added Successfully");
                    $('#local_tax_id').modal('hide');
                    $('#localtx').show();
                    $('#myModal1').modal('show');
                    window.setTimeout(function () {
                        $('#local_tax_id').modal('hide');
                        $('#myModal1').modal('hide');
                    }, 2000);
                }
            });
        });
    });
 

    var urlFieldCount = 1;

function addUrlField() {
    urlFieldCount++;
    var newUrlGroup = document.createElement('div');
    newUrlGroup.className = 'form-group row';
    newUrlGroup.id = 'url-group-' + urlFieldCount;

    newUrlGroup.innerHTML = `
    <div class="form-group row">
    <label class="col-sm-3 col-form-label" style="margin-left:15px;"><?php echo 'User Name' ?></label> <div class="col-sm-2"><input type="text"  class="form-control" name="user_name[]"/> </div>
     <label class="col-sm-1 col-form-label"><?php echo 'Password' ?></label> <div class="col-sm-2"><input type="text" class="form-control" name="password[]" /> </div> 
     <label class="col-sm-1 col-form-label"><?php echo 'Pin Number' ?></label> <div class="col-sm-2"><input type="text" class="form-control" name="pin_number[]"/> </div>
</div>

        <label class="col-sm-3 col-form-label">URL ${urlFieldCount}</label>
        <div class="col-sm-6">
            <input type="url" tabindex="1" class="form-control" name="url[]" placeholder="Enter URL ${urlFieldCount}" />
        </div>
        <div class="col-sm-2">
            <button type="button" class="btnclr client-add-btn btn" onclick="removeUrlField('url-group-${urlFieldCount}')"><i class="fa fa-minus"></i></button>
       
        </div>`;

    var outputDiv = document.getElementById('output');
    outputDiv.appendChild(newUrlGroup);
}

function removeUrlField(groupId) {
    var urlGroupToRemove = document.getElementById(groupId);
    if (urlGroupToRemove && urlFieldCount > 1) {
        urlGroupToRemove.parentNode.removeChild(urlGroupToRemove);
        urlFieldCount--;
    }
}

var urlstFieldCount = 1;

function addUrlstField() {
    urlstFieldCount++;
    var newUrlstGroup = document.createElement('div');
    newUrlstGroup.className = 'form-group row';
    newUrlstGroup.id = 'urlst-group-' + urlstFieldCount;

    newUrlstGroup.innerHTML = `
    <div class="form-group row">
    <label class="col-sm-3 col-form-label" style="margin-left:15px;"><?php echo 'User Name (State tax)' ?></label> <div class="col-sm-2"><input type="text"  class="form-control" name="user_name_st[]"/> </div>
     <label class="col-sm-1 col-form-label"><?php echo 'Password' ?></label> <div class="col-sm-2"><input type="text" class="form-control" name="password_st[]" /> </div> 
     <label class="col-sm-1 col-form-label"><?php echo 'Pin Number' ?></label> <div class="col-sm-2"><input type="text" class="form-control" name="pin_number_st[]"/> </div>
</div>

        <label class="col-sm-3 col-form-label">URL (State tax) ${urlstFieldCount}</label>
        <div class="col-sm-6">
            <input type="url" tabindex="1" class="form-control" name="url_st[]" placeholder="Enter URL ${urlstFieldCount}" />
        </div>
        <div class="col-sm-2">
            <button type="button" class="btnclr client-add-btn btn" onclick="removeUrlstField('urlst-group-${urlstFieldCount}')"><i class="fa fa-minus"></i></button>
       
        </div>`;

    var outputDivst = document.getElementById('outputst');
    outputDivst.appendChild(newUrlstGroup);
}

function removeUrlstField(groupIdst) {
    var urlstGroupToRemove = document.getElementById(groupIdst);
    if (urlstGroupToRemove && urlstFieldCount > 1) {
        urlstGroupToRemove.parentNode.removeChild(urlstGroupToRemove);
        urlstFieldCount--;
    }
}


var urllctxFieldCount = 1;

function addUrllctxField() {
    urllctxFieldCount++;
    var newUrllctxGroup = document.createElement('div');
    newUrllctxGroup.className = 'form-group row';
    newUrllctxGroup.id = 'urllctx-group-' + urllctxFieldCount;

    newUrllctxGroup.innerHTML = `
    <div class="form-group row">
    <label class="col-sm-3 col-form-label" style="margin-left:15px;"><?php echo 'User Name (Local tax)' ?></label> <div class="col-sm-2"><input type="text"  class="form-control" name="user_name_lctx[]"/> </div>
     <label class="col-sm-1 col-form-label"><?php echo 'Password' ?></label> <div class="col-sm-2"><input type="text" class="form-control" name="password_lctx[]" /> </div> 
     <label class="col-sm-1 col-form-label"><?php echo 'Pin Number' ?></label> <div class="col-sm-2"><input type="text" class="form-control" name="pin_number_lctx[]"/> </div>
</div>

        <label class="col-sm-3 col-form-label">URL (Local tax) ${urllctxFieldCount}</label>
        <div class="col-sm-6">
            <input type="url" tabindex="1" class="form-control" name="url_lctx[]" placeholder="Enter URL ${urllctxFieldCount}" />
        </div>
        <div class="col-sm-2">
            <button type="button" class="btnclr client-add-btn btn" onclick="removeUrllctxField('urllctx-group-${urllctxFieldCount}')"><i class="fa fa-minus"></i></button>
       
        </div>`;

    var outputDivst = document.getElementById('outputlctx');
    outputDivst.appendChild(newUrllctxGroup);
}

function removeUrllctxField(groupIdst) {
    var urllctxGroupToRemove = document.getElementById(groupIdst);
    if (urllctxGroupToRemove && urllctxFieldCount > 1) {
        urllctxGroupToRemove.parentNode.removeChild(urllctxGroupToRemove);
        urllctxFieldCount--;
    }
}

var urlsstxFieldCount = 1;

function addUrlsstxField() {
    urlsstxFieldCount++;
    var newUrlsstxGroup = document.createElement('div');
    newUrlsstxGroup.className = 'form-group row';
    newUrlsstxGroup.id = 'urlsstx-group-' + urlsstxFieldCount;

    newUrlsstxGroup.innerHTML = `
    <div class="form-group row">
    <label class="col-sm-3 col-form-label" style="margin-left:15px;"><?php echo 'User Name (State sales tax)' ?></label> <div class="col-sm-2"><input type="text"  class="form-control" name="user_name_sstx[]"/> </div>
     <label class="col-sm-1 col-form-label"><?php echo 'Password' ?></label> <div class="col-sm-2"><input type="text" class="form-control" name="password_sstx[]" /> </div> 
     <label class="col-sm-1 col-form-label"><?php echo 'Pin Number' ?></label> <div class="col-sm-2"><input type="text" class="form-control" name="pin_number_sstx[]"/> </div>
</div>

        <label class="col-sm-3 col-form-label">URL (State sales tax) ${urlsstxFieldCount}</label>
        <div class="col-sm-6">
            <input type="url" tabindex="1" class="form-control" name="url_sstx[]" placeholder="Enter URL ${urlsstxFieldCount}" />
        </div>
        <div class="col-sm-2">
            <button type="button" class="btnclr client-add-btn btn" onclick="removeUrlsstxField('urlsstx-group-${urlsstxFieldCount}')"><i class="fa fa-minus"></i></button>
       
        </div>`;

    var outputDivst = document.getElementById('outputsstx');
    outputDivst.appendChild(newUrlsstxGroup);
}

function removeUrlsstxField(groupIdst) {
    var urlsstxGroupToRemove = document.getElementById(groupIdst);
    if (urlsstxGroupToRemove && urlsstxFieldCount > 1) {
        urlsstxGroupToRemove.parentNode.removeChild(urlsstxGroupToRemove);
        urlsstxFieldCount--;
    }
}

</script>
