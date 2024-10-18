

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
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo  display('Vendor');?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-7">
                                    <select name="supplier_id" id="supplier_id"  style="width: 115%;" class="form-control " required=""> 
                                            {supplier_list}

                                            <option value="{supplier_id}">{supplier_name}</option>

                                            {/supplier_list} 

                                            {supplier_selected}

                                            <option value="{supplier_id}" selected="">{supplier_name}</option>
                                            {/supplier_selected}
                                        </select>
                                    </div>
                                </div> 
                            </div>



                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Ship To');?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                         <input rows="4" cols="50" name="ship_to" class=" form-control" value="<?php echo "{ship_to}" ?>" id="" style="width: 135%;"> </input>

                                  
                                        </div>  
                                </div> 
                            </div>

                        </div>

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label"> <?php echo display('Vendor Address');?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                    <textarea class="form-control" tabindex="4" id="vendor_add" name="vendor_add" placeholder="vendor address"  value="<?php echo $vendor_add; ?>" rows="3" col="5" required></textarea>

                                </div>
                                </div>
                            </div>

                      

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('P.O Number');?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                       <input type="text"  tabindex="3" class="form-control" name="chalan_no" value="<?php echo "{chalan_no}" ?>" placeholder="P.O Number" id="invoice_no" style="width:135%;"  readonly></input> 

 
                             <input type="hidden" tabindex="3" class="form-control" name="purchase_id" value="<?=$this->uri->segment(3); ?>"> </input> 
                                    </div>
                                </div>
                            </div>

                           
                        </div>


                        <div class="row">


                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php  echo display('Purchase order date');?>
                                    <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="purchase_date" value="<?php echo $date; ?>" id="date"  required/>
                                    </div>
                                </div> 
                            </div>



                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo  display('Payment Terms');?> <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <select class="form-control" tabindex="4" id="adress"  name="payment_terms" id="payment_terms" class=" form-control" placeholder='Payment Terms' id="payment_terms" rows="1">{payment_terms}   >

<option value="{payment_terms}">{payment_terms}</option>
<option value="100%">100%</option>
<option value="30-70">30-70%</option>
<option value="70-30">70-30%</option>
<option value="75-25">75-25%</option>
<option value="25-75">25-75%</option>
</select>
                                    </div>
                                </div> 
                                                           <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php  echo display('payment_type'); ?> <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <select name="paytype_drop" id="paytype_drop" class="form-control" required=""  tabindex="3" style="width:90%;">
   <option value="{paytype}">{paytype}</option>
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
                            </div>

                        </div>




                        <div class="row">
                               <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo display('Created By');?>
                                    <i class="text-danger">*</i>  </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="adress" name="created_by" value="" placeholder="Created By" rows="1">{created_by}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Est. Shipment date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                       
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="est_ship_date" value="<?php echo $est_ship_date; ?>" id="date5"  required/>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                               <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo  display('Shipment Terms');?>
                                    </label>
                                    <div class="col-sm-8">
                                    <select class="form-control" tabindex="4" id="adress" name="shipment_terms" placeholder="Shipment Terms" rows="1" required>
                                   <option value="<?php echo $shipment_terms; ?>"><?php echo $shipment_terms; ?></option>
                                
                                    <option value="FOB">FOB</option>
                                   <option value="CIF">CIF</option>
                                   </select>
                                </div>
                                </div>
                            </div>

<input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                        <label for="adress" class="col-sm-4 col-form-label"><?php  echo display('Attachments');?>
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                </div>
                            </div>


                        </div>

<input type="hidden" id="final_gtotal"  name="final_gtotal" />
                       
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                      <br>
          <div class="table-responsive">
     
   <div id="content">     
                     <?php 


for($m=1;$m<count($purchase_detail);$m++){ 
    ?>
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
                                            <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th>
                                            <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Cost per Slab');?></th>
                                            <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                                            <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Sales Slab Price');?></th>
                                            <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Weight');?></th>
                                            <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Origin');?></th>
                                           
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
                                
                                .ui-front{
                                    display:none;
                                }
         .removebundle, .addbundle{
         padding: 10px 12px 10px 12px;
        border-radius:5px;
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
                                    <?php foreach($purchase_detail as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                                    <tr>
                                        <td>
                                              <input type="hidden" name="tableid[]" id="tableid_1" value="<?php  echo $inv['tableid'];   ?>"/>
                                
                  <input list="magicHouses" name="prodt[]" id="prodt_<?php  echo $m.$n; ?>" class="form-control product_name" value="<?php  echo $inv['product_name'].'-'.$inv['product_model'];  ?>" style="width:140px;" />
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
                                                <input type="text"  id="slab_no_<?php  echo $m.$n; ?>" name="slab_no[]"  value="<?php  echo $n+1;  ?>"  readonly  required="" value="<?php  echo $c;  ?>" class="form-control"/>
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
                                    
      <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php  echo $m.$n; ?>" name="sales_slab_amt[]"  style="width:60px;" value="<?php  echo $inv['sales_slab_price'];  ?>"  class="sales_slab_amt form-control"/></td> </span>
      </td>
                                            <td>
                                                <input type="text" id="weight_<?php  echo $m.$n; ?>" style="width:50px;" name="weight[]"  value="<?php  echo $inv['weight'];  ?>" class="weight form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="origin_<?php  echo $m.$n; ?>" style="width:50px;" name="origin[]" value="<?php  echo $inv['origin'];  ?>" class="form-control"/>
                                            </td>

                                            <td >
                                                  <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:60px;"   value="<?php  echo $inv['total_amount'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></span>
                                            </td>
                                               
                                          
                                              <td style="text-align:center;">
                                                <button  class='delete btn btn-danger'  type='button' value='Delete' ><i class='fa fa-trash'></i></button>
                                            </td>
                                            
                                            </tr>
                                            
                                            <?php $n++;   } }  ?>
                                            </tbody>
                                <tfoot>
                                    <tr>
                                    <td style="text-align:right;" colspan="8"><b><?php  echo display('Gross Sq.Ft');?>:</b></td>
                                        <td >
             <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"    class="overall_gross form-control" style="width: 60px"   readonly="readonly"  /> 
            </td>
             <td style="text-align:right;" colspan="3"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"   readonly="readonly"  /> 
            </td>
<td style="text-align:right;" colspan="4"><b><?php  echo display('Weight');?> :</b></td>
                                        <td >
             <input type="text" id="overall_weight_<?php echo $m; ?>" name="overall_weight[]"  class="overall_weight form-control"    readonly="readonly"  /> 
            </td> 
                                        <td style="text-align:right;" colspan="1"><b><?php  echo display('total'); ?>:</b></td>
                                        <td >
               <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total form-control"   style="padding-top: 6px;width: 60px"    readonly="readonly"  />
            </td>
                                                                               <td colspan="1" style="text-align: end;">
 <i id="buddle_<?php echo $m; ?>" class="btn-danger removebundle fa fa-minus"  ><?php  echo  display('Bundle');?></i>    
 

                                            </td>    
                                           
                                    </tr>
  
                                            </tfoot>
                            </table>
                            <?php   } ?>
                            <i id="buddle_1" class="addbundle fa fa-plus" style=" padding: 10px 12px 10px 12px;margin-right: 18px;float:right;color:white;background-color:#38469f;"   onclick="addbundle(); "aria-hidden="true"></i>
                         </div> </div>
                                              <table class="taxtab table table-bordered table-hover">
                        <tr>
                        <td class="hiden" style="width:25%;border:none;text-align:end;font-weight:bold;">
                           <?php  echo display("Live Rate");?> : 
                         </td>
                
                               <td class="hiden" style="width:12%;text-align-last: center;padding:5px;background-color: #38469f;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                 = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" id="custocurrency_rate"/>&nbsp;<label for="custocurrency" style="color:white;background-color: #38469f;"></label></td>
                    <td style="border:none;text-align:right;font-weight:bold;">   <?php  echo display("tax");?> : 
                                 </td>
                                <td style="width:12%">
<select name="tx"  id="product_tax" class="form-control" >
<option value="<?php  echo $tax_des; ?>" selected="selected"><?php  echo $tax_des; ?></option>
<?php foreach($tax as $tx){?>
  
    <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
<?php } ?>
</select>
</td>
<td  style="width:25%;"></td>
</tr>
</table>
<table border="0" style="table-layout: auto;" class="overall table table-bordered table-hover">
    <tr>
        <td   style="vertical-align:top;text-align:right;border:none;"></td>
        <td  style="text-align:right;border:none;"></td>
         <td  style="text-align:right;border:none;"></td>
         <td  style="text-align:right;border:none;"> </td>
</tr>
  <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
        <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" id="Over_all_Total" name="Over_all_Total"  style="width:180px;" class="form-control" value="<?php echo $purchase_detail[0]['total'];  ?>"  readonly="readonly"  /> </span></td>
         <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('TAX DETAILS');?> :</b></td><td colspan="1" style="border:none;">  <span class="input-symbol-euro">     <input type="text" class="form-control" style="width:180px;"  id="tax_details" value="<?php echo $purchase_detail[0]['tax_details'];  ?>" name="tax_details"  readonly="readonly" /></span></td>
</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Gross Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><input type="text" id="total_gross" name="total_gross" value="<?php echo  $purchase_detail[0]['total_gross'];  ?>"  style="width:180px;" class="form-control"   readonly="readonly"  /> </td>
         <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td><td colspan="1" style="border:none;">  <span class="input-symbol-euro">    <span class="input-symbol-euro">   <input type="text" id="gtotal"   class="form-control" style="width:180px;" name="gtotal" value="<?php  echo $purchase_info[0]['grand_total_amount'];   ?>"  readonly="readonly" /></td>
</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><input type="text" id="total_net" name="total_net" value="<?php echo  $purchase_detail[0]['total_net'];  ?>" class="form-control"  style="width:180px;"  readonly="readonly"  /> </td>
         <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?>:</b><br/><b><?php  echo display('Preferred Currency');?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="width: 40px;"></td> <td><input  type="text"  style="width:180px;" readonly id="vendor_gtotal"    name="vendor_gtotal"  required   /></td></tr></table></td>
</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td><td colspan="1" style="border:none;"><input type="text" id="total_weight" value="<?php echo  $purchase_detail[0]['total_weight'];  ?>" name="total_weight"  style="width:180px;"  class="form-control"   readonly="readonly"  /></td>
         <td colspan="4" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="width: 40px;"></td>
<td> <input  type="text"  readonly id="amount_paid" style="width:-webkit-fill-available;"  name="amount_paid"  value="<?php echo  $purchase_detail[0]['paid_amount'];  ?>"  required   /></td> 
     </tr>
   </table>
  </td>
                                            </tr> 
                                           <tr>
      <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td><td colspan="1" style="border:none;"></td>
        <td class="amt" colspan="4"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
        <td class="amt" style="border:none;" colspan="1">
            <table border="0">
      <tr class="amt">
        <td class="cus" name="cus" style="border:none;width: 40px;"></td>  <td style="border:none;">
                                          <input  type="text"   readonly id="balance"  value="<?php echo $purchase_detail[0]['due_amount'];  ?>" name="balance"  required   />                     
                                            </td>     </tr>
   </table>
                                            </td>
                                            </tr> 
											
											
											
											
											
											       <td colspan="21" style="text-align: end;">
                                            
                                        <input type="submit" value="<?php echo  display('Make Payment')?>" style="color:white;background-color: #38469f;" class="btn btn-large" id="paypls"/>
                                            </td>
</tr>

</table>
                      
                        


                        <div class="row">
                        <div class="col-sm-12">
                               <div class="form-group row">
                                    <label for="remark" class="col-sm-2 col-form-label"><?php echo  display('Remarks / Details');?>
                                    </label>
                                    <div class="col-sm-10">
                                    <input class="form-control" rows="4" cols="50" id="remark" name="remark"   value="<?php echo $remarks; ?>"  placeholder="" rows="1"></input>
                                
         
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
                                        <input class="form-control" rows="4" cols="50" id="adress" name="message_invoice"    value="<?php   echo $message_invoice;  ?>" placeholder="" rows="1"></input>
                                    </div>
                                </div> 
                            </div>

  </div>
</div>

                         <div class="form-group row">
                            <div class="col-sm-6"  style="height: 80px;">
                                <input type="submit" id="add_purchase"  style="color:white;background-color:#38469f;" class="btn btn-primary btn-large" name="add-purchase-order" value="<?php  echo  display('save'); ?>" />
             
                                <a   style="color:white;background-color:#38469f;" id="final_submit" class='final_submit btn btn-primary'><?php echo display('submit'); ?></a>
<a id="download"        style="color:white;background-color:#38469f;" class='btn btn-primary'>Download</a>
<a id="print"        style="color:white;background-color:#38469f;" class='btn btn-primary'>Print</a>
                               

                            </div>
                            </div>
                        </div>

                     
        </form>
                    
</div>
                    

</div>
