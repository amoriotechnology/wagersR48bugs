
<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
 <script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.21.0/slimselect.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.21.0/slimselect.js"></script> -->

<!-- Customer type change by javascript end -->

<style>
.panel-body {
    padding: 10px;
}
   .removebundle, .addbundle{
        padding:5px;
        border-radius:5px;
    }
    /*   Bootstrap Country Select CSS  */
 button[data-toggle="dropdown"].btn-default,
button[data-toggle="dropdown"]:hover {
background-color: white !important;
color: #2c3e50 !important;
border: 2px solid #dce4ec;
}
.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
    width: 420px;
}
.cus{
    text-align: center;
}
.ui-front{
    display:none;
}
#block_container
{height:40px;
    text-align:center;
}
#bloc1, #bloc2
{text-align:center;
    font-weight:bold;
    display:inline;
}
  .Row {
    display: table;
    width: 100%; /*Optional*/
    table-layout: fixed; /*Optional*/
    border-spacing: 10px; /*Optional*/
}
   tfoot tr{
                        height: 45px;
                    }
.Column {
    display: table-cell;
 
}
.input-symbol-euro {
  position: absolute;
  font-size: 14px;
}
.input-symbol-euro input {
  padding-left: 18px;
}
.input-symbol-euro:after {
  position: absolute;
  top: 7px;
 content: '<?php echo $currency; ?>';
  left: 5px;
}
    </style>



<!-- Add New Invoice Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo "Create Invoice" ?></h1>

            <small><?php echo "Create New Invoice" ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('invoice') ?></a></li>

                <li class="active"><?php echo "Create Invoice" ?></li>

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

  




        <!--Add Invoice -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">
<div id="block_container">
                                <div id="bloc1" style="float:left;">
                          <h4><?php echo "Create Invoice" ?></h4>
                               </div> 
                             <div id="bloc2" style="float:right;">
                            <?php if($this->permission1->method('manage_invoice','read')->access()){ ?>

                    <a style="background-color:#38469f;color:white;" href="<?php echo base_url('Cinvoice/manage_invoice') ?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_invoice') ?> </a>

                    <?php }?>
                     </div>    </div>






                        


                        </div>

                    </div>

                 

<?php    $payment_id=rand(); ?>

                    

                    <div class="panel-body">

                      
                        <form id="insert_trucking"  method="post">  
                        <div class="row">



                            <div class="col-sm-6" id="payment_from_1">

                               <div class="form-group row">
                                    <label for="customer_name" class="col-sm-4 col-form-label"><?php
                                        echo display('customer_name');
                                        ?><i class="text-danger">*</i> </label>
                                    <div class="col-sm-7">
                                    <select name="customer_name" class="form-control customer_name" onselect="calculate();" id="customer_name">
<option value="">Select Customer</option>
<?php foreach($customer_details as $customer){?>
    <option value="<?php echo html_escape($customer['customer_id'])?>"><?php echo html_escape($customer['customer_name']);?></option>
<?php }?>
</select>
                                        <input id="autocomplete_customer_id" class="customer_hidden_value abc" type="hidden" name="customer_id"  >
                                    </div>
                                     <div class="col-sm-1">
                                     <?php if($this->permission1->method('add_customer','create')->access()){ ?>
                                        <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" style="color:white;background-color:#38469f;"  data-toggle="modal" data-target="#cust_info"><i class="fa fa-user-circle"></i></a>
                                <?php } ?>
                                 </div>
                                </div>
                            </div>
                            <div class="col-sm-6" id="payment_from">
<div class="form-group row">
    <label for="payment_type" class="col-sm-4 col-form-label"><?php
        echo display('payment_type');
        ?> <i class="text-danger">*</i></label>
    <div class="col-sm-7">
        <select name="paytype" id="paytype" class="form-control" required=""  tabindex="3" style="width100">
        <option value="Select Payment Type"><?php echo "Select Payment Type"; ?></option>
                                        <?php  foreach($payment_typ as $pt){ ?>
                                            <option value="<?php  echo $pt['payment_type'] ;?>"><?php  echo $pt['payment_type'] ;?></option>
                                        <?php  } ?>
        </select>
    </div>
      <div  class=" col-sm-1">
         <!-- <a href="#" class="client-add-btn btn " aria-hidden="true" data-toggle="modal" data-target="#payment_type"><i class="ti-plus m-r-2"></i></a> -->
         <!-- <a href="#" class="client-add-btn btn " aria-hidden="true" >Add Payment</a> -->
         <!-- <a href="#" class="client-add-btn btn " aria-hidden="true" data-toggle="modal" data-target="#payment_type"><i class="ti-plus m-r-2"></i></a> -->
                                         <a  class="client-add-btn btn" aria-hidden="true" style="color:white;background-color:#38469f;"  data-toggle="modal" data-target="#payment_type" ><i class="fa fa-plus"></i></a>
    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
                        <input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Sales Invoice date <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <?php
                                        $date = date('Y-m-d');
                                        ?>
                                        <input class=" form-control" type="date" size="50" name="invoice_date" id="date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                                    </div>
                                </div>
                                      <div class="form-group row">
                                    <label for="billing_address" class="col-sm-4 col-form-label">Billing Address<i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <textarea rows="5" cols="50" name="billing_address" class=" form-control" placeholder='Billing Address' id="billing_address"> </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
<label for="shipping_address" class="col-sm-4 col-form-label">Shipping Address</label>
<div class="col-sm-8">
    <textarea rows="5" cols="50" name="shipping_address" class=" form-control" placeholder='Shipping Address' id="shipping_address"> </textarea>
</div>
</div>
                                <div class="form-group row">
                                    <label for="payment_terms" class="col-sm-4 col-form-label">Payment Terms<i class="text-danger">*</i></label>
                                    <div class="col-sm-7">
                                        <select   name="terms" id="terms" class=" form-control" placeholder='Payment Terms'>
                                         <option value="Select Payment Terms">Select Payment Terms</option>
                                        <option value="CAD">CAD</option>
                                        <option value="COD">COD</option>
                                        <option value="ADVANCE">ADVANCE</option>
                                        <option value="7DAYS">7 DAYS</option>
                                        <option value="15DAYS">15 DAYS</option>
                                        <option value="30DAYS">30 DAYS</option>
                                        <option value="45DAYS">45 DAYS</option>
                                        <option value="60DAYS">60 DAYS</option>
                                        <option value="75DAYS">75 DAYS</option>
                                        <option value="90DAYS">90 DAYS</option>
                                        <option value="180DAYS">180 DAYS</option>
                                           <?php foreach($payment_terms as $inv){ ?>
          <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                               <?php    }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                  <a href="#" class="client-add-btn btn " aria-hidden="true" style="color:white;background-color:#38469f;"  data-toggle="modal" data-target="#payment_type_new" ><i class="fa fa-plus"></i></a>
                                </div>
                                   </div>
                                  <!-- <div class="form-group row">
                                    <label for="billing_address" class="col-sm-4 col-form-label">Number of days</label>
                                    <div class="col-sm-8">
                                        <select type="text"  name="number_of_days" id=number_of_days class=" form-control" placeholder='Number of days' id="number_of_days">
                                            <option value="">number_of_days</option>
                                            <?php
                                            for($i=1;$i<100;$i++)
                                            {
                                                ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?>days</option>
                                                <?php
                                            }
                                            ?>
                                            <select>
                                    </div>
                                </div>  -->
                           
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"> Invoice Number<i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" placeholder="Commercial Invoice Number" type="text" name="commercial_invoice_number"  value="<?php if(!empty($voucher_no[0]['voucher'])){
                                        $curYear = date('Y');
                                        $month = date('m');
                                    $vn = substr($voucher_no[0]['voucher'],9)+1;
                                    echo $voucher_n = 'NS'. $curYear.$month.'-'.$vn;
                                    }else{
                                            $curYear = date('Y');
                                        $month = date('m');
                                    echo $voucher_n = 'NS'. $curYear.$month.'-'.'1';
                                    } ?>" readonly />
                                    </div>
                                </div>
                                      <div class="form-group row">
                                    <label for="container_number" class="col-sm-4 col-form-label">Container Number </label>
                                    <div class="col-sm-8">
                                    <!-- <select name="container_number"  class="form-control " required="" tabindex="1">
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {container_no}
                                            <option value="{container_no}">{container_no}</option>
                                            {/container_no}
                                        </select> -->
                                        <input type="text" name="container_no" class="form-control">
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">B/L No</label>
                                    <div class="col-sm-8">
                                    <!-- <select name="bl_no" id="" class="form-control " required="" tabindex="1">
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {booking_no}
                                            <option value="{booking_no}">{booking_no}</option>
                                            {/booking_no}
                                        </select> -->
                                        <input type="text" name="bl_no" class="form-control">
                                    </div>
                                </div>
<!--
                                <div class="form-group row">
                                    <label for="port_of_discharge" class="col-sm-4 col-form-label">Port of discharge</label>
                                    <div class="col-sm-8">
                                        <input name="port_of_discharge" class=" form-control" placeholder='Port of discharge' id="port_of_discharge" />
                                    </div>
                                </div> -->
                                  <div class="form-group row">
                                    <label for="port_of_discharge" class="col-sm-4 col-form-label">  Payment Due date<i class="text-danger">*</i></label>
                                   <div class="col-sm-8">
                                        
                                        <input class="form-control" type="date" size="50" name="payment_due_date" id="payment_due_date" required  tabindex="4" />
                                       <!-- <select   name="payment_due_date" id="payment_due_date" class=" form-control" placeholder='Payment Terms' >
                                         <option value=""></option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ETA" class="col-sm-4 col-form-label">Estimated Time of Arrival </label>
                                   <div class="col-sm-8">
                                      
                                        <input class="form-control" type="date" size="50" name="eta" id="date1" required  tabindex="4" />
                                    </div>
                                </div>
                                     <div class="form-group row">
                                    <label for="ETA" class="col-sm-4 col-form-label">Estimated Time of Departure</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="etd" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ETA" class="col-sm-4 col-form-label">Attachments</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                </div>
                            </div>
  <!-- <div class="form-group row">
      <button type="button" class="btn " style="color:white;background-color: #38469F;" data-toggle="modal" data-target="#packmodal" id="packbutton">Choose Packing Invoice   </button>
      <input type="text" name="packing_id" value="" id="packing_id" style="font-weight:bold;">
  </div> -->
                        </div>

                        <br>
                <style>
                      .taxtab {
     table-layout: fixed;
     width: 100%;
     text-align: center;
     border-collapse: collapse;
  }
  .taxtab td{
     border: 1px solid #dddddd;
     padding: 8px;
  }
  table th{
    font-size:12px;
  }
  input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
                </style>      
                        <div class="table-responsive">
                       
<div id="content">

<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_1" >
                                <thead>
                                     <tr>

                                            <th rowspan="2" class="text-center" style="width:180px;" >Product Name<i class="text-danger">*</i>  &nbsp;&nbsp; <a href="#" class="btn" style="color:white;background-color:#38469f;"  aria-hidden="true" data-toggle="modal" data-target="#product_info"><i class="ti-plus m-r-2"></i></a></th>
                                            <th rowspan="2" class="text-center" style="width:60px;">Bundle No<i class="text-danger">*</i></th>
                                            <th rowspan="2"  class="text-center">Description</th>
                                            <th rowspan="2" class="text-center" style="width:60px;">Thick ness<i class="text-danger">*</i></th>
                                            <th rowspan="2" class="text-center">Supplier Block No<i class="text-danger">*</i></th>

                                            <th rowspan="2" class="text-center" >Supplier Slab No<i class="text-danger">*</i> </th>
                                            <th colspan="2"   style="width:150px;" class="text-center">Gross Measurement<i class="text-danger">*</i> </th>
                                            <th rowspan="2" class="text-center">Gross Sq. Ft</th>
                                           
                                            <th rowspan="2" style="width:40px;" class="text-center">Slab No<i class="text-danger">*</i></th>
                                            <th colspan="2"  style="width:150px;" class="text-center">Net Measure<i class="text-danger">*</i></th>
                                            <th rowspan="2" class="text-center">Net Sq. Ft</th>
                                            <th rowspan="2"  class="text-center">Cost per Sq. Ft</th>
                                            <th rowspan="2"  class="text-center">Cost per Slab</th>
                                            <th rowspan="2"  class="text-center">Sales<br/>Price per Sq. Ft</th>
                                            <th rowspan="2"  class="text-center">Sales Slab Price</th>
                                            <th rowspan="2" class="text-center">Weight</th>
                                            <th rowspan="2" class="text-center">Origin</th>
                                           
                                            <th rowspan="2" style="width: 100px" class="text-center">Total</th>
                                            <th rowspan="2" class="text-center">Action</th>
                                        </tr>

                                        <tr>
                                             <th class="text-center">Width</th>
                                            <th class="text-center">Height</th>  
                                          <th class="text-center"  >Width</th>
                                            <th class="text-center" >Height</th>  
                                        </tr>

                                </thead>
                                <style>
input{
    border:none;
}
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {

padding:5px;
}
table {

  table-layout: fixed;
  width: 100px;> 1
}

th,
td {
    word-wrap: break-word
  border: 1px solid black;
  width: 80px;

}
.select2 {
    display:none;
}
#download_select:focus option:first-of-type , #print_select:focus option:first-of-type{
    display: none;
}
</style>
                                <tbody id="addPurchaseItem_1">
                                	<?php foreach($addcart_details as $ad){  ?>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="tableid[]" id="tableid_1" value="<?php if($ad['tableid'] == '10'){echo 1; }else{ echo $ad['tableid']; }?>" />
                                            
                                        <select name="prodt[]" id="prodt_1" style="width:160px;"  class="form-control product_name" >
                                        <option value="<?php  echo $ad['product_name'].'-'.$ad['product_model']; ?>" selected><?php  echo $ad['product_name'].'-'.$ad['product_model']; ?></option>
                                            <?php 
                                       
                                            foreach($product as $tx){?>
                                       
                                                <option value="<?php echo $tx['product_name'].'-'.$tx['product_model'];?>">  <?php echo $tx['product_name'].'-'.$tx['product_model'];  ?></option>
                                           <?php } ?>
                                        </select>
                                        <input type='hidden' class='common_product autocomplete_hidden_value  product_id_1' name='product_id[]' value="<?php echo $ad['product_id']; ?>" id='SchoolHiddenId_1' />
                                        </td>
                                         <td>
                                                <input type="text" id="bundle_no_1" value="<?php echo $ad['bundle_no']; ?>" name="bundle_no[]" required="" class="bundle_no form-control" />
                                            </td>
                                        <td>
                                                <input type="text" id="description_1" name="description[]" value="<?php echo $ad['description']; ?>" class="form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text" name="thickness[]" id="thickness_1" value="<?php echo $ad['thickness']; ?>" required="" class="form-control"/>
                                            </td>
                                            <td>
                                                <input type="text" id="supplier_b_no_1" name="supplier_block_no[]" value="<?php echo $ad['supplier_block_no']; ?>" required="" class="form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="supplier_s_no_1" name="supplier_slab_no[]" value="<?php echo $ad['supplier_slab_no']; ?>" required="" class="form-control"/>
                                            </td>
                                           <td>
                                                <input type="text" id="gross_width_1" name="gross_width[]" required="" class="gross_width  form-control" value="<?php echo $ad['g_width']; ?>" />
                                            </td>
                                            <td>
                                                <input type="text" id="gross_height_1" name="gross_height[]"  required="" class="gross_height form-control" value="<?php echo $ad['g_height']; ?>" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"   style="width:60px;" readonly id="gross_sq_ft_1" name="gross_sq_ft[]" value="<?php echo $ad['gross_sq_ft']; ?>" class="gross_sq_ft form-control"/>
                                            </td>
                                           
                                        
                                            <td style="text-align:center;" >
                                                 <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_1" name="slab_no[]" value="<?php echo $ad['slab_no']; ?>"  readonly  required=""/> 
                                            </td>
                                            <td>
                                                <input type="text" id="net_width_1" name="net_width[]"  required="" class="net_width form-control" value="<?php echo $ad['n_width']; ?>" />
                                            </td>
                                            <td>
                                                <input type="text" id="net_height_1" name="net_height[]"   required="" class="net_height form-control" value="<?php echo $ad['n_width']; ?>" />
                                            </td>
                                            <td >
                                                <input type="text"   style="width:60px;" value="<?php echo $ad['net_sq_ft']; ?>" readonly id="net_sq_ft_1" name="net_sq_ft[]" class="net_sq_ft form-control"/>
                                            </td>
                                            <td>
                                	

           
  <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_1"  value="<?php echo $ad['cost_sq_ft']; ?>" name="cost_sq_ft[]" readonly  style="width:70px;" value="0.00"  class="cost_sq_ft form-control" ></span>

                                        
                                            <td >
                     
      <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_1" value="<?php echo $ad['cost_sq_slab']; ?>" name="cost_sq_slab[]" readonly   style="width:70px;" value="0.00"  class="form-control"/></span>
 


                                               
                                            </td>
                                            <td>
                                        
         <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_1" value="<?php echo $ad['sales_amt_sq_ft']; ?>"  name="sales_amt_sq_ft[]"  style="width:70px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>



                                               
                                            </td>
                                        
                                            <td >
                                    
      <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_1" value="<?php echo $ad['sales_slab_amt']; ?>" name="sales_slab_amt[]"  style="width:70px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>
  


                                             
                                            </td>
                                            <td>
                                                <input type="text" id="weight_1" value="<?php echo $ad['weight']; ?>" name="weight[]"  class="form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="origin_1" value="<?php echo $ad['origin']; ?>" name="origin[]" class="origin form-control"/>
                                            </td>

                                            <td >
                                               <span class="input-symbol-euro"><input  type="text"  class="total_price form-control" style="width:80px;" readonly value="<?php echo $ad['total_amt']; ?>"  id="total_amt_1"     name="total_amt[]"/></span>
                                            </td>
                                          
                                            <td style="text-align:center;">
                                                <button  class='delete btn btn-danger' type='button' value='Delete'><i class="fa fa-trash"></i></button>
                                            </td>
                                            
                                            </tr>
                                          <?php  } ?>
                                            </tbody>
                                <tfoot>
                                    <tr>
                                   <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_gross_1" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> 
            </td>
             <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_1" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> 
            </td>
              <!-- <td style="text-align:right;" colspan="4"><b>Weight :</b></td>
                                        <td >
             <input type="text" id="overall_weight_1" name="overall_weight[]"  class="overall_weight form-control"  style="width: 60px"  readonly="readonly"  /> 
            </td> -->

                                        <td style="text-align:right;" colspan="6"><b>TOTAL :</b></td>
                                        <td >
           <span class="input-symbol-euro">    <input type="text" id="total_net" name="total_net[]"   class="form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span>
            </td>
                        
                                           
                                    </tr>
                                   
 <!--                                           <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">-->
 <!--                                              <td colspan="20" style="text-align: end;">-->

                                                
 <!--                                           </td>-->
 <!--                                           <td colspan="21" style="text-align: end;">-->
 <!--<i id="buddle_1" class="btn-danger removebundle fa fa-minus"  aria-hidden="true" onclick="removebundle(); ">Bundle</i>    -->

 <!--                                           </td>-->
                                     
 <!--                                           </tr>-->
                                            </tfoot>
                      
                            </table>
                             <i id="buddle_1" class="addbundle fa fa-plus" style="float:right;color:white;background-color: #38469f;" aria-hidden="true" onclick="addbundle(); ">Bundle</i>    
                         </div>
                             <table class="taxtab table table-bordered table-hover">
                        <tr>
                        <td class="hiden" style="width:50%;border:none;text-align:end;font-weight:bold;">
                            Today's Rate : 
                         </td>
                
                               <td class="hiden" style="text-align-last: center;padding:5px;background-color: #38469f;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                 = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" class="custocurrency_rate"/>&nbsp;<label for="custocurrency" style="color:white;background-color: #38469f;"></label></td>
                    <td style="border:none;text-align:right;font-weight:bold;">Tax : 
                                 </td>
                                <td style="width:20%">
<select name="tx"  id="product_tax" class="form-control" >
<option value="Select the Tax" selected="selected">Select the Tax</option>
<?php foreach($tax as $tx){?>
  
    <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
<?php } ?>
</select>
</td>
</tr>
</table>
<table border="0" class="overall table table-bordered table-hover">
  <tr><td style='border:none;'> </td><td style='border:none;'>   </td> <td style='border:none;'> </td>
   <td style='border:none;'></td>  <td style='border:none;'></td>  <td style='border:none;'></td>  <td colspan="3" style="border:none;width: 150px;
    text-align: -webkit-right;">Overall Gross Sq.Ft:</td>  <td style='border:none;width: 150px;'><input type="text" id="total_gross" name="total_gross"   class="form-control"   readonly="readonly"  />
     </td>  <td style="width: 150px;text-align:right;border:none;" colspan="4"><b>Overall Net Sq.Ft :</b></td>
    <td style='border:none;width: 150px;'> <input type="text" id="total_net" name="total_net"  class="form-control"    readonly="readonly"  /> 
</td>  <td style="text-align:right;border:none;width:500px;" colspan="3"><b>Overall TOTAL :&nbsp;&nbsp;</b></td><td style="border:none;"><span class="input-symbol-euro">    <input type="text" id="Over_all_Total" name="Over_all_Total" style="width:150px;" class="form-control"   value="0.00"  readonly="readonly"  /> </span></td> </tr>

<tr>
                                   
                                   <td style="text-align:right;border:none;width:250px;" colspan="18"><b>TAX DETAILS :</b></td>
                                   <td style='width:150px;border:none;padding-bottom: 40px;'>
                                  <span class="input-symbol-euro">     <input type="text" class="form-control" style="width:150px;"  id="tax_details" value="0.00" name="tax_details"  readonly="readonly" /></span></td>

                               </td>
                               
                                      
                               </tr>
                                    <tr> <td style="text-align:right;border:none;" colspan="18"><b>GRAND TOTAL :</b></td>
                                    <td style='border:none;'>
               <span class="input-symbol-euro">   <input type="text" id="gtotal"   class="form-control" style="width:150px;" name="gtotal" value="0.00"  readonly="readonly" /></span>
    </td>
                                       

                                           
                                    </tr>
                                  
                                    <tr>
                                        
                                    
                                    
                                    <td style="text-align:right;border:none;"  colspan="18"><b>GRAND TOTAL :</b><br/><b>(Preferred Currency)</b></td>
                                    <td style='border:none;'>
          <table border="0">
      <tr>
        <td class="cus" name="cus" style="width: 40px;"></td>
<td style='border:none;'>    <input  type="text"  readonly id="customer_gtotal"   style="width:100px;"  name="customer_gtotal"  required   /></td>
          </tr>
   </table>                               

                                            <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr> 
                                    <!-- -->
                                    <tr id="amt">
                                   
                                           <td style="text-align:right;"  colspan="19"><b>Amount Paid :</b></td>
                                          
                                            <td style="border:none;">
                                            <table border="0">
      <tr>
        <td class="cus" name="cus" style="width: 40px;"></td>
<td> <input  type="text"  readonly id="amount_paid" style="width:-webkit-fill-available;"  name="amount_paid"  required   /></td> 
     </tr>
   </table>
   
   <div class="container">
          
          <div class="cur-box">
  <select class="cur-item-1"   >


  <option value="AFN">AFN - Afghan Afghani</option>
  <option value="ALL">ALL - Albanian Lek</option>
  <option value="DZD">DZD - Algerian Dinar</option>
  <option value="AOA">AOA - Angolan Kwanza</option>
  <option value="ARS">ARS - Argentine Peso</option>
  <option value="AMD">AMD - Armenian Dram</option>
  <option value="AWG">AWG - Aruban Florin</option>
  <option value="AUD">AUD - Australian Dollar</option>
  <option value="AZN">AZN - Azerbaijani Manat</option>
  <option value="BSD">BSD - Bahamian Dollar</option>
  <option value="BHD">BHD - Bahraini Dinar</option>
  <option value="BDT">BDT - Bangladeshi Taka</option>
  <option value="BBD">BBD - Barbadian Dollar</option>
  <option value="BYR">BYR - Belarusian Ruble</option>
  <option value="BEF">BEF - Belgian Franc</option>
  <option value="BZD">BZD - Belize Dollar</option>
  <option value="BMD">BMD - Bermudan Dollar</option>
  <option value="BTN">BTN - Bhutanese Ngultrum</option>
  <option value="BTC">BTC - Bitcoin</option>
  <option value="BOB">BOB - Bolivian Boliviano</option>
  <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
  <option value="BWP">BWP - Botswanan Pula</option>
  <option value="BRL">BRL - Brazilian Real</option>
  <option value="GBP">GBP - British Pound Sterling</option>
  <option value="BND">BND - Brunei Dollar</option>
  <option value="BGN">BGN - Bulgarian Lev</option>
  <option value="BIF">BIF - Burundian Franc</option>
  <option value="KHR">KHR - Cambodian Riel</option>
  <option value="CAD">CAD - Canadian Dollar</option>
  <option value="CVE">CVE - Cape Verdean Escudo</option>
  <option value="KYD">KYD - Cayman Islands Dollar</option>
  <option value="XOF">XOF - CFA Franc BCEAO</option>
  <option value="XAF">XAF - CFA Franc BEAC</option>
  <option value="XPF">XPF - CFP Franc</option>
  <option value="CLP">CLP - Chilean Peso</option>
  <option value="CNY">CNY - Chinese Yuan</option>
  <option value="COP">COP - Colombian Peso</option>
  <option value="KMF">KMF - Comorian Franc</option>
  <option value="CDF">CDF - Congolese Franc</option>
  <option value="CRC">CRC - Costa Rican ColÃ³n</option>
  <option value="HRK">HRK - Croatian Kuna</option>
  <option value="CUC">CUC - Cuban Convertible Peso</option>
  <option value="CZK">CZK - Czech Republic Koruna</option>
  <option value="DKK">DKK - Danish Krone</option>
  <option value="DJF">DJF - Djiboutian Franc</option>
  <option value="DOP">DOP - Dominican Peso</option>
  <option value="XCD">XCD - East Caribbean Dollar</option>
  <option value="EGP">EGP - Egyptian Pound</option>
  <option value="ERN">ERN - Eritrean Nakfa</option>
  <option value="EEK">EEK - Estonian Kroon</option>
  <option value="ETB">ETB - Ethiopian Birr</option>
  <option value="EUR">EUR - Euro</option>
  <option value="FKP">FKP - Falkland Islands Pound</option>
  <option value="FJD">FJD - Fijian Dollar</option>
  <option value="GMD">GMD - Gambian Dalasi</option>
  <option value="GEL">GEL - Georgian Lari</option>
  <option value="DEM">DEM - German Mark</option>
  <option value="GHS">GHS - Ghanaian Cedi</option>
  <option value="GIP">GIP - Gibraltar Pound</option>
  <option value="GRD">GRD - Greek Drachma</option>
  <option value="GTQ">GTQ - Guatemalan Quetzal</option>
  <option value="GNF">GNF - Guinean Franc</option>
  <option value="GYD">GYD - Guyanaese Dollar</option>
  <option value="HTG">HTG - Haitian Gourde</option>
  <option value="HNL">HNL - Honduran Lempira</option>
  <option value="HKD">HKD - Hong Kong Dollar</option>
  <option value="HUF">HUF - Hungarian Forint</option>
  <option value="ISK">ISK - Icelandic KrÃ³na</option>
  <option value="INR">INR - Indian Rupee</option>
  <option value="IDR">IDR - Indonesian Rupiah</option>
  <option value="IRR">IRR - Iranian Rial</option>
  <option value="IQD">IQD - Iraqi Dinar</option>
  <option value="ILS">ILS - Israeli New Sheqel</option>
  <option value="ITL">ITL - Italian Lira</option>
  <option value="JMD">JMD - Jamaican Dollar</option>
  <option value="JPY">JPY - Japanese Yen</option>
  <option value="JOD">JOD - Jordanian Dinar</option>
  <option value="KZT">KZT - Kazakhstani Tenge</option>
  <option value="KES">KES - Kenyan Shilling</option>
  <option value="KWD">KWD - Kuwaiti Dinar</option>
  <option value="KGS">KGS - Kyrgystani Som</option>
  <option value="LAK">LAK - Laotian Kip</option>
  <option value="LVL">LVL - Latvian Lats</option>
  <option value="LBP">LBP - Lebanese Pound</option>
  <option value="LSL">LSL - Lesotho Loti</option>
  <option value="LRD">LRD - Liberian Dollar</option>
  <option value="LYD">LYD - Libyan Dinar</option>
  <option value="LTL">LTL - Lithuanian Litas</option>
  <option value="MOP">MOP - Macanese Pataca</option>
  <option value="MKD">MKD - Macedonian Denar</option>
  <option value="MGA">MGA - Malagasy Ariary</option>
  <option value="MWK">MWK - Malawian Kwacha</option>
  <option value="MYR">MYR - Malaysian Ringgit</option>
  <option value="MVR">MVR - Maldivian Rufiyaa</option>
  <option value="MRO">MRO - Mauritanian Ouguiya</option>
  <option value="MUR">MUR - Mauritian Rupee</option>
  <option value="MXN">MXN - Mexican Peso</option>
  <option value="MDL">MDL - Moldovan Leu</option>
  <option value="MNT">MNT - Mongolian Tugrik</option>
  <option value="MAD">MAD - Moroccan Dirham</option>
  <option value="MZM">MZM - Mozambican Metical</option>
  <option value="MMK">MMK - Myanmar Kyat</option>
  <option value="NAD">NAD - Namibian Dollar</option>
  <option value="NPR">NPR - Nepalese Rupee</option>
  <option value="ANG">ANG - Netherlands Antillean Guilder</option>
  <option value="TWD">TWD - New Taiwan Dollar</option>
  <option value="NZD">NZD - New Zealand Dollar</option>
  <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
  <option value="NGN">NGN - Nigerian Naira</option>
  <option value="KPW">KPW - North Korean Won</option>
  <option value="NOK">NOK - Norwegian Krone</option>
  <option value="OMR">OMR - Omani Rial</option>
  <option value="PKR">PKR - Pakistani Rupee</option>
  <option value="PAB">PAB - Panamanian Balboa</option>
  <option value="PGK">PGK - Papua New Guinean Kina</option>
  <option value="PYG">PYG - Paraguayan Guarani</option>
  <option value="PEN">PEN - Peruvian Nuevo Sol</option>
  <option value="PHP">PHP - Philippine Peso</option>
  <option value="PLN">PLN - Polish Zloty</option>
  <option value="QAR">QAR - Qatari Rial</option>
  <option value="RON">RON - Romanian Leu</option>
  <option value="RUB">RUB - Russian Ruble</option>
  <option value="RWF">RWF - Rwandan Franc</option>
  <option value="SVC">SVC - Salvadoran ColÃ³n</option>
  <option value="WST">WST - Samoan Tala</option>
  <option value="SAR">SAR - Saudi Riyal</option>
  <option value="RSD">RSD - Serbian Dinar</option>
  <option value="SCR">SCR - Seychellois Rupee</option>
  <option value="SLL">SLL - Sierra Leonean Leone</option>
  <option value="SGD">SGD - Singapore Dollar</option>
  <option value="SKK">SKK - Slovak Koruna</option>
  <option value="SBD">SBD - Solomon Islands Dollar</option>
  <option value="SOS">SOS - Somali Shilling</option>
  <option value="ZAR">ZAR - South African Rand</option>
  <option value="KRW">KRW - South Korean Won</option>
  <option value="XDR">XDR - Special Drawing Rights</option>
  <option value="LKR">LKR - Sri Lankan Rupee</option>
  <option value="SHP">SHP - St. Helena Pound</option>
  <option value="SDG">SDG - Sudanese Pound</option>
  <option value="SRD">SRD - Surinamese Dollar</option>
  <option value="SZL">SZL - Swazi Lilangeni</option>
  <option value="SEK">SEK - Swedish Krona</option>
  <option value="CHF">CHF - Swiss Franc</option>
  <option value="SYP">SYP - Syrian Pound</option>
  <option value="STD">STD - São Tomé and Príncipe Dobra</option>
  <option value="TJS">TJS - Tajikistani Somoni</option>
  <option value="TZS">TZS - Tanzanian Shilling</option>
  <option value="THB">THB - Thai Baht</option>
  <option value="TOP">TOP - Tongan pa'anga</option>
  <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
  <option value="TND">TND - Tunisian Dinar</option>
  <option value="TRY">TRY - Turkish Lira</option>
  <option value="TMT">TMT - Turkmenistani Manat</option>
  <option value="UGX">UGX - Ugandan Shilling</option>
  <option value="UAH">UAH - Ukrainian Hryvnia</option>
  <option value="AED">AED - United Arab Emirates Dirham</option>
  <option value="UYU">UYU - Uruguayan Peso</option>
  <option value="USD">USD - US Dollar</option>
  <option value="UZS">UZS - Uzbekistan Som</option>
  <option value="VUV">VUV - Vanuatu Vatu</option>
  <option value="VEF">VEF - Venezuelan BolÃ­var</option>
  <option value="VND">VND - Vietnamese Dong</option>
  <option value="YER">YER - Yemeni Rial</option>
  <option value="ZMK">ZMK - Zambian Kwacha</option>
          </select>
          <!-- <input type="number" name="" id="input_amount" value="1"> -->
          <input type="number"  class="cur-input-1">

      </div>
    
      <!-- <div class="currency">
          <select name="" id="output_currency"> -->
          <div class="cur-box">
  <select class="cur-item-2">

  
  <option value="AFN">AFN - Afghan Afghani</option>
  <option value="ALL">ALL - Albanian Lek</option>
  <option value="DZD">DZD - Algerian Dinar</option>
  <option value="AOA">AOA - Angolan Kwanza</option>
  <option value="ARS">ARS - Argentine Peso</option>
  <option value="AMD">AMD - Armenian Dram</option>
  <option value="AWG">AWG - Aruban Florin</option>
  <option value="AUD">AUD - Australian Dollar</option>
  <option value="AZN">AZN - Azerbaijani Manat</option>
  <option value="BSD">BSD - Bahamian Dollar</option>
  <option value="BHD">BHD - Bahraini Dinar</option>
  <option value="BDT">BDT - Bangladeshi Taka</option>
  <option value="BBD">BBD - Barbadian Dollar</option>
  <option value="BYR">BYR - Belarusian Ruble</option>
  <option value="BEF">BEF - Belgian Franc</option>
  <option value="BZD">BZD - Belize Dollar</option>
  <option value="BMD">BMD - Bermudan Dollar</option>
  <option value="BTN">BTN - Bhutanese Ngultrum</option>
  <option value="BTC">BTC - Bitcoin</option>
  <option value="BOB">BOB - Bolivian Boliviano</option>
  <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
  <option value="BWP">BWP - Botswanan Pula</option>
  <option value="BRL">BRL - Brazilian Real</option>
  <option value="GBP">GBP - British Pound Sterling</option>
  <option value="BND">BND - Brunei Dollar</option>
  <option value="BGN">BGN - Bulgarian Lev</option>
  <option value="BIF">BIF - Burundian Franc</option>
  <option value="KHR">KHR - Cambodian Riel</option>
  <option value="CAD">CAD - Canadian Dollar</option>
  <option value="CVE">CVE - Cape Verdean Escudo</option>
  <option value="KYD">KYD - Cayman Islands Dollar</option>
  <option value="XOF">XOF - CFA Franc BCEAO</option>
  <option value="XAF">XAF - CFA Franc BEAC</option>
  <option value="XPF">XPF - CFP Franc</option>
  <option value="CLP">CLP - Chilean Peso</option>
  <option value="CNY">CNY - Chinese Yuan</option>
  <option value="COP">COP - Colombian Peso</option>
  <option value="KMF">KMF - Comorian Franc</option>
  <option value="CDF">CDF - Congolese Franc</option>
  <option value="CRC">CRC - Costa Rican ColÃ³n</option>
  <option value="HRK">HRK - Croatian Kuna</option>
  <option value="CUC">CUC - Cuban Convertible Peso</option>
  <option value="CZK">CZK - Czech Republic Koruna</option>
  <option value="DKK">DKK - Danish Krone</option>
  <option value="DJF">DJF - Djiboutian Franc</option>
  <option value="DOP">DOP - Dominican Peso</option>
  <option value="XCD">XCD - East Caribbean Dollar</option>
  <option value="EGP">EGP - Egyptian Pound</option>
  <option value="ERN">ERN - Eritrean Nakfa</option>
  <option value="EEK">EEK - Estonian Kroon</option>
  <option value="ETB">ETB - Ethiopian Birr</option>
  <option value="EUR">EUR - Euro</option>
  <option value="FKP">FKP - Falkland Islands Pound</option>
  <option value="FJD">FJD - Fijian Dollar</option>
  <option value="GMD">GMD - Gambian Dalasi</option>
  <option value="GEL">GEL - Georgian Lari</option>
  <option value="DEM">DEM - German Mark</option>
  <option value="GHS">GHS - Ghanaian Cedi</option>
  <option value="GIP">GIP - Gibraltar Pound</option>
  <option value="GRD">GRD - Greek Drachma</option>
  <option value="GTQ">GTQ - Guatemalan Quetzal</option>
  <option value="GNF">GNF - Guinean Franc</option>
  <option value="GYD">GYD - Guyanaese Dollar</option>
  <option value="HTG">HTG - Haitian Gourde</option>
  <option value="HNL">HNL - Honduran Lempira</option>
  <option value="HKD">HKD - Hong Kong Dollar</option>
  <option value="HUF">HUF - Hungarian Forint</option>
  <option value="ISK">ISK - Icelandic KrÃ³na</option>
  <option value="INR">INR - Indian Rupee</option>
  <option value="IDR">IDR - Indonesian Rupiah</option>
  <option value="IRR">IRR - Iranian Rial</option>
  <option value="IQD">IQD - Iraqi Dinar</option>
  <option value="ILS">ILS - Israeli New Sheqel</option>
  <option value="ITL">ITL - Italian Lira</option>
  <option value="JMD">JMD - Jamaican Dollar</option>
  <option value="JPY">JPY - Japanese Yen</option>
  <option value="JOD">JOD - Jordanian Dinar</option>
  <option value="KZT">KZT - Kazakhstani Tenge</option>
  <option value="KES">KES - Kenyan Shilling</option>
  <option value="KWD">KWD - Kuwaiti Dinar</option>
  <option value="KGS">KGS - Kyrgystani Som</option>
  <option value="LAK">LAK - Laotian Kip</option>
  <option value="LVL">LVL - Latvian Lats</option>
  <option value="LBP">LBP - Lebanese Pound</option>
  <option value="LSL">LSL - Lesotho Loti</option>
  <option value="LRD">LRD - Liberian Dollar</option>
  <option value="LYD">LYD - Libyan Dinar</option>
  <option value="LTL">LTL - Lithuanian Litas</option>
  <option value="MOP">MOP - Macanese Pataca</option>
  <option value="MKD">MKD - Macedonian Denar</option>
  <option value="MGA">MGA - Malagasy Ariary</option>
  <option value="MWK">MWK - Malawian Kwacha</option>
  <option value="MYR">MYR - Malaysian Ringgit</option>
  <option value="MVR">MVR - Maldivian Rufiyaa</option>
  <option value="MRO">MRO - Mauritanian Ouguiya</option>
  <option value="MUR">MUR - Mauritian Rupee</option>
  <option value="MXN">MXN - Mexican Peso</option>
  <option value="MDL">MDL - Moldovan Leu</option>
  <option value="MNT">MNT - Mongolian Tugrik</option>
  <option value="MAD">MAD - Moroccan Dirham</option>
  <option value="MZM">MZM - Mozambican Metical</option>
  <option value="MMK">MMK - Myanmar Kyat</option>
  <option value="NAD">NAD - Namibian Dollar</option>
  <option value="NPR">NPR - Nepalese Rupee</option>
  <option value="ANG">ANG - Netherlands Antillean Guilder</option>
  <option value="TWD">TWD - New Taiwan Dollar</option>
  <option value="NZD">NZD - New Zealand Dollar</option>
  <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
  <option value="NGN">NGN - Nigerian Naira</option>
  <option value="KPW">KPW - North Korean Won</option>
  <option value="NOK">NOK - Norwegian Krone</option>
  <option value="OMR">OMR - Omani Rial</option>
  <option value="PKR">PKR - Pakistani Rupee</option>
  <option value="PAB">PAB - Panamanian Balboa</option>
  <option value="PGK">PGK - Papua New Guinean Kina</option>
  <option value="PYG">PYG - Paraguayan Guarani</option>
  <option value="PEN">PEN - Peruvian Nuevo Sol</option>
  <option value="PHP">PHP - Philippine Peso</option>
  <option value="PLN">PLN - Polish Zloty</option>
  <option value="QAR">QAR - Qatari Rial</option>
  <option value="RON">RON - Romanian Leu</option>
  <option value="RUB">RUB - Russian Ruble</option>
  <option value="RWF">RWF - Rwandan Franc</option>
  <option value="SVC">SVC - Salvadoran ColÃ³n</option>
  <option value="WST">WST - Samoan Tala</option>
  <option value="SAR">SAR - Saudi Riyal</option>
  <option value="RSD">RSD - Serbian Dinar</option>
  <option value="SCR">SCR - Seychellois Rupee</option>
  <option value="SLL">SLL - Sierra Leonean Leone</option>
  <option value="SGD">SGD - Singapore Dollar</option>
  <option value="SKK">SKK - Slovak Koruna</option>
  <option value="SBD">SBD - Solomon Islands Dollar</option>
  <option value="SOS">SOS - Somali Shilling</option>
  <option value="ZAR">ZAR - South African Rand</option>
  <option value="KRW">KRW - South Korean Won</option>
  <option value="XDR">XDR - Special Drawing Rights</option>
  <option value="LKR">LKR - Sri Lankan Rupee</option>
  <option value="SHP">SHP - St. Helena Pound</option>
  <option value="SDG">SDG - Sudanese Pound</option>
  <option value="SRD">SRD - Surinamese Dollar</option>
  <option value="SZL">SZL - Swazi Lilangeni</option>
  <option value="SEK">SEK - Swedish Krona</option>
  <option value="CHF">CHF - Swiss Franc</option>
  <option value="SYP">SYP - Syrian Pound</option>
  <option value="STD">STD - São Tomé and Príncipe Dobra</option>
  <option value="TJS">TJS - Tajikistani Somoni</option>
  <option value="TZS">TZS - Tanzanian Shilling</option>
  <option value="THB">THB - Thai Baht</option>
  <option value="TOP">TOP - Tongan pa'anga</option>
  <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
  <option value="TND">TND - Tunisian Dinar</option>
  <option value="TRY">TRY - Turkish Lira</option>
  <option value="TMT">TMT - Turkmenistani Manat</option>
  <option value="UGX">UGX - Ugandan Shilling</option>
  <option value="UAH">UAH - Ukrainian Hryvnia</option>
  <option value="AED">AED - United Arab Emirates Dirham</option>
  <option value="UYU">UYU - Uruguayan Peso</option>
  <option value="USD" selected>USD - US Dollar</option>
  <option value="UZS">UZS - Uzbekistan Som</option>
  <option value="VUV">VUV - Vanuatu Vatu</option>
  <option value="VEF">VEF - Venezuelan BolÃ­var</option>
  <option value="VND">VND - Vietnamese Dong</option>
  <option value="YER">YER - Yemeni Rial</option>
  <option value="ZMK">ZMK - Zambian Kwacha</option>





          </select>
          <input type="text"    class="cur-input-2" name="agtotal_pcamount" >

              </div>


              <style>
                .container{
                    display:none;
                }
              </style>

              <div class="result"  >
              <div class="rate" id="rate"  ></div>

             </div>

                                        
                                            </td>
                                            </tr> 
                                            <tr id="bal">
                                            <td style="text-align:right;"  colspan="19"><b>Balance Amount:</b></td>
                                            <td style="border:none;">
                                           <table border="0">
      <tr>
        <td class="cus" name="cus" style="width: 40px;"></td>  <td>
                                          <input  type="text"   readonly id="balance"  name="balance"  required   />                     
                                            </td>     </tr>
   </table>
   
   <div class="container">
        <div class="currency">
            <!-- <select  id="input_currency"> -->


               <select name="cus"  id="input_currency">
              

               <option value="AFN">AFN - Afghan Afghani</option>
    <option value="ALL">ALL - Albanian Lek</option>
    <option value="DZD">DZD - Algerian Dinar</option>
    <option value="AOA">AOA - Angolan Kwanza</option>
    <option value="ARS">ARS - Argentine Peso</option>
    <option value="AMD">AMD - Armenian Dram</option>
    <option value="AWG">AWG - Aruban Florin</option>
    <option value="AUD">AUD - Australian Dollar</option>
    <option value="AZN">AZN - Azerbaijani Manat</option>
    <option value="BSD">BSD - Bahamian Dollar</option>
    <option value="BHD">BHD - Bahraini Dinar</option>
    <option value="BDT">BDT - Bangladeshi Taka</option>
    <option value="BBD">BBD - Barbadian Dollar</option>
    <option value="BYR">BYR - Belarusian Ruble</option>
    <option value="BEF">BEF - Belgian Franc</option>
    <option value="BZD">BZD - Belize Dollar</option>
    <option value="BMD">BMD - Bermudan Dollar</option>
    <option value="BTN">BTN - Bhutanese Ngultrum</option>
    <option value="BTC">BTC - Bitcoin</option>
    <option value="BOB">BOB - Bolivian Boliviano</option>
    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
    <option value="BWP">BWP - Botswanan Pula</option>
    <option value="BRL">BRL - Brazilian Real</option>
    <option value="GBP">GBP - British Pound Sterling</option>
    <option value="BND">BND - Brunei Dollar</option>
    <option value="BGN">BGN - Bulgarian Lev</option>
    <option value="BIF">BIF - Burundian Franc</option>
    <option value="KHR">KHR - Cambodian Riel</option>
    <option value="CAD">CAD - Canadian Dollar</option>
    <option value="CVE">CVE - Cape Verdean Escudo</option>
    <option value="KYD">KYD - Cayman Islands Dollar</option>
    <option value="XOF">XOF - CFA Franc BCEAO</option>
    <option value="XAF">XAF - CFA Franc BEAC</option>
    <option value="XPF">XPF - CFP Franc</option>
    <option value="CLP">CLP - Chilean Peso</option>
    <option value="CNY">CNY - Chinese Yuan</option>
    <option value="COP">COP - Colombian Peso</option>
    <option value="KMF">KMF - Comorian Franc</option>
    <option value="CDF">CDF - Congolese Franc</option>
    <option value="CRC">CRC - Costa Rican ColÃ³n</option>
    <option value="HRK">HRK - Croatian Kuna</option>
    <option value="CUC">CUC - Cuban Convertible Peso</option>
    <option value="CZK">CZK - Czech Republic Koruna</option>
    <option value="DKK">DKK - Danish Krone</option>
    <option value="DJF">DJF - Djiboutian Franc</option>
    <option value="DOP">DOP - Dominican Peso</option>
    <option value="XCD">XCD - East Caribbean Dollar</option>
    <option value="EGP">EGP - Egyptian Pound</option>
    <option value="ERN">ERN - Eritrean Nakfa</option>
    <option value="EEK">EEK - Estonian Kroon</option>
    <option value="ETB">ETB - Ethiopian Birr</option>
    <option value="EUR">EUR - Euro</option>
    <option value="FKP">FKP - Falkland Islands Pound</option>
    <option value="FJD">FJD - Fijian Dollar</option>
    <option value="GMD">GMD - Gambian Dalasi</option>
    <option value="GEL">GEL - Georgian Lari</option>
    <option value="DEM">DEM - German Mark</option>
    <option value="GHS">GHS - Ghanaian Cedi</option>
    <option value="GIP">GIP - Gibraltar Pound</option>
    <option value="GRD">GRD - Greek Drachma</option>
    <option value="GTQ">GTQ - Guatemalan Quetzal</option>
    <option value="GNF">GNF - Guinean Franc</option>
    <option value="GYD">GYD - Guyanaese Dollar</option>
    <option value="HTG">HTG - Haitian Gourde</option>
    <option value="HNL">HNL - Honduran Lempira</option>
    <option value="HKD">HKD - Hong Kong Dollar</option>
    <option value="HUF">HUF - Hungarian Forint</option>
    <option value="ISK">ISK - Icelandic KrÃ³na</option>
    <option value="INR">INR - Indian Rupee</option>
    <option value="IDR">IDR - Indonesian Rupiah</option>
    <option value="IRR">IRR - Iranian Rial</option>
    <option value="IQD">IQD - Iraqi Dinar</option>
    <option value="ILS">ILS - Israeli New Sheqel</option>
    <option value="ITL">ITL - Italian Lira</option>
    <option value="JMD">JMD - Jamaican Dollar</option>
    <option value="JPY">JPY - Japanese Yen</option>
    <option value="JOD">JOD - Jordanian Dinar</option>
    <option value="KZT">KZT - Kazakhstani Tenge</option>
    <option value="KES">KES - Kenyan Shilling</option>
    <option value="KWD">KWD - Kuwaiti Dinar</option>
    <option value="KGS">KGS - Kyrgystani Som</option>
    <option value="LAK">LAK - Laotian Kip</option>
    <option value="LVL">LVL - Latvian Lats</option>
    <option value="LBP">LBP - Lebanese Pound</option>
    <option value="LSL">LSL - Lesotho Loti</option>
    <option value="LRD">LRD - Liberian Dollar</option>
    <option value="LYD">LYD - Libyan Dinar</option>
    <option value="LTL">LTL - Lithuanian Litas</option>
    <option value="MOP">MOP - Macanese Pataca</option>
    <option value="MKD">MKD - Macedonian Denar</option>
    <option value="MGA">MGA - Malagasy Ariary</option>
    <option value="MWK">MWK - Malawian Kwacha</option>
    <option value="MYR">MYR - Malaysian Ringgit</option>
    <option value="MVR">MVR - Maldivian Rufiyaa</option>
    <option value="MRO">MRO - Mauritanian Ouguiya</option>
    <option value="MUR">MUR - Mauritian Rupee</option>
    <option value="MXN">MXN - Mexican Peso</option>
    <option value="MDL">MDL - Moldovan Leu</option>
    <option value="MNT">MNT - Mongolian Tugrik</option>
    <option value="MAD">MAD - Moroccan Dirham</option>
    <option value="MZM">MZM - Mozambican Metical</option>
    <option value="MMK">MMK - Myanmar Kyat</option>
    <option value="NAD">NAD - Namibian Dollar</option>
    <option value="NPR">NPR - Nepalese Rupee</option>
    <option value="ANG">ANG - Netherlands Antillean Guilder</option>
    <option value="TWD">TWD - New Taiwan Dollar</option>
    <option value="NZD">NZD - New Zealand Dollar</option>
    <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
    <option value="NGN">NGN - Nigerian Naira</option>
    <option value="KPW">KPW - North Korean Won</option>
    <option value="NOK">NOK - Norwegian Krone</option>
    <option value="OMR">OMR - Omani Rial</option>
    <option value="PKR">PKR - Pakistani Rupee</option>
    <option value="PAB">PAB - Panamanian Balboa</option>
    <option value="PGK">PGK - Papua New Guinean Kina</option>
    <option value="PYG">PYG - Paraguayan Guarani</option>
    <option value="PEN">PEN - Peruvian Nuevo Sol</option>
    <option value="PHP">PHP - Philippine Peso</option>
    <option value="PLN">PLN - Polish Zloty</option>
    <option value="QAR">QAR - Qatari Rial</option>
    <option value="RON">RON - Romanian Leu</option>
    <option value="RUB">RUB - Russian Ruble</option>
    <option value="RWF">RWF - Rwandan Franc</option>
    <option value="SVC">SVC - Salvadoran ColÃ³n</option>
    <option value="WST">WST - Samoan Tala</option>
    <option value="SAR">SAR - Saudi Riyal</option>
    <option value="RSD">RSD - Serbian Dinar</option>
    <option value="SCR">SCR - Seychellois Rupee</option>
    <option value="SLL">SLL - Sierra Leonean Leone</option>
    <option value="SGD">SGD - Singapore Dollar</option>
    <option value="SKK">SKK - Slovak Koruna</option>
    <option value="SBD">SBD - Solomon Islands Dollar</option>
    <option value="SOS">SOS - Somali Shilling</option>
    <option value="ZAR">ZAR - South African Rand</option>
    <option value="KRW">KRW - South Korean Won</option>
    <option value="XDR">XDR - Special Drawing Rights</option>
    <option value="LKR">LKR - Sri Lankan Rupee</option>
    <option value="SHP">SHP - St. Helena Pound</option>
    <option value="SDG">SDG - Sudanese Pound</option>
    <option value="SRD">SRD - Surinamese Dollar</option>
    <option value="SZL">SZL - Swazi Lilangeni</option>
    <option value="SEK">SEK - Swedish Krona</option>
    <option value="CHF">CHF - Swiss Franc</option>
    <option value="SYP">SYP - Syrian Pound</option>
    <option value="STD">STD - São Tomé and Príncipe Dobra</option>
    <option value="TJS">TJS - Tajikistani Somoni</option>
    <option value="TZS">TZS - Tanzanian Shilling</option>
    <option value="THB">THB - Thai Baht</option>
    <option value="TOP">TOP - Tongan pa'anga</option>
    <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
    <option value="TND">TND - Tunisian Dinar</option>
    <option value="TRY">TRY - Turkish Lira</option>
    <option value="TMT">TMT - Turkmenistani Manat</option>
    <option value="UGX">UGX - Ugandan Shilling</option>
    <option value="UAH">UAH - Ukrainian Hryvnia</option>
    <option value="AED">AED - United Arab Emirates Dirham</option>
    <option value="UYU">UYU - Uruguayan Peso</option>
    <option value="USD" >USD - US Dollar</option>
    <option value="UZS">UZS - Uzbekistan Som</option>
    <option value="VUV">VUV - Vanuatu Vatu</option>
    <option value="VEF">VEF - Venezuelan BolÃ­var</option>
    <option value="VND">VND - Vietnamese Dong</option>
    <option value="YER">YER - Yemeni Rial</option>
    <option value="ZMK">ZMK - Zambian Kwacha</option>

            </select>
            <input type="number" name="" id="input_amount"  value="1">
        </div>
      
        <div class="currency">
            <select   id="output_currency">
            <option value="AFN">AFN - Afghan Afghani</option>
    <option value="ALL">ALL - Albanian Lek</option>
    <option value="DZD">DZD - Algerian Dinar</option>
    <option value="AOA">AOA - Angolan Kwanza</option>
    <option value="ARS">ARS - Argentine Peso</option>
    <option value="AMD">AMD - Armenian Dram</option>
    <option value="AWG">AWG - Aruban Florin</option>
    <option value="AUD">AUD - Australian Dollar</option>
    <option value="AZN">AZN - Azerbaijani Manat</option>
    <option value="BSD">BSD - Bahamian Dollar</option>
    <option value="BHD">BHD - Bahraini Dinar</option>
    <option value="BDT">BDT - Bangladeshi Taka</option>
    <option value="BBD">BBD - Barbadian Dollar</option>
    <option value="BYR">BYR - Belarusian Ruble</option>
    <option value="BEF">BEF - Belgian Franc</option>
    <option value="BZD">BZD - Belize Dollar</option>
    <option value="BMD">BMD - Bermudan Dollar</option>
    <option value="BTN">BTN - Bhutanese Ngultrum</option>
    <option value="BTC">BTC - Bitcoin</option>
    <option value="BOB">BOB - Bolivian Boliviano</option>
    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
    <option value="BWP">BWP - Botswanan Pula</option>
    <option value="BRL">BRL - Brazilian Real</option>
    <option value="GBP">GBP - British Pound Sterling</option>
    <option value="BND">BND - Brunei Dollar</option>
    <option value="BGN">BGN - Bulgarian Lev</option>
    <option value="BIF">BIF - Burundian Franc</option>
    <option value="KHR">KHR - Cambodian Riel</option>
    <option value="CAD">CAD - Canadian Dollar</option>
    <option value="CVE">CVE - Cape Verdean Escudo</option>
    <option value="KYD">KYD - Cayman Islands Dollar</option>
    <option value="XOF">XOF - CFA Franc BCEAO</option>
    <option value="XAF">XAF - CFA Franc BEAC</option>
    <option value="XPF">XPF - CFP Franc</option>
    <option value="CLP">CLP - Chilean Peso</option>
    <option value="CNY">CNY - Chinese Yuan</option>
    <option value="COP">COP - Colombian Peso</option>
    <option value="KMF">KMF - Comorian Franc</option>
    <option value="CDF">CDF - Congolese Franc</option>
    <option value="CRC">CRC - Costa Rican ColÃ³n</option>
    <option value="HRK">HRK - Croatian Kuna</option>
    <option value="CUC">CUC - Cuban Convertible Peso</option>
    <option value="CZK">CZK - Czech Republic Koruna</option>
    <option value="DKK">DKK - Danish Krone</option>
    <option value="DJF">DJF - Djiboutian Franc</option>
    <option value="DOP">DOP - Dominican Peso</option>
    <option value="XCD">XCD - East Caribbean Dollar</option>
    <option value="EGP">EGP - Egyptian Pound</option>
    <option value="ERN">ERN - Eritrean Nakfa</option>
    <option value="EEK">EEK - Estonian Kroon</option>
    <option value="ETB">ETB - Ethiopian Birr</option>
    <option value="EUR">EUR - Euro</option>
    <option value="FKP">FKP - Falkland Islands Pound</option>
    <option value="FJD">FJD - Fijian Dollar</option>
    <option value="GMD">GMD - Gambian Dalasi</option>
    <option value="GEL">GEL - Georgian Lari</option>
    <option value="DEM">DEM - German Mark</option>
    <option value="GHS">GHS - Ghanaian Cedi</option>
    <option value="GIP">GIP - Gibraltar Pound</option>
    <option value="GRD">GRD - Greek Drachma</option>
    <option value="GTQ">GTQ - Guatemalan Quetzal</option>
    <option value="GNF">GNF - Guinean Franc</option>
    <option value="GYD">GYD - Guyanaese Dollar</option>
    <option value="HTG">HTG - Haitian Gourde</option>
    <option value="HNL">HNL - Honduran Lempira</option>
    <option value="HKD">HKD - Hong Kong Dollar</option>
    <option value="HUF">HUF - Hungarian Forint</option>
    <option value="ISK">ISK - Icelandic KrÃ³na</option>
    <option value="INR">INR - Indian Rupee</option>
    <option value="IDR">IDR - Indonesian Rupiah</option>
    <option value="IRR">IRR - Iranian Rial</option>
    <option value="IQD">IQD - Iraqi Dinar</option>
    <option value="ILS">ILS - Israeli New Sheqel</option>
    <option value="ITL">ITL - Italian Lira</option>
    <option value="JMD">JMD - Jamaican Dollar</option>
    <option value="JPY">JPY - Japanese Yen</option>
    <option value="JOD">JOD - Jordanian Dinar</option>
    <option value="KZT">KZT - Kazakhstani Tenge</option>
    <option value="KES">KES - Kenyan Shilling</option>
    <option value="KWD">KWD - Kuwaiti Dinar</option>
    <option value="KGS">KGS - Kyrgystani Som</option>
    <option value="LAK">LAK - Laotian Kip</option>
    <option value="LVL">LVL - Latvian Lats</option>
    <option value="LBP">LBP - Lebanese Pound</option>
    <option value="LSL">LSL - Lesotho Loti</option>
    <option value="LRD">LRD - Liberian Dollar</option>
    <option value="LYD">LYD - Libyan Dinar</option>
    <option value="LTL">LTL - Lithuanian Litas</option>
    <option value="MOP">MOP - Macanese Pataca</option>
    <option value="MKD">MKD - Macedonian Denar</option>
    <option value="MGA">MGA - Malagasy Ariary</option>
    <option value="MWK">MWK - Malawian Kwacha</option>
    <option value="MYR">MYR - Malaysian Ringgit</option>
    <option value="MVR">MVR - Maldivian Rufiyaa</option>
    <option value="MRO">MRO - Mauritanian Ouguiya</option>
    <option value="MUR">MUR - Mauritian Rupee</option>
    <option value="MXN">MXN - Mexican Peso</option>
    <option value="MDL">MDL - Moldovan Leu</option>
    <option value="MNT">MNT - Mongolian Tugrik</option>
    <option value="MAD">MAD - Moroccan Dirham</option>
    <option value="MZM">MZM - Mozambican Metical</option>
    <option value="MMK">MMK - Myanmar Kyat</option>
    <option value="NAD">NAD - Namibian Dollar</option>
    <option value="NPR">NPR - Nepalese Rupee</option>
    <option value="ANG">ANG - Netherlands Antillean Guilder</option>
    <option value="TWD">TWD - New Taiwan Dollar</option>
    <option value="NZD">NZD - New Zealand Dollar</option>
    <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
    <option value="NGN">NGN - Nigerian Naira</option>
    <option value="KPW">KPW - North Korean Won</option>
    <option value="NOK">NOK - Norwegian Krone</option>
    <option value="OMR">OMR - Omani Rial</option>
    <option value="PKR">PKR - Pakistani Rupee</option>
    <option value="PAB">PAB - Panamanian Balboa</option>
    <option value="PGK">PGK - Papua New Guinean Kina</option>
    <option value="PYG">PYG - Paraguayan Guarani</option>
    <option value="PEN">PEN - Peruvian Nuevo Sol</option>
    <option value="PHP">PHP - Philippine Peso</option>
    <option value="PLN">PLN - Polish Zloty</option>
    <option value="QAR">QAR - Qatari Rial</option>
    <option value="RON">RON - Romanian Leu</option>
    <option value="RUB">RUB - Russian Ruble</option>
    <option value="RWF">RWF - Rwandan Franc</option>
    <option value="SVC">SVC - Salvadoran ColÃ³n</option>
    <option value="WST">WST - Samoan Tala</option>
    <option value="SAR">SAR - Saudi Riyal</option>
    <option value="RSD">RSD - Serbian Dinar</option>
    <option value="SCR">SCR - Seychellois Rupee</option>
    <option value="SLL">SLL - Sierra Leonean Leone</option>
    <option value="SGD">SGD - Singapore Dollar</option>
    <option value="SKK">SKK - Slovak Koruna</option>
    <option value="SBD">SBD - Solomon Islands Dollar</option>
    <option value="SOS">SOS - Somali Shilling</option>
    <option value="ZAR">ZAR - South African Rand</option>
    <option value="KRW">KRW - South Korean Won</option>
    <option value="XDR">XDR - Special Drawing Rights</option>
    <option value="LKR">LKR - Sri Lankan Rupee</option>
    <option value="SHP">SHP - St. Helena Pound</option>
    <option value="SDG">SDG - Sudanese Pound</option>
    <option value="SRD">SRD - Surinamese Dollar</option>
    <option value="SZL">SZL - Swazi Lilangeni</option>
    <option value="SEK">SEK - Swedish Krona</option>
    <option value="CHF">CHF - Swiss Franc</option>
    <option value="SYP">SYP - Syrian Pound</option>
    <option value="STD">STD - São Tomé and Príncipe Dobra</option>
    <option value="TJS">TJS - Tajikistani Somoni</option>
    <option value="TZS">TZS - Tanzanian Shilling</option>
    <option value="THB">THB - Thai Baht</option>
    <option value="TOP">TOP - Tongan pa'anga</option>
    <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
    <option value="TND">TND - Tunisian Dinar</option>
    <option value="TRY">TRY - Turkish Lira</option>
    <option value="TMT">TMT - Turkmenistani Manat</option>
    <option value="UGX">UGX - Ugandan Shilling</option>
    <option value="UAH">UAH - Ukrainian Hryvnia</option>
    <option value="AED">AED - United Arab Emirates Dirham</option>
    <option value="UYU">UYU - Uruguayan Peso</option>
    <option value="USD" selected>USD - US Dollar</option>
    <option value="UZS">UZS - Uzbekistan Som</option>
    <option value="VUV">VUV - Vanuatu Vatu</option>
    <option value="VEF">VEF - Venezuelan BolÃ­var</option>
    <option value="VND">VND - Vietnamese Dong</option>
    <option value="YER">YER - Yemeni Rial</option>
    <option value="ZMK">ZMK - Zambian Kwacha</option>

            </select>
            <input type="text"  id="output_amount"   name="bgtotal_pcamount"/>
        </div>
        <div class="result">
                <div class="rate" id="rate"  name="bgtotal_pcamount" ></div>

        </div>
   
       <style>
        .result{
            display:none;
        }
       </style>
    </div>

                                            </td>
                                            </tr> 
                                            <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                                               
                                            <td colspan="21" style="text-align: end;">
                                        <input type="submit" value="Make Payment" style="color:white;background-color: #38469f;" class="btn btn-large" id="paypls"/>
                                            </td>
                                            </tr>
                                            </tfoot>
                            </table>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 ">
                                <table>
                                <tr>
                                   
                                    <td>
                                   
                                        <input type="submit" id="add_purchase" style="color:white;background-color: #38469f;" class="btn btn-large" name="add-packing-list" value="Save" />
                                            </td>
                                            

                                            <td class="hidden_button"> 
 
                               <a    id="final_submit" style="color:white;background-color: #38469f;" class='final_submit btn'>Submit</a>
                                            </td>
                                           
                                  <td class="hidden_button">         
 <select name="download_select" id="download_select" class="form-control" style="color:white;background-color: #38469f;width: auto;" >
                                        <option value="Download" selected>Download</option>
                                             <option value="Invoice" >New Invoice</option>
                                                <option value="Packing" >Packing List</option>
                                        </select>
                                        

   </td>       
<td style="width:60px;" class="hidden_button"></td>
                   <td class="hidden_button">

 <select name="print_select" id="print_select" class="form-control" style="color:white;background-color: #38469f;width: auto;" >
                                        <option value="Print" selected>Print</option>
                                             <option value="Invoice" >New Invoice</option>
                                                <option value="Packing" >Packing List</option>
                                        </select>


                   </td>                   
                                 

                                    
                                    
                                </tr>
                          
                            </div>
                        </div>


                           <div class="form-group row">

                                    <label for="billing_address" class="col-sm-2 col-form-label">Account Details/Additional Information</label>

                                    <div class="col-sm-8">

                                        <textarea rows="4" cols="50" id="details" name="ac_details" class=" form-control" placeholder='Account Details/Additional Information' id=""> </textarea>

                                    </div>

                                </div> 
                                <div class="form-group row">

                                    <label for="remark" class="col-sm-2 col-form-label">Remarks/Conditions</label>

                                    <div class="col-sm-8">

                                        <textarea rows="4" cols="50" id="remarks" name="remark" class=" form-control" placeholder='Remarks/Conditions' id=""> </textarea>

                                    </div>

                                </div>
                        <div class="table-responsive" >

                            
                        <table class='table' style="display:none;">
                                <tr>
                                    <th colspan='7'>
                                      

                                    </th>
                                </tr>    
                        </table>

                        </div>
<div id='customer-data' style='color:red;'></div>
                                            </form>
                              
                    </div>
                    <input type="hidden" id="hdn"/>
<input type="hidden" id="gtotal_dup"/>

<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sales - Profarma Invoice</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
          
      
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
<div class="modal fade" id="product_model_info">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 1000px;min-width: max-content;margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" id="history_close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product</h4>
        </div>
        <div class="modal-body1">
        <div id="salle_list"></div>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
  






  

  <div id="myModal3" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			 <div class="modal-header" style="color:white;background-color:#38469f;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
				<p>Your Invoice is not submitted. Would you like to submit or discard
				</p>
				<p class="text-warning">
					<small>If you don't submit, your changes will not be saved.</small>
				</p>
			</div>
			<div class="modal-footer">
				<input type="submit" id="ok" class="btn" style="color:white;background-color:#38469f;" onclick="submit_redirect()"  value="Submit"/>
                <button id="btdelete" type="button" class="btn btn-danger"  onclick="discard()">Discard</button>
			
			</div>
		</div>
	</div>
</div>          



                
<script>
localStorage.setItem('currency', '<?php echo $currency;?>');  
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

$(document).ready(function(){
  
//$('.download').hide();

$('#email_btn').hide();

});

$("#reset").on("click", function () {
    $('#product_tax').val("Select the Tax");

});
function discard(){
   $.get(
    "<?php echo base_url(); ?>Cinvoice/deletesale/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been Discared";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_invoice";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been created Successfully";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_invoice";
      }, 2000);
     }
     $('#email_btn').on('click', function (e) {
// var link=localStorage.getItem("truck");
// console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/sendmail_with_attachments/"+$('#invoice_hdn1').val());
    // window.setTimeout(function(){
    //     popout.close();
    //  }, 1500);
      e.preventDefault();
});
$('#insert_trucking').submit(function(e) {+
  $.ajax({
    url:"<?php echo base_url(); ?>Cinvoice/manual_sales_insert",
    type: 'POST',
    data: $('#insert_trucking').serialize(),
  })
  .done((response) => {
        var split = response.split("/");
       
             $('#invoice_hdn1').val(split[0]);
       
     
          $('#invoice_hdn').val(split[1]);
    console.log(response);
  });
  e.preventDefault();
  return false;
});
// $('#insert_trucking').submit(function (event) {
//    event.preventDefault();
//    debugger;
//     //   alert("");
//     var dataString = {
//         dataString : $("#insert_trucking").serialize()
    
//    };
//    dataString[csrfName] = csrfHash;
  
//     $.ajax({
//         type:"POST",
//         dataType:"json",
//         async: false,
//          cache: false,
//         url:"<?php echo base_url(); ?>Cinvoice/manual_sales_insert",
//         data:dataString,

//         success:function (data) {
//         console.log(data);
//         var input_hdn2="New Sale created Successfully";
//         $("#bodyModal1").html(input_hdn2);
//         $('#myModal1').modal('show');
//         $('#final_submit').show();
//         $('.download').show();
//         $('#email_btn').show();
//     window.setTimeout(function(){
//         $('.modal').modal('hide');
       
// $('.modal-backdrop').remove();
//  },2500);

//             var split = data.split("/");
//             $('#invoice_hdn1').val(split[0]);
         
     
//          $('#invoice_hdn').val(split[1]);
//        },
//      error: function(xhr, status, error) {
//   alert(xhr.responseText);
// }

//     });
   
// });
// $('#download').on('click', function (e) {
 
//  var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data/"+$('#invoice_hdn1').val());
 
// }); 


$(document).on('change','#download_select', function (e) {
var selected_option = $(this).val();
var text = $('#invoice_hdn1').val().toString().replace('"', '');
console.log(text);
if(selected_option=='Invoice'){
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data/"+text);
}else{
  var popout = window.open("<?php  echo base_url(); ?>Cinvoice/packing_list_details_data/"+text);
}
});

  $(document).on('change','#print_select', function (e) {
var selected_option=$(this).val();
var text = $('#invoice_hdn1').val().toString().replace('"', '');
if(selected_option=='Invoice'){
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data_print/"+text);
}else{
   var popout = window.open("<?php  echo base_url(); ?>Cinvoice/packing_list_details_data_print/"+text);
}
}); 


$('.final_submit').on('click', function (e) {

window.btn_clicked = true;      //set btn_clicked to true
 var input_hdn='Your Invoice No : "'+$('#invoice_hdn').val()+" has been Updated Successfully";

console.log(input_hdn);
$("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
window.setTimeout(function(){
   

    window.location = "<?php  echo base_url(); ?>Cinvoice/manage_invoice";
  }, 2000);
   
});

window.onbeforeunload = function(){
if(!window.btn_clicked){
   // window.btn_clicked = true; 
    $('#myModal3').modal('show');
   return false;
}
};

/*
window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
};
 */

$(document).ready(function(){
   // $('#payment_modal').modal("show");
     $('#product_tax').on('change', function (e) {
    
  var total=$('#Over_all_Total').val();
 var tax= $('#product_tax').val();

 var field = tax.split('-');

 var percent = field[1];
 percent=percent.replace("%","");
  var answer = (percent / 100) * parseInt(total);

  
   var gtotal = parseInt(total + answer);
   console.log("gtotal :" +gtotal);



  var final_g= $('#final_gtotal').val();


  var amt=parseInt(answer)+parseInt(total);
  var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
    $('#gtotal').val(num); 
  var custo_amt=$('.custocurrency_rate').val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
 $('#customer_gtotal').val(custo_final);  
 calculate();
 });
});






$(document).on('keyup', '.net_height,.net_width', function(){

 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var nresult=netresult.toFixed(3);
var cost_sqft=$('#cost_sq_ft_'+id).val();

var sales_sqft=cost_sqft *nresult;
var x = $('#slab_no_'+id).val();

var sales_slab_price=cost_sqft *nresult*x;
console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
      var sum_total=0;
     $('.btotal').each(function() {
var v=$(this).val();
  sum_total += parseFloat(v);
});
$('#Over_all_Total').val(sum_total);
});
$(document).on('keyup', '.gross_height,.gross_width', function(){

 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='gross_width_'+id;
var net_height = 'gross_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);

$('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));


});


   function addInputField(table) {

   //  var netheight = table.attr('id');
const indexLastDot = table.lastIndexOf('_');
var id = table.slice(indexLastDot + 1);

     var $last = $('#addPurchaseItem_'+id + ' tr:last');
   // var num = id+"_"+$last.index() + 2;
    var num = id+($last.index()+1);
    
    $('#addPurchaseItem_'+id  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#addPurchaseItem_'+id );
  
 $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
            $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
        })

        
    
  
}


$( document ).ready(function() {
$('.hidden_button').hide();


    $('#instant_customer').submit(function (event) {

    var dataString = {
        dataString : $("#instant_customer").serialize()
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cinvoice/instant_customer",
        data:$("#instant_customer").serialize(),
        success:function (data) {
            console.log(data);
            $.each(data, function (i, item) {
           
           result = '<option value=' + data[i].customer_name + '>' + data[i].customer_name + '</option>';
       });
       

       $('#customer_name').selectmenu(); 
       $('#customer_name').append(result).selectmenu('refresh',true);
       $("#bodyModal1").html("New Customer Added Successfully");
      
      $('#myModal1').modal('show');
      $('#cust_info').modal('hide');
     $('#customer_name').show();
    
      window.setTimeout(function(){
       $('#myModal1').modal('hide');
       $('.modal-backdrop').remove();

},2500);
      //  console.log(data);
        }
    });
    event.preventDefault();
});
$('.hiden').css("display","none");
$('.custocurrency_rate').on('change textInput input', function (e) {
    calculate();
});

$('.common_qnt').on('change textInput input', function (e) {
    calculate();
});
$('.btotal').on('change textInput input', function (e) {
      var sum=0;
//       var tid=$(this).closest('table').attr('id');
// const indexLast = tid.lastIndexOf('_');
// var idt = tid.slice(indexLast + 1);
     $('.btotal').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
$('#Over_all_Total').val(sum);




    var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();
var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer = parseInt((percent / 100) * first);
   console.log("Answer : "+answer);
  var gtotal = parseInt(first + answer);
  console.log("gtotal :" +gtotal);
  
 var final_g= $('#final_gtotal').val();


 var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('.custocurrency_rate').val(); 
 console.log("numhere :"+num +"-"+custo_amt);
 var value=num*custo_amt;
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);  
});
});

var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

$(document).on('keyup','.sales_amt_sq_ft', function (e) {
           var id= $(this).attr('id');
   var id_num = id.match(/\d/g);
   var sales_amt_sq_ft=$('#sales_amt_sq_ft_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =parseInt(sales_amt_sq_ft) / parseInt(net_sq_ft);
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'sales_slab_amt_'+id_num).val(netresult.toFixed(3));
var sales_amt=$(this).val();
$('#total_'+id_num).val(sales_amt);
gt();
  });
    $(document).on('keyup','.sales_slab_amt', function (e) {
        //  debugger;
           var id= $(this).attr('id');
   var id_num = id.match(/\d/g);
   var sales_slab_amt=$('#sales_slab_amt_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =parseInt(sales_slab_amt) / parseInt(net_sq_ft);
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'sales_amt_sq_ft_'+id_num).val(netresult.toFixed(3));
gt();
  });

$(document).on('change', '.product_name', function(){
//debugger;
 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
$('#tableid_'+id).val(id);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);

$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();


var sales_sqft=cost_sqft *nresult;
// var x = $("#normalinvoice_"+id "> tbody > tr").length;
// console.log("X here : "+x);
var x = $('#slab_no_'+id).val();
 var serial =parseInt( $(this).closest('tr').find('td:nth-child(10)').html());

var sales_slab_price=cost_sqft *nresult*x;
console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
});

// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
  $.fn.inputFilter = function(callback, errMsg) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
      if (callback(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          $(this).removeClass("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        $(this).addClass("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  };
}(jQuery));

$(".custocurrency_rate").inputFilter(function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); }, "Must be a floating (real) Number");
$('#customer_name').on('change', function (e) {
    localStorage.setItem("sale_customer_name",$('#customer_name').val());
   
    var data = {
        value: $('#customer_name').val()
      //  defaultcurrency:'<?php //echo $currency; ?>'
     };
    data[csrfName] = csrfHash;
    $.ajax({
        type:'POST',
        data: data,
      dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/getcustomer_data',
        success: function(result, statut) {
            console.log(result);
            if(result.csrfName){
              csrfName = result.csrfName;
               csrfHash = result.csrfHash;
            }
         console.log(result[0]['currency_type']);
        $(".cus").html(result[0]['currency_type']);
        $("#autocomplete_customer_id").val(result[0]['customer_id']);
        $("label[for='custocurrency']").html(result[0]['currency_type']);
     
       $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
function(data) {
 var custo_currency=result[0]['currency_type'];
    var x=data['rates'][custo_currency];
 var Rate =parseFloat(x).toFixed(3);
 Rate = isNaN(Rate) ? 0 : Rate;
  console.log(Rate);
  $('.hiden').show();
  $(".custocurrency_rate").val(Rate);
});
      
        }
    });
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

});



// $('.gross_sq_ft').on('input change', function (e) {
//     alert("");
//     var sum_gross=0;
//     $('.gross_sq_ft').each(function() {
//         var v=$(this).val();
       
//     sum_gross += parseFloat(v);
// });
// $('#overall_gross_'+id).val(sum_gross.toFixed(3));

// });



$('#product_tax').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var total=$('#Over_all_Total').val();
var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
percent=percent.replace("%","");
 var answer = (percent / 100) * parseInt(total);

  
  var gtotal = parseInt(total + answer);
  console.log("gtotal :" +gtotal);
  $('#gtotal').val(gtotal); 


$('#final_gtotal').val(answer);
   $('#hdn').val(valueSelected);
   console.log("taxi :"+valueSelected);
  $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");
  calculate();
   payment_info();
});
var arr=[];


function gt(id){

var final_g= $('#final_gtotal').val();
if(final_g !=''){
var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
   console.log(answer);
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('.custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 localStorage.setItem("customer_grand_amount_sale",num);

 var value=num*custo_amt;
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);
$('#balance').val(custo_final);
}  
}



function payment_info(){
   
  var data = {
       gtotal:$('#gtotal').val(),
       customer_name:$('#customer_name').val()
  
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
     dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/get_payment_info',
        success: function(result, statut) {
           
          $("#amount_paid").val(result[0]['amt_paid']);
          $("#balance").val(result[0]['balance']);
            console.log(result);
        }
    });
}

</script>

                   <!--      <div class="form-group row">

                                    <label for="billing_address" class="col-sm-4 col-form-label">Message on invoice</label>

                                    <div class="col-sm-8">

                                        <textarea rows="4" cols="50" name="billing_address" class=" form-control" placeholder='This will show upon the invoice' id=""> </textarea>

                                    </div>

                                </div>  -->

                   

                </div>

            </div>

             <div class="modal fade" id="printconfirmodal" tabindex="-1" role="dialog" aria-labelledby="printconfirmodal" aria-hidden="true">

      <div class="modal-dialog modal-sm">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 class="modal-title" id="myModalLabel"><?php echo display('print') ?></h4>

          </div>

          <div class="modal-body">

            <?php echo form_open('Cinvoice/invoice_inserted_data_manual', array('class' => 'form-vertical', 'id' => '', 'name' => '')) ?>

            <div id="outputs" class="hide alert alert-danger"></div>

            <h3> <?php echo display('successfully_inserted') ?></h3>

            <h4><?php echo display('do_you_want_to_print') ?> ??</h4>

            <input type="hidden" name="invoice_id" id="inv_id">

          </div>

          <div class="modal-footer">

            <button type="button" onclick="cancelprint()" class="btn btn-default" data-dismiss="modal"><?php echo display('no') ?></button>

            <button type="submit" class="btn btn-primary" id="yes"><?php echo display('yes') ?></button>

            <?php echo form_close() ?>

          </div>

        </div>

      </div>

    </div>



  
     
<!------ add new Payment Type -->
<div class="modal fade" id="payment_type_new" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="color:white;background-color:#38469f;">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title">Add New Payment Terms</h4>
        </div>
        <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
  <form id="add_pay_terms" method="post">
    <div class="panel-body">
<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
        <div class="form-group row">
            <label for="customer_name" style="width: auto;" class="col-sm-3 col-form-label">New Payment Terms <i class="text-danger">*</i></label>
            <div class="col-sm-6">
                <input class="form-control" name ="new_payment_terms" id="new_payment_terms" type="text" placeholder="New Payment Terms"  required="" tabindex="1">
            </div>
        </div>
    </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a>
            <input type="submit" class="btn" style="color:white;background-color: #38469F;" value="Submit">
        </div>
                                </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                                 

<!------ add new Payment Type -->  
          <div class="modal fade" id="payment_type" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header" style="color:white;background-color:#38469f;" >

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h4 class="modal-title">Add New Payment Type</h4>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                  <form id="add_pay_type" method="post">

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;">New Payment Type <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="new_payment_type" id="new_payment_type" type="text" placeholder="New Payment Type"  required="" tabindex="1">

                            </div>

                        </div>


                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a>

                            

                            <input type="submit" class="btn" style="color:white;background-color: #38469f;" value="Submit">

                        </div>

                                                </form>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->


        </div>

    </section>

</div>
<div class="modal fade" id="payment_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD PAYMENT</h4>
        </div>
        <div class="modal-body">
          
   
<form id="add_payment_info"  method="post" >  
            <div class="row">


<div class="form-group row">

        <label for="date" style="text-align:end;" class="col-sm-3 col-form-label">Payment Date <i class="text-danger">*</i></label>

        <div class="col-sm-5">

            <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />

        </div>

    </div>
<input type="hidden" id="cutomer_name" name="cutomer_name"/>
<input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
 <div class="form-group row">

        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Reference No<i class="text-danger">*</i></label>

        <div class="col-sm-5">
        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
</div>
 </div> 
    <div class="form-group row">
      <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label">Select Bank:<i class="text-danger">*</i></label>
    <a data-toggle="modal" href="#add_bank_info"  style="color:white;background-color:#38469f;" class="btn btn-primary"><i class="fa fa-university"></i></a>
      <div class="col-sm-5">
  <select name="bank" id="bank"  class="form-control bankpayment" >
<option value="Axis Bank Ltd.">Axis Bank Ltd.</option>
<option value="Bandhan Bank Ltd.">Bandhan Bank Ltd.</option>
<option value="Bank of Baroda">Bank of Baroda</option>
<option value="Bank of India">Bank of India</option>
<option value="Bank of Maharashtra">Bank of Maharashtra</option>
<option value="Canara Bank">Canara Bank</option>
<option value="Central Bank of India">Central Bank of India</option>
<option value="City Union Bank Ltd.">City Union Bank Ltd.</option>
<option value="CSB Bank Ltd.">CSB Bank Ltd.</option>
<option value="DCB Bank Ltd.">DCB Bank Ltd.</option>
<option value="Dhanlaxmi Bank Ltd.">Dhanlaxmi Bank Ltd.</option>
<option value="Federal Bank Ltd.">Federal Bank Ltd.</option>
<option value="HDFC Bank Ltd">HDFC Bank Ltd</option>
<option value="ICICI Bank Ltd.">ICICI Bank Ltd.</option>
<option value="IDBI Bank Ltd.">IDBI Bank Ltd.</option>
<option value="IDFC First Bank Ltd.">IDFC First Bank Ltd.</option>
<option value="Indian Bank">Indian Bank</option>
<option value="Indian Overseas Bank">Indian Overseas Bank</option>
<option value="Induslnd Bank Ltd">Induslnd Bank Ltd</option>
<option value="Jammu & Kashmir Bank Ltd.">Jammu & Kashmir Bank Ltd.</option>
<option value="Karnataka Bank Ltd.">Karnataka Bank Ltd.</option>
<option value="Karur Vysya Bank Ltd.">Karur Vysya Bank Ltd.</option>
<option value="Kotak Mahindra Bank Ltd">Kotak Mahindra Bank Ltd</option>
<option value="Nainital Bank Ltd.">Nainital Bank Ltd.</option>
<option value="Punjab & Sind Bank">Punjab & Sind Bank</option>
<option value="Punjab National Bank">Punjab National Bank</option>
<option value="RBL Bank Ltd.">RBL Bank Ltd.</option>
<option value="South Indian Bank Ltd.">South Indian Bank Ltd.</option>
<option value="State Bank of India">State Bank of India</option>
<option value="Tamilnad Mercantile Bank Ltd.">Tamilnad Mercantile Bank Ltd.</option>
<option value="UCO Bank">UCO Bank</option>
<option value="Union Bank of India">Union Bank of India</option>
<option value="YES Bank Ltd.">YES Bank Ltd.</option>
<?php foreach($bank_list as $b){ ?>
  <option value="<?=$b['bank_name']; ?>"><?=$b['bank_name']; ?></option>
<?php } ?>
</select>
</div>
      </div>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <input class=" form-control" type="hidden"  readonly name="customer_name_modal" id="customer_name_modal" required   />    
      <div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Amount to be paid : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_to_pay" id="amount_to_pay"   style="width:190%;" class="form-control" required   /></td>

    </tr>
   </table>


</div>
</div> 
      <div class="form-group row" style="display:none;">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Amount Received : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_received" value="0.00"  style="width:190%;" id="amount_received" class="form-control"required   /></td>
     </tr>
   </table>



</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;"    class="col-sm-3 col-form-label">Balance : </label>

<div class="col-sm-5">

<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"   readonly name="balance_modal"    style="width:190%;" id="balance_modal" class="form-control" required  /></td>
     </tr>
   </table>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Payment Amount: <i class="text-danger">*</i></label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"   name="payment" id="payment_from_modal"     style="width:190%;" class="form-control"required   /></td>
     </tr>
   </table>


</div>
</div>

<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Additional Information : </label>

<div class="col-sm-5">
<input class=" form-control" type="text"  name="details" id="details"/>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Attachments : </label>

<div class="col-sm-5">
<input class=" form-control" type="file"  name="attachement" id="attachement" />
</div>
</div> 
  </div>   </div>
     <div class="modal-footer">
     <div class="col-sm-8"></div>
    
     <div class="col-sm-4">
        <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a>
     <input class="btn btn-primary btn-large" type="submit" style="color:white;background-color:#38469f;"  name="submit_pay" id="submit_pay" value="submit"  required   />
</div>
     </div>
   </div>
   </form>
 </div>
</div>
<div class="modal fade" id="add_bank_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="color:white;background-color:#38469f;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title">ADD BANK</h4>

            </div>
            <div class="container"></div>
            <div class="modal-body">  <div id="customeMessage" class="alert hide"></div>


<form id="add_bank"  method="post">  
<div class="panel-body">

<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

  <div class="form-group row">

      <label for="bank_name" class="col-sm-4 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>

      </div>

  </div>



  <div class="form-group row">

      <label for="ac_name" class="col-sm-4 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>

      </div>

  </div>

  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                      

  <div class="form-group row">

      <label for="ac_no" class="col-sm-4 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>

      </div>

  </div>



  <div class="form-group row">

      <label for="branch" class="col-sm-4 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>

      </div>

  </div>

  <div class="form-group row">
  <label for="shipping_line" class="col-sm-4 col-form-label">Country
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="Select the Country"  name="country" id="country" style="width:100%"></select>
                                 
                                    </div>

</div>
<div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Currency" ?></label>
            <div class="col-sm-6">
            <select  class="form-control" id="currency" name="currency1" class="form-control"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
    <option>Select currency</option>
    <option value="AFN">AFN - Afghan Afghani</option>
    <option value="ALL">ALL - Albanian Lek</option>
    <option value="DZD">DZD - Algerian Dinar</option>
    <option value="AOA">AOA - Angolan Kwanza</option>
    <option value="ARS">ARS - Argentine Peso</option>
    <option value="AMD">AMD - Armenian Dram</option>
    <option value="AWG">AWG - Aruban Florin</option>
    <option value="AUD">AUD - Australian Dollar</option>
    <option value="AZN">AZN - Azerbaijani Manat</option>
    <option value="BSD">BSD - Bahamian Dollar</option>
    <option value="BHD">BHD - Bahraini Dinar</option>
    <option value="BDT">BDT - Bangladeshi Taka</option>
    <option value="BBD">BBD - Barbadian Dollar</option>
    <option value="BYR">BYR - Belarusian Ruble</option>
    <option value="BEF">BEF - Belgian Franc</option>
    <option value="BZD">BZD - Belize Dollar</option>
    <option value="BMD">BMD - Bermudan Dollar</option>
    <option value="BTN">BTN - Bhutanese Ngultrum</option>
    <option value="BTC">BTC - Bitcoin</option>
    <option value="BOB">BOB - Bolivian Boliviano</option>
    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
    <option value="BWP">BWP - Botswanan Pula</option>
    <option value="BRL">BRL - Brazilian Real</option>
    <option value="GBP">GBP - British Pound Sterling</option>
    <option value="BND">BND - Brunei Dollar</option>
    <option value="BGN">BGN - Bulgarian Lev</option>
    <option value="BIF">BIF - Burundian Franc</option>
    <option value="KHR">KHR - Cambodian Riel</option>
    <option value="CAD">CAD - Canadian Dollar</option>
    <option value="CVE">CVE - Cape Verdean Escudo</option>
    <option value="KYD">KYD - Cayman Islands Dollar</option>
    <option value="XOF">XOF - CFA Franc BCEAO</option>
    <option value="XAF">XAF - CFA Franc BEAC</option>
    <option value="XPF">XPF - CFP Franc</option>
    <option value="CLP">CLP - Chilean Peso</option>
    <option value="CNY">CNY - Chinese Yuan</option>
    <option value="COP">COP - Colombian Peso</option>
    <option value="KMF">KMF - Comorian Franc</option>
    <option value="CDF">CDF - Congolese Franc</option>
    <option value="CRC">CRC - Costa Rican ColÃ³n</option>
    <option value="HRK">HRK - Croatian Kuna</option>
    <option value="CUC">CUC - Cuban Convertible Peso</option>
    <option value="CZK">CZK - Czech Republic Koruna</option>
    <option value="DKK">DKK - Danish Krone</option>
    <option value="DJF">DJF - Djiboutian Franc</option>
    <option value="DOP">DOP - Dominican Peso</option>
    <option value="XCD">XCD - East Caribbean Dollar</option>
    <option value="EGP">EGP - Egyptian Pound</option>
    <option value="ERN">ERN - Eritrean Nakfa</option>
    <option value="EEK">EEK - Estonian Kroon</option>
    <option value="ETB">ETB - Ethiopian Birr</option>
    <option value="EUR">EUR - Euro</option>
    <option value="FKP">FKP - Falkland Islands Pound</option>
    <option value="FJD">FJD - Fijian Dollar</option>
    <option value="GMD">GMD - Gambian Dalasi</option>
    <option value="GEL">GEL - Georgian Lari</option>
    <option value="DEM">DEM - German Mark</option>
    <option value="GHS">GHS - Ghanaian Cedi</option>
    <option value="GIP">GIP - Gibraltar Pound</option>
    <option value="GRD">GRD - Greek Drachma</option>
    <option value="GTQ">GTQ - Guatemalan Quetzal</option>
    <option value="GNF">GNF - Guinean Franc</option>
    <option value="GYD">GYD - Guyanaese Dollar</option>
    <option value="HTG">HTG - Haitian Gourde</option>
    <option value="HNL">HNL - Honduran Lempira</option>
    <option value="HKD">HKD - Hong Kong Dollar</option>
    <option value="HUF">HUF - Hungarian Forint</option>
    <option value="ISK">ISK - Icelandic KrÃ³na</option>
    <option value="INR">INR - Indian Rupee</option>
    <option value="IDR">IDR - Indonesian Rupiah</option>
    <option value="IRR">IRR - Iranian Rial</option>
    <option value="IQD">IQD - Iraqi Dinar</option>
    <option value="ILS">ILS - Israeli New Sheqel</option>
    <option value="ITL">ITL - Italian Lira</option>
    <option value="JMD">JMD - Jamaican Dollar</option>
    <option value="JPY">JPY - Japanese Yen</option>
    <option value="JOD">JOD - Jordanian Dinar</option>
    <option value="KZT">KZT - Kazakhstani Tenge</option>
    <option value="KES">KES - Kenyan Shilling</option>
    <option value="KWD">KWD - Kuwaiti Dinar</option>
    <option value="KGS">KGS - Kyrgystani Som</option>
    <option value="LAK">LAK - Laotian Kip</option>
    <option value="LVL">LVL - Latvian Lats</option>
    <option value="LBP">LBP - Lebanese Pound</option>
    <option value="LSL">LSL - Lesotho Loti</option>
    <option value="LRD">LRD - Liberian Dollar</option>
    <option value="LYD">LYD - Libyan Dinar</option>
    <option value="LTL">LTL - Lithuanian Litas</option>
    <option value="MOP">MOP - Macanese Pataca</option>
    <option value="MKD">MKD - Macedonian Denar</option>
    <option value="MGA">MGA - Malagasy Ariary</option>
    <option value="MWK">MWK - Malawian Kwacha</option>
    <option value="MYR">MYR - Malaysian Ringgit</option>
    <option value="MVR">MVR - Maldivian Rufiyaa</option>
    <option value="MRO">MRO - Mauritanian Ouguiya</option>
    <option value="MUR">MUR - Mauritian Rupee</option>
    <option value="MXN">MXN - Mexican Peso</option>
    <option value="MDL">MDL - Moldovan Leu</option>
    <option value="MNT">MNT - Mongolian Tugrik</option>
    <option value="MAD">MAD - Moroccan Dirham</option>
    <option value="MZM">MZM - Mozambican Metical</option>
    <option value="MMK">MMK - Myanmar Kyat</option>
    <option value="NAD">NAD - Namibian Dollar</option>
    <option value="NPR">NPR - Nepalese Rupee</option>
    <option value="ANG">ANG - Netherlands Antillean Guilder</option>
    <option value="TWD">TWD - New Taiwan Dollar</option>
    <option value="NZD">NZD - New Zealand Dollar</option>
    <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
    <option value="NGN">NGN - Nigerian Naira</option>
    <option value="KPW">KPW - North Korean Won</option>
    <option value="NOK">NOK - Norwegian Krone</option>
    <option value="OMR">OMR - Omani Rial</option>
    <option value="PKR">PKR - Pakistani Rupee</option>
    <option value="PAB">PAB - Panamanian Balboa</option>
    <option value="PGK">PGK - Papua New Guinean Kina</option>
    <option value="PYG">PYG - Paraguayan Guarani</option>
    <option value="PEN">PEN - Peruvian Nuevo Sol</option>
    <option value="PHP">PHP - Philippine Peso</option>
    <option value="PLN">PLN - Polish Zloty</option>
    <option value="QAR">QAR - Qatari Rial</option>
    <option value="RON">RON - Romanian Leu</option>
    <option value="RUB">RUB - Russian Ruble</option>
    <option value="RWF">RWF - Rwandan Franc</option>
    <option value="SVC">SVC - Salvadoran ColÃ³n</option>
    <option value="WST">WST - Samoan Tala</option>
    <option value="SAR">SAR - Saudi Riyal</option>
    <option value="RSD">RSD - Serbian Dinar</option>
    <option value="SCR">SCR - Seychellois Rupee</option>
    <option value="SLL">SLL - Sierra Leonean Leone</option>
    <option value="SGD">SGD - Singapore Dollar</option>
    <option value="SKK">SKK - Slovak Koruna</option>
    <option value="SBD">SBD - Solomon Islands Dollar</option>
    <option value="SOS">SOS - Somali Shilling</option>
    <option value="ZAR">ZAR - South African Rand</option>
    <option value="KRW">KRW - South Korean Won</option>
    <option value="XDR">XDR - Special Drawing Rights</option>
    <option value="LKR">LKR - Sri Lankan Rupee</option>
    <option value="SHP">SHP - St. Helena Pound</option>
    <option value="SDG">SDG - Sudanese Pound</option>
    <option value="SRD">SRD - Surinamese Dollar</option>
    <option value="SZL">SZL - Swazi Lilangeni</option>
    <option value="SEK">SEK - Swedish Krona</option>
    <option value="CHF">CHF - Swiss Franc</option>
    <option value="SYP">SYP - Syrian Pound</option>
    <option value="STD">STD - São Tomé and Príncipe Dobra</option>
    <option value="TJS">TJS - Tajikistani Somoni</option>
    <option value="TZS">TZS - Tanzanian Shilling</option>
    <option value="THB">THB - Thai Baht</option>
    <option value="TOP">TOP - Tongan pa'anga</option>
    <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
    <option value="TND">TND - Tunisian Dinar</option>
    <option value="TRY">TRY - Turkish Lira</option>
    <option value="TMT">TMT - Turkmenistani Manat</option>
    <option value="UGX">UGX - Ugandan Shilling</option>
    <option value="UAH">UAH - Ukrainian Hryvnia</option>
    <option value="AED">AED - United Arab Emirates Dirham</option>
    <option value="UYU">UYU - Uruguayan Peso</option>
    <option value="USD">USD - US Dollar</option>
    <option value="UZS">UZS - Uzbekistan Som</option>
    <option value="VUV">VUV - Vanuatu Vatu</option>
    <option value="VEF">VEF - Venezuelan BolÃ­var</option>
    <option value="VND">VND - Vietnamese Dong</option>
    <option value="YER">YER - Yemeni Rial</option>
    <option value="ZMK">ZMK - Zambian Kwacha</option>
</select>




</div>
 </div>

</div>



  </div>



  <div class="modal-footer">

      <div class="row">
        <div class="col-sm-8">
</div>
    
<div class="col-sm-4">
    <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a>
     <input type="submit" id="addBank"  style="color:white;background-color:#38469f;"  class="btn btn-primary btn-large" name="addBank" value="<?php echo display('save') ?>"/>
     <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

  </div>
  </div>  </div>

</form>
  </div>
  </div>
  </div>              









    
<!------ add new customer -->
<div class="modal fade" id="cust_info">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="color:white;background-color:#38469f;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title">ADD NEW CUSTOMER</h4>

            </div>
            <div class="container"></div>
            <div class="modal-body">  <div id="customeMessage" class="alert hide"></div>



      <form id="instant_customer"  method="post">

          <div id="customeMessage" class="alert hide"></div>
  <div class="panel-body">


      <div class="col-sm-6">
     
				<div class="form-group row">
                            <label for="customer_name" class="col-sm-4 col-form-label">Company Name <i class="text-danger">*</i></label>
      <div class="col-sm-8">
                                          <input class="form-control" name ="customer_name" id="customer_name" type="text" placeholder=" Company Name"   required="" tabindex="1" >

                </div>
                </div>
				
                <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">


                        <div class="form-group row">
<label for="customer_type" class="col-sm-4 col-form-label">Customer Type</label>
                            <div class="col-sm-8">
							<select   name="customer_type" id="customer_type" class=" form-control" placeholder="Customer Type" >
     <option value="">Select Customer Type</option>   
    <option value="Distributor">Distributor</option> 
    <option value="Fabricator">Fabricator</option> 
    <option value="Kitchen">Kitchen</option> 
    <option value="Dealer">Dealer</option> 
    <option value="Contractor">Contractor</option> 
    <option value="Builder">Builder</option> 
    <option value="Others">Others</option> 
    </select>
                            </div>
                        </div>
						
						
						
						
						
      <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Primary Email<i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name ="email" id="email" type="email" required="" placeholder="Primary Email" > 
          </div>
      </div>
	  
	  
	  
	  
          <div class="form-group row">
                            <label for="emailaddress" class="col-sm-4 col-form-label">Secondary Email </label>
          <div class="col-sm-8">
                                <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="Secondary Email"  >
          </div>
      </div>
	  
	  
       <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label">Business Phone <i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name ="phone" id="mobile" type="number" placeholder="Business Phone" min="0" tabindex="3" required="">
          </div>
      </div>
	  
	  
       <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label"> Mobile</label>
          <div class="col-sm-8">
                                <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Mobile"  min="0" tabindex="2" >
          </div>
      </div>
	  
	  
        <div class="form-group row">
                            <label for="contact" class="col-sm-4 col-form-label">Contact Person <i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name="contact" id="contact" type="text" placeholder="Contact Person" required="" >
          </div>
      </div>
	  
	  
      <div class="form-group row">
      <label for="ETA" class="col-sm-4 col-form-label">Attachments</label>
          <div class="col-sm-8">
                 <input type="file" name="file" class="form-control">

          </div>
      </div>
    
                                        <div class="form-group row">
                            <label for="Preferred currency" class="col-sm-4 col-form-label"> Preferred currency<i class="text-danger">*</i></label>

            <div class="col-sm-8">
            <!-- <select id="currency" name="currency1" style="width: 100%;"     > -->
            <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">

    <option value="USD">USD - US Dollar - $</option>
    <option value="AFN">AFN - Afghan Afghani - ؋</option>
    <option value="ALL">ALL - Albanian Lek - Lek</option>
    <option value="DZD">DZD - Algerian Dinar - دج</option>
    <option value="AOA">AOA - Angolan Kwanza - Kz</option>
    <option value="ARS">ARS - Argentine Peso - $</option>
    <option value="AMD">AMD - Armenian Dram - ֏</option>
    <option value="AWG">AWG - Aruban Florin - ƒ</option>
    <option value="AUD">AUD - Australian Dollar - $</option>
    <option value="AZN">AZN - Azerbaijani Manat - m</option>
    <option value="BSD">BSD - Bahamian Dollar - B$</option>
    <option value="BHD">BHD - Bahraini Dinar - .د.ب</option>
    <option value="BDT">BDT - Bangladeshi Taka - ৳</option>
    <option value="BBD">BBD - Barbadian Dollar - Bds$</option>
    <option value="BYR">BYR - Belarusian Ruble - Br</option>
    <option value="BEF">BEF - Belgian Franc - fr</option>
    <option value="BZD">BZD - Belize Dollar - $</option>
    <option value="BMD">BMD - Bermudan Dollar - $</option>
    <option value="BTN">BTN - Bhutanese Ngultrum - Nu.</option>
    <option value="BTC">BTC - Bitcoin - ฿</option>
    <option value="BOB">BOB - Bolivian Boliviano - Bs.</option>
    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark - KM</option>
    <option value="BWP">BWP - Botswanan Pula - P</option>
    <option value="BRL">BRL - Brazilian Real - R$</option>
    <option value="GBP">GBP - British Pound Sterling - £</option>
    <option value="BND">BND - Brunei Dollar - B$</option>
    <option value="BGN">BGN - Bulgarian Lev - Лв.</option>
    <option value="BIF">BIF - Burundian Franc - FBu</option>
    <option value="KHR">KHR - Cambodian Riel - KHR</option>
    <option value="CAD">CAD - Canadian Dollar - $</option>
    <option value="CVE">CVE - Cape Verdean Escudo - $</option>
    <option value="KYD">KYD - Cayman Islands Dollar - $</option>
    <option value="XOF">XOF - CFA Franc BCEAO - CFA</option>
    <option value="XAF">XAF - CFA Franc BEAC - FCFA</option>
    <option value="XPF">XPF - CFP Franc - ₣</option>
    <option value="CLP">CLP - Chilean Peso - $</option>
    <option value="CNY">CNY - Chinese Yuan - ¥</option>
    <option value="COP">COP - Colombian Peso - $</option>
    <option value="KMF">KMF - Comorian Franc - CF</option>
    <option value="CDF">CDF - Congolese Franc - FC</option>
    <option value="CRC">CRC - Costa Rican ColÃ³n - ₡</option>
    <option value="HRK">HRK - Croatian Kuna - kn</option>
    <option value="CUC">CUC - Cuban Convertible Peso - $, CUC</option>
    <option value="CZK">CZK - Czech Republic Koruna - Kč</option>
    <option value="DKK">DKK - Danish Krone - Kr.</option>
    <option value="DJF">DJF - Djiboutian Franc - Fdj</option>
    <option value="DOP">DOP - Dominican Peso - $</option>
    <option value="XCD">XCD - East Caribbean Dollar - $</option>
    <option value="EGP">EGP - Egyptian Pound - ج.م</option>
    <option value="ERN">ERN - Eritrean Nakfa - Nfk</option>
    <option value="EEK">EEK - Estonian Kroon - kr</option>
    <option value="ETB">ETB - Ethiopian Birr - Nkf</option>
    <option value="EUR">EUR - Euro - €</option>
    <option value="FKP">FKP - Falkland Islands Pound - £</option>
    <option value="FJD">FJD - Fijian Dollar - FJ$</option>
    <option value="GMD">GMD - Gambian Dalasi - D</option>
    <option value="GEL">GEL - Georgian Lari - ლ</option>
    <option value="DEM">DEM - German Mark - DM</option>
    <option value="GHS">GHS - Ghanaian Cedi - GH₵</option>
    <option value="GIP">GIP - Gibraltar Pound - £</option>
    <option value="GRD">GRD - Greek Drachma - ₯, Δρχ, Δρ</option>
    <option value="GTQ">GTQ - Guatemalan Quetzal - Q</option>
    <option value="GNF">GNF - Guinean Franc - FG</option>
    <option value="GYD">GYD - Guyanaese Dollar - $</option>
    <option value="HTG">HTG - Haitian Gourde - G</option>
    <option value="HNL">HNL - Honduran Lempira - L</option>
    <option value="HKD">HKD - Hong Kong Dollar - $</option>
    <option value="HUF">HUF - Hungarian Forint - Ft</option>
    <option value="ISK">ISK - Icelandic KrÃ³na - kr</option>
    <option value="INR">INR - Indian Rupee - ₹</option>
    <option value="IDR">IDR - Indonesian Rupiah - Rp</option>
    <option value="IRR">IRR - Iranian Rial - ﷼</option>
    <option value="IQD">IQD - Iraqi Dinar - د.ع</option>
    <option value="ILS">ILS - Israeli New Sheqel - ₪</option>
    <option value="ITL">ITL - Italian Lira - L,£</option>
    <option value="JMD">JMD - Jamaican Dollar - J$</option>
    <option value="JPY">JPY - Japanese Yen - ¥</option>
    <option value="JOD">JOD - Jordanian Dinar - ا.د</option>
    <option value="KZT">KZT - Kazakhstani Tenge - лв</option>
    <option value="KES">KES - Kenyan Shilling - KSh</option>
    <option value="KWD">KWD - Kuwaiti Dinar - ك.د</option>
    <option value="KGS">KGS - Kyrgystani Som - лв</option>
    <option value="LAK">LAK - Laotian Kip - ₭</option>
    <option value="LVL">LVL - Latvian Lats - Ls</option>
    <option value="LBP">LBP - Lebanese Pound - £</option>
    <option value="LSL">LSL - Lesotho Loti - L</option>
    <option value="LRD">LRD - Liberian Dollar - $</option>
    <option value="LYD">LYD - Libyan Dinar - د.ل</option>
    <option value="LTL">LTL - Lithuanian Litas - Lt</option>
    <option value="MOP">MOP - Macanese Pataca - $</option>
    <option value="MKD">MKD - Macedonian Denar - ден</option>
    <option value="MGA">MGA - Malagasy Ariary - Ar</option>
    <option value="MWK">MWK - Malawian Kwacha - MK</option>
    <option value="MYR">MYR - Malaysian Ringgit - RM</option>
    <option value="MVR">MVR - Maldivian Rufiyaa - Rf</option>
    <option value="MRO">MRO - Mauritanian Ouguiya - MRU</option>
    <option value="MUR">MUR - Mauritian Rupee - ₨</option>
    <option value="MXN">MXN - Mexican Peso - $</option>
    <option value="MDL">MDL - Moldovan Leu - L</option>
    <option value="MNT">MNT - Mongolian Tugrik - ₮</option>
    <option value="MAD">MAD - Moroccan Dirham - MAD</option>
    <option value="MZM">MZM - Mozambican Metical - MT</option>
    <option value="MMK">MMK - Myanmar Kyat - K</option>
    <option value="NAD">NAD - Namibian Dollar - $</option>
    <option value="NPR">NPR - Nepalese Rupee - ₨</option>
    <option value="ANG">ANG - Netherlands Antillean Guilder - ƒ</option>
    <option value="TWD">TWD - New Taiwan Dollar - $</option>
    <option value="NZD">NZD - New Zealand Dollar - $</option>
    <option value="NIO">NIO - Nicaraguan CÃ³rdoba - C$</option>
    <option value="NGN">NGN - Nigerian Naira - ₦</option>
    <option value="KPW">KPW - North Korean Won - ₩</option>
    <option value="NOK">NOK - Norwegian Krone - kr</option>
    <option value="OMR">OMR - Omani Rial - .ع.ر</option>
    <option value="PKR">PKR - Pakistani Rupee - ₨</option>
    <option value="PAB">PAB - Panamanian Balboa - B/.</option>
    <option value="PGK">PGK - Papua New Guinean Kina - K</option>
    <option value="PYG">PYG - Paraguayan Guarani - ₲</option>
    <option value="PEN">PEN - Peruvian Nuevo Sol - S/.</option>
    <option value="PHP">PHP - Philippine Peso - ₱</option>
    <option value="PLN">PLN - Polish Zloty - zł</option>
    <option value="QAR">QAR - Qatari Rial - ق.ر</option>
    <option value="RON">RON - Romanian Leu - lei</option>
    <option value="RUB">RUB - Russian Ruble - ₽</option>
    <option value="RWF">RWF - Rwandan Franc - FRw</option>
    <option value="SVC">SVC - Salvadoran ColÃ³n - ₡</option>
    <option value="WST">WST - Samoan Tala - SAT</option>
    <option value="SAR">SAR - Saudi Riyal - ﷼</option>
    <option value="RSD">RSD - Serbian Dinar - din</option>
    <option value="SCR">SCR - Seychellois Rupee - SRe</option>
    <option value="SLL">SLL - Sierra Leonean Leone - Le</option>
    <option value="SGD">SGD - Singapore Dollar - $</option>
    <option value="SKK">SKK - Slovak Koruna - Sk</option>
    <option value="SBD">SBD - Solomon Islands Dollar - Si$</option>
    <option value="SOS">SOS - Somali Shilling - Sh.so.</option>
    <option value="ZAR">ZAR - South African Rand - R</option>
    <option value="KRW">KRW - South Korean Won - ₩</option>
    <option value="XDR">XDR - Special Drawing Rights - SDR</option>
    <option value="LKR">LKR - Sri Lankan Rupee - Rs</option>
    <option value="SHP">SHP - St. Helena Pound - £</option>
    <option value="SDG">SDG - Sudanese Pound - .س.ج</option>
    <option value="SRD">SRD - Surinamese Dollar - $</option>
    <option value="SZL">SZL - Swazi Lilangeni - E</option>
    <option value="SEK">SEK - Swedish Krona - kr</option>
    <option value="CHF">CHF - Swiss Franc - CHf</option>
    <option value="SYP">SYP - Syrian Pound - LS</option>
    <option value="STD">STD - São Tomé and Príncipe Dobra - Db</option>
    <option value="TJS">TJS - Tajikistani Somoni - SM</option>
    <option value="TZS">TZS - Tanzanian Shilling - TSh</option>
    <option value="THB">THB - Thai Baht - ฿</option>
    <option value="TOP">TOP - Tongan pa'anga - $</option>
    <option value="TTD">TTD - Trinidad & Tobago Dollar - $</option>
    <option value="TND">TND - Tunisian Dinar - ت.د</option>
    <option value="TRY">TRY - Turkish Lira - ₺</option>
    <option value="TMT">TMT - Turkmenistani Manat - T</option>
    <option value="UGX">UGX - Ugandan Shilling - USh</option>
    <option value="UAH">UAH - Ukrainian Hryvnia - ₴</option>
    <option value="AED">AED - United Arab Emirates Dirham - إ.د</option>
    <option value="UYU">UYU - Uruguayan Peso - $</option>
    <option value="UZS">UZS - Uzbekistan Som - лв</option>
    <option value="VUV">VUV - Vanuatu Vatu - VT</option>
    <option value="VEF">VEF - Venezuelan BolÃvar - Bs</option>
    <option value="VND">VND - Vietnamese Dong - ₫</option>
    <option value="YER">YER - Yemeni Rial - ﷼</option>
    <option value="ZMK">ZMK - Zambian Kwacha - ZK</option>
</select>
</div>
  </div>


  </div>

  
  <div class="col-sm-6">
<div class="form-group row">
          <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
          <div class="col-sm-8">
                                <input class="form-control" name="fax" id="fax" type="text" placeholder="Fax" >
          </div>
        </div>




  <div class="form-group row">
  <label for="address2 " class="col-sm-4 col-form-label">Billing Address<i class="text-danger">*</i></label>
          <div class="col-sm-8">
          <textarea class="form-control" required="" name="address2" id="address2" rows="2"   placeholder="Billing Address" ></textarea>
          </div>
      </div>
	  

      <div class="form-group row">
                            <label for="address " class="col-sm-4 col-form-label">Shipping Address</label>
          <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address "    rows="2" placeholder="Shipping Address"></textarea>
          </div>
      </div>


	  
	  
       <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label">City <i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name="city" id="city" type="text" placeholder="City" required="" >
          </div>
      </div>
    
	
	
      <div class="form-group row">
                            <label for="state" class="col-sm-4 col-form-label">State <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                <input class="form-control" name="state" id="state" type="text" placeholder="State" required="" >
                                    </div>
                        </div>
						
						
						
						
						
						
      <div class="form-group row">
                            <label for="zip" class="col-sm-4 col-form-label">Zip <i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name="zip" id="zip" type="text" placeholder="Zip"  required="">
          </div>
      </div>
	  
	  
	  
	  
	  
	  
      <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label">Country<i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" ></select>
          </div>
      </div>
	  
	  
	  
	  
	  
      <div class="form-group row">
<label for="billing_address" class="col-sm-4 col-form-label">Payment Terms<i class="text-danger">*</i></label>
          <div class="col-sm-8">
<select   name="payment" id="payment_terms" class=" form-control" placeholder='Payment Terms'  required="" >
     <option value="">Select Payment Terms </option>   
    <option value="COD">COD</option> 
    <option value="30 Days">30 Days</option> 
    <option value="45 Days">45 Days</option> 
    <option value="60 Days">60 Days</option> 
    <option value="90 Days">90 Days</option> 
      <?php foreach($payment_terms as $inv){ ?>
          <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                               <?php    }?>
    </select>          </div>
      </div>
	  
	  
	  
	  
	  
	    <div class="form-group row">
                            <label for="previous_balance" class="col-sm-4 col-form-label">Credit Limit <i class="text-danger">*</i></label>
          <div class="col-sm-8">
          <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="Credit Limit" tabindex="5" required="">
          </div>
      </div>
	  
	  

                    <div class="form-group row">

<label for="invoice_no" class="col-sm-4 col-form-label"> Sales Tax

   

</label>

<div class="col-sm-8">

<select name="sales_taxes" class="form-control"  id="tax_dropdown" tabindex="3">
                                      <option value=""selected>Select Sales Tax</option>
                                    <option value="1"><?php echo display('NO') ?></option>
                                    <option value="2"><?php echo display('YES') ?></option>
                     </select>
</div>
&nbsp;&nbsp;
<div class="form-group row" id="tax">
    <div class="row">
           <div class="col-sm-12">
    <label for="sales" class="col-sm-4 col-form-label">Sales Tax</label>
    <div class="col-sm-8">
    <select  class="form-control" name="tax" value="" tabindex="3" style="width:95%"  >
    <!-- <select name="tax" value="" tabindex="5" style="width:100%"> -->
    <option value="">Select the State</option>
<option value="Alabama">Alabama</option>
<option value="Alaska">Alaska</option>
<option value="Arizona">Arizona</option>
<option value="Arkansas">Arkansas</option>
<option value="California">California</option>
<option value="Colorado">Colorado</option>
<option value="Connecticut">Connecticut</option>
<option value="Delaware">Delaware</option>
<option value="District Of Columbia">District Of Columbia</option>
<option value="Florida">Florida</option>
<option value="Georgia">Georgia</option>
<option value="Hawaii">Hawaii</option>
<option value="Idaho">Idaho</option>
<option value="Illinois">Illinois</option>
<option value="Indiana">Indiana</option>
<option value="Iowa">Iowa</option>
<option value="Kansas">Kansas</option>
<option value="Kentucky">Kentucky</option>
<option value="Louisiana">Louisiana</option>
<option value="Maine">Maine</option>
<option value="Maryland">Maryland</option>
<option value="Massachusetts">Massachusetts</option>
<option value="Michigan">Michigan</option>
<option value="Minnesota">Minnesota</option>
<option value="Mississippi">Mississippi</option>
<option value="Missouri">Missouri</option>
<option value="Montana">Montana</option>
<option value="Nebraska">Nebraska</option>
<option value="Nevada">Nevada</option>
<option value="New Hampshire">New Hampshire</option>
<option value="New Jersey">New Jersey</option>
<option value="New Mexico">New Mexico</option>
<option value="New York">New York</option>
<option value="North Carolina">North Carolina</option>
<option value="North Dakota">North Dakota</option>
<option value="Ohio">Ohio</option>
<option value="Oklahoma">Oklahoma</option>
<option value="Oregon">Oregon</option>
<option value="Pennsylvania">Pennsylvania</option>
<option value="Rhode Island">Rhode Island</option>
<option value="South Carolina">South Carolina</option>
<option value="South Dakota">South Dakota</option>
<option value="Tennessee">Tennessee</option>
<option value="Texas">Texas</option>
<option value="Utah">Utah</option>
<option value="Vermont">Vermont</option>
<option value="Virginia">Virginia</option>
<option value="Washington">Washington</option>
<option value="West Virginia">West Virginia</option>
<option value="Wisconsin">Wisconsin</option>
<option value="Wyoming">Wyoming</option>
</select>
</div>
</div>
    </div>
    &nbsp;&nbsp;
                <div class="form-group row" id="tax">
                 <div class="col-sm-12">
                <label for="sales" class="col-sm-4 col-form-label">Tax Rates </label>
                <div class="col-sm-8">
                 <input name="taxes"  class="form-control taxes" value="" placeholder="%"   style="width:95%" tabindex="4">
                 </div>
    </div>
    </div>
</div>
</div>
</div>
                </div>
                </div>







                
                    <div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal" style="color:white;background-color:#38469f;" >Close</a>
                        <input type="submit" class="btn"  style="color:white;background-color:#38469f;" value="Submit">
                    </div>
                    </form>
</div>
</div>
</div>






<!------ add new product-->
<form id="insert_product"  method="post">
     <div class="modal fade" id="product_info" role="dialog">
<div class="modal-dialog">
<div class="modal-content" style="width: 150%; height: 140%;">
 <div class="modal-header" style="color:white;background-color:#38469f;">
     <a href="#" class="close" data-dismiss="modal">&times;</a>
     <h3 class="modal-title">Add New Product</h3>
 </div>
 <div class="modal-body">
     <div id="customeMessage" class="alert hide"></div>
       <form action="ada">
       <div class="panel-body">

        <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

    <div class="col-sm-6">
                     <div class="form-group row">
                         <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
                         <div class="col-sm-8">
                             <input class="form-control" name="product_name" type="text" id="product_name" placeholder="<?php echo display('product_name') ?>" required tabindex="1" >
                         </div>
                     </div>
                 </div>



                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="barcode_or_qrcode" class="col-sm-4 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
                             <div class="col-sm-8">
    <input type="text" tabindex="3" class="form-control"  style="width: 100%;" name="product_id" value="<?php if(!empty($voucher_no[0]['voucher']))
                      ?>"
                      placeholder="Barcode/QR-code" id="product_id"  />
                             </div>
                         
                      </div>
                 </div>


                 
                
        <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="quantity" class="col-sm-4 col-form-label"><?php echo 'Quantity' ?> <i class="text-danger">*</i></label>
                             <div class="col-sm-8">
                                 <input class="form-control" name="quantity" type="number" id="quantity" placeholder="Enter Product Quantity only" required tabindex="1" >
                             </div>
                         </div>
             
                     </div>


                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger"></i></label>
                             <div class="col-sm-8">
                                 <input type="text" tabindex="" class="form-control" id="product_model" name="model" placeholder="<?php echo display('model') ?>" />
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                             <div class="col-sm-7">
                                 <select class="form-control" id="category_id" style="width: 250px;"  name="category_id" tabindex="3">
                                     <option value="">Select the Category</option>
                                     <?php if ($category_list) { ?>
                                         {category_list}
                                         <option value="{category_name}">{category_name}</option>
                                         {/category_list}
                                     <?php } ?>
                                 </select>
                             </div>
                     </div>
                             </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="sell_price" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger">*</i> </label>
                             <div class="col-sm-8">
                                 <input class="form-control" id="sell_price" name="price" type="text" required="" placeholder="0.00" tabindex="5" min="0">
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="" class="col-sm-4 col-form-label"><?php echo display('Supplier') ?> <i class="text-danger">*</i> </label>
                             <div class="col-sm-7">
                             <select name="supplier_id" id="supplier_id" class="form-control " style="width:118%;" required="" tabindex="1">
                                     <option value=" ">Select Supplier</option>
                                     {all_supplier}
                                     <option value="{supplier_id}">{supplier_name}</option>
                                     {/all_supplier}
                                 </select>
                                     </div>
                                   </div>
                         </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="unit" class="col-sm-4 col-form-label"><?php echo display('unit') ?></label>
                             <div class="col-sm-7">
                                 <select class="form-control" id="unit" name="unit"  style="width:250px;" tabindex="-1" aria-hidden="true">
                                     <option value="">Select the Unit</option>
                                     <?php if ($unit_list) { ?>
                                         {unit_list}
                                         <option value="{unit_name}">{unit_name}</option>
                                         {/unit_list}
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>
                 </div>
                


                 <div class="row">
           <div class="col-sm-12">
                     <div class="col-sm-6">
                     <div class="form-group row">
                             <label for="account_category_name" class="col-sm-4 col-form-label">Account Category Name</label>
                             <div class="col-sm-8">
                             <input class="form-control" name ="account_category_name" id="account_category_name" type="text" placeholder=" Account Category Name"   tabindex="1" >
                             </div>
                         </div>
                     </div>


<div class="col-sm-6">
                     <div class="form-group row">
                             <label for="account_sub_category"  class="col-sm-4 col-form-label">Account Sub Category</label>
                             <div class="col-sm-8">
                             <input class="form-control" name ="account_sub_category" id="account_sub_category" type="text" placeholder=" Account Sub Category"  tabindex="1" >
                             </div>
                         </div>
                     </div>
</div>
                 </div>


                 <div class="row">
                    <div class="col-sm-12">
                     <div class="col-sm-6">
                         <div class="form-group row">
<label for="account_category" class="col-sm-4 col-form-label">Account Category</label>
<div class="col-sm-8">
<select id="ddl"  name="account_category" class="form-control" onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
<option value="">Select the Account Category</option>
<option value="1000 ASSETS">1000 ASSETS</option>
<option value="1200 RECEIVABLES">1200 RECEIVABLES</option>
<option value="1300 INVENTORIES">1300 INVENTORIES</option>
<option value="1400 PREPAID EXPENSES & OTHER CURRENT ASSETS">1400 PREPAID EXPENSES & OTHER CURRENT ASSETS</option>
<option value="1500 PROPERTY PLANT & EQUIPMENT">1500 PROPERTY PLANT & EQUIPMENT</option>
<option value="1600 ACCUMULATED DEPRECIATION & AMORTIZATION">1600 ACCUMULATED DEPRECIATION & AMORTIZATION</option>
<option value="1700 NON – CURRENT RECEIVABLES">1700 NON – CURRENT RECEIVABLES</option>
<option value="1800 INTERCOMPANY RECEIVABLES & 1900 OTHER NON-CURRENT ASSETS">1800 INTERCOMPANY RECEIVABLES & 1900 OTHER NON-CURRENT ASSETS</option>
<option value="2000 LIABILITIES & 2100 PAYABLES">2000 LIABILITIES & 2100 PAYABLES</option>
<option value="2200 ACCRUED COMPENSATION & RELATED ITEMS">2200 ACCRUED COMPENSATION & RELATED ITEMS</option>
<option value="2300 OTHER ACCRUED EXPENSES">2300 OTHER ACCRUED EXPENSES</option>
<option value="2500 ACCRUED TAXES">2500 ACCRUED TAXES</option>
<option value="2600 DEFERRED TAXES">2600 DEFERRED TAXES</option>
<option value="2700 LONG-TERM DEBT">2700 LONG-TERM DEBT</option>
<option value="2800 INTERCOMPANY PAYABLES & 2900 OTHER NON CURRENT LIABILITIES & 3000 OWNERS EQUITIES">2800 INTERCOMPANY PAYABLES & 2900 OTHER NON CURRENT LIABILITIES & 3000 OWNERS EQUITIES</option>
<option value="4000 REVENUE">4000 REVENUE</option>
<option value="5000 COST OF GOODS SOLD">5000 COST OF GOODS SOLD</option>
<option value="6000 – 7000 OPERATING EXPENSES">6000 – 7000 OPERATING EXPENSES</option>
</select>
</div>
                     </div>
                     </div>



                 

                      <div class="col-sm-6">
                     <div class="form-group row">
<label for="product_sub_category" class="col-sm-4 col-form-label">Product Sub Category<i class="text-danger">*</i></label>
<div class="col-sm-8">
<select   name="product_sub_category" id="product_sub_category" class=" form-control" placeholder="product_sub_category" style="width:100%;">
<option value="">Select the Product Sub Category</option>
<option value="Granite">Granite</option>
<option value="Marble">Marble</option>
<option value="Quartz">Quartz</option>
<option value="Quartzite">Quartzite</option>
<option value="Lime Stone">Lime Stone</option>
<option value="Dolomite">Dolomite</option>
<option value="Sand Stone">Sand Stone</option>
<option value="Soap Stone">Soap Stone</option>
</select>
</div>
                     </div>
                 </div>


                    </div>
                 </div>

<div class="col-sm-6">
                     <div class="form-group row">
                             <label for="sub_category"  class="col-sm-4 col-form-label">Account Sub Category</label>
                             <div class="col-sm-8">
                             <!-- <input class="form-control" name ="sub_category" id="sub_category" type="text" placeholder=" Account Sub Category"  tabindex="1" > -->
                             <select class="form-control" name="sub_category" id="ddl2">
                         <option value="Select Sub Category">Select Sub Category</option>
            </select>
                     </div>
              </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="image" class="col-sm-4 col-form-label">Product Image </label>
                             <div class="col-sm-8">
                                 <input type="file" name="product_image" class="form-control" id="product_image"  tabindex="4">
                             </div>
                         </div>
                         </div>
                         <div class="row">
                         <div class="col-sm-12">
                         <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="cost_per_sqft" class="col-sm-4 col-form-label">Cost per Sq. Ft </label>
                             <div class="col-sm-8">
                                 <input type="text" name="costpersqft" class="form-control" id="cost_per_sqft" tabindex="4" placeholder="cost persqft" />
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="cost_per_slab" class="col-sm-4 col-form-label">Cost per Slab </label>
                             <div class="col-sm-8">
                                 <input type="text" name="costperslab" class="form-control" id="cost_per_slab" tabindex="4" placeholder="Cost per Slab" />
                             </div>
                         </div>
                         </div>
                         <div class="col-sm-6">
                      <div class="form-group row">
                          <label for="sales_price" class="col-sm-4 col-form-label">Sales
                             Price per Sq.Ft </label>
                          <div class="col-sm-8">
                              <input type="text" name="salespricepersqft" class="form-control" id="sales_price_per_sqft" tabindex="4"  placeholder=" Sales Price perSq.Ft" />
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="sales_slab_price" class="col-sm-4 col-form-label">Sales Slab Price </label>
                          <div class="col-sm-8">
                              <input type="text" name="salesslabprice" class="form-control" id="sales_slab_price" tabindex="4" placeholder=" Sales Slab Price"  />
                          </div>
                      </div>
                      </div>
                         </div>
 </div>
 <div class="row">
                    <div class="col-sm-12">
                     <div class="col-sm-6">
                       <div class="form-group row">
                       <label for="tax_id" class="col-sm-4 col-form-label">Tax </label>
<div class="col-sm-8">
<input type="text" name="tax" class="form-control" id="tax_id" tabindex="4" placeholder=" Tax" />
     </div>
 </div>
</div>


<div class="col-sm-6">
<div class="form-group row">
                             <label for="country" class="col-sm-4 col-form-label">Country</label>
                             <div class="col-sm-8">
                             <!-- <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="US-United States"
name="country" id="country" ></select> -->

<select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country"   ></select>


                         </div>
                         </div>
                      </div>






                     <div class="col-sm-6">
                     <div class="form-group row">
                         <label for="serial_no" class="col-sm-4 col-form-label">Serial No</label>
                         <div class="col-sm-8">
                             <input type="text" tabindex="" class="form-control " id="serial_no" name="serial_no" placeholder="111,abc,XYz"   />
                         </div>
                     </div>
                 </div>




<div class="row">
     <div class="col-sm-12">
         <center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
         <textarea class="form-control" name="description" id="description" rows="2" placeholder="<?php echo display('product_details') ?>" tabindex="2"></textarea>
     </div>
 </div><br>
 <div class="form-group row">
 <div class="col-sm-6"></div>
     <div class="col-sm-6" style="text-align: -webkit-right;">
     <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a>
         <input type="submit" id="add-product" style="color:white;background-color:#38469f;" class="btn btn-primary btn-large" name="insert_product" value="<?php echo display('save') ?>" tabindex="10"/>
           </div>
        </div>
    </div>
 </div>

</div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   </form>











<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="formModalLabel">Contact Us</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-success hidden" id="contactSuccess">
					<strong>Success!</strong> Your message has been sent to us.
				</div>

				<div class="alert alert-danger hidden" id="contactError">
					<strong>Error!</strong> There was an error sending your message.
				</div>
             
			
					<div class="row">
						<div class="form-group">
							<div class="col-md-6">
								<label>Your name *</label>
								<input type="text"  data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name_email" required>
							</div>
							<div class="col-md-6">
								<label>Your email address *</label>
								<input type="email"  data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email_info" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Subject</label>
								<input type="text"  data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject_email" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Message *</label>
								<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message_email" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="submit" value="Send Message" id="email_send" name="email_send" style="color:white;background-color: #38469f;" class="btn btn-lg mb-xlg" data-loading-text="Loading...">
						</div>
					</div>
                   

			</div>
		</div>
	</div>
</div>
<!-- start Modal for all action -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Sale</h4>
        </div>
        <div class="modal-body">
          
          <h4>Sales Invoice  Created Succefully</h4>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

  <!-- End Modal for all action -->
<!-- Invoice Report End -->



<div id="packmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 130%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Choose your Package </h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
            <tr>
                <th>Choose your Package   </th>
                <th>Sno</th>
                <th>Novice No</th>
                <th>Sales Packing ID</th>
                <th>Gross Weight</th>
                <th>Container NO</th>
                   <th>Thickness</th>
                 <th>Invoice Date</th>               
            </tr>
            <?php 
            $i=0;
            foreach($packinglist as $pack)
                { ?>

            <tr>
                <td><input type="radio" name="packing" id="packing" onclick="packing('<?php echo $pack['invoice_no']; ?>')" ></td>
                <td><?php echo $j=$i+1; ?></td>
                <td><?php echo $pack['invoice_no']; ?></td>
                <td><?php echo $pack['expense_packing_id']; ?></td>
                <td><?php echo $pack['gross_weight']; ?></td>
                
                <td><?php echo $pack['container_no']; ?></td>
                <td><?php echo $pack['thickness']; ?></td>
                <td><?php echo $pack['invoice_date']; ?></td>

            </tr>
        <?php $i++; } ?>
        </table>
      </div>
      
    </div>

  </div>
</div>

<script type="text/javascript">
 $('#customer_name').change(function(e){
      // $('#customer_name_modal').val($(this).val());
    var data = {
      
        value:$(this).val()
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
       dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/getcustomer_data',
        success: function(result, statut) {
            if(result.csrfName){
               csrfName = result.csrfName;
               csrfHash = result.csrfHash;
            }
             $('#vendor_add').val(result[0]['address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['primaryemail']+"-"+result[0]['businessphone']       );
       
            $('#billing_address').html(result[0]['customer_address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['customer_email']+'\n'+result[0]['phone']);
            $('#shipping_address').html(result[0]['address2']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['customer_email']+'\n'+result[0]['phone']);
    $('#email_info').val(result[0]['customer_email']);
        }
    });
});

</script>

<script type="text/javascript">

    $('#add_purchase').on('click', function() {

    $('.hidden_button').show();   

    });



</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->


<!-- Latest compiled JavaScript -->

<script type="text/javascript">
    function configureDropDownLists(ddl1,ddl2) {
var assets = ['1010 CASH Operating Account', '1020 CASH Debitors', '1030 CASH Petty Cash'];
var receivables = ['1210 A/REC Trade', '1220 A/REC Trade Notes Receivable', '1230 A/REC Installment Receivables','1240 A/REC Retainage Withheld','1290 A/REC Allowance for Uncollectible Accounts'];
var inventories = ['1310 INV – Reserved', '1320 INV – Work-in-Progress', '1330 INV – Finished Goods','1340 INV – Reserved','1350 INV – Unbilled Cost & Fees','1390 INV – Reserve for Obsolescence'];
var prepaid_expense = ['1410 PREPAID – Insurance', '1420 PREPAID – Real Estate Taxes', '1430 PREPAID – Repairs & Maintenance','1440 PREPAID – Rent','1450 PREPAID – Deposits'];
var property_plant = ['1510 PPE – Buildings', '1520 PPE – Machinery & Equipment', '1530 PPE – Vehicles','1540 PPE – Computer Equipment','1550 PPE – Furniture & Fixtures','1560 PPE – Leasehold Improvements'];
var acc_dep = ['1610 ACCUM DEPR Buildings', '1620 ACCUM DEPR Machinery & Equipment', '1630 ACCUM DEPR Vehicles','1640 ACCUM DEPR Computer Equipment','1650 ACCUM DEPR Furniture & Fixtures','1660 ACCUM DEPR Leasehold Improvements'];
var noncurrenctreceivables = ['1710 NCA – Notes Receivable', '1720 NCA – Installment Receivables', '1730 NCA – Retainage Withheld'];
var intercompany_receivables = ['1910 Organization Costs', '1920 Patents & Licenses', '1930 Intangible Assets – Capitalized Software Costs'];
var liabilities = ['2110 A/P Trade', '2120 A/P Accrued Accounts Payable', '2130 A/P Retainage Withheld','2150 Current Maturities of Long-Term Debt','2160 Bank Notes Payable','2170 Construction Loans Payable'];
var accrued_compensation = ['2210 Accrued – Payroll', '2220 Accrued – Commissions', '2230 Accrued – FICA','2240 Accrued – Unemployment Taxes','2250 Accrued – Workmen’s Comp'];
var other_accrued_expenses = ['2310 Accrued – Rent', '2320 Accrued – Interest', '2330 Accrued – Property Taxes', '2340 Accrued – Warranty Expense'];
var accrued_taxes= ['2510 Accrued – Federal Income Taxes', '2520 Accrued – State Income Taxes', '2530 Accrued – Franchise Taxes','2540 Deferred – FIT Current','2550 Deferred – State Income Taxes'];
var deferred_taxes= ['2610 D/T – FIT – NON CURRENT', '2620 D/T – SIT – NON CURRENT'];
var long_term_debt=['2710 LTD – Notes Payable','2720 LTD – Mortgages Payable','2730 LTD – Installment Notes Payable'];
var intercompany_payables=['3100 Common Stock','3200 Preferred Stock','3300 Paid in Capital','3400 Partners Capital','3500 Member Contributions','3900 Retained Earnings'];
var revenue=['4010 REVENUE – PRODUCT 1','4020 REVENUE – PRODUCT 2','4030 REVENUE – PRODUCT 3','4040 REVENUE – PRODUCT 4','4600 Interest Income','4700 Other Income','4800 Finance Charge Income','4900 Sales Returns and Allowances','4950 Sales Discounts'];
var cost_goods= ['5010 COGS – PRODUCT 1', '5020 COGS – PRODUCT 2','5030 COGS – PRODUCT 3','5040 COGS – PRODUCT 4','5700 Freight','5800 Inventory Adjustments','5900 Purchase Returns and Allowances','5950 Reserved'];
var operating_expenses=['6010 Advertising Expense','6050 Amortization Expense','6100 Auto Expense','6150 Bad Debt Expense','6150 Bad Debt Expense','6200 Bank Charges','6250 Cash Over and Short','6300 Commission Expense','6350 Depreciation Expense','6400 Employee Benefit Program','6550 Freight Expense','6600 Gifts Expense','6650 Insurance – General','6700 Interest Expense','6750 Professional Fees','6800 License Expense','6850 Maintenance Expense','6900 Meals and Entertainment','6950 Office Expense','7000 Payroll Taxes','7050 Printing','7150 Postage','7200 Rent','7250 Repairs Expense','7300 Salaries Expense','7350 Supplies Expense','7400 Taxes – FIT Expense','7500 Utilities Expense','7900 Gain/Loss on Sale of Assets'];
switch (ddl1.value) {
case '1000 ASSETS':
ddl2.options.length = 0;
for (i = 0; i < assets.length; i++) {
createOption(ddl2, assets[i], assets[i]);
}
break;
case '1200 RECEIVABLES':
ddl2.options.length = 0;
for (i = 0; i < receivables.length; i++) {
createOption(ddl2, receivables[i], receivables[i]);
}
break;
case '1300 INVENTORIES':
ddl2.options.length = 0;
for (i = 0; i < inventories.length; i++) {
createOption(ddl2, inventories[i], inventories[i]);
}
break;
case '1400 PREPAID EXPENSES & OTHER CURRENT ASSETS':
ddl2.options.length = 0;
for (i = 0; i < prepaid_expense.length; i++) {
createOption(ddl2, prepaid_expense[i], prepaid_expense[i]);
}
break;
case '1500 PROPERTY PLANT & EQUIPMENT':
ddl2.options.length = 0;
for (i = 0; i < property_plant.length; i++) {
createOption(ddl2, property_plant[i], property_plant[i]);
}
break;
case '1600 ACCUMULATED DEPRECIATION & AMORTIZATION':
ddl2.options.length = 0;
for (i = 0; i < acc_dep.length; i++) {
createOption(ddl2, acc_dep[i], acc_dep[i]);
}
break;
case '1700 NON – CURRENT RECEIVABLES':
ddl2.options.length = 0;
for (i = 0; i < noncurrenctreceivables.length; i++) {
createOption(ddl2, noncurrenctreceivables[i], noncurrenctreceivables[i]);
}
break;
case '1800 INTERCOMPANY RECEIVABLES & 1900 OTHER NON-CURRENT ASSETS':
ddl2.options.length = 0;
for (i = 0; i < intercompany_receivables.length; i++) {
createOption(ddl2, intercompany_receivables[i], intercompany_receivables[i]);
}
break;
case '2000 LIABILITIES & 2100 PAYABLES':
ddl2.options.length = 0;
for (i = 0; i < liabilities.length; i++) {
createOption(ddl2, liabilities[i], liabilities[i]);
}
break;
case '2200 ACCRUED COMPENSATION & RELATED ITEMS':
ddl2.options.length = 0;
for (i = 0; i < accrued_compensation.length; i++) {
createOption(ddl2, accrued_compensation[i], accrued_compensation[i]);
}
break;
case '2300 OTHER ACCRUED EXPENSES':
ddl2.options.length = 0;
for (i = 0; i < other_accrued_expenses.length; i++) {
createOption(ddl2, other_accrued_expenses[i], other_accrued_expenses[i]);
}
break;
case '2500 ACCRUED TAXES':
ddl2.options.length = 0;
for (i = 0; i < accrued_taxes.length; i++) {
createOption(ddl2, accrued_taxes[i], accrued_taxes[i]);
}
break;
case '2600 DEFERRED TAXES':
ddl2.options.length = 0;
for (i = 0; i < deferred_taxes.length; i++) {
createOption(ddl2, deferred_taxes[i], deferred_taxes[i]);
}
break;
case '2700 LONG-TERM DEBT':
ddl2.options.length = 0;
for (i = 0; i < long_term_debt.length; i++) {
createOption(ddl2, long_term_debt[i], long_term_debt[i]);
}
break;
case '2800 INTERCOMPANY PAYABLES & 2900 OTHER NON CURRENT LIABILITIES & 3000 OWNERS EQUITIES':
ddl2.options.length = 0;
for (i = 0; i < intercompany_payables.length; i++) {
createOption(ddl2, intercompany_payables[i], intercompany_payables[i]);
}
break;
case '4000 REVENUE':
ddl2.options.length = 0;
for (i = 0; i < revenue.length; i++) {
createOption(ddl2, revenue[i], revenue[i]);
}
break;
case '5000 COST OF GOODS SOLD':
ddl2.options.length = 0;
for (i = 0; i < cost_goods.length; i++) {
createOption(ddl2, cost_goods[i], cost_goods[i]);
}
break;
case '6000 – 7000 OPERATING EXPENSES':
ddl2.options.length = 0;
for (i = 0; i < operating_expenses.length; i++) {
createOption(ddl2, operating_expenses[i], operating_expenses[i]);
}
break;
default:
ddl2.options.length = 0;
break;
}
}
function createOption(ddl, text, value) {
var opt = document.createElement('option');
opt.value = value;
opt.text = text;
ddl.options.add(opt);
}


          let dynamic_id=2;
    function addbundle(){
         $(this).closest('table').find('.addbundle').css("display","none");
      $(this).closest('table').find('.removebundle').css("display","block");

var newdiv = document.createElement('div');
var tabin="crate_wrap_"+dynamic_id;

newdiv = document.createElement("div");


 newdiv.innerHTML ='<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 180px;" >Product Name<i class="text-danger">*</i></th> <th rowspan="2" style="width:60px;" class="text-center">Bundle No<i class="text-danger">*</i></th> <th rowspan="2"  class="text-center">Description</th> <th rowspan="2" style="width:60px;" class="text-center">Thick ness<i class="text-danger">*</i></th> <th rowspan="2" class="text-center">Supplier Block No<i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" >Supplier Slab No<i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center">Gross Measurement<i class="text-danger">*</i> </th> <th rowspan="2" class="text-center">Gross Sq. Ft</th>  <th rowspan="2" style="width:40px;" class="text-center">Slab No<i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center">Net Measure<i class="text-danger">*</i></th> <th rowspan="2" class="text-center">Net Sq. Ft</th> <th rowspan="2"  class="text-center">Cost per Sq. Ft</th> <th rowspan="2"  class="text-center">Cost per Slab</th> <th rowspan="2"  class="text-center">Sales<br/>Price per Sq. Ft</th> <th rowspan="2"  class="text-center">Sales Slab Price</th> <th rowspan="2" class="text-center">Weight</th> <th rowspan="2" class="text-center">Origin</th>  <th rowspan="2" style="width: 100px" class="text-center">Total</th> <th rowspan="2" class="text-center">Action</th> </tr>  <tr> <th class="text-center">Width</th> <th class="text-center">Height</th> <th class="text-center">Width</th> <th class="text-center">Height</th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/> <td> <select name="prodt[]" id="prodt_'+ dynamic_id +'" style="width: 160px;" class="form-control product_name" > <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </select> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td> <input type="text" id="bundle_no__'+ dynamic_id +'" name="bundle_no[]" required="" class="bundle_no form-control" /> </td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td> <td> <input type="text" id="supplier_b_no_'+ dynamic_id +'" name="supplier_block_no[]" required="" class="form-control" /> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]" readonly  style="width:70px;" value="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]" readonly   style="width:70px;" value="0.00"  class="form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="form-control" /> </td>  <td > <input type="text"  id="origin_'+ dynamic_id +'" name="origin[]" class="form-control"/> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross weight :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net weight :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> </td>  <td style="text-align:right;" colspan="6"><b>TOTAL :</b></td> <td > <span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span> </td><td  style="text-align: end;"> <i id="buddle_'+ dynamic_id +'" class="btn-danger removebundle fa fa-minus"  aria-hidden="true" onclick="removebundle(); ">Bundle</i>  </td> </tr><tr style="border-right:none;border-left:none;border-bottom:none;border-top:none"> <td colspan="20" style="text-align: end;">    </td>  </tr></foot></table> <i id="buddle_1" class="addbundle fa fa-plus" style="float:right;color:white;background-color: #38469f;" aria-hidden="true" onclick="addbundle(); ">Bundle</i>    ';  




document.getElementById('content').appendChild(newdiv);
// document.getElementById(tabin).focus();
// document.getElementById("add_invoice_item").setAttribute("tabindex", tab5);
//  document.getElementById("add_purchase").setAttribute("tabindex", tab6);
// document.getElementById("add_purchase_another").setAttribute("tabindex", tab7);

dynamic_id++;



}
 $(document).on('click', '.delete', function(){

 var netheight = $(this).closest('table').find('.net_height').attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);

var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);

 $('.table').each(function() {
    
      var sum=0;
 // var overall_sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
$('#Total_'+idt).val(sum).trigger('change');
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
  var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');

var overall_sum=0;
     $('.table').find('.b_total').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
 $('#Over_all_Total').val(overall_sum).trigger('change');




 });
//$('#total_net').val(overall_net.toFixed(3));


//gt(id);

$(this).closest('tr').remove();

 });


     $('#payment_from_modal').on('input',function(e){

 var payment=parseInt($('#payment_from_modal').val());
var amount_to_pay=parseInt($('#amount_to_pay').val());
console.log(payment+"/"+amount_to_pay);
console.log(parseInt(amount_to_pay)-parseInt(payment));
var value=parseInt(amount_to_pay)-parseInt(payment);
$('#balance_modal').val(value);
if (isNaN(value)) {
  $('#balance_modal').val("0");
   }
 });
      $('#bank_id').change(function(){
        localStorage.setItem("selected_bank_name",$('#bank_id').val());

      });
   

     /*
     $('#number_of_days').change(function(){
      
       var data = {
           sales_invoice_date : $('#date').val(),
           days : $(this).val(),   
           pterms : $('#payment_terms').val()
       
       };
       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
          dataType:"json",
           url:'<?php echo base_url();?>Cinvoice/getdate',
           success: function(result, statut) {
               if(result.csrfName){
                  csrfName = result.csrfName;
                  csrfHash = result.csrfHash;
               }
              $('#date1').val(result);
          }
       });
   });*/
   $('#add_pay_type').submit(function(e){
    e.preventDefault();
      var data = {
        
        
        new_payment_type : $('#new_payment_type').val()
      
      };
      data[csrfName] = csrfHash;
  
      $.ajax({
          type:'POST',
          data: data, 
         dataType:"json",
          url:'<?php echo base_url();?>Cinvoice/add_payment_type',
          success: function(data1, statut) {
            $.each(data1, function (i, item) {
           
           result = '<option value=' + data1[i].payment_type + '>' + data1[i].payment_type + '</option>';
       });
     
       $('#paytype').selectmenu(); 
       $('#paytype').append(result).selectmenu('refresh',true);
      $("#bodyModal1").html("Payment Added Successfully");
      $('#payment_type').modal('hide');
      
      $('#paytype').show();
       $('#myModal1').modal('show');
      window.setTimeout(function(){
        $('#payment_type').modal('hide');
     
       $('#myModal1').modal('hide');
   
    }, 2000);
    
     }
      });
  });
$(document).on('click', '.addbundle', function(){
         $(this).css("display","none");
      $(this).closest('table').find('.removebundle').css("display","block");
 });
  $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
//   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
   //  var netheight = table.attr('id');
// const indexLastDot = table.lastIndexOf('_');
// var id = table.slice(indexLastDot + 1);

     var $last = $('#addPurchaseItem_'+id + ' tr:last');
   // var num = id+"_"+$last.index() + 2;
    var num = id+($last.index()+1);
    
    $('#addPurchaseItem_'+id  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#addPurchaseItem_'+id );
  
 $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
            $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
        })



        });

//         $(".glCreditValue").keydown(function(event) {
//   if (event.which == 9 && $(this).closest("tr").is(":last-child")) {
//       AddNewRow();
//   }
// });

 $(document).on('click', '.removebundle', function(){

 var remove_id=$(this).closest('table').attr('id');
 $('#'+remove_id).remove();
 var netheight = $(this).closest('table').find('.net_height').attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var sales_sqft=cost_sqft *nresult;
var x = $('#slab_no_'+id).val();
var sales_slab_price=cost_sqft *nresult*x;

console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+idt);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
$(this).closest('tr').find('.total_price').val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
 $('.table').each(function() {
    
      var sum=0;
 // var overall_sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
$('#Total_'+idt).val(sum).trigger('change');
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
  var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');

var overall_sum=0;
     $('.table').find('.b_total').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
 $('#Over_all_Total').val(overall_sum).trigger('change');




 });
//$('#total_net').val(overall_net.toFixed(3));


gt(id);



 });
$(document).ready(function(){
   $('.removebundle').hide();
$('#amt').hide();
$('#bal').hide();
    });
$('#paypls').on('click', function (e) {
$('#amount_to_pay').val($('#customer_gtotal').val());
    $('#payment_modal').modal('show');
  e.preventDefault();

});
$('#insert_product').submit(function (event) {
     event.preventDefault();
    var dataString = {
        dataString : $("#insert_product").serialize()
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cproduct/insert_product",
        data:$("#insert_product").serialize(),
        success:function (data1) {
        console.log(data1);
            $.each(data1, function (i, item) {
           result = '<option value=' + data1[i].product_name +'-'+ data1[i].product_model + '>' + data1[i].product_name +'-'+ data1[i].product_model + '</option>';
       });
       $('.product_name').selectmenu();
       $('.product_name').append(result).selectmenu('refresh',true);
     //  $('.product_name').show();
      $("#bodyModal1").html("Product Added Successfully");
       
      $('#myModal1').modal('show');

     $('.product_name').show();
    //   $('#payment_type').modal('hide');
    //    $('#myModal1').modal('show');
      window.setTimeout(function(){
        $('#product_info').modal('hide');
        $('.modal-backdrop').remove();
       $('#myModal1').modal('hide');
    }, 2000);
}
});
});
$('#add_payment_info').submit(function (event) {
   
       
   var dataString = {
       dataString : $("#add_payment_info").serialize()
   
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cinvoice/add_payment_info",
       data:$("#add_payment_info").serialize(),

       success:function (data) {

        var default_currency='<?php  echo $currency;  ?>';

         var bl_c=$('#balance_modal').val();
           var customer_c=$('#payment_from_modal').val();

      
        $('.cur-input-1').val(customer_c);
        $('.cur-item-1').val($('.cus').html());

        $('#input_currency').val($('.cus').html());
        $('#input_amount').val(bl_c);

        // console.log(data);
        $('#amount_paid').val($('#payment_from_modal').val());
    $('#balance').val($('#balance_modal').val());
    $('#amt').show();
$('#bal').show();
    $('#payment_modal').modal('hide');
    $("#bodyModal1").html("Payment Successfully Completed");
       $('#myModal1').modal('show');
    
    window.setTimeout(function(){
        $('#myModal1').modal('hide');
},2500);


      
      }

   });
   event.preventDefault();
});
    $('#add_bank').submit(function (event) {
   
       
   var dataString = {
       dataString : $("#add_bank").serialize()
   
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Csettings/add_new_bank",
       data:$("#add_bank").serialize(),

       success: function (data) {
        $.each(data, function (i, item) {
           
            result = '<option value=' + data[i].bank_name + '>' + data[i].bank_name + '</option>';
        });
      
        $('.bankpayment').selectmenu(); 
        $('.bankpayment').append(result).selectmenu('refresh',true);
       $("#bodyModal1").html("Bank Added Successfully");
       $('#myModal3').modal('hide');
       $('#add_bank_info').modal('hide');
       $('#bank').show();
        $('#myModal1').modal('show');
       window.setTimeout(function(){
      
        $('#myModal5').modal('hide');
        $('#myModal1').modal('hide');
    
     }, 2000);
     
      }

   });
   event.preventDefault();
});




      $(document).ready(function () {
      $('#bank').selectize({
          sortField: 'text'
      });
  });

var isChange;
$("input[type='text'], textarea").keyup(function () {
  
    isChange = true;

});





/*
if(isChange ==true){
    console.log("Change is true");
    $('#payment_modal').modal("show");
 // return false;
}
*/
$(document).ready(function () {

$('#openBtn').click(function () {
    $('#payment_modal').modal({
        show: true
    })
});

    $(document).on('show.bs.modal', '.modal', function (event) {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });


});
</script>
<style>
    .ui-selectmenu-text{
        display:none;
    }
   </style>

<script>



  //$(document).on('input', "input[data-type='currency']",function(){   formatCurrency($(this), "blur");});


$('#tax_dropdown').on('change', function() {
  if ( this.value == '2')
    $("#tax").show();     
  else
    $("#tax").hide();
}).trigger("change");

$('#add_pay_terms').submit(function(e){
    e.preventDefault();
      var data = {
        new_payment_terms : $('#new_payment_terms').val()
      };
      data[csrfName] = csrfHash;
      $.ajax({
          type:'POST',
          data: data,
         dataType:"json",
          url:'<?php echo base_url();?>Cpurchase/add_payment_terms',
          success: function(data1, statut) {
            console.log(data1);
            $.each(data1, function (i, item) {
           result = '<option value=' + data1[i].payment_terms + '>' + data1[i].payment_terms + '</option>';
       });
       $('#terms').selectmenu();
       $('#terms').append(result).selectmenu('refresh',true);
      $("#bodyModal1").html("Payment Terms Added Successfully");
      $('#payment_type').modal('hide');
      $('#terms').show();
       $('#myModal1').modal('show');
      window.setTimeout(function(){
        $('#payment_type_new').modal('hide');
       $('#myModal1').modal('hide');
    }, 2000);
     }
      });
  });
  function calculate(){
 
  var first=$("#Over_all_Total").val();
  var tax= $('#product_tax').val();
var field = tax.split('-');

var percent = field[1];
var answer=0;
var answer = parseInt((percent / 100) * first);
var gtotal = parseInt(first + answer);
console.log(gtotal);
var final_g= $('#final_gtotal').val();


var amt=parseInt(final_g)+parseInt(first);
var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt);
$("#gtotal").val(num);  
localStorage.setItem("customer_grand_amount_sale",num);

var custo_amt=$('.custocurrency_rate').val();

console.log(num +"-"+custo_amt);
var value=parseInt(num*custo_amt);
var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);  
$('#balance').val(custo_final);

}
$(document).on('keyup', '.net_height,.net_width', function(){

 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var sales_sqft=cost_sqft *nresult;
var x = $('#slab_no_'+id).val();
var sales_slab_price=cost_sqft *nresult*x;

console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+idt);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
$(this).closest('tr').find('.total_price').val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
    var sum_net=0;
 
      $(this).closest('table').find('.net_sq_ft').each(function() {
        var v=$(this).val();
       
    sum_net += parseFloat(v);
    
    sum_net = isNaN(sum_net) ? 0 : sum_net;
   
});
// var overall_net=0;
//  $('.table').each(function() {
//     $(this).find('.overall_net').each(function() {
//         var precio = $(this).val();
//         if (!isNaN(precio) && precio.length !== 0) {
//           overall_net += parseFloat(precio);
//         }
//       });

     
//  //   });

//   });
// $('#total_net').val(overall_net.toFixed(3)).trigger('change');

var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');


  var sum=0;
 // var overall_sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});

var overall_sum=0;
 $('.table').each(function() {
    $(this).find('.total_price').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_sum += parseFloat(precio);
        }
      });

     
 //   });

  });

$('#Over_all_Total').val(overall_sum).trigger('change');
$('#Total_'+idt).val(sum);
$('#overall_net_'+idt).val(sum_net.toFixed(3));


});
$(document).on('input', '.gross_height,.gross_width', function(){

 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='gross_width_'+id;
var net_height = 'gross_height_'+ id;
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);

$('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));

    var sum_gross=0;
    var overall_gross=0;
    $(this).closest('table').find('.gross_sq_ft').each(function() {
        var v=$(this).val();
       
    sum_gross += parseFloat(v);
     
      
    sum_gross = isNaN(sum_gross) ? 0 : sum_gross;
    
});
var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');
//     $('.normalinvoice .overall_gross').each(function() {
//         var v=$(this).val();
//        console.log(v);
//     overall_gross += parseFloat(v);

  
// });

$('#overall_gross_'+idt).val(sum_gross.toFixed(3));
//   var sum=0;
// //  var overall_sum=0;
//      $(this).closest('table').find('.total_price').each(function() {
// var v=$(this).val();
//   sum += parseFloat(v);
//   //  overall_sum +=parseFloat(v);
// });
// var overall_sum=0;
//  $('.table').each(function() {
//     $(this).find('.total_price').each(function() {
//         var precio = $(this).val();
//         if (!isNaN(precio) && precio.length !== 0) {
//           overall_sum += parseFloat(precio);
//         }
//       });

     
//  //   });

//   });

// $('#Over_all_Total').val(overall_sum);
// $('#Total_'+idt).val(sum);
//$('#total_gross').val(overall_gross.toFixed(3));
gt(id);

});

$('#Total').on('change textInput input', function (e) {
    calculate();
});

$('.custocurrency_rate').on('change textInput input', function (e) {
    calculate();
});
// function calculate(){
  
//   var first=$("#gtotal").val();
// var custo_amt=$('.custocurrency_rate').val();
// var value=parseInt(first*custo_amt);

// var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
// $('#customer_gtotal').val(custo_final);  
// $('#balance').val(custo_final);
// }
$(document).on('change select','.product_name', function (e) {
var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var sales_sqft=cost_sqft *nresult;
var x = $('#slab_no_'+id).val();
var sales_slab_price=cost_sqft *nresult*x;

console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+idt);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
$(this).closest('tr').find('.total_price').val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
    var sum_net=0;

      $(this).closest('table').find('.net_sq_ft').each(function() {
        var v=$(this).val();
       
    sum_net += parseFloat(v);
    
    sum_net = isNaN(sum_net) ? 0 : sum_net;
   
});
$('#overall_net_'+idt).val(sum_net.toFixed(3));
    var sum_gross=0;
    
    $(this).closest('table').find('.gross_sq_ft').each(function() {
        var v=$(this).val();
       
    sum_gross += parseFloat(v);
     
      
    sum_gross = isNaN(sum_gross) ? 0 : sum_gross;
    
});
$('#overall_gross_'+idt).val(sum_gross.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
  var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');
  var sum=0;
 // var overall_sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});

var overall_sum=0;
 $('.table').each(function() {
    $(this).find('.total_price').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_sum += parseFloat(precio);
        }
      });

     
 //   });

  });

// var overall_net=0;
//  $('.table').each(function() {
//     $(this).find('.overall_net').each(function() {
//         var precio = $(this).val();
//         if (!isNaN(precio) && precio.length !== 0) {
//           overall_net += parseFloat(precio);
//         }
//       });

     
//  //   });

//   });
//   $('#total_net').val(overall_net.toFixed(3)).trigger('change');
$('#Over_all_Total').val(overall_sum).trigger('change');
$('#Total_'+idt).val(sum);
// $('#overall_net_'+idt).val(sum_net.toFixed(3));


gt(id);
   var id= $(this).attr('id');
  var id_num = id.substring(id.indexOf('_') + 1);
   var pdt=$('#'+id).val();
   console.log(pdt);
   const myArray = pdt.split("-");
   var product_nam=myArray[0];
   var product_model=myArray[1];
  var data = {
       product_nam:product_nam,
       product_model:product_model
    };
    data[csrfName] = csrfHash;
    $.ajax({
        type:'POST',
        data: data,
     dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/availability',
        success: function(result, statut) {
            console.log(result);
            if(result.csrfName){
               csrfName = result.csrfName;
               csrfHash = result.csrfHash;
            }
          $("#cost_sq_ft_"+ id_num).val(result[0]['price']);
           $("#cost_sq_slab_"+ id_num).val(result[0]['price']);
          $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
            console.log(result);
        }
    });
});

var total_net=0;
    $('#normalinvoice_1').find('.total_price').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });
$('#total_net').val(total_net.toFixed(3)).trigger('change');

//     $(document).on('keyup','.sales_amt_sq_ft', function (e) {
//         var tid=$(this).closest('table').attr('id');
// const indexLast = tid.lastIndexOf('_');
// var idt = tid.slice(indexLast + 1);
       

// var sales_amt=$(this).val();
// $(this).closest('tr').find('.total_price').val(sales_amt);
// gt(idt);
//   });
 
//     $(document).on('keyup','.sales_slab_amt', function (e) {
//         var tid=$(this).closest('table').attr('id');
// const indexLast = tid.lastIndexOf('_');
// var idt = tid.slice(indexLast + 1);
       

// var sales_amt=$(this).val();
// $(this).closest('tr').find('.total_price').val(sales_amt);
// gt(idt);
//   });
  $(document).on('change','#download_select', function (e) {
var selected_option=$(this).val();
if(selected_option=='Invoice'){
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data/"+$('#invoice_hdn1').val());
}else{
    
  var popout = window.open("<?php  echo base_url(); ?>Cinvoice/packing_list_details_data/"+$('#invoice_hdn1').val());
}

});
  $(document).on('change','#print_select', function (e) {
var selected_option=$(this).val();
if(selected_option=='Invoice'){
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data_print/"+$('#invoice_hdn1').val());
}else{
   var popout = window.open("<?php  echo base_url(); ?>Cinvoice/packing_list_details_data_print/"+$('#invoice_hdn1').val());
}

});
const curItem1 = document.querySelector(".cur-item-1");
const curItem2 = document.querySelector(".cur-item-2");

const curInput1 = document.querySelector(".cur-input-1");
const curInput2 = document.querySelector(".cur-input-2");

const rateBox = document.querySelector(".rate");
const changeBtn = document.querySelector(".fa-retweet");

function calc() {
  const curItem1Value = curItem1.value;
  const curItem2Value = curItem2.value;
  fetch(`https://api.exchangerate-api.com/v4/latest/${curItem1Value}`)
    .then((res) => res.json())
    .then((data) => {
      const rate = data.rates[curItem2Value];

      rateBox.textContent = `1 ${curItem1Value} = ${rate.toFixed(
        4
      )} ${curItem2Value}`;

      curInput2.value = (curInput1.value * rate).toFixed(2);
    });
}

function listeners() {
  curItem1.addEventListener("change", calc);
  curItem2.addEventListener("change", calc); 

  curInput1.addEventListener("input", calc);
  curInput2.addEventListener("input", calc);

  changeBtn.addEventListener("click", () => {
    [curItem1.value, curItem2.value] = [curItem2.value, curItem1.value];
    calc();
    changeBtn.classList.toggle("rotate-btn");
  });
}

window.onmousemove = () => {
  listeners();
  calc();
  compute();
};

// currency

const input_currency = document.querySelector('#input_currency');
const output_currency = document.querySelector('#output_currency');
const input_amount = document.querySelector('#input_amount');
const output_amount = document.querySelector('#output_amount');
const exchange = document.querySelector('#exchange');
const rate = document.querySelector('#rate');
// const rate = document.querySelector('#rate2');

input_currency.addEventListener('change', compute);
output_currency.addEventListener('change', compute);
input_amount.addEventListener('input', compute);
output_amount.addEventListener('input', compute);

exchange.addEventListener('click', ()=>{
    const temp = input_currency.value;
    input_currency.value = output_currency.value;
    output_currency.value= temp;
    compute();
});


function compute(){
    const input_currency1 = input_currency.value;
    const output_currency1 = output_currency.value;

    fetch(`https://api.exchangerate-api.com/v4/latest/${input_currency1}`)
    .then(res => res.json())
    .then(res => {
        const new_rate = res.rates[output_currency1];
        rate.innerText = `1 ${input_currency1} = ${new_rate} ${output_currency1}`
        output_amount.value = (input_amount.value * new_rate).toFixed(2);
    })

}
// new SlimSelect({
//   select: '#product'
// });
 //$(".chosen").chosen();
 


    </script>
