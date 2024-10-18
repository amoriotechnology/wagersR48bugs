

                    <div class="panel-body">
<style>
 .with_po > .navbar{
display:none; 
}
.with_po > .main-sidebar{
display:none; 
}
    
    </style>
<div class="with_po">  
                      <form id="insert_purchase"  method="post">
               <div class="row">
                 
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="supplier_sss" class="col-sm-4 col-form-label"><?php  echo  display('Vendor'); ?>
                        <i class="text-danger">*</i>
                        </label>
                        <div class="col-sm-8">
                           <select name="supplier_id" id="supplier_id" class="form-control "  style="width:100%;" required=""  tabindex="1">
                              <option value="<?php echo $supplier_id ?>"><?php echo $supplier_name; ?></option>
                              {all_supplier}
                              <option value="{supplier_id}">{supplier_name}</option>
                              {/all_supplier}
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" ><?php  echo  display('Vendor Type');?></label>
                        <div class="col-sm-8">
                           <input type="vendor_type" tabindex="3" class="form-control" name="vendor_type"  style="WIDTH: 100%;" placeholder="" id="vendor_type_details" />
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <input type="hidden"  class="payment_id1 payment_id"  name="payment_id"/>
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"><?php  echo  display('Vendor Address');?>
                        <i class="text-danger"></i>
                        </label>
                        <div class="col-sm-8">
                           <textarea class="form-control" tabindex="4" id="vendor_add" rows="4" cols="50" name="vendor_add" placeholder=""   required ></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6" id="">
                     <div class="form-group row">
                        <label for="date" class="col-sm-4 col-form-label"><?php echo display('invoice_no');  ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input  class=" form-control" type="" size="50" name="invoice_no" id="" required  value="<?php echo $chalan_no; ?>"  tabindex="4" />
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6" id="">
                     <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label"><?php echo display('Expenses / Bill date');?>
                        <i class="text-danger">*</i>
                        </label>
                        <div class="col-sm-5">
                           <input type="date"  style="width:165%;" required tabindex="2" class="form-control datepicker" name="bill_date"  placeholder="Expenses/Billdate"  value="{purchase_date}" id="date"  />
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="port_of_discharge" class="col-sm-4 col-form-label"> <?php echo display('Port Of Discharge');?> </label>
                        <div class="col-sm-8">
                           <input class="form-control" type="" size="50" name="Port_of_discharge" id="date1"  value="<?php echo $port_of_discharge; ?>"  tabindex="4" />
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="date" class="col-sm-4 col-form-label"><?php echo display('Payment Due Date');?>  <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class=" form-control" type="date" size="50" name="payment_due_date" id="payment_due_date" required value="<?php echo $payment_due_date; ?>" tabindex="4" />
                        </div>
                     </div>
                     <input type="hidden" id="hidden_weight" name="hidden_weight"/>
                     <div class="form-group row">
                        <label for="billing_address" class="col-sm-4     col-form-label"><?php echo display('Payment Terms');?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <select  required  name="payment_terms" id="payment_terms" style="width:100%;" class=" form-control" placeholder='Payment Terms' id="payment_terms">
                              <option value="<?php echo $payment_terms; ?>"><?php echo $payment_terms; ?></option>
                              <option value="CAD">CAD</option>
                              <option value="COD">COD</option>
                              <option value="ADVANCE"><?php echo display('ADVANCE');?></option>
                              <option value="7DAYS">7<?php echo display('DAYS');?></option>
                              <option value="15DAYS">15<?php echo display('DAYS');?></option>
                              <option value="30DAYS">30<?php echo display('DAYS');?></option>
                              <option value="45DAYS">45<?php echo display('DAYS');?></option>
                              <option value="60DAYS">60<?php echo display('DAYS');?></option>
                              <option value="75DAYS">75<?php echo display('DAYS');?></option>
                              <option value="90DAYS">90<?php echo display('DAYS');?></option>
                              <option value="180DAYS">180<?php echo display('DAYS');?></option>
                           </select>
                        </div>
                     </div>
                     <?php ?>
                     <div class="form-group row">
                        <label for="payment_type" class="col-sm-4 col-form-label"><?php
                           echo display('payment_type');
                           ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <select name="paytype_drop" id="paytype_drop" class="form-control" required=""  tabindex="3" style="width:100;">
                              <option value="<?php echo $payment_type; ?>"> <?php echo  $payment_type; ?></option>
                              <option value="CHEQUE"><?php echo display('cheque'); ?></option>
                              <option value="CASH"><?php echo display('cash'); ?></option>
                              <option value="CREDIT/DEBIT CARD"><?php echo display('CREDIT/DEBIT CARD');?></option>
                              <option value="BANK TRANSFER"><?php echo display('BANK TRANSFER');?></option>
                              <?php foreach($payment_type as $ptype){?>
                              <option value="<?php echo $ptype['payment_type'];?>"><?php echo $ptype['payment_type'] ;?></option>
                              <?php }?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="invoice_no" class="col-sm-4 col-form-label"> <?php echo display('ISF FIELD');?>
                        <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <select name="isf_field" class="form-control"  id="isf_dropdown1" tabindex="3" style="width400%;">
                              <option value=""selected><?php echo display('Select ISF NO');?></option>
                              <option value="1"><?php echo display('NO') ?></option>
                              <option value="2"><?php echo display('YES') ?></option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row" id="isf_no1">
                        <label for="ISF" class="col-sm-4 col-form-label" ><?php echo display('ISF NO');?>
                        <i class="text-danger">*</i>
                        </label>
                        <div class="col-sm-8">
                           <input name="isf_no"  class="form-control bankpayment"   style="width:100%;" value="<?php echo $isf_filling; ?>"  >
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="container_number" class="col-sm-4 col-form-label"><?php echo display('Container Number');?> <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input type="text" name="container_no" value="<?php  echo $container_no; ?>" class="form-control"  placeholder="Container Number">
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="date" class="col-sm-4 col-form-label"><?php echo display('B/L No');?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input type="text" name="bl_number" class="form-control"  value="<?php echo $bl_number; ?>"  placeholder="Bl Number">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('Estimated Time Of Arrival');?>
                     
                        </label>
                        <div class="col-sm-8">
                           <input type="date"  tabindex="2" class="form-control datepicker" name="eta" value="<?php echo $eta; ?>" id="date1"  />
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Estimated Time Of Depature');?>
                     
                        </label>
                        <div class="col-sm-8">
                           <input type="date"  tabindex="2" class="form-control datepicker" name="etd" value="<?php echo $etd; ?>" id="date"  />
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Attachments');?></label>
                        <div class="col-sm-8">
                           <input type="file" name="file" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <?php  $d= $total_tax; 
                  $t='';
                  if($d !=='' && !empty($d)){
                     preg_match('#\((.*?)\)#', $d, $match);
                  
                     $t=$match[1];$t=trim($t);
                     
                   }else{
                  
                     $t=$t=trim($t);
                     
                   }
                  ?>                                         
               <div class="table-responsive">
                  <div id="content">
                     <?php
                        $count='';
                        $list_count=array();
                        foreach($purchase_info as $inv){
                            $count = substr($inv['tableid'], 0, 1);
                         $items[] =$count   ;                            
                                                      
                        
                        
                        
                        
                        }
                        
                        
                        
                        ?>
                     <?php 
                        for($m=1;$m<count($purchase_info);$m++){ ?>
                     <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                        <thead>
                           <tr>
                              <th rowspan="2" class="text-center" style="width:180px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i>  &nbsp;&nbsp; </th>
                              <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Bundle No');?><i class="text-danger">*</i></th>
                              <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th>
                              <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Thick ness');?><i class="text-danger">*</i></th>
                              <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>
                              <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th>
                              <th colspan="2"   style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th>
                              <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>
                              <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th>
                              <th colspan="2"  style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th>
                              <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th>
                              <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th>
                              <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Slab');?></th>
                              <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                              <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Sales Slab Price');?></th>
                              <th rowspan="2" class="text-center"><?php echo display('Weight');?></th>
                              <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>
                              <th rowspan="2" style="width: 130px" class="text-center"><?php  echo  display('total'); ?></th>
                              <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th>
                           </tr>
                           <tr>
                              <th class="text-center"><?php echo display('Width');?></th>
                              <th class="text-center"><?php echo display('Height');?></th>
                              <th class="text-center"  ><?php echo display('Width');?></th>
                              <th class="text-center" ><?php echo display('Height');?></th>
                           </tr>
                        </thead>
                        <style>
                        .button_hide{
                              display:none;
                        }
                           input{
                           border:none;
                           }
                           textarea:focus, input:focus{
                           outline: none;
                           }
                           .text-right {
                           text-align: left; 
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
                           #download_select:focus option:first-of-type , #print_select:focus option:first-of-type{
                           display: none;
                           }
                        </style>
                        <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                           <?php  $n=0; ?>
                           <?php foreach($purchase_info as $inv){
                              $a = substr($inv['tableid'], 0, 1);
                              if($a==$m){
                                                                  
                                                                      ?>
                           <tr>
                              <td>
                                 <input type="hidden" name="tableid[]" id="tableid_1" value="<?php  echo $inv['tableid'];   ?>"/>
                                 <input list="magicHouses" name="prodt[]" id="prodt_<?php  echo $m.$n; ?>" class="form-control product_name" value="<?php  echo $inv['product_name'];  ?>" style="width:160px;" />
                                 <datalist id="magicHouses">
                                    <?php                                
                                       foreach($products as $tx){?>
                                    <option value="<?php echo $tx['product_name'].'-'.$tx['product_model'];?>">  <?php echo $tx['product_name'].'-'.$tx['product_model'];  ?></option>
                                    <?php } ?>
                                 </datalist>
                                 <input type='hidden' class='common_product autocomplete_hidden_value  product_id_1' value="<?php  echo $inv['product_id'];  ?>" name='product_id[]' id='SchoolHiddenId_<?php  echo $m.$n; ?>' />
                              </td>
                              <td>
                                 <input type="text" id="bundle_no_<?php  echo $m.$n; ?>" name="bundle_no[]" required="" value="<?php  echo $inv['bundle_no'];  ?>" class="form-control" />
                              </td>
                              <td>
                                 <input type="text" id="description_<?php  echo $m.$n; ?>" name="description[]" value="<?php  echo $inv['description'];  ?>" class="form-control" />
                              </td>
                              <td >
                                 <input type="text" name="thickness[]" id="thickness_<?php  echo $m.$n; ?>" required="" value="<?php  echo $inv['thickness'];  ?>" class="form-control"/>
                              </td>
                              <td>
                                 <input type="text" id="supplier_b_no_<?php  echo $m.$n; ?>" name="supplier_block_no[]" required="" value="<?php  echo $inv['supplier_block_no'];  ?>" class="form-control" />
                              </td>
                              <td >
                                 <input type="text"  id="supplier_s_no_<?php  echo $m.$n; ?>" name="supplier_slab_no[]" required="" value="<?php  echo $inv['supplier_slab_no'];  ?>" class="form-control"/>
                              </td>
                              <td>
                                 <input type="text" id="gross_width_<?php  echo $m.$n; ?>" name="gross_width[]" required="" value="<?php  echo $inv['g_width'];  ?>" class="gross_width  form-control" />
                              </td>
                              <td>
                                 <input type="text" id="gross_height_<?php  echo $m.$n; ?>" name="gross_height[]"  required=""  value="<?php  echo $inv['g_height'];  ?>" class="gross_height form-control" />
                              </td>
                              <td >
                                 <input type="text"   style="width:60px;" readonly id="gross_sq_ft_<?php  echo $m.$n; ?>" name="gross_sq_ft[]" value="<?php  echo $inv['gross_sqft'];  ?>" class="gross_sq_ft form-control"/>
                              </td>
                              <td >
                                 <input type="text"  id="slab_no_<?php  echo $m.$n; ?>" name="slab_no[]" value="<?php  echo $n+1;  ?>" readonly  required="" value="<?php  echo $c;  ?>" class="form-control"/>
                              </td>
                              <td>
                                 <input type="text" id="net_width_<?php  echo $m.$n; ?>" name="net_width[]" required="" value="<?php  echo $inv['n_width'];  ?>" class="net_width form-control" />
                              </td>
                              <td>
                                 <input type="text" id="net_height_<?php  echo $m.$n; ?>" name="net_height[]"    required="" value="<?php  echo $inv['n_height'];  ?>" class="net_height form-control" />
                              </td>
                              <td >
                                 <input type="text"   style="width:60px;" readonly id="net_sq_ft_<?php  echo $m.$n; ?>" name="net_sq_ft[]" value="<?php  echo $inv['net_sqft'];  ?>" class="net_sq_ft form-control"/>
                              </td>
                              <td>
                                 <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_<?php  echo $m.$n; ?>"  name="cost_sq_ft[]" readonly  style="width:60px;" value="<?php  echo $inv['cost_per_sqft'];  ?>"  class="cost_sq_ft form-control" ></span>
                              <td >
                                 <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_<?php  echo $m.$n; ?>" name="cost_sq_slab[]" readonly   style="width:60px;" value="<?php  echo $inv['cost_per_slab'];  ?>"  class="form-control"/></span>
                              </td>
                              <td>
                                 <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_<?php  echo $m.$n; ?>"  name="sales_amt_sq_ft[]"  style="width:60px;"  value="<?php  echo $inv['sales_price_sqft'];  ?>" class="sales_amt_sq_ft form-control" /></span>
                              </td>
                              <td >
                                 <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php  echo $m.$n; ?>" name="sales_slab_amt[]"  style="width:60px;" value="<?php  echo $inv['sales_slab_price'];  ?>"  class="sales_slab_amt form-control"/>
                              </td>
                              </span>
                              </td>
                              <td>
                                 <input type="text" id="weight_<?php  echo $m.$n; ?>" name="weight[]"  value="<?php  echo $inv['weight'];  ?>" class="weight form-control" />
                              </td>
                              <td >
                                 <input type="text"  id="origin_<?php  echo $m.$n; ?>" name="origin[]" value="<?php  echo $inv['origin'];  ?>" class="form-control"/>
                              </td>
                              <td >
                                 <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;"   value="<?php  echo $inv['total'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></span>
                              </td>
                              <td style="text-align:center;">
                                 <button  class='delete1 btn btn-danger' type='button' value='Delete' ><i class='fa fa-trash'></i></button>
                              </td>
                           </tr>
                           <?php $n++;   } }  ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <td style="text-align:right;" colspan="8"><b><?php  echo display('Gross Sq.Ft');?>  :</b></td>
                              <td >
                                 <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"    class="overall_gross form-control" style="width: 60px"   readonly="readonly"  /> 
                              </td>
                              <td style="text-align:right;" colspan="3"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                              <td >
                                 <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"   readonly="readonly"  /> 
                              </td>
                              <td style="text-align:right;" colspan="4"><b><?php  echo display('Weight');?> :</b></td>
                              <td >
                                 <input type="text" id="overall_weight_<?php echo $m; ?>" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /> 
                              </td>
                              <td style="text-align:right;" colspan="1"><b><?php  echo display('total'); ?> :</b></td>
                              <td >
                                 <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total form-control"   style="padding-top: 6px;width: 80px"    readonly="readonly"  />
                              </td>
                              <td colspan="2" style="text-align: center;">
                             <i id="buddle_<?php echo $m; ?>"  class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i>
                              
                              </td>
                           </tr>
                        </tfoot>
                     </table>
                     <?php   } ?>
                  
                  <i id="buddle_1" class="addbundle fa fa-plus" style=" padding: 10px 12px 10px 12px;margin-right: 18px;float:right;color:white;background-color:#38469f;"   onclick="addbundle(); "aria-hidden="true"></i>
                
                    </div>
               </div>
               <table class="taxtab table table-bordered table-hover">
                  <tr>
                     <td class="hiden" style="width:25%;border:none;text-align:end;font-weight:bold;">
                        <?php  echo display("Live Rate");?> : 
                     </td>
                     <td class="hiden" style="width:12%;text-align-last: center;padding:5px;background-color: #38469f;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                        = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" class="custocurrency_rate"/>&nbsp;<label for="custocurrency" style="color:white;background-color: #38469f;"></label>
                     </td>
                     <td style="border:none;text-align:right;font-weight:bold;"><?php  echo display('Tax');?> : 
                     </td>
                     <td style="width:12%">
                        <select name="tx"  id="product_tax" class="form-control" >
                           <option value="<?php  echo $t; ?>" selected="selected"><?php  echo $t; ?></option>
                           <?php foreach($all_tax as $tx){?>
                           <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
                           <?php } ?>
                        </select>
                     </td>
                     <td  style="width:25%;"></td>
                  </tr>
               </table>
               <input type="hidden" id="paid_convert" name="paid_convert"/>   <input type="hidden" id="bal_convert" name="bal_convert"/>
               <table border="0" style="table-layout: auto;" class="overall table table-bordered table-hover">
                  <tr>
                     <td   style="vertical-align:top;text-align:right;border:none;"></td>
                     <td  style="text-align:right;border:none;"></td>
                     <td  style="text-align:right;border:none;"></td>
                     <td  style="text-align:right;border:none;"> </td>
                  </tr>
                  <tr>
                     <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
                     <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" id="Over_all_Total" name="Over_all_Total"  style="width:180px;" class="form-control" value="<?php echo $purchase_info[0]['total'];  ?>"  readonly="readonly"  /> </span></td>
                     <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('TAX DETAILS');?> :</b></td>
                     <td colspan="1" style="border:none;">  <span class="input-symbol-euro">     <input type="text" class="form-control" style="width:180px;"  id="tax_details" value="<?php echo $purchase_info[0]['tax_details'];  ?>" name="tax_details"  readonly="readonly" /></span></td>
 
                  </tr>
                  <tr>
                     <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
                     <td colspan="1" style="border:none;"><input type="text" id="total_gross" name="total_gross" value="<?php echo  $purchase_info[0]['total_gross'];  ?>"  style="width:180px;" class="form-control"   readonly="readonly"  /> </td>
                     <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                     <td colspan="1" style="border:none;">  <span class="input-symbol-euro">    <span class="input-symbol-euro">   <input type="text" id="gtotal"   class="form-control" style="width:180px;" name="gtotal" value="<?php  echo $purchase_info[0]['grand_total_amount'];   ?>"  readonly="readonly" /></td>
                  </tr>
                  <tr>
                     <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td>
                     <td colspan="1" style="border:none;"><input type="text" id="total_net" name="total_net" value="<?php echo  $purchase_info[0]['total_net'];  ?>" class="form-control"  style="width:180px;"  readonly="readonly"  /> </td>
                     <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td>
                     <td colspan="1" style="border:none;">
                        <table>
                           <tr>
                              <td class="cus" name="cus" style="width: 40px;"></td><td>&nbsp</td>
                              <td><input  type="text"  style="width:180px;" readonly class="vendor_gtotal" id="vendor_gtotal"  value="<?php echo  $purchase_info[0]['gtotal_preferred_currency'];  ?>"   name="vendor_gtotal"  required   /></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td>
                     <td colspan="1" style="border:none;"><input type="text" id="total_weight" value="<?php echo  $purchase_info[0]['total_weight'];  ?>" name="total_weight"  style="width:180px;"  class="form-control"   readonly="readonly"  /></td>
                     <td colspan="4" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td>
                     <td style="border:none;">
                        <table border="0">
                           <tr class="amt">
                              <td class="cus" name="cus" style="width: 40px;"></td><td>&nbsp</td>
                              <td> <input  type="text"  readonly id="amount_paid" class="" style="width:-webkit-fill-available;"  name="amount_paid"  value="<?php echo  $purchase_info[0]['paid_amount'];  ?>"  required   /></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td>
                     <td colspan="1" style="border:none;"></td>
                     <td class="amt" colspan="4"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
                     <td class="amt" style="border:none;" colspan="1">
                        <table border="0">
                           <tr class="amt">
                              <td class="cus" name="cus" style="border:none;width: 40px;"></td><td>&nbsp</td>
                              <td style="border:none;">
                                 <input  type="text"   readonly id="balance"  value="<?php echo $purchase_info[0]['due_amount'];  ?>" name="balance"  required   />                     
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <td colspan="21" style="text-align: end;">
                    <input type="button" id="submit_value" style="color:white;background-color: #38469f;" class="btn btn-large" onclick="paypls()"  value="<?php echo display('Make Payment') ?>"/>
                   
                   
                  </td>
                  <tr>
               </table>
       <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
      <div class="row">
      <div class="col-sm-12">
      <div class="form-group row">
      <label for="adress" class="col-sm-2 col-form-label"><?php echo  display('Remarks / Details');?>
      </label>
      <div class="col-sm-10">
            <textarea class="form-control" rows="4" cols="50" id="remark" name="remark" placeholder="Remarks" rows="1"><?php echo $remarks; ?></textarea>
   
      </div>
      </div> 
      </div>
        </div>
  
      <div class="row">
      <div class="col-sm-12">
      <div class="form-group row">
      <label for="adress" class="col-sm-2 col-form-label"><?php echo  display('Message on Invoice');?>
      </label>
      <div class="col-sm-10">
             <textarea class="form-control" rows="4" cols="50" id="adress" name="message_invoice" placeholder="Message on Invoice" rows="1"><?php echo $message_invoice; ?></textarea>
             
             

      </div>
      </div> 
      </div>
      </div>
         <div class="row">
      <div class="col-sm-12">
      <div class="form-group row">
        <table>
      <tr>
      <td>
      <input type="submit" id="add_purchase" style="color:white;background-color: #38469f;" class="btn btn-large" name="add-packing-list" value="<?php echo display('save'); ?>" />
      </td>
      <td class="button_hide"> 
     <input type="submit" id="final_submit" style="color:white;background-color: #38469f;" class="btn btn-primary pull-left final_submit" onclick="submit_redirect()"  value="Submit"/>
      </td>
      <td class="button_hide">         
      <select name="download_select" id="download_select" class="form-control" style="color:white;background-color: #38469f;width: auto;" >
      <option value="Download" selected><?php echo display('download'); ?></option>
      <option value="Invoice" ><?php echo  display('New Invoice');?></option>
      <option value="Packing" ><?php echo  display('Packing List');?></option>
      </select>
      </td>       
      <td class="button_hide">
      <select name="print_select" id="print_select" class="form-control" style="color:white;background-color: #38469f;width: auto;" >
      <option value="Print" selected><?php echo display('print');  ?></option>
      <option value="Invoice" ><?php echo  display('New Invoice');?></option>
      <option value="Packing" ><?php echo  display('Packing List');?></option>
      </select>
      </td>                   
      </tr>
      </table>
      </div> 
      </div>
      </div>
      </div>
		
      </form>
                    

<div class="modal fade" id="payment_modal1" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo  display('add_payment'); ?></h4>
         </div>
         <div class="modal-body">
            <form id="add_payment_info"  method="post" >
               <div class="row">
                  <div class="form-group row">
                     <label for="date" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('payment_date'); ?>  <i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                       <?php
                                        $date = date('Y-m-d');
                                        ?>
                        <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                     </div>
                  </div>
                  <input type="hidden" id="cutomer_name" name="cutomer_name"/>
                  <input type="hidden" class="payment_id1 payment_id"  name="payment_id"/>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Reference No'); ?><i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Select Bank'); ?>:<i class="text-danger">*</i></label>
                     <a data-toggle="modal" href="#add_bank_info"  style="color:white;background-color:#38469f;" class="btn btn-primary"><i class="fa fa-university"></i></a>
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
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount to be paid'); ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"  readonly style="width:190%;" class="form-control"  name="amount_to_pay" id="amount_to_pay"  required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount Received'); ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"  readonly name="amount_received" id="amount_received" style="width:190%;" class="form-control"required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('balance'); ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"  style="width:190%;"  readonly name="balance_modal" id="balance_modal" class="form-control" required  /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('payment_amount');  ?>: <i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"   style="width:190%;" name="payment" id="payment_from_modal" class="form-control" required   /></td>
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
         <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal"><?php  echo display('Close');  ?></a>
         <input class="btn btn-primary" type="submit"   style="color:white;background-color:#38469f;"  name="submit_pay" id="submit_pay" value="<?php  echo display('submit');  ?>"  required   />
         </div>
         </div>
      </div>
      </form>
   </div>
</div>
<div class="modal fade" id="add_bank_info">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header" style="color:white;background-color:#38469f;" >
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
                     <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Currency" ?></label>
                     <div class="col-sm-6">
                        <select id="currency" name="currency1"  class="form-control" style="max-width: -webkit-fill-available;">
                           <option><?php echo display('Select currency'); ?></option>
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
         <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a>
         <input type="submit" id="addBank"  style="color:white;background-color:#38469f;"  class="btn btn-primary" name="addBank" value="<?php echo display('save') ?>"/>
         </div>
         </div>  </div>
         </form>
      </div>
   </div>
</div>

 </div></div>
                    

</div>
<script>
   $('#paypls').on('click', function (e) {
$('#amount_to_pay').val($('#vendor_gtotal').val()-$('#amount_paid').val());
    $('#payment_modal').modal('show');
  e.preventDefault();

});
    $(document).ready(function(){
 $(".normalinvoice").each(function(i,v){
   if($(this).find("tbody").html().trim().length === 0){
       $(this).hide()
   }
})
        $('.normalinvoice').each(function(){
var tid=$(this).attr('id');
 const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);



  var sum=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);

});

 $(this).closest('table').find('#Total_'+idt).val(sum.toFixed(3));

  var sum_net=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).val();
  sum_net += parseFloat(v);

});

 $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));
  var sum_gross=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.gross_sq_ft ').each(function() {
var v=$(this).val();
  sum_gross += parseFloat(v);

});
 $(this).closest('table').find('#overall_gross_'+idt).val(sum_gross.toFixed(3));
   var sum_weight=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.weight').each(function() {
var v=$(this).val();
  sum_weight += parseFloat(v);

});

 $(this).closest('table').find('#overall_weight_'+idt).val(sum_weight.toFixed(3));
    

    });
});
    </script>