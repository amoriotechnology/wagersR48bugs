    <!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 6px;
    }

    .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
    </style>
 
    
    <div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
  <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/trucking.png"  class="headshotphoto" style="height:50px;" />

              </div>
              
              
              
              
        <div class="header-title">
           
           
             <div class="logo-holder logo-9">
            <h1><?php echo display('Edit Road Transport') ?></h1>

       </div>
   
           
            <small></small>
         <ol class="breadcrumb" style="border: 3px solid #d7d4d6;">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('Sale') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('Edit Road Transport') ?></li>
           
             <div class="load-wrapp">
      <div class="load-10">
         <div class="bar"></div>
      </div>
    </div>
           
           
            </ol>
        </div>
    </section>
    
    
    
    
    
    
    
    
    
    
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
    width: 155px;
  }
}

    
     
    
    
        .td{
    width: 200px;
    text-align-last: end;
    border-right: hidden;
}
        input {
    border: none;

 }
 .ui-selectmenu-menu,.ui-front{
    display:none;
 }
 .text-right {
    text-align: left; 
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
tfoot tr{
    height:45px;
}
</style>
    <section class="content">
        <!-- Alert Message -->
        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
        ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
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
  
        

                    <div class="row">

<div class="col-sm-12">

    <div class="panel panel-bd lobidrag">

        <div class="panel-heading" style="height:60px;">
<div class="panel-title">
<div class="Row">
                     <div class="Column" style="float: left;">
              <h4><?php //echo "Edit New Trucking Invoice" ?></h4>
              
                   </div> 
                    <div class="Column" style="float: right;"> <form id="histroy" method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<input type="hidden"  value="<?php echo $payment_id; ?>" name="payment_id" class="payment_id" id="payment_id"/>

<input type="submit" id="payment_history" name="payment_history" class="btn btnclr" style="float:right; " value="Payment History" style="float:right;margin-bottom:30px;"/>
                                </form> </div> 
                 <div class="Column" style="float: right;">

                    <a   href="<?php echo base_url('Cinvoice/manage_trucking') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo "Manage Trucking" ?> </a>


         </div>    </div>





        
            


            </div>

        </div>

                    <div class="panel-body">

                   <form id="insert_trucking"  method="post">        
                    
                   <div class="row">

<div class="col-sm-6">
            <div class="form-group row">
                <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('invoice_no') ?>
                    <i class="text-danger"></i>
                </label>
                <div class="col-sm-8">
                    
                <input type="text" tabindex="3" class="form-control"  style="border:2px solid #d7d4d6;" name="invoice_no" value="<?php echo $purchase_info[0]['invoice_no']; ?>" readonly />
             </div>
            </div>
        </div>

 

         <div class="col-sm-6">
            <div class="form-group row">
                <label for="date" class="col-sm-4 col-form-label"><?php echo display('Invoice Date') ?>
                    <i class="text-danger">*</i>
                </label>
                <div class="col-sm-8">
                    <?php $date = date('Y-m-d'); ?>
                    <input type="date" required tabindex="2" class="form-control "  style="border:2px solid #d7d4d6;" name="invoice_date" value="<?php echo $purchase_info[0]['invoice_date']; ?>" id="date"  />
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
    <div class="row">
    <input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
        <div class="col-sm-6">
           <div class="form-group row">
                <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Customer Name') ?>
                    <i class="text-danger">*</i>
                </label>
                <div class="col-sm-8">


                        <select name="bill_to" id="bill_to" class="form-control" onchange=""  style="border:2px solid #d7d4d6;"  required>

<option value="<?php echo $purchase_info[0]['customer_id'];  ?>"><?php echo $purchase_info[0]['customer_name'];  ?></option> 

 <?php foreach ($customer_list as $customer) {?>

<option value="<?php echo html_escape($customer->customer_id);?>"><?php echo html_escape($customer->customer_name);?></option>

 <?php }?>

</select>
       
                        <!--    <textarea rows="4" cols="50" name="bill_to" class=" form-control" placeholder='Add Exporter Detail' id=""> </textarea> -->
                </div>
            
            </div> 
        </div>




<div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Shipment company') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="shipment_company" id="shipment_company" class="form-control " required=""  style="border:2px solid #d7d4d6;"  tabindex="1"> 
                                            <!--<option value="<?php echo $shipment_company;  ?>"><?php echo $shipment_company;  ?></option>-->
                                            {get_supplier}
                                            <option value="{company_id}">{supplier_name}</option>
                                            {/get_supplier}
                                        </select>
                                    </div>
                                  <?php if($this->permission1->method('add_supplier','create')->access()){ ?>
                                    <div class="col-sm-2">


                                     <!--    <a class="btn btn-success" title="Add New Supplier" href="<?php echo base_url('Csupplier'); ?>"><i class="fa fa-user"></i></a> -->



                                        


                                    </div>
                                <?php }?>
                                </div> 
                            </div>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                           
                        </div>

    <div class="row">

<div class="col-sm-6">
<div class="form-group row">
<label for="delivery_to" class="col-sm-4 col-form-label"><?php echo display('Delivery to') ?>
<i class="text-danger">*</i>
</label>
<div class="col-sm-8">


<select name="delivery_to" id="delivery_to" class="form-control" onchange="" required style="border:2px solid #d7d4d6;" >
    <option value="<?php echo $delivery_to;  ?>"><?php echo $delivery_to;  ?></option>
     <?php foreach ($customer_list as $customer) {?>
    <option value="<?php echo html_escape($customer->customer_name);?>"><?php echo html_escape($customer->customer_name);?></option>
     <?php }?>
</select>


<!--    <textarea rows="4" cols="50" name="bill_to" class=" form-control" placeholder='Add Exporter Detail' id=""> </textarea> -->
</div>

</div> 
</div>



<div class="col-sm-6">
           <div class="form-group row">
                <label for="container_pick_up_date" class="col-sm-4 col-form-label"><?php echo display('Container / Goods Pick up date') ?>
                    <i class="text-danger">*</i>
                </label>
                   <div class="col-sm-8">
                    <?php $date = date('Y-m-d'); ?>
                    <input type="date" required tabindex="2" class="form-control " name="container_pick_up_date" style="border:2px solid #d7d4d6;"  value="<?php echo $date; ?>" id="date"  />
                </div>
            
            </div> 
</div>
<div class="col-sm-6">
           <div class="form-group row">
                <label for="delivery_date" class="col-sm-4 col-form-label"><?php echo display('Delivery date') ?>
                    <i class="text-danger">*</i>
                </label>
                 <div class="col-sm-8">
                    <?php $date = date('Y-m-d'); ?>
                    <input type="date" required tabindex="2" class="form-control " name="delivery_date" style="border:2px solid #d7d4d6;" value="<?php echo $date; ?>" id="date"  />
                </div>
            
            </div> 
        </div>

    
        <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="delivery_time" class="col-sm-4 col-form-label"><?php echo display('Delivery Time') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <label for="supplier_sss" class="col-sm-1 col-form-label"><?php echo display('From')?>
                                    </label>
                                     <div class="col-sm-3">
                                   
                                        <input type="time" required tabindex="2" class="form-control " style="border:2px solid #d7d4d6;"  name="delivery_time_from" value="{delivery_time_from}" id="time"  />
                                    </div>
                                    <label for="delivery_time" class="col-sm-1 col-form-label"><?php echo display('TO' )?>
                                    </label>
                                    <div class="col-sm-3">
                                    
                                        <input type="time" required tabindex="2" class="form-control " style="border:2px solid #d7d4d6;" name="delivery_time_to" value="{delivery_time_to}" id="time"  />
                                    </div>
                                
                                </div> 
                            </div>
                            
        
       


      

        <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo display('Attachments') ?>
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="files[]" id="attachment" class="form-control" multiple/>

                                       
                                        <?php foreach ($trucking_data as $key => $attachment) { ?> 
                                       <a href="<?php  echo base_url(); ?>uploads/<?php echo $attachment['files']; ?>" class="file-block" target=_blank><span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span><?php echo $attachment['files']; ?></a>
                                       <?php } ?>

                                    </div>
                                </div> 
                            </div>

        <div class="col-sm-6">
           <div class="form-group row">
                <label for="truck_no" class="col-sm-4 col-form-label"><?php echo display('Truck No') ?> <i class="text-danger">*</i>
                </label>
                 <div class="col-sm-8">
                    <input type="text" class="form-control" required tabindex="2" class="form-control "  style="border:2px solid #d7d4d6;" name="truck_no" value="{truck_no}" id="truck_no"/>
                </div>
            
            </div> 
        </div>

       
    </div>
<?php  $d= $purchase_info[0]['tax']; 
preg_match('#\((.*?)\)#', $d, $match);

 ?>
<br>
<div class="table-responsive">
                        <table class="table table-bordered table-hover" style="border:2px solid #d7d4d6;" >
                        <tr>
                       <td class="hiden" style="width:50%;border:none;text-align:end;font-weight:bold;">
                       <?php echo display('live rate') ?> : 
                         </td>
                
                                <td class="hiden btnclr" style="width:180px;padding:5px; border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                 = <input style="width:70px;text-align:center;color:black;padding:5px;" type="text" id="custocurrency_rate"/>&nbsp;<label for="custocurrency"  ></label></td>
                       <td style="border:none;text-align:right;font-weight:bold;"><?php echo display('Tax') ?> : 
                                 </td>
                                <td style="width:20%">
                            <select name="tx" id="product_tax" class="form-control" >
                                <option value="<?php echo $match[1];  ?>" selected><?php echo $match[1];  ?></option>
                              <?php foreach($edit_tax as $tx){?>
  
                                    <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
                                <?php } ?> 
                            </select>
                            </td>
                            </tr>
                        </table>
                        <input type="hidden"  value="<?php echo $payment_id; ?>" name="payment_id" class="payment_id"/>
                             <table class="table table-bordered table-hover" id="truckingTable_1" style="border:2px solid #d7d4d6;" >
                                <thead>
                                     <tr>
                                                    <th class="text-center" width="15%"><?php echo display('Date') ?><i class="text-danger">*</i></th> 
                                            <th class="text-center"><?php echo display('Quantity') ?><i class="text-danger">*</i></th>
                                            <th class="text-center"><?php echo display('Description') ?><i class="text-danger">*</i></th>
                                            <th class="text-center" width="20%"><?php echo display('Rate') ?><i class="text-danger">*</i></th>
                                            <th class="text-center"><?php echo display('Pro No / Reference') ?><i class="text-danger">*</i></th>
                                           

                                            <th class="text-center"><?php echo display('total') ?></th>
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>
                                </thead>
                             <tbody id="addPurchaseItem_1">
                             
                                <?php $cnt=1;
                                 foreach($purchase_info as $pf){ ?>

                                    <tr>
                                        <td class="span3 supplier">
                                                
                                            <?php $date = date('Y-m-d'); ?>
                                               <input type="date" required tabindex="2" class="form-control " name="trucking_date[]" value="<?php echo $pf['trucking_date'] ; ?>"  id="date"/>
                                        </td>

                                       <td class="wt">
                                            <input type="text" name="product_quantity[]" id="cartoon_<?php echo $cnt; ?>" required="" min="0" class="quantity form-control text-right store_cal_<?php echo $cnt; ?>" onkeyup="total_amt(<?php echo $cnt; ?>);"  placeholder="0.00" value="<?php echo $pf['qty'] ; ?>" tabindex="6"/>
                                        </td>
                                        
                                        <td class="text-right">
                                            <input type="text" name="description[]" id="" required="" min="0" class="form-control text-right" value="<?php echo $pf['description'] ; ?>"    tabindex="6"/>
                                        </td>
                                        <td>
                                             <span class="input-symbol-euro"> 
            <input type="text" name="product_rate[]" required="" onkeyup="total_amt(<?php echo $cnt; ?>);"  id="product_rate_<?php echo $cnt; ?>" class="productrate form-control product_rate_<?php echo $cnt; ?>"  style="width:150%;" value=<?php echo $pf['rate'] ; ?>    min="0" tabindex="7"/>
                                 </span>
                                       </td>

                                       <td class="text-right">
                                        <select name="pro_no[]" id="invoice_no" class="form-control " required="" tabindex="1">
                                        <option value="<?php echo $pf['pro_no_reference'];?> "><?php echo $pf['pro_no_reference'];?> </option>
                                           <?php foreach($invoice as $inv){ ?>
                                            <option value="<?php echo $inv['commercial_invoice_number'] ; ?>"><?php echo $inv['commercial_invoice_number'] ; ?></option>
                                        <?php    }?>
                                        </select>
                                        </td>
                                           
                                       
                                  
        <td> <span class="input-symbol-euro">   <input class="form-control total_price" type="text" name="total_price[]" id="total_price_<?php echo $cnt; ?>"  value="<?php echo $pf['total'] ; ?>"   readonly="readonly" /></span></td>
     
                                     <td style="text-align: center;">
                                            <button  class="delete btn btn-danger text-right red" type="button" value="<?php echo display('delete')?>" tabindex="8"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php $cnt++; } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                   
                                        <td style="text-align:right;" colspan="5"><b><?php echo display('total') ?>:</b></td>
                                      
        <td>   <span class="input-symbol-euro">   <input type="text" id="Total" class="form-control text-right" name="total"  value="<?php echo $purchase_info[0]['total_amt']; ?>" readonly="readonly" /></span></td>
                               </tr>
                                    <tr>
                                   
                                   <td style="text-align:right;" colspan="5"><b><?php echo display('Tax Details') ?> :</b></td>
                                   <td style="text-align:left;">
            <span class="input-symbol-euro">   <input type="text" id="tax_details" class="form-control text-right" value="<?php echo $purchase_info[0]['tax']; ?>" name="tax_details"  readonly="readonly" /></span></td>

                        
                               
                                      
                               </tr>
                                    <tr> <td style="text-align:right;" colspan="5"><b><?php echo display('Grand Total') ?>:</b></td>
                                    <td>
           <span class="input-symbol-euro">   <input type="text" id="gtotal"  class="form-control" name="gtotal" onchange="" value="<?php echo $purchase_info[0]['grand_total_amount']; ?>"  readonly="readonly" /></span></td>
                       

                                           
                                    </tr>
                                  
                                    <tr>
                                        
                                    
                                    
                                    <td style="text-align:right;"  colspan="5"><b><?php echo display('Grand Total') ?>:</b><br/><b><?php echo display('Preferred Currency') ?></b></td>
                                    <td>
                                    <table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly id="customer_gtotal"  name="customer_gtotal"  required   /></td>
     </tr>
   </table></td>
                                      

                                            <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr> 
                                    
                                    <tr id="amt">
                                   
                                            <td style="text-align:right;"  colspan="5"><b><?php echo display('Amount Paid') ?>:</b></td>
                                          
                                            <td>
                                            <table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly id="amount_paid"  name="amount_paid" value="<?php echo $purchase_info[0]['amt_paid']; ?>"  required   /></td>
     </tr>
   </table>
                                        
                                            </td>
                                            </tr> 
                                            <tr id="bal">
                                            <td style="text-align:right;"  colspan="5"><b><?php echo display('Balance Amount') ?>:</b></td>
                                            <td>
                                            <table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly id="balance"  value="<?php echo $purchase_info[0]['balance']; ?>" name="balance"  required   /></td>
     </tr>
   </table>
                                         
                                            </td>
                                            </tr> 
                          <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                                               <td colspan="5" >
                                               </div> 
                                 
                                            </td>
                                            <td colspan="6" style="">
                                        <input type="submit" value="<?php echo display('Make Payment') ?>" style="float:left; " class="btnclr btn btn-large" id="paypls"/>
                                            </td>
                                            </tr>


                                         
                                </tfoot>
                                   


                                   
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-group row">
                            <label for="remarks" class="col-sm-2 col-form-label"><?php echo display('Remarks') ?></label>
                            <div class="col-sm-8">
 <textarea rows="4" cols="50" name="remarks" class=" form-control" placeholder="Remarks"  style="border:2px solid #d7d4d6;"  id=""><?php   if(!empty($purchase_info[0]['remarks'])){ echo $purchase_info[0]['remarks'];} ?></textarea>
                                            
                  
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_trucking" class="btnclr btn btn-large"  name="add-trucking" value="<?php echo display('Save') ?>" />
                                <a    id="final_submit" class='btnclr final_submit btn trucking_btn'><?php echo display('Submit') ?></a>

<a id="download"   class='btnclr btn'><?php echo display('Download') ?></a>
    <a id="print"   class='btnclr btn'><?php echo display('Print') ?></a>  

                            </div>
                        </div>
                      
                     
                   
                         
                        </div> 
                            </form>
  
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- Purchase Report End -->






<!-- Purchase Report End -->
   <!-- <div class="modal fade modal-success" id="add_vendor" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title">Add New Shipment Company</h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                           

                             <?php echo form_open_multipart('Csupplier/insert_supplier', array('id' => 'insert_supplier')) ?>


                    <div class="panel-body">



                        <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="supplier_name" class="col-sm-4 col-form-label">Vendor Name<i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="supplier_name" id="supplier_name" type="text" placeholder="Vendor Name"  required="" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label">Vendor Mobile<i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Vendor Mobile"  min="0" tabindex="2">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label"><?php echo display('phone') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="phone" id="phone" type="number" placeholder="<?php echo display('phone') ?>"  min="0" tabindex="2">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label"><?php echo display('email') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="email" id="email" type="email" placeholder="<?php echo display('email') ?>"   tabindex="2">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="emailaddress" class="col-sm-4 col-form-label"><?php echo display('email').' '.display('address'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="<?php echo display('email').' '.display('address') ?>"  >
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="contact" class="col-sm-4 col-form-label"><?php echo display('contact'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="contact" id="contact" type="text" placeholder="<?php echo display('contact') ?>"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="fax" id="fax" type="text" placeholder="<?php echo display('fax') ?>"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label"><?php echo display('city'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="city" id="city" type="text" placeholder="<?php echo display('city') ?>"  >
                            </div>
                        </div>
                        <input type="hidden" name="vendor_type" value="trucker">
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group row">
                            <label for="state" class="col-sm-4 col-form-label"><?php echo display('state'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="state" id="state" type="text" placeholder="<?php echo display('state') ?>"  >
                            </div>
                        </div>
                      
                         
                         <div class="form-group row">
                            <label for="zip" class="col-sm-4 col-form-label"><?php echo display('zip'); ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="zip" id="zip" type="text" placeholder="<?php echo display('zip') ?>"  >
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="country" class="col-sm-4 col-form-label"><?php echo display('country') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="country" id="country" type="text" placeholder="<?php echo display('country') ?>"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address " class="col-sm-4 col-form-label"><?php echo display('supplier_address') ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address " rows="2" placeholder="<?php echo display('supplier_address') ?>" ></textarea>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="address2 " class="col-sm-4 col-form-label"><?php echo display('address') ?>2</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address2" id="address2" rows="2" placeholder="<?php echo display('supplier_address') ?>2" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-4 col-form-label"><?php echo display('supplier_details') ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="details" id="details" rows="2" placeholder="<?php echo display('supplier_details') ?>" tabindex="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('previous_balance') ?></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="<?php echo display('previous_balance') ?>" tabindex="5">
                            </div>
                        </div>
                    </div> 

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                            

                            <input type="submit" id="add-supplier-from-trucking-sale" name="add-supplier-from-trucking-sale"  class="btn btn-success" value="Submit">

                        </div>

                        <?php echo form_close() ?>
                        <input type="hidden" id="hdn"/>
<input type="text" id="gtotal_dup"/>

             -->
                    <!-- </div>/.modal-content -->

                <!-- </div>/.modal-dialog -->

            <!-- </div>/.modal -->
            <div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;text-align:center;">
        <div class="modal-header btnclr" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('Expenses - Trucking') ?></h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
      
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
            <div id="myModal3" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content" style="text-align:center;" >
			 <div class="modal-header btnclr"  >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo display('Confirmation') ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo display('Your Invoice is not submitted. Would you like to submit or discard') ?>
				</p>
				<p class="text-warning">
					<small><?php echo display('If you dont submit your changes will not be saved') ?>.</small>
				</p>
			</div>
			<div class="modal-footer">
				<input type="submit" id="ok" class="btn btnclr"   onclick="submit_redirect()"  value="<?php echo display('Submit') ?>"/>
                <button id="btdelete" type="button" class="btn btnclr "  onclick="discard()"><?php echo display('Discard') ?></button>
			
			</div>
		</div>
	</div>
</div> 
<div class="modal fade" id="payment_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header btnclr" style="text-align:center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('ADD PAYMENT') ?></h4>
        </div>
        <div class="modal-body">
          
   
<form id="add_payment_info"  method="post" >  
            <div class="row">


<div class="form-group row">

        <label for="date" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Payment Date') ?> <i class="text-danger">*</i></label>

        <div class="col-sm-5">

            <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />

        </div>

    </div>
<input type="hidden" id="cutomer_name" name="cutomer_name"/>
<input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
 <div class="form-group row">

        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Reference No') ?><i class="text-danger">*</i></label>

        <div class="col-sm-5">
        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
</div>
 </div> 
    <div class="form-group row">
      <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Select Bank') ?>:<i class="text-danger">*</i></label>
<a data-toggle="modal" href="#add_bank_info"   class="btn btnclr"><i class="fa fa-university"></i></a>
      <div class="col-sm-5">
  <select name="bank" id="bank"  class="form-control bankpayment" >
      
 
<option value="JPMorgan Chase">JPMorgan Chase</option>
<option value="New York City">New York City</option>
<option value="Bank of America">Bank of America</option>
<option value="Citigroup">Citigroup</option>
<option value="Wells Fargo">Wells Fargo</option>
<option value="Goldman Sachs">Goldman Sachs</option>
<option value="Morgan Stanley">Morgan Stanley</option>
<option value="U.S. Bancorp">U.S. Bancorp</option>
<option value="PNC Financial Services">PNC Financial Services</option>
<option value="Truist Financial">Truist Financial</option>
<option value="Charles Schwab Corporation">Charles Schwab Corporation</option>
<option value="TD Bank, N.A.">TD Bank, N.A.</option>
<option value="Capital One">Capital One</option>
<option value="The Bank of New York Mellon">The Bank of New York Mellon</option>
<option value="State Street Corporation">State Street Corporation</option>
<option value="American Express">American Express</option>
<option value="Citizens Financial Group">Citizens Financial Group</option>
<option value="HSBC Bank USA">HSBC Bank USA</option>
<option value="SVB Financial Group">SVB Financial Group</option>
<option value="First Republic Bank">First Republic Bank</option>
<option value="Fifth Third Bank">Fifth Third Bank</option>
<option value="BMO USA">BMO USA</option>
<option value="USAA">USAA</option>
<option value="UBS">UBS</option>
<option value="M&T Bank">M&T Bank</option>
<option value="Ally Financial">Ally Financial</option>
<option value="KeyCorp">KeyCorp</option>
<option value="Huntington Bancshares">Huntington Bancshares</option>
<option value="Barclays">Barclays</option>
<option value="Santander Bank">Santander Bank</option>
<option value="RBC Bank">RBC Bank</option>
<option value="Ameriprise">Ameriprise</option>
<option value="Regions Financial Corporation">Regions Financial Corporation</option>
<option value="Northern Trust">Northern Trust</option>
<option value="BNP Paribas">BNP Paribas</option>
<option value="Discover Financial">Discover Financial</option>
<option value="First Citizens BancShares">First Citizens BancShares</option>
<option value="Synchrony Financial">Synchrony Financial</option>
<option value="Deutsche Bank">Deutsche Bank</option>
<option value="New York Community Bank">New York Community Bank</option>
<option value="Comerica">Comerica</option>
<option value="First Horizon National Corporation">First Horizon National Corporation</option>
<option value="Raymond James Financial">Raymond James Financial</option>
<option value="Webster Bank">Webster Bank</option>
<option value="Western Alliance Bank">Western Alliance Bank</option>
<option value="Popular, Inc.">Popular, Inc.</option>
<option value="CIBC Bank USA">CIBC Bank USA</option>
<option value="East West Bank">East West Bank</option>
<option value="Synovus">Synovus</option>
<option value="Valley National Bank">Valley National Bank</option>
<option value="Credit Suisse">Credit Suisse</option>
<option value="Mizuho Financial Group">Mizuho Financial Group</option>
<option value="Wintrust Financial">Wintrust Financial</option>
<option value="Cullen/Frost Bankers, Inc.">Cullen/Frost Bankers, Inc.</option>
<option value="John Deere Capital Corporation">John Deere Capital Corporation</option>
<option value="MUFG Union Bank">MUFG Union Bank</option>
<option value="BOK Financial Corporation">BOK Financial Corporation</option>
<option value="Old National Bank">Old National Bank</option>
<option value="South State Bank">South State Bank</option>
<option value="FNB Corporation">FNB Corporation</option>
<option value="Pinnacle Financial Partners">Pinnacle Financial Partners</option>
<option value="PacWest Bancorp">PacWest Bancorp</option>
<option value="TIAA">TIAA</option>
<option value="Associated Banc-Corp">Associated Banc-Corp</option>
<option value="UMB Financial Corporation">UMB Financial Corporation</option>
<option value="Prosperity Bancshares">Prosperity Bancshares</option>
<option value="Stifel">Stifel</option>
<option value="BankUnited">BankUnited</option>
<option value="Hancock Whitney">Hancock Whitney</option>
<option value="MidFirst Bank">MidFirst Bank</option>
<option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
<option value="Beal Bank">Beal Bank</option>
<option value="First Interstate BancSystem">First Interstate BancSystem</option>
<option value="Commerce Bancshares">Commerce Bancshares</option>
<option value="Umpqua Holdings Corporation">Umpqua Holdings Corporation</option>
<option value="United Bank (West Virginia)">United Bank (West Virginia)</option>
<option value="Texas Capital Bank">Texas Capital Bank</option>
<option value="First National of Nebraska">First National of Nebraska</option>
<option value="FirstBank Holding Co">FirstBank Holding Co</option>
<option value="Simmons Bank">Simmons Bank</option>
<option value="Fulton Financial Corporation">Fulton Financial Corporation</option>
<option value="Glacier Bancorp">Glacier Bancorp</option>
<option value="Arvest Bank">Arvest Bank</option>
<option value="BCI Financial Group">BCI Financial Group</option>
<option value="Ameris Bancorp">Ameris Bancorp</option>
<option value="First Hawaiian Bank">First Hawaiian Bank</option>
<option value="United Community Bank">United Community Bank</option>
<option value="Bank of Hawaii">Bank of Hawaii</option>
<option value="Home BancShares">Home BancShares</option>
<option value="Eastern Bank">Eastern Bank</option>
<option value="Cathay Bank">Cathay Bank</option>
<option value="Pacific Premier Bancorp">Pacific Premier Bancorp</option>
<option value="Washington Federal">Washington Federal</option>
<option value="Customers Bancorp">Customers Bancorp</option>
<option value="Atlantic Union Bank">Atlantic Union Bank</option>
<option value="Columbia Bank">Columbia Bank</option>
<option value="Heartland Financial USA">Heartland Financial USA</option>
<option value="WSFS Bank">WSFS Bank</option>
<option value="Central Bancompany">Central Bancompany</option>
<option value="Independent Bank">Independent Bank</option>
<option value="Hope Bancorp">Hope Bancorp</option>
<option value="SoFi">SoFi</option>
<?php foreach($bank_list as $b){ ?>
  <option value="<?=$b['bank_name']; ?>"><?=$b['bank_name']; ?></option>
<?php } ?>
</select>
</div>
      </div>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <input class=" form-control" type="hidden"  readonly name="customer_name_modal" id="customer_name_modal" required   />    
      <div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Amount to be paid') ?> : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_to_pay" id="amount_to_pay"   style="width:125%;" class="form-control" required   /></td>

    </tr>
   </table>


</div>
</div> 
      <div class="form-group row" style="display:none;">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Amount Received') ?> : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  style="width:125%;" readonly name="amount_received" id="amount_received" class="form-control" required   /></td>
     </tr>
   </table>



</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;"    class="col-sm-3 col-form-label"><?php echo display('Balance') ?> : </label>

<div class="col-sm-5">

<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"   readonly name="balance_modal"  style="width:125%;"  id="balance_modal" class="form-control" required  /></td>
     </tr>
   </table>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Payment Amount') ?>: <i class="text-danger">*</i></label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"   name="payment" id="payment_from_modal"  style="width:125%;" class="form-control" required   /></td>
     </tr>
   </table>


</div>
</div>

<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Additional Information') ?> : </label>

<div class="col-sm-5">
<input class=" form-control" type="text"  name="details" id="details"/>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Attachments') ?> : </label>

<div class="col-sm-5">
<input class=" form-control" type="file"  name="attachement" id="attachement" />
</div>
</div> 
  </div>   </div>
     <div class="modal-footer">
     <div class="col-sm-8"></div>
    
     <div class="col-sm-4">
                 <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close') ?></a>
     <input class="btnclr btn btnclr" type="submit"    name="submit_pay" id="submit_pay"  value="submit"  required   />
</div>
     </div>
   </div>
   </form>
 </div>
</div>
<div class="modal fade" id="add_bank_info">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align:center;" >
            <div class="modal-header btnclr"   >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title"><?php echo display('ADD BANK') ?></h4>

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
  <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('Country') ?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                                 
                                    </div>

</div>
<div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('Currency') ?></label>
            <div class="col-sm-6">
            <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
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
    <option selected value="USD">USD - US Dollar</option>
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
             <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close') ?></a>
     <input type="submit" id="addBank"     class="btn btnclr" name="addBank" value="<?php echo display('save') ?>"/>
 
  </div>
  </div>  </div>

</form>
  </div>
  </div>
  </div>                
              
  <div class="modal fade" id="payment_history_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 1000px;min-width: max-content;margin-top: 190px;">
        <div class="modal-header btnclr"  >
          <button type="button" id="history_close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('PAYMENT HISTORY') ?></h4>
        </div>
        <div class="modal-body1">
        <div id="salle_list"></div>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
<script>
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
function discard(){
   $.get(
    "<?php echo base_url(); ?>Cinvoice/delete_trucking/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash,payment_id:$('#payment_id').val() }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been Discared";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_trucking";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been Updated Successfully";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_trucking";
      }, 2000);
     }

$('#insert_trucking').submit(function (event) {
   
       
    var dataString = {
        dataString : $("#insert_trucking").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cinvoice/insert_trucking",
        data:$("#insert_trucking").serialize(),

        success:function (data) {
        console.log(data);
        var input_hdn="Trucking invoice Updated Successfully";
        $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
        $('#final_submit').show();
        $('#download').show();
        $('#print').show();
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);

            var split = data.split("/");
            $('#invoice_hdn1').val(split[0]);
         
     
         $('#invoice_hdn').val(split[1]);
       }

    });
    event.preventDefault();
});
$('#download').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/trucking_details_data/"+$('#invoice_hdn1').val());
 


});  
$('#print').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/trucking_details_data_print/"+$('#invoice_hdn1').val());
 


}); 



$('.final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been Updated Successfully";
  
    console.log(input_hdn);
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_trucking";
      }, 2000);
       
});

window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
};
 

$(document).ready(function(){
        $('#final_submit').hide();
$('#download').hide();
$('#print').hide();
});

        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
 $(document).on('keyup','#truckingTable_1 #addPurchaseItem_1 tr:last',function (e) {
   
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
//   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
   //  var netheight = table.attr('id');
// const indexLastDot = table.lastIndexOf('_');
// var id = table.slice(indexLastDot + 1);
  var s=$(this).closest('table').find('.quantity').attr('id');
     var $last = $('#addPurchaseItem_'+id + ' tr:last');
   // var num = id+"_"+$last.index() + 2;
    var num = id+($last.index()+1);
    
    $('#addPurchaseItem_'+id  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#addPurchaseItem_'+id );

    var sum=0;
     $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $(this).closest('table').find('#Total').val(sum).trigger('change');

        });



        });

    $(document).ready(function(){

$('#product_tax').on('change', function (e) {
    var first=$("#Total").val();
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
var custo_amt=$('#custocurrency_rate').val(); 
console.log("numhere :"+num +"-"+custo_amt);
var value=parseInt(num*custo_amt);
var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);  
calculate();
});
});
$( document ).ready(function() {
                    $('.hiden').css("display","none");



$('#custocurrency_rate').on('change textInput input', function (e) {
calculate();
});

$('.common_qnt').on('change textInput input', function (e) {
calculate();
});

});



$( document ).ready(function() {
                    $('.hiden').css("display","none");
                    var data = {
      value: $('#bill_to').val()
   };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data,
   
      //dataType tells jQuery to expect JSON response
      dataType:"json",
      url:'<?php echo base_url();?>Cinvoice/getcustomer_byID',
      success: function(result, statut) {
          if(result.csrfName){
             //assign the new csrfName/Hash
             csrfName = result.csrfName;
             csrfHash = result.csrfHash;
          }
         // var parsedData = JSON.parse(result);
        //  alert(result[0].p_quantity);
        console.log(result[0]['currency_type']);
        $(".cus").html(result[0]['currency_type']);
        $("label[for='custocurrency']").html(result[0]['currency_type']);
       console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
       $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
function(data) {
 var custo_currency=result[0]['currency_type'];
    var x=data['rates'][custo_currency];
 var Rate =parseFloat(x).toFixed(3);
  console.log(Rate);
  $('.hiden').show();
  $("#custocurrency_rate").val(Rate);
  var num=$("#gtotal").val();

    var value=parseInt(num*Rate);
    
var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);  
var v_g_t=$('#customer_gtotal').val();
   var amount_paid =$("#amount_paid").val();
   var bal= parseInt(v_g_t-amount_paid);
   console.log("Bal :");
   $('#balance').val(bal);
      }
)}
    });

});





$('#custocurrency_rate').on('change textInput input', function (e) {
calculate();
});

$('.common_qnt').on('change textInput input', function (e) {
calculate();
});
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
function available_quantity (id) {
$('.product_name').on('change', function (e) {
    var name = 'available_quantity_'+ id;

var amount = 'product_rate_'+ id;
var pdt=$('#prodt_'+id).val();
const myArray = pdt.split("-");
var product_nam=myArray[0];
var product_model=myArray[1];
var data = {
   amount:'product_rate_'+ id,
   name:'available_quantity_'+ id,
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
        if(result.csrfName){
         
           csrfName = result.csrfName;
           csrfHash = result.csrfHash;
        }
      $(".available_quantity_"+ id).val(result[0]['p_quantity']);
      $("#product_rate_"+ id).val(result[0]['price']);
      $(".product_id_"+ id).val(result[0]['product_id']);
        console.log(result);
    }
});
});
}



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

$("#custocurrency_rate").inputFilter(function(value) {
return /^-?\d*[.,]?\d*$/.test(value); }, "Must be a floating (real) Number");
$('#bill_to').on('change', function (e) {
  
  var data = {
      value: $('#bill_to').val()
   };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data,
   
      //dataType tells jQuery to expect JSON response
      dataType:"json",
      url:'<?php echo base_url();?>Cinvoice/getcustomer_byID',
      success: function(result, statut) {
          if(result.csrfName){
             //assign the new csrfName/Hash
             csrfName = result.csrfName;
             csrfHash = result.csrfHash;
          }
         // var parsedData = JSON.parse(result);
        //  alert(result[0].p_quantity);
        console.log(result[0]['currency_type']);
        $(".cus").html(result[0]['currency_type']);
        $("label[for='custocurrency']").html(result[0]['currency_type']);
       console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
       $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
function(data) {
 var custo_currency=result[0]['currency_type'];
    var x=data['rates'][custo_currency];
 var Rate =parseFloat(x).toFixed(3);
 Rate = isNaN(Rate) ? 0 : Rate;
  console.log(Rate);
  $('.hiden').show();
  $("#custocurrency_rate").val(Rate);
});
    
      }
  });


});
 $(document).on('click', '.delete', function(){


var tid=$(this).closest('table').attr('id');
localStorage.setItem("delete_table",tid);
console.log(localStorage.getItem("delete_table"));
$(this).closest('tr').remove();
   var sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('#Total').val(sum).trigger('change');
 
 var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var total=$('#Total').val();
var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
percent=percent.replace("%","");
 var answer = (percent / 100) * parseInt(total);
$('#final_gtotal').val(answer);
   $('#hdn').val(valueSelected);
   console.log("taxi :"+valueSelected);
  $('#tax_details').val(answer +" ( "+tax+" )");
gt();
});
$('#product_tax').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var total=$('#Total').val();
var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
percent=percent.replace("%","");
 var answer = (percent / 100) * parseInt(total);
$('#final_gtotal').val(answer);
   $('#hdn').val(valueSelected);
   console.log("taxi :"+valueSelected);
  $('#tax_details').val(answer +" ( "+tax+" )");
gt();
});
var arr=[];
$(document).on("input change", ".quantity", function(e){


  
  
var total=$(this).closest('tr').find('.total_price').attr('id');

var quantity=$(this).closest('tr').find('.quantity').attr('id');
var amount = $(this).closest('tr').find('.productrate').attr('id');
var grand=$('#gtotal').val();
var quan=$('#'+quantity).val();
var amt=$('#'+amount).val();
var result=parseInt(quan) * parseInt(amt);
result = isNaN(result) ? 0 : result;
arr.push(result);
$('#'+total).val(result);
var first=$("#Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
   console.log(answer);
   $('#tax_details').val(answer +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('#custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 var value=parseInt(num*custo_amt);
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);
gt();

});
$(document).on("input change", ".productrate", function(e){


  
  
var total=$(this).closest('tr').find('.total_price').attr('id');

var quantity=$(this).closest('tr').find('.quantity').attr('id');
var amount = $(this).closest('tr').find('.productrate').attr('id');
var grand=$('#gtotal').val();
var quan=$('#'+quantity).val();
var amt=$('#'+amount).val();
var result=parseInt(quan) * parseInt(amt);
result = isNaN(result) ? 0 : result;
arr.push(result);
$('#'+total).val(result);
var first=$("#Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
   console.log(answer);
   $('#tax_details').val(answer +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('#custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 var value=parseInt(num*custo_amt);
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);
gt();

});
function gt(){
    var sum=0;
    $('.total_price').each(function() {
    sum += parseFloat($(this).val());
});
$('#Total').val(sum);
var final_g= $('#final_gtotal').val();
if(final_g !=''){
var first=$("#Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
   console.log(answer);
   $('#tax_details').val(answer +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('#custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 var value=parseInt(num*custo_amt);
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);
}  
}
function calculate(){
  
  var first=$("#Total").val();
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
var custo_amt=$('#custocurrency_rate').val();

console.log(num +"-"+custo_amt);
var value=parseInt(num*custo_amt);
var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);  
}


    </script>
	
    <script type="text/javascript">
   $('#paypls').on('click', function (e) {
$('#amount_to_pay').val($('#balance').val());
    $('#payment_modal').modal('show');
  e.preventDefault();

}); 
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
 $('.amt').show();

    $('#payment_modal').modal('hide');
    $("#bodyModal1").html("Payment Successfully Completed");
       $('#myModal1').modal('show');
    
    window.setTimeout(function(){
        $('#myModal1').modal('hide');
},2500);

   var dataString = {
       dataString : $("#histroy").serialize()
   
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cinvoice/payment_history",
       data:$("#histroy").serialize(),

       success:function (data) {
        console.log(data);
        var gt=$('#customer_gtotal').val();
        var amtpd=data.amt_paid;
        console.log(data);
        var bal= $('#customer_gtotal').val() - data.amt_paid;
 $('#balance').val(bal);
   $('#amount_paid').val(amtpd);
    
      }
    });
      $('#add_payment_info')[0].reset();
      }

   });
   event.preventDefault();
});
$('#payment_history').click(function (event) {
   
       
   var dataString = {
       dataString : $("#histroy").serialize()
   
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cinvoice/payment_history",
       data:$("#histroy").serialize(),

       success:function (data) {
        console.log(data);
        var gt=$('#customer_gtotal').val();
        var amtpd=data.amt_paid;
        console.log(data);
        var bal= $('#customer_gtotal').val() - data.amt_paid;
var total= "<table class='table table-striped table-bordered'><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Grand Total :  <?php  echo $currency;  ?>"+$('#customer_gtotal').val()+"<b></td><td class='td' style='border-right: hidden;'><b>Total Amount Paid :<b></td><td><?php  echo $currency;  ?>"+data.amt_paid+"</td></tr></tr><td class='td' style='border-right: hidden;'><b>Balance :<b></td><td><?php  echo $currency;  ?>"+bal +"</td></tr></table>"
        var table_header = "<table class='table table-striped table-bordered'><thead style='FONT-WEIGHT:BOLD;'><tr><td>S.NO</td><td>Payment Date</td><td>Reference.NO</td><td>Bank Name</td><td>Amount Paid</td><td>Balance</td><td>Details</td></tr></thead><tbody>";
                   var table_footer = "</tbody></table>";
                var html ="";
var count=1;
               data.payment_get.forEach(function(element) {
              
              html += "<tr><td>"+count +"</td><td>"+element.payment_date+"</td><td>"+element.reference_no+"</td><td>"+element.bank_name+"</td><td><?php  echo $currency;  ?>"+element.amt_paid+"</td><td><?php  echo $currency;  ?>"+element.balance+"</td><td>"+element.details+"</td></tr>";
         count++;
            });



                var all = total+table_header +html+ table_footer;

               

                $('#salle_list').html(all);
                            $('#payment_history_modal').modal('show');
      
       
      
      }

   });
   event.preventDefault();
});
   $(document).ready(function(){

var dataString = {
    dataString : $("#histroy").serialize()

};
dataString[csrfName] = csrfHash;

$.ajax({
    type:"POST",
    dataType:"json",
    url:"<?php echo base_url(); ?>Cinvoice/payment_history",
    data:$("#histroy").serialize(),

    success:function (data) {
     var gt=$('#customer_gtotal').val();
     var amtpd=data.amt_paid;
     console.log(data);
     var bal= gt - amtpd;
$('#amount_paid').val(amtpd);
$('#balance').val(bal);

}

});
event.preventDefault();
});
$( "#balance" ).on('change', function(){
   var bl=$(this).val();
   console.log("bl : "+bl);
   if(bl<=0){
    $('#paypls').hide();
   }
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
           $('#bank').show();
           $('#myModal1').modal('show');
           $('#add_bank_info').modal('hide');
     window.setTimeout(function(){
              $('#myModal5').modal('hide');
        $('#myModal1').modal('hide');
       
$('.modal-backdrop').remove();
 },2000);
        
         }
   
      });
      event.preventDefault();
   });
   
   
   
   
         $(document).ready(function () {
         $('#bank').selectize({
             sortField: 'text'
         });
     });
</script>
<style>
   .select2, .ui-selectmenu-text{
        display:none;
    }
   </style>

<script>

    </script>
    


<style>
   #files-area{
   /*  width: 30%;*/
   margin: 0 auto;
   }
   .file-block{
   border-radius: 10px;
   background-color: #38469f;
   margin: 5px;
   color: #fff;
   display: inline-flex;
   padding: 4px 10px 4px 4px;
   }
   .file-delete{
   display: flex;
   width: 24px;
   color: initial;
   background-color: #38469f;
   font-size: large;
   justify-content: center;
   margin-right: 3px;
   cursor: pointer;
   color: #fff;
   }
   span.name{
   position: relative;
   top: 2px;
   }
   .btn-primary {
   color: #fff;
   background-color: #38469f !important;
   border-color: #38469f !important;
   }
   a:active{
    color: #fff !important;
   }

   a:hover{
    color: #fff !important;
   }

   a:focus{
    color: #fff !important;
   }
 
</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
   const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
   
   $('span.file-delete').click(function(){
           let name = $(this).next('span.name').text();
           // Supprimer l'affichage du nom de fichier
           $(this).parent().remove();
           for(let i = 0; i < dt.items.length; i++){
               // Correspondance du fichier et du nom
               if(name === dt.items[i].getAsFile().name){
                   // Suppression du fichier dans l'objet DataTransfer
                   dt.items.remove(i);
                   continue;
               }
           }
           // Mise à jour des fichiers de l'input file après suppression
           document.getElementById('attachment').files = dt.files;
       });
   
   
</script>    
    


