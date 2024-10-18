<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/trucking.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php ; ?>
 

<style>
   .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>

    
     <div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <!-- <i class="pe-7s-note2"></i> -->
         <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/service.png"  class="headshotphoto" style="height:50px;" />
      </div>
      <div class="header-title">
          <div class="logo-holder logo-9">
         <h1><?php echo ('Edit Service Provider') ?></h1>

       </div>
         <small><?php echo "" ?></small>
         <ol class="breadcrumb" style="border: 3px solid #d7d4d6;">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('purchase') ?></a></li>
            <li class="active" style="color:orange;"> <?php echo ('Edit Service Provider') ?></li>
        
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
      <?php  $d= $tax_detail; 
         $t='';
         if($d !=='' && !empty($d)){
            preg_match('#\((.*?)\)#', $d, $match);
         
            $t=$match[1];$t=trim($t);
            
          }else{
         
            $t=$t=trim($t);
            
          }
         ?> 
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
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" style="border:3px solid #d7d4d6;" >
               <div class="panel-heading" style="height: 60px;">
                  <div class="panel-title">
                     <div class="Row">
                        <?php  $payment_id_new=rand(); ?>
                        <div class="Column" style="float: right;">
     
                           <form id="histroy" method="post" >
                              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                              <input type="hidden"  value="<?php if($info_service[0]['payment_id']){ echo $info_service[0]['payment_id']; }else{ echo $payment_id_new;}?>" name="payment_id" class="payment_id" id="payment_id"/>
                              <input type="hidden" id='current_in_id' name="current_in_id"/>
                              <input type="hidden" value="<?php  echo  $service_provider_name ; ?>" name="supplier_id_payment"/>
                              <input type="submit" id="payment_history" name="payment_history" class="btnclr btn" style="float:right;color:white;float:right;margin-bottom:30px;"   value="<?php echo display('Payment History') ?>"/>
                           </form>
                        </div>
                        <div class="Column" style="float: right;">
                           <a   href="<?php echo base_url('Cpurchase/manage_purchase') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_expense'); ?> </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="panel-body">
                  <form id="serviceprovider" method="post">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="service_provider_name" class="col-sm-4 col-form-label">Service Provider Name <i class="text-danger">*</i> </label>
                              <div class="col-sm-8">
                                 <select name="service_provider_name" id="supplier_id "  class="service_provider_2 form-control "  style="width:100%;border:2px solid #d7d4d6;" required=""  tabindex="1">
                                    <option value="<?php  echo $s_id; ?>"><?php  echo $service_provider_name; ?></option>
                                    {supplier_id}
                                    <option value="{supplier_id}">{supplier_name}</option>
                                    {/supplier_id}
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="sp_address" class="col-sm-4 col-form-label">Service Provider complete address <i class="text-danger"></i> </label>
                              <div class="col-sm-8"> <input type="text" tabindex="3" class="form-control" name="sp_address"  style="border:2px solid #d7d4d6;" value="<?php  echo $sp_address; ?>" id="sp_address"  /> </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group row">
                             
                           <label for="bill_date" class="col-sm-4 col-form-label">Bill Date <i class="text-danger">*</i> </label>
                              <div class="col-sm-8">
                                <input type="date" tabindex="2" class="form-control"  required="" style="border:2px solid #d7d4d6;"  value="<?php echo $bill_dating; ?>" name="bill_date" id="bill_date" />
                              </div>

                           </div>
                         
                        </div>


                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                       
                       
                        <div class="col-sm-6">
                           <div class="form-group row">
                               <label for="bill_number" class="col-sm-4 col-form-label">Bill Number<i class="text-danger">*</i> </label>
                              <div class="col-sm-8"> <input type="text" tabindex="2" required="" class="form-control"  style="border:2px solid #d7d4d6;"  name="bill_num" value="<?php  echo $bill_number; ?>" id="bill_number"  /> </div>
                           </div>
                        </div>
                     </div>



                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group row">
                        


                              <label for="payment_terms" class="col-sm-4 col-form-label">Payment Terms <i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <select   name="pay_terms" id="payment_terms" style="width:100%;border:2px solid #d7d4d6;" required="" class=" form-control"  value="<?php  echo $payment_terms; ?>"  id="payment_terms">
                                    <option value="<?php  echo $payment_terms; ?>"><?php  echo $payment_terms; ?></option>
                                    <option value="CAD">CAD</option>
                                    <option value="COD">COD</option>
                                    <option value="CREDITCARD (5517)-3">CREDITCARD (5517)-3</option>
                                    <option value="ADVANCE"><?php echo display('ADVANCE');?></option>
                                    <option value="7DAYS">7<?php echo display('DAYS');?></option>
                                    <option value="15DAYS">15<?php echo display('DAYS');?></option>
                                    <option value="30DAYS">30<?php echo display('DAYS');?></option>
                                    <option value="45DAYS">45<?php echo display('DAYS');?></option>
                                    <option value="60DAYS">60<?php echo display('DAYS');?></option>
                                    <option value="75DAYS">75<?php echo display('DAYS');?></option>
                                    <option value="90DAYS">90<?php echo display('DAYS');?></option>
                                    <option value="180DAYS">180<?php echo display('DAYS');?></option>
                                    <option value="Dueonreceipt">Dueonreceipt</option>
                                    <?php foreach($payment_terms as $inv){ ?>
                                    <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                                    <?php    }?>
                                 </select>
                              </div>



                           </div>
                        </div>



                        <div class="col-sm-6">
                           <div class="form-group row">
                             
                           <label for="phone_num" class="col-sm-4 col-form-label">Phone Number <i class="text-danger"></i> </label>
                              <div class="col-sm-8"> <input type="number"  tabindex="2" class="form-control "  style="border:2px solid #d7d4d6;"  name="phone_num" value="<?php  echo $phone_num; ?>" id="phone_num"   /> </div>
                           </div>
                        </div>
                     </div>




                     <input type="hidden" name="serviceprovider_id" id="serviceprovider_id"  style="border:2px solid #d7d4d6;"  value="<?php echo $serviceprovider_id; ?>"  >
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="bill_date" class="col-sm-4 col-form-label"><?php echo  display('Account Category') ;?>
                              <i class="text-danger"></i>
                              </label>
                              <div class="col-sm-8">
                                 <select id="ddl"  name="acc_cat_name" class="form-control" style="border:2px solid #d7d4d6;"  onchange="configureDropDownLists(this,document.getElementById('ddl3'))">
                                            <option value="<?php echo $acc_cat_name; ?>" <?php if($acc_cat_name) { echo 'selected'; } ?>>
                                          <?php echo $acc_cat_name; ?>
                                        </option>
                                           <option value="ASSETS"><?php echo  display('ASSETS');?></option>
                                           <option value="RECEIVABLES"><?php echo  display('RECEIVABLES');?></option>
                                           <option value="INVENTORIES"><?php echo  display('INVENTORIES');?></option>
                                           <option value="PREPAID EXPENSES & OTHER CURRENT ASSETS"><?php echo  display('PREPAID EXPENSES & OTHER CURRENT ASSETS');?></option>
                                           <option value="PROPERTY PLANT & EQUIPMENT"><?php echo  display('PROPERTY PLANT & EQUIPMENT');?></option>
                                           <option value="ACCUMULATED DEPRECIATION & AMORTIZATION"><?php echo  display('ACCUMULATED DEPRECIATION & AMORTIZATION');?></option>
                                           <option value="NON – CURRENT RECEIVABLES"><?php echo  display('NON – CURRENT RECEIVABLES');?></option>
                                           <option value="INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS"><?php echo  display('INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS');?></option>
                                           <option value="LIABILITIES & PAYABLES"><?php echo  display('LIABILITIES & PAYABLES');?></option>
                                           <option value="ACCRUED COMPENSATION & RELATED ITEMS"><?php echo  display('ACCRUED COMPENSATION & RELATED ITEMS');?></option>
                                           <option value="OTHER ACCRUED EXPENSES"><?php echo  display('OTHER ACCRUED EXPENSES');?></option>
                                           <option value="ACCRUED TAXES"><?php echo  display('ACCRUED TAXES');?></option>
                                           <option value="DEFERRED TAXES"><?php echo  display('DEFERRED TAXES');?></option>
                                           <option value="LONG-TERM DEBT"><?php echo  display('LONG-TERM DEBT');?></option>
                                           <option value="INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES"><?php echo  display('INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES');?></option>
                                           <option value="REVENUE"><?php echo  display('REVENUE');?></option>
                                           <option value="COST OF GOODS SOLD"><?php echo  display('COST OF GOODS SOLD');?></option>
                                           <option value="OPERATING EXPENSES"><?php echo  display('OPERATING EXPENSES');?></option>
                                       </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="due_date" class="col-sm-4 col-form-label"><?php echo  display('Account Sub Category');?>
                              <i class="text-danger"></i>    
                              </label>
                              <div class="col-sm-8">
                                   <select class="form-control" name="acc_cat"  style="border:2px solid #d7d4d6;" id="ddl3">
                                       <option value="" disabled>Select Sub Category</option>
                                       <option value="<?php echo $acc_cat; ?>" <?php if($acc_cat) { echo 'selected'; } ?>>
                                          <?php echo $acc_cat; ?>
                                        </option>
                                    </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="bill_date" class="col-sm-4 col-form-label"><?php  echo  display('Account Sub category');?>
                              <i class="text-danger"></i>
                              </label>
                              <div class="col-sm-8">
                                 <input type="text" tabindex="2" class="form-control" name="acc_sub_name"  style="border:2px solid #d7d4d6;"  value="<?php  echo $acc_sub_name; ?>"  id="acc_sub_name" />
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php $payment_id_new=rand(); ?>     
                     <input type="hidden" name="payment_id_service" id="payment_id_service" value="<?php if($payment_id_service){ echo $payment_id_service; }else{ echo $payment_id_new;}?>"  >
                     <div class="table-responsive">
                        <table class="table table-bordered table-hover serviceprovider" id="service_1" style="border:2px solid #d7d4d6;" >
                           <thead>
                              <tr>
                                 <th class="text-center" width="15%">Product Name<i class="text-danger">*</i></th>
                                 <th class="text-center" width="20%">Description<i class="text-danger">*</i></th>
                                 <th class="text-center">Quality<i class="text-danger">*</i></th>
                                 <th class="text-center">Amount<i class="text-danger">*</i></th>
                                 <th class="text-center"><?php echo display('action') ?></th>
                              </tr>
                           </thead>
                           <tbody id="servic_pro">
                              <?php $cnt=1;
                                 $n=0;
                                 
                                 foreach($details_info as $di){ 
                                   ?> 
                              <tr>
                                 <td class="span3 supplier">
                                    <select  name="product_name[]"  id="product_name_<?php echo $cnt.$n; ?>"  class="form-control " required=""     tabindex="1">
                                        <option value="<?php echo $di['productname'];  ?>"><?php  echo $di['productname'];  ?></option>    
                                       <?php foreach($product_list as $tx){ ?>
                                       <option value="<?php echo $tx['product_name'].'-'.$tx['product_model']; ; ?>"><?php echo $tx['product_name'].'-'.$tx['product_model']; ; ?></option>
                                       <?php    }?>
                                    </select>
                                 </td>
                                 <td class="text-right"> <input type="text" name="description_service[]" id="description_<?php echo $cnt.$n; ?>"  min="0" class="form-control text-right store_cal_1" placeholder="" value="<?php  echo $di ['description'];  ?>" tabindex="6" /> </td>
                                 <td class="wt"> <input type="text" name="quality[]" id="quality_<?php echo $cnt.$n; ?>" min="0" class="form-control text-right store_cal_1" value="<?php  echo $di['quality'];  ?>" placeholder="" value="" tabindex="6" /> </td>
                                 <td> <span class="input-symbol-euro"><input  style="width: 100%;" class="total_price form-control" type="text" name="total_price[]" id="total_price_<?php echo $cnt.$n; ?>" value="<?php  echo $di['total_price'];  ?>" /> </td>
                                 <td style="text-align:center;"> <button class='delete btn btn-danger' type='button' value='Delete'><i class="fa fa-trash"></i></button> </td>
                              </tr>
                              <?php $cnt++; $n++; } ?>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td style="text-align:right; padding: 15px !important;" colspan="3"><b><?php echo display('total') ?>:</b></td>
                                 <td style="text-align:left;"><span class="input-symbol-euro">   <input type="text"  style="width: 100%; text-align: inherit;"  id="Total" class="form-control text-right" min="0" name="total" value="<?php echo $total; ?>" /> </td>
                              </tr>
                              <table class="taxtab table table-bordered table-hover"         style="border:2px solid #d7d4d6;"           >
                                 <tr>
                                    <td class="hiden" style="width:28%;border:none;text-align:end;font-weight:bold;">
                                       <?php  echo display("Live Rate");?> : 
                                    </td>
                                    <td class="hiden btnclr" style="width:12%;text-align-last: center;padding:5px;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                       = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" id="custocurrency_rate" class="custocurrency_rate"/>&nbsp;<label for="custocurrency"></label>
                                    </td>
                                    <td style="border:none;text-align:right;font-weight:bold;"><?php  echo display('Tax');?> : 
                                    </td>
                                    <td style="width:12%">
                                       <input list="magic_purchase" name="product_tax_taxes"  id="product_tax_taxes" class="form-control" value="<?php if (!empty($tax_detail)) {echo $tax_detail;} else {echo "";} ?>"  onchange="this.blur();" />
                                  
                                       <datalist id="magic_purchase">
                                          <?php    
                                       
                                            foreach($expense_tax as $tx){   ?>
                                             <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
                                          <?php } ?>
                                       </datalist>
                                    </td>
                                 </tr>
                              </table>
                              <input type="hidden" id="paid_convert" name="paid_convert"/>   <input type="hidden" id="bal_convert" name="bal_convert"/>
                         
                              <table border="0"  class="overall table table-bordered table-hover" style="border:2px solid #d7d4d6;table-layout: auto;" >
                                          <tbody>
                                             <tr>
                                                <td style="vertical-align:top;text-align:right;border:none;"></td>
                                                <td style="text-align:right;border:none;"></td>
                                                <td style="text-align:right;border:none;"></td>
                                                <td style="text-align:right;border:none;"> </td>
                                             </tr>
                                             <tr>
                                                <td colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('TAX DETAILS');?> :</b></td>
                                                <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" class="form-control" style="width: 108px;" id="tax_detail" value="<?php if (!empty($tax_detail)) {echo $tax_detail;} else {echo "0.00";} ?>" name="tax_detail" readonly="readonly" /> </span></td>

                                                <td colspan="4" style="text-align:right;border:none;"><b>Grand Total :</b></td>

                                                <td colspan="1" style="border:none;">  <span class="input-symbol-euro"> <input type="text" id="gtotals" class="form-control" style="width: 108px" name="gtotals" value="<?php if (!empty($gtotals)) {echo $gtotals;} else {echo "0.00";} ?>" readonly="readonly" /></span></td>
                                             </tr>
                                             <tr>
                                                <td colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td>

                                                <td colspan="1" style="border:none;"><span><?php  echo $curn_info_default;  ?></span> <input type="text" class="form-control" style="width: 108px;" readonly id="vendor_gtotals" name="vendor_gtotals" value="<?php  echo $vendor_gtotals; ?>" required /></td>

                                                <td colspan="4" style="text-align:right;border:none;"><b><?php echo display('Amount Paid');?> :</b></td>

                                                <td colspan="1" style="border:none;"><span><?php  echo $curn_info_default;  ?></span> <input type="text" class="form-control" readonly id="amount_paids" style="width: 108px;" name="amount_paids" value="<?php  echo $amount_paids; ?>" required /></td>
                                             </tr>
                                             <tr>
                                                <td colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Balance Amount :</b></td>
                                                <td colspan="1" style="border:none;"><span><?php echo $curn_info_default;  ?></span> <input type="text" class="form-control" style="width: 108px" readonly="" id="balances" name="balances" value="<?php  echo $balances; ?>" required="" /></td>
                                             </tr>
                                              <input type="hidden" id="final_gtotal"  name="final_gtotal" />
                                               <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/>
                                             
                                             <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                                                <td colspan="21" style="text-align: end;">
                                                  <input type="submit" value="<?php echo display('Make Payment') ?>"  class="btnclr serpaypls btn btn-large" />
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                           </tfoot>
                        </table>
                     </div>
                     <div class="form-group row">
                        <label for="remarks" class="col-sm-2 col-form-label">Memo / Details</label>
                        <div class="col-sm-8"> <textarea rows="4" cols="50" name="memo_details" style="border:2px solid #d7d4d6;"   class=" form-control" placeholder="Memo/Details" id="" ><?php echo $details_info[0]['memo_details']; ?></textarea> </div>
                     </div>
                     <td>
                        <input type="submit" id="add-supplier-from-expense" name="add-supplier-from-expense"  class="btnclr btn" value="<?php echo display('save') ?>">
                        <a     id="final_submit_provider" class='btnclr final_submit_provider btn  '><?php echo display('submit'); ?></a>
                        <a id="download_provider"          class='btn btnclr'><?php  echo  display('download'); ?></a>
                        <a id="print_provider"          class='btn btnclr'><?php  echo  display('print'); ?></a>                   
                     </td>
                  </form>
               </div>
            </div>
            <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/><input type="hidden" id="servic_id_hidden"/>
         </div>
      </div>
</div>
</div>
</div> 
</section>
<div class="modal fade" id="myModal1">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;text-align:center;">
         <div class="modal-header btnclr"  >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Expenses</h4>
         </div>
         <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
            <h4></h4>
         </div>
         <div class="modal-footer"> </div>
      </div>
   </div>
</div>
<!-- Invoice Report End -->
<div class="modal fade" id="payment_history_modal" role="dialog">
   <div class="modal-dialog" style="margin-right: 1100px;">
      <!-- Modal content-->
      <div class="modal-content" style="width: 1500px;margin-top: 190px;text-align:center;">
         <div class="modal-header btnclr">
            <button type="button" id="history_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo display('PAYMENT HISTORY') ?></h4>
         </div>
         <div class="modal-body1">
            <form method='post' id='bulk_payment_form'>
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
               <div id="salle_list"></div>
            </form>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
<div id="product_model_info" class="modal fade" style="margin-right: 900px;width:2000px;" role="dialog">
   <div class="modal-dialog" style="float:left;">
      <!-- Modal content-->
      <div class="modal-content" style="width: fit-content;margin-top: 100px;margin-left:300px;text-align:center;">
         <div class="modal-header btnclr" >
            <button type="button" id="history_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo display('Product') ?></h4>
         </div>
         <div class="modal-body">
            <div id="salle" style="padding:20px;"></div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
    
             var data = {
                 value: $('.service_provider_2').val()
         
              };
             data[csrfName] = csrfHash;
             $.ajax({
                 type:'POST',
                 data: data,
               dataType:"json",
                 url:'<?php echo base_url();?>Cinvoice/getvendor',
                 success: function(result, statut) {
                     console.log(result);
                     if(result.csrfName){
                       csrfName = result.csrfName;
                        csrfHash = result.csrfHash;
                     }
                  console.log(result[0]['currency_type']);
                 $("#custocurrency_rate").html(result[0]['currency_type']);
                 $("#autocomplete_supplier_id").val(result[0]['supplier_id']);
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
   var data = {
                 value: $('#supplier_name').val()
         
              };
             data[csrfName] = csrfHash;
             $.ajax({
                 type:'POST',
                 data: data,
               dataType:"json",
                 url:'<?php echo base_url();?>Cinvoice/getvendor',
                 success: function(result, statut) {
                     console.log(result);
                     if(result.csrfName){
                       csrfName = result.csrfName;
                        csrfHash = result.csrfHash;
                     }
                  console.log(result[0]['currency_type']);
                 $(".custocurrency_rate").html(result[0]['currency_type']);
                 $("#autocomplete_supplier_id").val(result[0]['supplier_id']);
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
   $('#download_provider').hide();
   $('#final_submit_provider').hide();
   $('#print_provider').hide();
   
   
   
   });
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $('#serviceprovider').submit(function (event) {
   event.preventDefault();
   var dataString = {
   dataString : $("#serviceprovider").serialize()
   
   
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cpurchase/insert_service_provider",
   data:$("#serviceprovider").serialize(),
   
   success:function (data) {
   console.log(data);
   
       var split = data.split("/");
       $('#invoice_hdn1').val(split[0]);
    console.log(split[0]+"---"+split[1]);
   
       $('#invoice_hdn').val(split[1]);
       $("#bodyModal1").html('Updated Service Provider Successfully');
   
   $('.button_hide').show();
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   
   $('.modal-backdrop').remove();
   $("#bodyModal1").html("");
   
//   window.location.href =" <?php echo base_url()  ?>/Cpurchase/manage_purchase" 
   },2500);
   
   
   }
   
   });
   
   
   });
   
   
   
// //   $(document).on('keyup','.serviceprovider tbody tr:last',function (e) {
   
// //   var tid=$(this).closest('table').attr('id');
// //   const indexLast = tid.lastIndexOf('_');
// //   var id = tid.slice(indexLast + 1);
// //   var $last = $('#servic_pro  tr:last');
// //   // var num = id+"_"+$last.index() + 2;
// //   var num = id+($last.index()+1);
   
// //   $('#servic_pro tr:last').clone().find('input').attr('id', function(i, current) {
// //       return current.replace(/\d+$/, num);
      
// //   }).end().appendTo('#servic_pro');
// //   });
   
// //   $(document).on('keyup','.serviceprovider tbody tr:last',function (e) {
   
// //   var sum_total=0;
// //   $('.total_price').each(function() {
// //   var v=$(this).val();
// //   sum_total += parseFloat(v);
// //   });
// //   $('#Total').val(sum_total);
// //   $('#gtotals').val(sum_total);
// //   });
   
//       $(document).on('keyup','.serviceprovider tbody tr:last',function (e) {
//   var tid=$(this).closest('table').attr('id');
//   const indexLast = tid.lastIndexOf('_');
//   var id = tid.slice(indexLast + 1);
//   var $last = $('#servic_pro  tr:last');
//   var num = id+($last.index()+1);
//   $('#servic_pro tr:last').clone().find('input').attr('id', function(i, current) {
//   return current.replace(/\d+$/, num);
//   }).end().appendTo('#servic_pro');
   


//   var sum = 0;
//   $(".total_price").each(function() {
//   if(!isNaN(this.value) && this.value.length!=0) {
//   sum += parseFloat(this.value);
//   }
//   });
//   $("#Total").val(sum.toFixed(2));
//   $("#gtotals").val(sum.toFixed(2));
//   });



//   $(document).on('input','.total_price',function (e) {
//   var sum = 0;
//   //iterate through each textboxes and add the values
//   $(".total_price").each(function() {
//   //add only if the value is number
//   if(!isNaN(this.value) && this.value.length!=0) {
//   sum += parseFloat(this.value);
//   }
//   });
//   //.toFixed() method will roundoff the final sum to 2 decimal places
//   $("#Total").val(sum.toFixed(2));
//   $("#gtotals").val(sum.toFixed(2));
// });


   
   
   
   
   
   $(document).on('keyup','.serviceprovider tbody tr:last',function (e) {
 
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var id = tid.slice(indexLast + 1);
   var $last = $('#servic_pro  tr:last');
   var num = id+($last.index()+1);
   $('#servic_pro tr:last').clone().find('input').attr('id', function(i, current) {
   return current.replace(/\d+$/, num);
   }).end().appendTo('#servic_pro');
   


   var sum = 0;
   $(".total_price").each(function() {
   if(!isNaN(this.value) && this.value.length!=0) {
   sum += parseFloat(this.value);
   }
   });
   $("#Total").val(sum.toFixed(2));

   $("#gtotals").val(sum.toFixed(2));
   $("#vendor_gtotalss").val(sum.toFixed(2));

   });



   $(document).on('input','.total_price',function (e) {
   var sum = 0;
   //iterate through each textboxes and add the values
   $(".total_price").each(function() {
   //add only if the value is number
   if(!isNaN(this.value) && this.value.length!=0) {
   sum += parseFloat(this.value);
   }
   });
   //.toFixed() method will roundoff the final sum to 2 decimal places
   $("#Total").val(sum.toFixed(2));
 



   calculate_ONROWADD();

       });
   

       function calculate_ONROWADD(){


var total=$('#Total').val();
  var tax= $('#product_tax_taxes').val();
  var percent='';
  var hypen='-';

 // alert($('#Total').val());

if(tax.indexOf(hypen) != -1){
 var field = tax.split('-');

 var percent = field[1];

}else if(tax=='Select the Tax'){

  percent="0";
}

else{
percent=tax;
}

 percent=percent.replace("%","");
  var answer = (percent / 100) * parseInt(total);
 
  $('#tax_detail').val(answer.toFixed(3) +" ( "+tax+" )");
   var gtotals = parseInt(total) +parseInt(answer);
  var final_g= $('#final_gtotal').val();
  var amt=parseInt(answer)+parseInt(total);
  var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
    $('#gtotals').val(num); 
  var custo_amt=$('.custocurrency_rate').val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
 $('#vendor_gtotals').val(custo_final);  
  }



   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   $(document).on('click', '.delete', function(){
   
   $(this).closest('tr').remove();
   var overall_sum=0;
   $('.table').find('.total_price').each(function() {
   var v=$(this).val();
   overall_sum += parseFloat(v);
   
   });
   $('#Total').val(overall_sum).trigger('change');
   $('#gtotals').val(overall_sum).trigger('change');
   
   });
   
   
   
   
   $('#serviceprovider').submit(function (event) {
   var dataString = {
   dataString : $("#serviceprovider").serialize()
   };
   dataString[csrfName] = csrfHash;
   // alert('HI')
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cpurchase/insert_service_provider",
   data:$("#serviceprovider").serialize(),
   success:function (data) {
   
   $('#download_provider').show();
   $('#final_submit_provider').show();
   $('#print_provider').show();
   console.log(data);
   
   $('#servic_id_hidden').val(data);
   
   $("#bodyModal1").html('<?php echo ('Updated Service Provider Successfully');?>');
   $('.button_hide').show();
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   $('.modal-backdrop').remove();
   $("#bodyModal1").html("");
   // window.location = "<?php //echo base_url(); ?>Cpurchase/manage_purchase";
   },2500);
   }
   });
   event.preventDefault();
   });
   
   
   
   $('#download_provider').on('click', function (e) {
   
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/servicepro_details_data/"+$('#servic_id_hidden').val());
   
   e.preventDefault();
   
   }); 
   $('#print_provider').on('click', function (e) {
   
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/servicepro_details_data_print/"+$('#servic_id_hidden').val());
   
   e.preventDefault();
   
   });  
   
   
   $('.download').on('click', function (e) {
   
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());
   
   e.preventDefault();
   
   });  
   
   // function discard(){
   
   //   $.get(
   //   "<?php //echo base_url(); ?>Cpurchase/deletepurchase/", 
   //   { val: $("#invoice_hdn1").val(), csrfName:csrfHash,payment_id:$('#payment_id').val() }, // put your parameters here
   //   function(responseText){
   //   console.log(responseText);
   //   window.btn_clicked = true;      //set btn_clicked to true
   //   var input_hdn="<?php //echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php //echo  " ".display('has been Discarded');?>";
   
   //   console.log(input_hdn);
   //   $('#myModal3').modal('hide');
   //   $("#bodyModal1").html(input_hdn);
   //       $('#myModal1').modal('show');
   //   window.setTimeout(function(){
   
   
   //       window.location = "<?php  //echo base_url(); ?>Cpurchase/manage_purchase";
   //      }, 2000);
   //   }
   // ); 
   // }
   //     function submit_redirect(){
   //       window.btn_clicked = true;      //set btn_clicked to true
   //       var input_hdn="<?php //echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php //echo  " ".display('has been saved Successfully');?>";
   
   //   console.log(input_hdn);
   //   $('#myModal3').modal('hide');
   //   $("#bodyModal1").html(input_hdn);
   //       $('#myModal1').modal('show');
   //   window.setTimeout(function(){
   
   
   //       window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
   //      }, 2000);
   //     }
   $('#final_submit1').on('click', function (e) {
   
   // window.btn_clicked = true;      //set btn_clicked to true
   var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been saved Successfully');?>";
   
   console.log(input_hdn);
   
   $("#bodyModal1").html(input_hdn);
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   
   $('.modal-backdrop').remove();
   },2500);
   window.setTimeout(function(){
   
   
   window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
   }, 2500);
   
   });
   
   
   
   
   
   
   
   $('#final_submit_provider').on('click', function (e) {
   
   //window.btn_clicked = true;      //set btn_clicked to true
   var input_hdn="<?php echo  ('Service Provider ID')." :";?>"+$('#servic_id_hidden').val()+"<?php echo  " ".display('has been saved Successfully');?>";
   
   console.log(input_hdn);
   
   $("#bodyModal1").html(input_hdn);
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   
   $('.modal-backdrop').remove();
   },2500);
   window.setTimeout(function(){
   
   
   window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
   }, 2500);
   
   });
   // window.onbeforeunload = function(){
   // if(!window.btn_clicked ){
   
   //   return false;
   // }
   // }
   
   
   
   
</script>
<style>
   .table  tbody td{
   text-align:initial;
   }
   .newtable-second,.table th ,.table tbody {
   text-align:center;
   }
   #toggle_table{
   text-align:center;
   }
   input {
    border: none;
   }
   textarea:focus, input:focus{
   outline: none;
   }
   #table1,#table2,.newtable {
   text-align:center;
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
   .select2-selection{
   display:none;
   }
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
    width: 120px;
  }
}

   
   
   
   
   
   
   
</style>
<div class="modal fade" id="service_payment_modal" >
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
         <div class="modal-header btnclr"  style="text-align: center;" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo  display('add_payment'); ?></h4>
         </div>
         <div class="modal-body">
            <form id="add_payment_infos"  method="post" >
               <div class="row">
                  <div class="form-group row">
                     <label for="date" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('payment_date'); ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <?php
                           $date = date('Y-m-d');
                           ?>
                        <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                     </div>
                  </div>
                  <input type="hidden" id="cutomer_name" name="cutomer_name"/>
                  <input type="hidden" name="payment_id_service" id="payment_id_service" value="<?php if($payment_id_service){ echo $payment_id_service; }else{ echo $payment_id_new;}?>"  >
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Reference No'); ?><i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Select Bank'); ?>:<i class="text-danger">*</i></label>
                     <a data-toggle="modal" href="#add_bank_info" class="btnclr btn "><i class="fa fa-university"></i></a>
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
                           <option value="First Republic Bank ">First Republic Bank </option>
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
                           <option value="Credit Suisse ">Credit Suisse </option>
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
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount to be paid'); ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"> <?php echo $curn_info_default; ?>   </td>
                              <td><input  type="text"  readonly name="amount_to_pays" id="amount_to_pays"   style="width:103%;" class="form-control" required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount Received'); ?>:</label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"> <?php echo $curn_info_default; ?></td>
                              <td><input  type="text"  readonly name="amount_received" style="width:103%;"  id="amount_received" class="form-control"required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;"    class="col-sm-3 col-form-label"><?php  echo display('balance_ammount'); ?>: </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"> <?php echo $curn_info_default; ?></td>
                              <td><input  type="text"   readonly name="balance_modals"  style="width:103%;" id="balance_modals" class="form-control" required  /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('payment_amount');  ?>:<i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus">  <?php echo $curn_info_default; ?>  </td>
                              <td><input  type="text"   name="payment_from_modals" id="payment_from_modals"  style="width:103%;" class="form-control"required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Additional Information');  ?> : </label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="text"  name="details" id="details"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Attachments');  ?> : </label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="file"  name="attachement" id="attachement" />
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <div class="col-sm-8"></div>
         <div class="col-sm-4">
         <a href="#" class="btn btnclr" data-dismiss="modal"   ><?php  echo display('Close');  ?></a>
         <input class="btn btnclr" type="submit"    name="submit_pay" id="submit_pay"   value="<?php  echo display('submit');  ?>"  required   />
         </div>
         </div>
      </div>
      </form>
   </div>
</div>
<div class="modal fade" id="add_bank_info">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align: center;" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo display('add_new_bank');  ?></h4>
         </div>
         <div class="container"></div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
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
                     <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('country');  ?>
                     <i class="text-danger"></i>
                     </label>
                     <div class="col-sm-6">
                        <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('currency'); ?></label>
                     <div class="col-sm-6">
                        <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
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
                           <option value="USD" selected="selected">USD - US Dollar</option>
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
         <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close'); ?></a>
         <input type="submit" id="addBank"     class="btn btnclr" name="addBank" value="<?php echo display('save') ?>"/>
         </div>
         </div>  </div>
         </form>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
       // $('.payment_id').val($('#po_payment_id').val());
        $('#product_tax_taxes').on('change', function (e) {
   
          debugger;
   
   
     var total=$('#Total').val();
     var tax= $('#product_tax_taxes').val();
     var percent='';
     var hypen='-';
   
    // alert($('#Total').val());
   
   if(tax.indexOf(hypen) != -1){
    var field = tax.split('-');
   
    var percent = field[1];
   
   }else if(tax=='Select the Tax'){
   
     percent="0";
   }
   
   else{
   percent=tax;
   }
   
    percent=percent.replace("%","");
     var answer = (percent / 100) * parseInt(total);
    
     $('#tax_detail').val(answer.toFixed(3) +" ( "+tax+" )");
      var gtotals = parseInt(total) +parseInt(answer);
     var final_g= $('#final_gtotal').val();
     var amt=parseInt(answer)+parseInt(total);
     var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
       $('#gtotals').val(num); 
     var custo_amt=$('.custocurrency_rate').val(); 
     console.log("numhere :"+num +"-"+custo_amt);
     var value=num*custo_amt;
     var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
    $('#vendor_gtotalss').val(custo_final);  
    calculate();
    });
      });
   
   
    $(document).on('click','.serpaypls',function (e) {
   
      e.preventDefault();
        //  var amt = $('#vendor_gtotalss').val()-$('#amount_paids').val();
                    var amt = $('#gtotals').val();

          $('#amount_to_pays').val(amt);
          $('#service_payment_modal').modal('show');
     e.preventDefault();
   
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    
   function payment_info(){
      
      var data = {
           gtotal:$('#vendor_gtotalss').val(),   
        };
        data[csrfName] = csrfHash;
    
        $.ajax({
            type:'POST',
            data: data, 
         dataType:"json",
            url:'<?php echo base_url();?>Cinvoice/get_payment_info',
            success: function(result, statut) {
               
               
               var amt= parseInt(result[0]['amt_paid'])
   
   
              $("#amount_paids").val(result[0]['amt_paid']);
              $("#balances").val(result[0]['balance']);
                console.log(result);
            }
        });
    }
    
   
   
   
    
    $('#payment_from_modals').on('input',function(e){
    var payment=parseInt($('#payment_from_modals').val());
    var amount_to_pay=parseInt($('#amount_to_pays').val());
    console.log(payment+"/"+amount_to_pay);
    console.log(parseInt(amount_to_pay)-parseInt(payment));
    var value=parseInt(amount_to_pay)-parseInt(payment);
    $('#balance_modals').val(value);
    if (isNaN(value)) {
     $('#balance_modals').val("0");
      }
    });
   
   
   
   
         $('#bank_id').change(function(){
           localStorage.setItem("selected_bank_name",$('#bank_id').val());
    
         });
         $(document).ready(function(){
    
       $('.amt').hide();
    
           });
    
   
   
   
   
   
   
   
           $('#add_payment_infos').submit(function (event) {    
      var dataString = {
          dataString : $("#add_payment_infos").serialize()
     };
     dataString[csrfName] = csrfHash;
    
      $.ajax({
          type:"POST",
          dataType:"json",
          url:"<?php echo base_url(); ?>Cinvoice/add_payment_infos",
          data:$("#add_payment_infos").serialize(),
   
          success:function (data) {
    $('.amt').show();
   
       $('#service_payment_modal').modal('hide');
       $("#bodyModal1").html("<?php echo display('Payment Successfully Completed');?>");
          $('#myModal1').modal('show');
          var b=$('#balance_modals').val();
          var a=$('#payment_from_modals').val();
       $('#balances').val(b);
       $('#amount_paids').val(a);
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
           var gt=$('#vendor_gtotalss').val();
           var amtpd=data.amt_paid;
           console.log(data);
           var bal= $('#vendor_gtotalss').val() - data.amt_paid;
    $('#balance').val(bal);
      $('#amount_paid').val(amtpd);
         var t_rate=$('.custocurrency_rate').val();
      document.getElementById("paid_convert").value=
    	(amtpd /t_rate ).toFixed(2);
       document.getElementById("bal_convert").value=
    	(bal /t_rate ).toFixed(2);
   
         }
       });
         $('#add_payment_info')[0].reset();
         }
   
      });
      event.preventDefault();
   });
                  
   
   
   
   
   
   
   
   
   function paypls(){
       
   $('#amount_to_pay').val($('#vendor_gtotalss').val()-$('#amount_paid').val());
       $('#payment_modal').modal('show');
   
   }
   
   
   
   
   
   
   
   
   
   
   
   $('#supplier_name').on('change', function (e) {
                       //  localStorage.setItem("sale_supplier_id",$('#supplier_id').val());
                       //  alert($('#supplier_name').val());
                         var data = {
                             value: $('#supplier_name').val()
                     
                          };
                         data[csrfName] = csrfHash;
                         $.ajax({
                             type:'POST',
                             data: data,
                           dataType:"json",
                             url:'<?php echo base_url();?>Cinvoice/getvendor',
                             success: function(result, statut) {
                                 console.log(result);
                                 if(result.csrfName){
                                   csrfName = result.csrfName;
                                    csrfHash = result.csrfHash;
                                 }
                              console.log(result[0]['currency_type']);
                             $(".custocurrency_rate").html(result[0]['currency_type']);
                             $("#autocomplete_supplier_id").val(result[0]['supplier_id']);
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
   
   
                     $('.service_provider_2').on('change', function (e) {
                       //  localStorage.setItem("sale_supplier_id",$('#supplier_id').val());
                       //  alert($(this).val());
                              value: $('#supplier_id').val()
   
                         var data = {
                             value: $('.service_provider_2').val()
                     
                          };
                         data[csrfName] = csrfHash;
                         $.ajax({
                             type:'POST',
                             data: data,
                           dataType:"json",
                             url:'<?php echo base_url();?>Cinvoice/getvendor',
                             success: function(result, statut) {
                                 console.log(result);
                                 if(result.csrfName){
                                   csrfName = result.csrfName;
                                    csrfHash = result.csrfHash;
                                 }
                              console.log(result[0]['currency_type']);
                             $("#custocurrency_rate").html(result[0]['currency_type']);
                             $("#autocomplete_supplier_id").val(result[0]['supplier_id']);
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
                
   
   
   
   function generateRandom10DigitNumber() {
       // Generate a random 10-digit number
       const min = Math.pow(10, 9); // 10^9
       const max = Math.pow(10, 10) - 1; // 10^10 - 1
       const randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
       return randomNumber;
   }
   







   
      var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
                     var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $(document).on('click', '#pay_now', function (event) {
       event.preventDefault();
    var dataString = {
                             dataString : $('#bulk_payment_form').serialize()
                        };
                        dataString[csrfName] = csrfHash;
       $.ajax({
           type: 'POST',
           data: $('#bulk_payment_form').serialize(),
           dataType: 'json',
            url: '<?php echo base_url();?>Cpurchase/bulk_payment_ser_pro',
           success: function (result) {
    $('#payment_history_modal').modal('hide');
                 $("#bodyModal1").html("Payment Completed Successfully");
      $('#myModal1').modal('show');
      window.setTimeout(function(){
          $('.modal').modal('hide');
         
   $('.modal-backdrop').remove();
   },2000);
           },
           error: function (xhr, status, error) {
            $('#payment_history_modal').modal('hide');
                 $("#bodyModal1").html("Payment Completed Successfully");
      $('#myModal1').modal('show');
      window.setTimeout(function(){
          $('.modal').modal('hide');
         
   $('.modal-backdrop').remove();
   },2000);
           }
       });
   });







   $(document).on('click', '#edit_payment', function (event) {
   var csrf_token = {
       <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
   };
       var tableData = [];
       $('#toggle_table tbody tr').each(function () {
           var rowData = {
            
               date: $(this).find('td:eq(0)').text(),
               referenceNo: $(this).find('td:eq(1)').text(),
               bankName: $(this).find('td:eq(2)').text(),
               amountPaid: $(this).find('td:eq(3)').text(),
                balanceamount: $(this).find('td:eq(4)').text(),
                 detail: $(this).find('td:eq(5)').text(),
                payment : $('#payment_id').val(),
                gtotal : $('#vendor_gtotals').val(),
               t_amt_paid : $('#tl_amt_pd').val(),
               t_bal_amt : $('#my_bal_1').val(),
               bill_bo : $('#bill_number').val()
           };
           tableData.push(rowData);
       });
   
       var postData = {
                             tableData: tableData
                        };
                        postData[csrfName] = csrfHash;
    
   
       // Perform an AJAX request to send the data to the controller
       $.ajax({
           type: "POST",
           dataType: "json",
           url: "<?php echo base_url(); ?>Cinvoice/payment_edit_serv_pro",
           data: postData,
           success: function (response) {
                $('#payment_history_modal').modal('hide');
                 $("#bodyModal1").html("Updated Successfully");
      $('#myModal1').modal('show');
      window.setTimeout(function(){
          $('.modal').modal('hide');
         
   $('.modal-backdrop').remove();
   },2000);
           },
           error: function (error) {
             $('#payment_history_modal').modal('hide');
               $("#bodyModal1").html("Updated Successfully");
      $('#myModal1').modal('show');
      window.setTimeout(function(){
          $('.modal').modal('hide');
         
   $('.modal-backdrop').remove();
   },2000);
           }
       });
   
       // Prevent the default form submission
       event.preventDefault();
   });
      $('#payment_history').click(function (event) {
           $('#current_in_id').val($('#bill_number').val());
       var dataString = {
           dataString: $("#histroy").serialize()
       };
       dataString[csrfName] = csrfHash;
   
       $.ajax({
           type: "POST",
           dataType: "json",
         url:"<?php echo base_url(); ?>Cpurchase/payment_history_purchase_serv_provider",
           data: $("#histroy").serialize(),
   
           success: function (data) { 
   
   var basedOnCustomer = data.based_on_customer;
   var overallGTotal = parseFloat(data.overall[0].overall_gtotal);
   var overall_due = parseFloat(data.overall[0].overall_due);
   var overall_paid = parseFloat(data.overall[0].overall_paid);
    console.log("OVER : "+overallGTotal);
    var gt = $('#vendor_gtotals').val();
               var amtpd = data.amt_paid;
   
               var bal = $('#vendor_gtotals').val() - data.amt_paid;
                var total = "<table id='table2' class='newtable table table-striped table-bordered'><tbody><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Grand Total :  <?php  echo $currency;  ?>"+$('#vendor_gtotals').val()+"<b></td><td class='td' style='text-align:end;border-right: hidden;'><b>Total Amount Paid :<b></td><td style='text-align:start;'><?php  echo $currency;  ?><span class='amt_paid_update'><input type='text' id='tl_amt_pd' value='"+data.amt_paid+"' name='tl_amt_pd'/></span></td><td><input type='hidden' value='"+$('#vendor_gtotals').val()+"' name='t_unique'/><span style='font-weight:bold;'>INVOICE NO</span> :<input type='hidden' value='"+$('#bill_number').val()+"' id='unq_inv' name='unq_inv'/>"+$('#bill_number').val()+"</td>                  <td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Advance :   <input type='text' name='advanceamount' id='advanceamount' readonly ></td>                                                       </tr><tr><td class='td' style='text-align:end;' ><b>Balance :<input type='text' id='my_bal_1' value='"+bal+"' name='my_bal_1'/><b></td><td class='due_pay' style='display:none;' id='balance-cell' data-currency='<?php  echo $currency;  ?>'>"+bal +"</td><td  data-currency='<?php echo $currency; ?>'><span style='font-weight:bold;'>Amount to Pay : </span><input type='text' id='amount_pay_unique' class='amount_pay' style='text-align:center;' name='amount_pay_1'/></td><td style='display:none'><input type='text'  value='<?php if($payment_id_service){ echo $payment_id_service; }else{ echo $payment_id_new;}?>' name='payment_id_this_invoice' class='payment_id_val' id='payment_id'/></td><td style='display:none' class='' data-currency='<?php echo $currency; ?>'><input type='text' name='updated_bal_uniq' class='balance-col'/></td><td> <input type='text' id='total-amount' placeholder='Enter Amount To Distribute'></td></tr></tbody></table>"
              
                var table_header1 = "<div> </div>  <thead><tr><td ><input type='hidden'  value='<?php  echo $s_id;  ?>' name='supplier_id' /></tr></thead><tbody>";

                var table_header = "<div class='toggle-button' onclick='toggleTable()'>Payment History &#9660;</div><table id='toggle_table' class='table table-striped table-bordered'><thead style='FONT-WEIGHT:BOLD;'><tr><td style='display:none;'><input type='text'  value='<?php if($payment_id_service){ echo $payment_id_service; }else{ echo $payment_id_new;}?>' name='payment_id_this_invoice' class='payment_id_val' id='payment_id'/></td><td>Payment Date</td><td>Reference.NO</td><td>Bank Name</td><td>Amount Paid</td><td>Balance</td><td>Details</td><td>Delete</td></tr></thead><tbody>";
             
               // var total = "<table id='table2' class='table table-striped table-bordered'><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Grand Total :  <?php  echo $currency;  ?>"+$('#vendor_gtotals').val()+"<b></td><td class='td' style='border-right: hidden;'><b>Total Amount Paid :<b></td><td><?php  echo $currency;  ?><span class='amt_paid_update'>"+data.amt_paid+"</span></td><td><span style='font-weight:bold;'>INVOICE NO</span> :"+$('#invoice').val()+"</td></tr></tr><td class='td' style='border-right: hidden;'><b>Balance :<b></td><td id='balance-cell' data-currency='<?php  echo $currency;  ?>'>"+bal +"</td><td><input type='button' value='Make Payment' style='color:white;background-color: #38469f;' class='paypls btn btn-large'></td></tr></table>"
               // var table_header = "<table class='table table-striped table-bordered'><thead style='FONT-WEIGHT:BOLD;'><tr><td>S.NO</td><td>Payment Date</td><td>Reference.NO</td><td>Bank Name</td><td>Amount Paid</td><td>Balance</td><td>Details</td><td>Action</td></tr></thead><tbody>";
                var table_footer = "</tbody><tfoot><tr><td style='text-align: center;vertical-align: middle;' colspan='7' ><input type='button' class='btnclr btn' style='text-align:center;color:white;font-weight:bold';  value='Update' id='edit_payment'/></td></tr></tfoot></table>";
               var html = "";
               var count = 1;
   
               data.payment_get.forEach(function (element) {
                   html += "<tr><td contenteditable='true'>" + element.payment_date + "</td><td contenteditable='true'>" + element.reference_no + "</td><td contenteditable='true'>" + element.bank_name + "</td><td  class='editable-amount-paid' contenteditable='true' data-currency='<?php echo $currency; ?>'>" + element.amt_paid + "<input type='hidden' class='editable-input-4' name='editable-input-4' /></td><td class='balance-cell' contenteditable='false'>" + element.balance + "<input type='text' class='edit_balance' name='edit_balance' /></td><td contenteditable='true'>" + element.details + "</td><td style='display:none;'><input type='hidden'  class='payment_id_val' id='payment_id'/></td><td><a class=' btnclr btn del_pay'> Delete</a>    </td></tr>";
                   count++;
               });
   
               var all = total +table_header1 + table_header + html + table_footer;
   
                var total1 = "<input type='hidden' name='<?php echo $this->security->get_csrf_token_name();?>' value='<?php echo $this->security->get_csrf_hash();?>'><table id='table1'  class='table table-striped table-bordered'><tr><td colspan='3' style='border-top: hidden!important;background-color: white;text-align:center;font-weight:bold;font-size:18px;'>LIST OF DUE INVOICES</td></tr><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Grand Total :  <?php  echo $currency;  ?>"+overallGTotal.toFixed(2)+"<b></td><td class='td' style='text-align:center;border-right: hidden;'><b>Total Amount Paid :<b></td><td style='text-align:start;'><?php  echo $currency;  ?>"+overall_paid.toFixed(2)+"</td></tr></tr><td class='td' style='border-right: hidden;'><b>Balance :<b></td><td  style='text-align:start;'  class='bcm' id='balance-cell' data-currency='<?php  echo $currency;  ?>'>"+parseFloat(overall_due.toFixed(2)) +"</td></tr></table>"
           var table_header1='';
            var table_footer1='';
               if (basedOnCustomer && basedOnCustomer.length > 0) {
       table_header1 = "<table class='newtable-second table table-striped table-bordered'><thead style='FONT-WEIGHT:BOLD;'><tr><td><div id='distribute-container'> </div></td><td style='width:60px;'>Invoice No</td><td style='width:100px;'>Total Amount</td><td style='width:200px;'>Amount Paid</td><td style='width:200px;'>Balance</td><td style='width:200px;'>Amount to Pay</td><td class='balance-column' style='width:200px;'>Updated Balance</td></tr></thead><tbody>";
      
      
      
      
       table_footer1 = "</tbody><tfoot><tr><td colspan='5'></td><td class='t_amt_pay'></td><td  style='display:none;' class='balance-col t_bal_pay'></td></tr></tfoot></table>";
   } else {
       // Center-align the "No Due Invoices" text using CSS
       table_header1 = "<div style='font-size:larger;text-align:center;'><b>No Dues</b>  &#x1F60A;</div>";
   }
               var html1 = "";
               var count1 = 1;
   
   
               for (var invoiceId in basedOnCustomer) {
       if (basedOnCustomer.hasOwnProperty(invoiceId)) {
     
           var element = basedOnCustomer[invoiceId];
                var pay_id=element.payment_id;
          console.log("PAY :"+pay_id);
         var random10DigitNumber='';
         if(pay_id=='' || pay_id =='0'){
     random10DigitNumber = generateRandom10DigitNumber();
         }else{
            random10DigitNumber=pay_id;
         }
               html1 += "<tr><td style='display:none;'><input type='hidden' value='"+random10DigitNumber+"' name='payment_id[]'/></td><td> <input type='checkbox' id='<?php echo $count1; ?>' class='checkbox-distribute'></td><td><input type='text' readonly style='text-align:center;'  value='" + element.bill_number + "' name='invoice_no[]'/></td><td><input type='text' readonly  class='g_pament' value='" + element.gtotals + "' name='total_amt[]' style='text-align:center;'/></td><td>" + element.amount_paids + "</td><td class='due_pay' data-currency='<?php echo $currency; ?>'>" + element.balances + "</td><td  data-currency='<?php echo $currency; ?>'><input type='text' id='amount_pay' class='amount_pay' style='text-align:center;' name='amount_pay[]'/></td><td    class='balance-column' data-currency='<?php echo $currency; ?>'><input type='text' name='updated_bal[]' readonly class='balance-col'/></td></tr>";
                   count1++;
       }
   }
     all +=  total1 + table_header1 + html1 + table_footer1;
    var total2 = ""
               var table_header2 = "<div id='pay_now_table'><table class='table table-striped table-bordered'><tr><th>Date</th><th>Bank</th><th>Reference No</th><th>Payment Amount</th><th>Action</th></tr><tr><td><input type='date' name='bulk_payment_date' value='<?php echo html_escape($date); ?>'/></td><td><select name='bulk_bank' id='bank'  class='form-control bankpayment' > <option value='JPMorgan Chase'>JPMorgan Chase</option> <option value='New York City'>New York City</option> <option value='Bank of America'>Bank of America</option> <option value='Citigroup'>Citigroup</option> <option value='Wells Fargo'>Wells Fargo</option> <option value='Goldman Sachs'>Goldman Sachs</option> <option value='Morgan Stanley'>Morgan Stanley</option> <option value='U.S. Bancorp'>U.S. Bancorp</option> <option value='PNC Financial Services'>PNC Financial Services</option> <option value='Truist Financial'>Truist Financial</option> <option value='Charles Schwab Corporation'>Charles Schwab Corporation</option> <option value='TD Bank, N.A.'>TD Bank, N.A.</option> <option value='Capital One'>Capital One</option> <option value='The Bank of New York Mellon'>The Bank of New York Mellon</option> <option value='State Street Corporation'>State Street Corporation</option> <option value='American Express'>American Express</option> <option value='Citizens Financial Group'>Citizens Financial Group</option> <option value='HSBC Bank USA'>HSBC Bank USA</option> <option value='SVB Financial Group'>SVB Financial Group</option> <option value='First Republic Bank '>First Republic Bank </option> <option value='Fifth Third Bank'>Fifth Third Bank</option> <option value='BMO USA'>BMO USA</option> <option value='USAA'>USAA</option> <option value='UBS'>UBS</option> <option value='M&T Bank'>M&T Bank</option> <option value='Ally Financial'>Ally Financial</option> <option value='KeyCorp'>KeyCorp</option> <option value='Huntington Bancshares'>Huntington Bancshares</option> <option value='Barclays'>Barclays</option> <option value='Santander Bank'>Santander Bank</option> <option value='RBC Bank'>RBC Bank</option> <option value='Ameriprise'>Ameriprise</option> <option value='Regions Financial Corporation'>Regions Financial Corporation</option> <option value='Northern Trust'>Northern Trust</option> <option value='BNP Paribas'>BNP Paribas</option> <option value='Discover Financial'>Discover Financial</option> <option value='First Citizens BancShares'>First Citizens BancShares</option> <option value='Synchrony Financial'>Synchrony Financial</option> <option value='Deutsche Bank'>Deutsche Bank</option> <option value='New York Community Bank'>New York Community Bank</option> <option value='Comerica'>Comerica</option> <option value='First Horizon National Corporation'>First Horizon National Corporation</option> <option value='Raymond James Financial'>Raymond James Financial</option> <option value='Webster Bank'>Webster Bank</option> <option value='Western Alliance Bank'>Western Alliance Bank</option> <option value='Popular, Inc.'>Popular, Inc.</option> <option value='CIBC Bank USA'>CIBC Bank USA</option> <option value='East West Bank'>East West Bank</option> <option value='Synovus'>Synovus</option> <option value='Valley National Bank'>Valley National Bank</option> <option value='Credit Suisse '>Credit Suisse </option> <option value='Mizuho Financial Group'>Mizuho Financial Group</option> <option value='Wintrust Financial'>Wintrust Financial</option> <option value='Cullen/Frost Bankers, Inc.'>Cullen/Frost Bankers, Inc.</option> <option value='John Deere Capital Corporation'>John Deere Capital Corporation</option> <option value='MUFG Union Bank'>MUFG Union Bank</option> <option value='BOK Financial Corporation'>BOK Financial Corporation</option> <option value='Old National Bank'>Old National Bank</option> <option value='South State Bank'>South State Bank</option> <option value='FNB Corporation'>FNB Corporation</option> <option value='Pinnacle Financial Partners'>Pinnacle Financial Partners</option> <option value='PacWest Bancorp'>PacWest Bancorp</option> <option value='TIAA'>TIAA</option> <option value='Associated Banc-Corp'>Associated Banc-Corp</option> <option value='UMB Financial Corporation'>UMB Financial Corporation</option> <option value='Prosperity Bancshares'>Prosperity Bancshares</option> <option value='Stifel'>Stifel</option> <option value='BankUnited'>BankUnited</option> <option value='Hancock Whitney'>Hancock Whitney</option> <option value='MidFirst Bank'>MidFirst Bank</option> <option value='Sumitomo Mitsui Banking Corporation'>Sumitomo Mitsui Banking Corporation</option> <option value='Beal Bank'>Beal Bank</option> <option value='First Interstate BancSystem'>First Interstate BancSystem</option> <option value='Commerce Bancshares'>Commerce Bancshares</option> <option value='Umpqua Holdings Corporation'>Umpqua Holdings Corporation</option> <option value='United Bank (West Virginia)'>United Bank (West Virginia)</option> <option value='Texas Capital Bank'>Texas Capital Bank</option> <option value='First National of Nebraska'>First National of Nebraska</option> <option value='FirstBank Holding Co'>FirstBank Holding Co</option> <option value='Simmons Bank'>Simmons Bank</option> <option value='Fulton Financial Corporation'>Fulton Financial Corporation</option> <option value='Glacier Bancorp'>Glacier Bancorp</option> <option value='Arvest Bank'>Arvest Bank</option> <option value='BCI Financial Group'>BCI Financial Group</option> <option value='Ameris Bancorp'>Ameris Bancorp</option> <option value='First Hawaiian Bank'>First Hawaiian Bank</option> <option value='United Community Bank'>United Community Bank</option> <option value='Bank of Hawaii'>Bank of Hawaii</option> <option value='Home BancShares'>Home BancShares</option> <option value='Eastern Bank'>Eastern Bank</option> <option value='Cathay Bank'>Cathay Bank</option> <option value='Pacific Premier Bancorp'>Pacific Premier Bancorp</option> <option value='Washington Federal'>Washington Federal</option> <option value='Customers Bancorp'>Customers Bancorp</option> <option value='Atlantic Union Bank'>Atlantic Union Bank</option> <option value='Columbia Bank'>Columbia Bank</option> <option value='Heartland Financial USA'>Heartland Financial USA</option> <option value='WSFS Bank'>WSFS Bank</option> <option value='Central Bancompany'>Central Bancompany</option> <option value='Independent Bank'>Independent Bank</option> <option value='Hope Bancorp'>Hope Bancorp</option> <option value='SoFi'>SoFi</option> <?php foreach($bank_list as $b){ ?> <option value='<?=$b['bank_name']; ?>'><?=$b['bank_name']; ?></option> <?php } ?> </select></td><td><input type='text' required  name='bulk_pay_ref' placeholder='Ref No'/></td><td class='t_amt_pay'></td>";
               var table_footer2 = "<td><input type='submit' style='color:white;background-color: #38469f;padding:2px;font-weight:bold;' id='pay_now' value='PAY NOW'/></td></tr></tbody></table></div>";
               var html2 = "";
               var count2 = 1;
     all +=  total2 + table_header2 + html2 + table_footer2;
   
               $('#salle_list').html(all);
               $('#payment_history_modal').modal('show');
                 $('#pay_now_table').hide();
                 $('.balance-column').hide();
     var amountPaidCells = document.querySelectorAll('#salle_list tbody tr td:nth-child(5)'); // Assuming "Amount Paid" is the 5th column
               amountPaidCells.forEach(function (cell) {
                   cell.addEventListener('input', function () {
                       updateBalances();
                    
                   });
               });
           }
       });
   
       event.preventDefault();
   });
   var amountPaidCells = document.querySelectorAll('#salle_list tbody td.editable-amount-paid');
   amountPaidCells.forEach(function (cell) {
       cell.addEventListener('input', function () {
           updateBalance(cell);
       });
   });
   
   function toggleTable() {
     const toggleTable = document.getElementById('toggle_table');
     const toggleButton = document.querySelector('.toggle-button');
   
     if (toggleTable.style.display === 'none' || toggleTable.style.display === '') {
       toggleTable.style.display = 'table'; // Show the table
       toggleButton.textContent = 'Hide Table \u25B2'; // Change text to "Hide Table" with up arrow
     } else {
       toggleTable.style.display = 'none'; // Hide the table
       toggleButton.textContent = 'Payment History \u25BC'; // Change text to "Payment History" with down arrow
     }
   }
   
   
   
   
   
   
   
      
   
   
   
    // Function to show the tooltip
   
   
       // Event handler for when the total amount input changes
   $(document).ready(function () {
       $(document).on('keyup', '#total-amount', function () {
   
           var totalAmount = parseFloat($(this).val().trim());
   
           if (isNaN(totalAmount)) {
               totalAmount = 0;
           }
   
           var t_amont = 0;
           var rows = $('.newtable tbody tr');
           var secondTableRows = $('.newtable-second tbody tr');
           var remainingAmount = totalAmount;
   
           // Fill the first table
           rows.each(function () {
               var amountPayInput = $(this).find('.amount_pay');
               var balanceCell = $(this).find('.td input');
            
               var balance = parseFloat(balanceCell.val());
     balance = isNaN(balance) ? 0 : balance;
  
               if (balance > 0 && remainingAmount > 0) {
                   var amountToPay = Math.min(balance, remainingAmount);
                   amountPayInput.val(amountToPay.toFixed(2));
                   remainingAmount -= amountToPay;
                   t_amont += amountToPay;
   
                   if (amountToPay > 0) {
                       $(this).find('.checkbox-distribute').prop('checked', true);
                   }
               } else if (balance <= 0 && remainingAmount > 0) {
           // Share the remainingAmount with the secondTableRows
           var amountToPay = Math.min(Math.abs(balance), remainingAmount);
        
           t_amont += amountToPay;
   
           if (amountToPay > 0) {
               $(this).find('.checkbox-distribute').prop('checked', true);
           }
   
       
       } else {
           amountPayInput.val('0.00');
       }
           });

           // Distribute any remaining amount to the second table
           secondTableRows.each(function () {
               var checkbox = $(this).find('.checkbox-distribute');
               var amountPayInput = $(this).find('.amount_pay');
               var balanceCell = $(this).find('.due_pay');
               var balance = parseFloat(balanceCell.text());
           //  var b=  parseFloat(balanceCell.text())-parseFloat(amountPayInput.text());
               //console.log('swd'+b);
              
               var balance = parseFloat(balanceCell.text());
   
   var amountPaid = parseFloat(amountPayInput.val());
    var amountToPay1 = Math.min(balance, remainingAmount);
                   var b = balance - amountToPay1.toFixed(2);
   console.log('swd' +balance+'-'+ amountPaid+'='+b);
     $(this).closest('tr').find('.balance-col').val(b.toFixed(2));
               if (balance > 0 && remainingAmount > 0) {
                   var amountToPay = Math.min(balance, remainingAmount);
   //                 var b = balance - amountToPay.toFixed(2);
   // console.log('swd' +balance+'-'+ amountPaid+'='+b);
   //   $(this).closest('tr').find('.balance-col').val(b);
                   amountPayInput.val(amountToPay.toFixed(2));
                   remainingAmount -= amountToPay;
   
                   if (amountToPay > 0) {
                       checkbox.prop('checked', true);
                   }
               } else {
                   amountPayInput.val('0.00');
               }
           });
   
        
   
           var amttopay = isNaN(t_amont) ? 0 : t_amont;
           if (amttopay == '' || amttopay == '0.00') {
               $('#pay_now_table').hide();
               $('.checkbox-distribute').prop('checked', false);
               $('.amount_pay').val('0.00');
           }
           $('.t_amt_pay').text(amttopay.toFixed(2));
              oninputamount_pay();

       });
   });
       $(document).on('change', '.checkbox-distribute', function () {
           if (!$(this).prop('checked')) {
               $(this).closest('tr').find('.amount_pay').val('');
               var due_pay= $(this).closest('tr').find('.due_pay').val();
                $(this).closest('tr').find('.balance-column input').val('');
           }
           updateTotalAmountToPay();
       });
   // Function to update the balance based on the edited "Amount Paid"
   function updateBalance(editedCell) {
       var row = editedCell.parentElement;
       var totalAmountCell = row.querySelector('td[data-currency]');
       var balanceCell = row.querySelector('td.balance-cell');
   
       var totalAmount = parseFloat(totalAmountCell.textContent);
       var editedAmountPaid = parseFloat(editedCell.textContent);
       var newBalance = totalAmount - editedAmountPaid;
   
       // Update the balance cell with the new balance
       balanceCell.textContent = newBalance.toFixed(2);
   }
   function updateBalances() {
      
    
       var grandTotal = $('#grand-total').val();
         // var grandTotal = 3500;
           var totalPaid = 0;
   
           // Loop through each row
           $('#toggle_table tr').each(function () {
               var $row = $(this);
               var $amountPaid = $row.find('.editable-amount-paid');
               var $balanceCell = $row.find('.balance_cell');
   
               // Get the amount paid from the input field
               var amountPaid = parseFloat($amountPaid.text());
   
               // Update the balance cell
               var balance = grandTotal - totalPaid - amountPaid;
               $balanceCell.text(balance);
   
               // Update the total paid
               totalPaid += amountPaid;
           });
      
   }
   
   
   function updateTotalAmountToPay() {
     var totalAmountToPay = 0;
     
     // Iterate through each "Amount to Pay" input field and sum their values
     $('.amount_pay').each(function () {
       var amount = parseFloat($(this).val()) || 0; // Convert input value to a number, default to 0 if not a valid number
     if($(this).val() =='' || $(this).val() =='0.00'){
      $(this).closest('tr').find('.checkbox-distribute').prop('checked', false);
   
     }
       totalAmountToPay += amount;
     });
      var amttopay = isNaN(totalAmountToPay) ? 0 : totalAmountToPay;
      if(amttopay =='' || amttopay=='0.00'){
         $('#pay_now_table').hide();
      }
     // Display the sum in the .t_amt_pay element
     $('.t_amt_pay').text(amttopay.toFixed(2));
     
   }
   
   function updateTotalbalanceToPay() {
     
     var totalbalanceToPay = 0;
     
     // Iterate through each "Amount to Pay" input field and sum their values
     $('.updated_bal').each(function () {
       var amount1 = parseFloat($(this).val()) || 0; // Convert input value to a number, default to 0 if not a valid number
       totalbalanceToPay += amount1;
     });
     
     // Display the sum in the .t_amt_pay element
     $('.t_bal_pay').text(totalbalanceToPay.toFixed(2));
   }
   
   
     var totalbalancetopay = 0;
   // Add an event listener to all "Amount to Pay" input fields for keyup event
   $(document).on('keyup change input', '.amount_pay,#total-amount', function () {
   oninputamount_pay();
   });
      $(document).on('keyup change input', '.amount_pay', function () {

   debugger;
    var total_balance_amount = parseFloat($('.t_amt_pay').html());
 var amount_to_distribute = parseFloat($('#total-amount').val());

 var final=parseFloat(amount_to_distribute)-parseFloat(total_balance_amount);
 
 if (final > 0) {
     $('#advanceamount').val(final);
 }else{
   $('#advanceamount').val('0.00');
 }
   });
   $(document).on('keyup change input', '.amount_pay,#total-amount', function () {
   
     updateTotalAmountToPay();
   
   var anyAmountPaid = false;
               $('.amount_pay').each(function () {
                   if ($(this).val() !== '') {
                       anyAmountPaid = true;
                       return false; // Exit the loop early
                   }
               });
               if (anyAmountPaid) {
                   $('#pay_now_table').show();
                    $('.balance-column').show();
               } else {
                   $('#pay_now_table').hide();
                    $('.balance-column').hide();
               } 
    var amountPaidCell = $(this).val(); // "Amount Paid" cell
       var balanceCell = $(this).closest('tr').find('.due_pay').text(); // "Balance" cell
     var amountPaid = parseFloat(amountPaidCell) || 0; // Get the current "Amount Paid"
       var amountToPay = parseFloat(balanceCell) || 0; // Get the entered "Amount to Pay"
       var updatedBalance = amountToPay-amountPaid; // Calculate the updated balance
    //$(this).closest('tr').find('.updated_bal').val();
     
    
    
    $(this).closest('tr').find('.balance-column').html("<input type='text' id='updated_bal' readonly class='updated_bal' name='updated_bal[]' value="+updatedBalance.toFixed(2)+" />");
   updateTotalbalanceToPay();
   });
   function oninputamount_pay() {
    
     updateTotalAmountToPay();
   
   var anyAmountPaid = false;
   
               $('.amount_pay').each(function () {
                   if ($(this).val() !== '') {
                      
                       anyAmountPaid = true;
                       return false; // Exit the loop early
                   }else{
                      $(this).closest('tr').find('td.updated_bal').val('');
                   }
               });
               if (anyAmountPaid) {
                   $('#pay_now_table').show();
                    $('.balance-column').show();
               } else {
                
                   $('#pay_now_table').hide();
                    $('.balance-column').hide();
               }
    var amountPaidCell =$(this).closest('tr').find('amount_pay').val(); // "Amount Paid" cell
       var balanceCell = $(this).closest('tr').find('.due_pay').text(); // "Balance" cell
     var amountPaid = parseFloat(amountPaidCell) || 0; // Get the current "Amount Paid"
       var amountToPay = parseFloat(balanceCell) || 0; // Get the entered "Amount to Pay"
       //  var updatedBalance='';
     //  if(amountPaid){
    updatedBalance  = amountToPay-amountPaid;
    console.log('up_bal :'+updatedBalance);
     $(this).closest('tr').find('.balance-col').val(updatedBalance.toFixed(2));
    updateTotalbalanceToPay();
    
   }
   

 


   $(document).on('input','#total-amount', function () {
 
 var total_balance_amount = parseFloat($('.bcm').html());
 var amount_to_distribute = parseFloat($('#total-amount').val());

 final=parseFloat(amount_to_distribute)-parseFloat(total_balance_amount);
 
 if (final > 0) {
     $('#advanceamount').val(final);
 }else{
   $('#advanceamount').val('0.00');
 }
});






   // Initial calculation and display of the total amount
   updateTotalAmountToPay();
   updateTotalbalanceToPay();
   
   
   
   function editRow(button) {
     var row = button.parentNode.parentNode;
     var cells = row.getElementsByTagName("td");
   
     for (var i = 0; i < cells.length - 1; i++) { // Exclude the last cell with the button
       var cell = cells[i];
       
       // Check if the current cell should be excluded from editing based on header content
       var headerCell = row.parentNode.parentNode.querySelector("thead tr td:nth-child(" + (i + 1) + ")");
       if (headerCell.textContent.trim() !== "Balance" && headerCell.textContent.trim() !== "S.NO") {
         var currentValue = cell.innerHTML;
         var input = document.createElement("input");
         input.type = "text";
         input.value = currentValue;
          var uniqueClassName = "editable-input-" + i; // You can customize the class name generation logic
         input.className = uniqueClassName;
           input.name = "inputField" + i;
         cell.innerHTML = "";
         cell.appendChild(input);
       }
     }
   
     var saveButton = document.createElement("button");
     saveButton.className = "save-button";
    
     saveButton.style.backgroundColor = '#38469f';
       saveButton.style.color  = 'white';
       saveButton.style.fontWeight = 'bold';
     saveButton.innerHTML = "Update";
     row.setAttribute("data-row-id", "unique_row_id_" + Date.now());
     saveButton.onclick = function () {
       if (saveButton.innerHTML === "Update") {
       // If it's "Save", change it to "Edit"
       saveButton.innerHTML = "Edit";
         saveButton.style.backgroundColor = '#38469f';
       saveButton.style.color  = 'white';
       saveButton.style.fontWeight = 'bold';
       for (var i = 0; i < cells.length - 1; i++) {
       var cell = cells[i];
       var input = cell.querySelector("input");
       var newValue = input.value;
       cell.innerHTML = newValue;
   
       // Check if the button text is "Edit"
    
         // If it's "Edit," make the input fields uneditable
         input.setAttribute("readonly", "true");
       
     }
   
   
         saveButton.onclick = function () {
           editRow(saveButton);
         };
     } else {
       // If it's "Edit", change it back to "Save"
       saveButton.innerHTML = "Update";
         saveButton.style.backgroundColor = '#38469f';
       saveButton.style.color  = 'white';
       saveButton.style.fontWeight = 'bold';
         saveButton.onclick = function () {
           saveRow(saveButton);
         };
     }
       saveRow(row);
     };
   
     var actionCell = row.getElementsByTagName("td")[cells.length - 1];
     actionCell.innerHTML = "";
     actionCell.appendChild(saveButton);
   }
   
   $(document).on('keyup', '.editable-amount-paid', function () {
     
      var gtotal=$('#vendor_gtotals').val();
       const grandTotal = parseFloat(gtotal) || 0;
       console.log("grandTotal :"+grandTotal);
       let cumulativePayment = 0;
   let balance_payment = 0;
       $('#toggle_table tbody tr').each(function () {
           const inputField = $(this).find('.editable-amount-paid');
           
           const balanceCell = $(this).find('.balance-cell');
    
           const paymentAmount = parseFloat(inputField.text()) || 0;
            console.log("inputField :"+paymentAmount);
           cumulativePayment += paymentAmount;
   $(this).find('.editable-amount-paid input').val(paymentAmount);
           const balance = grandTotal - cumulativePayment;
           balance_payment +=balance;
              console.log("balance :"+grandTotal+"-"+cumulativePayment+"="+balance);
          
              
           balanceCell.text('$' + balance.toFixed(2));
             $(this).find('.edit_balance').val(balance.toFixed(2));
       });
        document.getElementById('tl_amt_pd').value = cumulativePayment.toFixed(2);
        var b=gtotal-cumulativePayment;
         document.getElementById('my_bal_1').value = b.toFixed(2);
   });
     $(document).on('click','.save-button',function (event) {
     var row1 = $(this).closest('tr');
         var row = $(this).closest('table').find('tr'); // Get the closest table row
         var name =  $(this).closest('table').find('tr').find('td:eq(0)').text(); // Extract data from the first column
         var payment_date =  $(this).closest('table').find('tr').find('.editable-input-1').val(); // Extract data from the second column
    var ref =  $(this).closest('table').find('tr').find('.editable-input-2').val();
     var b_name =  $(this).closest('table').find('tr').find('.editable-input-3').val();
      var amt_paid =  $(this).closest('table').find('tr').find('.editable-input-4').val();
        var bal =  row1.find('td.balance-cell').text();
          var detail =  $(this).closest('table').find('tr').find('.editable-input-6').val();
           var payment_id = "<?php if($payment_id_service){ echo $payment_id_service; }else{ echo $payment_id_new;}?>";
         // Create a data object to send to the server
         var data = {
           name: name,
           payment_date: payment_date,
           ref: ref,
           b_name: b_name,
           amt_paid: amt_paid,
           bal: bal,
           detail:detail,
           payment_id:payment_id
     
         };
        data[csrfName] = csrfHash;
         // Send an AJAX request to the server-side controller
         $.ajax({
           type: 'POST',
          url:"<?php echo base_url(); ?>Cinvoice/update_payment_data",
           data: data,
           success: function (response) {
             // Handle the response from the server
             console.log(response);
           },
           error: function (error) {
             // Handle any errors
             console.error(error);
           },
         });
            event.preventDefault();
       });
       function saveRow(row) {
         
         var cells = row.getElementsByTagName("td");
     var editButton = row.querySelector("button");
   
     for (var i = 0; i < cells.length - 1; i++) {
       var cell = cells[i];
       var input = cell.querySelector("input");
       var newValue = input.value;
       cell.innerHTML = newValue;
   
       // Check if the button text is "Edit"
       if (editButton.innerHTML === "Edit") {
         // If it's "Edit," make the input fields uneditable
         input.setAttribute("readonly", "true");
       }
     }
   
     var actionCell = row.getElementsByTagName("td")[cells.length - 1];
   
     // Update the button text to "Edit"
     editButton.innerHTML = "Edit";
       
         editButton.onclick = function () {
           editRow(editButton);
         };
   
         actionCell.innerHTML = "";
         actionCell.appendChild(editButton);
   
   
       }
      
   
</script>



<script type="text/javascript">
   function configureDropDownLists(ddl1,ddl3) {
   var assets = ['CASH Operating Account', 'CASH Debitors', 'CASH Petty Cash'];
   var receivables = ['A/REC Trade', 'A/REC Trade Notes Receivable', 'A/REC Installment Receivables','A/REC Retainage Withheld','A/REC Allowance for Uncollectible Accounts'];
   var inventories = ['INV – Reserved', 'INV – Work-in-Progress', 'INV – Finished Goods','INV – Reserved','INV – Unbilled Cost & Fees','INV – Reserve for Obsolescence'];
   var prepaid_expense = ['PREPAID – Insurance', 'PREPAID – Real Estate Taxes', 'PREPAID – Repairs & Maintenance','PREPAID – Rent','PREPAID – Deposits'];
   var property_plant = ['PPE – Buildings', 'PPE – Machinery & Equipment', 'PPE – Vehicles','PPE – Computer Equipment','PPE – Furniture & Fixtures','PPE – Leasehold Improvements'];
   var acc_dep = ['ACCUM DEPR Buildings', 'ACCUM DEPR Machinery & Equipment', 'ACCUM DEPR Vehicles','ACCUM DEPR Computer Equipment','ACCUM DEPR Furniture & Fixtures','ACCUM DEPR Leasehold Improvements'];
   var noncurrenctreceivables = ['NCA – Notes Receivable', 'NCA – Installment Receivables', 'NCA – Retainage Withheld'];
   var intercompany_receivables = ['Organization Costs', 'Patents & Licenses', 'Intangible Assets – Capitalized Software Costs'];
   var liabilities = ['A/P Trade', 'A/P Accrued Accounts Payable', 'A/P Retainage Withheld','Current Maturities of Long-Term Debt','Bank Notes Payable','Construction Loans Payable'];
   var accrued_compensation = ['Accrued – Payroll', 'Accrued – Commissions', 'Accrued – FICA','Accrued – Unemployment Taxes','Accrued – Workmen’s Comp'];
   var other_accrued_expenses = ['Accrued – Rent', 'Accrued – Interest', 'Accrued – Property Taxes', 'Accrued – Warranty Expense'];
   var accrued_taxes= ['Accrued – Federal Income Taxes', 'Accrued – State Income Taxes', 'Accrued – Franchise Taxes','Deferred – FIT Current','Deferred – State Income Taxes'];
   var deferred_taxes= ['D/T – FIT – NON CURRENT', 'D/T – SIT – NON CURRENT'];
   var long_term_debt=['LTD – Notes Payable','LTD – Mortgages Payable','LTD – Installment Notes Payable'];
   var intercompany_payables=['Common Stock','Preferred Stock','Paid in Capital','Partners Capital','Member Contributions','Retained Earnings'];
   var revenue=['REVENUE – PRODUCT 1','REVENUE – PRODUCT 2','REVENUE – PRODUCT 3','REVENUE – PRODUCT 4','Interest Income','Other Income','Finance Charge Income','Sales Returns and Allowances','Sales Discounts'];
   var cost_goods= ['COGS – PRODUCT 1', 'COGS – PRODUCT 2','COGS – PRODUCT 3','COGS – PRODUCT 4','Freight','Inventory Adjustments','Purchase Returns and Allowances','Reserved'];
   var operating_expenses=['Advertising Expense','Amortization Expense','Auto Expense','Bad Debt Expense','Bad Debt Expense','Bank Charges','Cash Over and Short','Commission Expense','Depreciation Expense','Employee Benefit Program','Freight Expense','Gifts Expense','Insurance – General','Interest Expense','Professional Fees','License Expense','Maintenance Expense','Meals and Entertainment','Office Expense','Payroll Taxes','Printing','Postage','Rent','Repairs Expense','Salaries Expense','Supplies Expense','Taxes – FIT Expense','Utilities Expense','Gain/Loss on Sale of Assets'];
   switch (ddl1.value) {
   case 'ASSETS':
   ddl3.options.length = 0;
   for (i = 0; i < assets.length; i++) {
   createOption(ddl3, assets[i], assets[i]);
   }
   break;
   case 'RECEIVABLES':
   ddl3.options.length = 0;
   for (i = 0; i < receivables.length; i++) {
   createOption(ddl3, receivables[i], receivables[i]);
   }
   break;
   case 'INVENTORIES':
   ddl3.options.length = 0;
   for (i = 0; i < inventories.length; i++) {
   createOption(ddl3, inventories[i], inventories[i]);
   }
   break;
   case 'PREPAID EXPENSES & OTHER CURRENT ASSETS':
   ddl3.options.length = 0;
   for (i = 0; i < prepaid_expense.length; i++) {
   createOption(ddl3, prepaid_expense[i], prepaid_expense[i]);
   }
   break;
   case 'PROPERTY PLANT & EQUIPMENT':
   ddl3.options.length = 0;
   for (i = 0; i < property_plant.length; i++) {
   createOption(ddl3, property_plant[i], property_plant[i]);
   }
   break;
   case 'ACCUMULATED DEPRECIATION & AMORTIZATION':
   ddl3.options.length = 0;
   for (i = 0; i < acc_dep.length; i++) {
   createOption(ddl3, acc_dep[i], acc_dep[i]);
   }
   break;
   case 'NON – CURRENT RECEIVABLES':
   ddl3.options.length = 0;
   for (i = 0; i < noncurrenctreceivables.length; i++) {
   createOption(ddl3, noncurrenctreceivables[i], noncurrenctreceivables[i]);
   }
   break;
   case 'INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS':
   ddl3.options.length = 0;
   for (i = 0; i < intercompany_receivables.length; i++) {
   createOption(ddl3, intercompany_receivables[i], intercompany_receivables[i]);
   }
   break;
   case 'LIABILITIES & PAYABLES':
   ddl3.options.length = 0;
   for (i = 0; i < liabilities.length; i++) {
   createOption(ddl3, liabilities[i], liabilities[i]);
   }
   break;
   case 'ACCRUED COMPENSATION & RELATED ITEMS':
   ddl3.options.length = 0;
   for (i = 0; i < accrued_compensation.length; i++) {
   createOption(ddl3, accrued_compensation[i], accrued_compensation[i]);
   }
   break;
   case 'OTHER ACCRUED EXPENSES':
   ddl3.options.length = 0;
   for (i = 0; i < other_accrued_expenses.length; i++) {
   createOption(ddl3, other_accrued_expenses[i], other_accrued_expenses[i]);
   }
   break;
   case 'ACCRUED TAXES':
   ddl3.options.length = 0;
   for (i = 0; i < accrued_taxes.length; i++) {
   createOption(ddl3, accrued_taxes[i], accrued_taxes[i]);
   }
   break;
   case 'DEFERRED TAXES':
   ddl3.options.length = 0;
   for (i = 0; i < deferred_taxes.length; i++) {
   createOption(ddl3, deferred_taxes[i], deferred_taxes[i]);
   }
   break;
   case 'LONG-TERM DEBT':
   ddl3.options.length = 0;
   for (i = 0; i < long_term_debt.length; i++) {
   createOption(ddl3, long_term_debt[i], long_term_debt[i]);
   }
   break;
   case 'INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES':
   ddl3.options.length = 0;
   for (i = 0; i < intercompany_payables.length; i++) {
   createOption(ddl3, intercompany_payables[i], intercompany_payables[i]);
   }
   break;
   case 'REVENUE':
   ddl3.options.length = 0;
   for (i = 0; i < revenue.length; i++) {
   createOption(ddl3, revenue[i], revenue[i]);
   }
   break;
   case 'COST OF GOODS SOLD':
   ddl3.options.length = 0;
   for (i = 0; i < cost_goods.length; i++) {
   createOption(ddl3, cost_goods[i], cost_goods[i]);
   }
   break;
   case 'OPERATING EXPENSES':
   ddl3.options.length = 0;
   for (i = 0; i < operating_expenses.length; i++) {
   createOption(ddl3, operating_expenses[i], operating_expenses[i]);
   }
   break;
   default:
   ddl3.options.length = 0;
   break;
   }
   }
   function createOption(ddl, text, value) {
   var opt = document.createElement('option');
   opt.value = value;
   opt.text = text;
   ddl.options.add(opt);
   }

          $(document).on('click','.del_pay',function (event) {
        event.preventDefault();
       var payment_id = $('input[name="payment_id_this_invoice"]').val();
       var paid_amt = $(this).closest('tr').find('td.editable-amount-paid').text();
       var bal = $(this).closest('tr').find('td.balance-cell').text();
      
           var unq_inv=$('#unq_inv').val();
           var dataString = {
           bal : bal,
           payment_id : payment_id,
           paid_amt :paid_amt,
         
           unq_inv:unq_inv
      };
      dataString[csrfName] = csrfHash;
       $.ajax({
           type:"POST",
           dataType:"json",
           url:"<?php echo base_url(); ?>Cpurchase/delete_the_payment",
           data:dataString,
           success:function (data1) {
           console.log(data1);
           $('#payment_history_modal').modal('hide');

         $("#bodyModal1").html("Payment Delete Successfully");
         $('#myModal1').modal('show');
         window.setTimeout(function(){
            $('.modal-backdrop').remove();
          $('#myModal1').modal('hide');
          location.reload();
       }, 2000);
   }
   });
   });


   //               $("#bodyModal1").html("Payment Completed Successfully");
   //    $('#myModal1').modal('show');
   //    window.setTimeout(function(){
   //        $('.modal').modal('hide');
         
   // $('.modal-backdrop').remove();
   // },2000);




</script>