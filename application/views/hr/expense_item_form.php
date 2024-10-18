
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>












<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Expense</h1>

            <small> </small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('hrm') ?></a></li>

                <li class="active" style="color:orange">Add Expense Item</li>

            </ol>

        </div>

    </section>

    <style>


.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }





            input {
    border: none;
    background-color: #eee;
 }
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}
.select2{
    display:none;
}
   
    </style>

 <section class="content emply_form">

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


        <!-- New Employee Type -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                    <div class="panel-title" style="height:35px;">

<div class="panel-title form_employee"  style="float:right ;">
    <a href="<?php echo base_url('Chrm/expense_list') ?>"   style="color:white;"  class="btnclr btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage Expense </a>
    </div>

</div>



                        <div class="panel-title">

                            <!-- <h4>Expense Item</h4> -->

                        </div>

                    </div>

                  

                    <div class="panel-body">



                         <?php echo form_open_multipart('Chrm/create_expense','id="validate"') ?>
 	<div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label"><?php echo display('name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-4">
                                <select class="form-control" name="person_id"   id="nameofficeloanperson" tabindex="1">
                                    <option><?php echo display('select_one')?></option>
                                <?php  foreach($person_list as $person) {?>  
                                    <option value="<?php  echo $person['first_name']." ".$person['last_name']?>"><?php  echo $person['first_name']." ".$person['last_name']?></option>
                              <?php }  ?>
                                </select>
                            </div>
                                   <label for="first_name" class="col-sm-2 col-form-div">Expenses Name <i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                            <input name="expense_name" class="form-control" type="text" placeholder="Expenses Name" required id="expense_name">

                        </div>
                        </div>
                    <div class="form-group row">

                 

                         <label for="last_name" class="col-sm-2 col-form-div">Date<i class="text-danger">*</i></label>

                        <div class="col-sm-4">
                    <input class="datepicker form-control" type="date" size="50" name="expense_date" id="expense_date" required value="" tabindex="4" />
                        </div>
                                         <label for="designation" class="col-sm-2 col-form-div">Amount <i class="text-danger">*</i></label>

                        <div class="col-sm-4">
                        <span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>
                <input name="expense_amount"  type="text" placeholder="0.00" required id="expense_amount">
    </span>
                        </div>

                    </div>

                    <div class="form-group row">

       

       <label for="last_name" class="col-sm-2 col-form-div">Expected Payment Date<i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                           <input class="datepicker form-control" type="date" size="50" name="expense_payment_date" id="expense_payment_date" required value="" tabindex="4" />
                        </div>

    <label for="address_line_1" class="col-sm-2 col-form-div">Description</label>

                        <div class="col-sm-4">

                           <textarea name="description" class="form-control"  id="address_line_1"></textarea> 

                        </div>
                    </div>

                    <div class="form-group row">

                    

                       
                
                         

                    </div>


                    



<br>
                        <button type="submit" style="float:left;color:white;"  class="btnclr btn btn-success w-md m-b-5">Save</button>


                <?php echo form_close() ?>

                    </div>

                

                </div>

            </div>

        </div>

    </section>

</div>