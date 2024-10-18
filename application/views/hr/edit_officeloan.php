<!-- Add Prerson start -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    .select2{
        display:none;
    }

    .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }


    </style>
<div class="content-wrapper">
    <section class="content-header" style="height: 70px;">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Edit Office Loan') ?></h1>
            <small><?php //echo display('add_loan') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('office_loan') ?></a></li>
                <li class="active" style="color:orange;"><?php echo ('Edit office loan') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
         <!-- Alert Message -->
        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
        ?>
        <div class="btnclr alert alert-info alert-dismissable"  >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message ?>                    
        </div>
        <?php 
            $this->session->unset_userdata('message');
            }
            $error_message = $this->session->userdata('error_message');
            if (isset($error_message)) {
        ?>
        <div class="btnclr alert alert-danger alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error_message ?>                    
        </div>
        <?php 
            $this->session->unset_userdata('error_message');
            }
        ?>
<script>
    $('.alert').delay(1000).fadeOut('slow');
    </script>
        <div class="row">
            <div class="col-sm-12">
               
         
            </div>
        </div>
        <style>
            input {
    border: none;
    background-color: #eee;
 }
textarea:focus, input:focus{
   
    outline: none;
}

   
    </style>
    <?php  //print_r($bank_name); ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title"  style="height:35px;">
                        <div class="panel-title form_employee"  style="float:right ;">
                            <a href="<?php echo base_url('Chrm/manage_officeloan') ?>"    style="color:white;"  class="btnclr btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage Office Loan </a>
                            </div>

                    </div>
                    </div>
                   <!-- <?php //echo form_open_multipart('Cloan/officeloan_update'.$tran_id[0]['transaction_id'],array('class' => 'form-vertical','id' => 'inflow_entry' ))?> -->
                 
                   <?php echo form_open_multipart('Cloan/officeloan_update/'.$transaction_id,array('class' => 'form-vertical','id' => 'validate' ))?>

                 
                   <div class="panel-body">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    	<div class="form-group row">
                            <input type="hidden" value="<?php echo  $transaction_id;  ?>"  name="transaction_id"/>
                            <label for="name" class="col-sm-3 col-form-label"><?php echo display('name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                         
                            <select class="form-control" name="person_id" id="nameofficeloanperson"  tabindex="1">
                                    <option value="<?php echo $person_id; ?>"><?php echo $person_id; ?></option>
                                <?php  foreach($person_list as $person) {?>  
                                    <option value="<?php  echo $person['id']?>"><?php  echo $person['first_name']." ".$person['last_name']?></option>
                              <?php }  ?>
                            </select>


                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label"><?php echo display('phone') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control phone" name="phone" id="phone" required=""  value="<?php echo $phone; ?>" min="0" tabindex="2"/>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="ammount" class="col-sm-3 col-form-label"><?php echo display('ammount') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                               <input type="number" class="form-control" name="ammount" id="ammount" required="" placeholder=""  value="<?php echo $debit; ?>"    min="0" tabindex="3"/>
                           

                            </div>
                        </div>


                         <div class="form-group row" id="payment_from">
                                
                                    <label for="payment_type" class="col-sm-3 col-form-label"><?php
                                        echo display('payment_type');
                                        ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <select name="paytype" id="paytype" class="form-control" value="<?php echo $payment_type; ?>" required="" onchange="bank_paymet(this.value)" tabindex="3">
                            <option value="<?php echo display('cash_payment')?>"><?php echo display('cash_payment')?></option>
                            <option value="<?php echo display('bank_payment')?>"><?php echo display('bank_payment')?></option> 
                            
                            <?php  foreach($payment_typ as $pt){ ?>
                                            <option value="<?php  echo $pt['payment_type'] ;?>"><?php  echo $pt['payment_type'] ;?></option>
                                        <?php  } ?>

                                        </select>    

                                    </div>
                                    </div>







                                    <div class="form-group row" id="bank_div">
                                <label for="bank" class="col-sm-3 col-form-label"><?php
                                    echo display('bank');
                                    ?> <i class="text-danger">*</i></label>

                                
                                    <div class="col-sm-6">

                               <select name="bank_id" class="form-control"  id="bankpayment">
                                        <option value="<?php echo $bank_name1; ?>"><?php echo $selected_bank_name; ?></option>
                                      
                                        <?php foreach($bank_name as $bank){ ?>
                                            <option value="<?php echo $bank['bank_id']?>"><?php echo $bank['bank_name'];?></option>
                                        <?php }?>

                                    </select>
                            
                        </div>
                        </div>




  <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-6">
                               <input type="date" class="form-control datepicker" name="date" id="date" value="<?php echo date("Y-m-d");?>" placeholder="<?php echo display('date') ?>" tabindex="4"/>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="details" class="col-sm-3 col-form-label"><?php echo display('details') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-6">
                                <!-- <textarea class="form-control" name="details" id="details" value="<?php //echo $details; ?>" tabindex="5"></textarea> -->
                                <input type="text" class="form-control datepicker" name="details" id="details" value="<?php echo $details; ?>"  tabindex="4"/>

                            
                            </div>
                        </div>
<?php  if($_SESSION['u_type'] ==2){  ?>
 <div class="form-group row">
                            <label for="details" class="col-sm-3 col-form-label"><?php echo display('status') ?></label>
                            <div class="col-sm-6">
                            <select name="status" class="form-control">
                              <?php  if($status=='0'){   ?>
                                
                                   <option value="<?php  echo $status;  ?>"><?php  echo "Not Paid";  ?></option>
                                       <option value="0"><?php echo "Not Paid" ;?></option>
                            <option value="1"><?php echo "Paid";?></option> 
                            <?php    }else if($status =='1'){   ?>
                                  <option value="<?php  echo $status;  ?>"><?php  echo "Paid";  ?></option>
                                    <option value="0"><?php echo "Not Paid" ;?></option>
                            <option value="1"><?php echo "Paid";?></option> 
                             <?php   }else{   ?>
                                          
                               <option value="0"><?php echo "Not Paid" ;?></option>
                            <option value="1"><?php echo "Paid";?></option> 
                            
                            <?php   }   ?>
</select>
                            
                            </div>
                            </div>
                          <div class="form-group row">
                            
                            
                                         <label for="details" class="col-sm-3 col-form-label"><?php echo display('description') ?></label>
                            <div class="col-sm-6">
                           
                            <textarea class="form-control" cols="30" rows="4" name="description" id="description"><?php echo $description; ?></textarea>
                            </div>
                            
                            
                            
                            
                        </div>

<?php  }  ?>


                     
                      
                      
                            <div class="form-group row">
                            <label for="example-text-input" ></label>
                                <input type="submit" id="add-deposit"  class="btnclr btn" name="add-deposit" value="<?php echo display('save') ?>" tabindex="7"/>

                        </div>
                      
                      
                        </div>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
 


</form>
  </div>
  </div>
  <script>
             function bank_paymet(val){
        if(val=='<?php echo display('bank_payment')?>'){
           var style = 'block';           
        }else{
     var style ='none';
   
        }
           
    document.getElementById('bank_div').style.display = style;
    }
  </script>
  </div>        