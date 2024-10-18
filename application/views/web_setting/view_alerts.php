<?php error_reporting(1); ?>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo display('Alerts') ?></h1>
         <small><?php echo display('Alerts') ?></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#">Alerts</a></li>
            <li class="active">Alerts</li>
         </ol>
      </div>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>Sales Alerts</h4>
                  </div>
                  </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="myTable">
                        <thead>
                           <tr>
                              <th>S.NO</th>
                              <th>Invoice ID</th>
                              <th>Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if ($selecteddate === 'On Date' && !empty($today)) {
                              $s = 1;
                              foreach ($today as $key => $value) {
                           ?>
                           <tr>
                              <td><?php echo $s; ?></td>
                              <td style="display: none;"><input type="hidden" class="on_date" value="<?php echo $s; ?>" /></td>
                           

                              <?php if($status === 'NewSaleETD'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'NewSaleETA'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'NewSalePAYMENTDUEDATE'){ ?> 
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'OceanexporttrackingETD'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/ocean_export_tracking_update_form/'.$value->ocean_export_tracking_id) ?>"><?php echo $value->ocean_export_tracking_id; ?></a></td>
                              <?php }else if($status === 'ocean_export_tracking'){ ?> 
                                 <td><a href="<?php echo base_url('Cinvoice/ocean_export_tracking_update_form/'.$value->ocean_export_tracking_id) ?>"><?php echo $value->ocean_export_tracking_id; ?></a></td>
                              <?php }else if($status === 'TRUCKINGCONTAINERPICKUPDATE'){ ?>  
                                 <td><a href="<?php echo base_url('Cinvoice/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td> 
                              <?php }else if($status === 'TRUCKINGDELIVERYDATE'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php } ?>

                              <?php if($status === 'NewSaleETD'){ ?>
                                 <td><?php echo $value->etd; ?></td>
                              <?php }else if($status === 'NewSaleETA'){ ?>
                                 <td><?php echo $value->eta; ?></td>
                              <?php }else if($status === 'NewSalePAYMENTDUEDATE'){ ?> 
                                 <td><?php echo $value->payment_due_date; ?></td> 
                              <?php }else if($status === 'OceanexporttrackingETD'){ ?>
                                 <td><?php echo $value->etd; ?></td> 
                              <?php }else if($status === 'ocean_export_tracking'){ ?> 
                                 <td><?php echo $value->eta; ?></td> 
                              <?php }else if($status === 'TRUCKINGCONTAINERPICKUPDATE'){ ?>  
                                 <td><?php echo $value->container_pickup_date; ?></td>  
                              <?php }else if($status === 'TRUCKINGDELIVERYDATE'){ ?>
                                 <td><?php echo $value->delivery_date; ?></td>  
                              <?php } ?>
                              
                           </tr>
                           <?php
                              $s++;
                              }
                              } elseif ($selecteddate === '1 Day Before' && !empty($yesterday)) {
                              $s = 1;
                              foreach ($yesterday as $key => $value) {
                              ?>
                           <tr>
                              <td><?php echo $s; ?></td>
                              <td style="display: none;"><input type="hidden" class="on_date" value="<?php echo $s; ?>" /></td>
                              
                              <?php if($status === 'NewSaleETD'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'NewSaleETA'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'NewSalePAYMENTDUEDATE'){ ?> 
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'OceanexporttrackingETD'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/ocean_export_tracking_update_form/'.$value->ocean_export_tracking_id) ?>"><?php echo $value->ocean_export_tracking_id; ?></a></td>
                              <?php }else if($status === 'ocean_export_tracking'){ ?> 
                                 <td><a href="<?php echo base_url('Cinvoice/ocean_export_tracking_update_form/'.$value->ocean_export_tracking_id) ?>"><?php echo $value->ocean_export_tracking_id; ?></a></td>
                              <?php }else if($status === 'TRUCKINGCONTAINERPICKUPDATE'){ ?>  
                                 <td><a href="<?php echo base_url('Cinvoice/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td> 
                              <?php }else if($status === 'TRUCKINGDELIVERYDATE'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php } ?>

                              <?php if($status === 'NewSaleETD'){ ?>
                                 <td><?php echo $value->etd; ?></td>
                              <?php }else if($status === 'NewSaleETA'){ ?>
                                 <td><?php echo $value->eta; ?></td>
                              <?php }else if($status === 'NewSalePAYMENTDUEDATE'){ ?> 
                                 <td><?php echo $value->payment_due_date; ?></td> 
                              <?php }else if($status === 'OceanexporttrackingETD'){ ?>
                                 <td><?php echo $value->etd; ?></td> 
                              <?php }else if($status === 'ocean_export_tracking'){ ?> 
                                 <td><?php echo $value->eta; ?></td> 
                              <?php }else if($status === 'TRUCKINGCONTAINERPICKUPDATE'){ ?>  
                                 <td><?php echo $value->container_pickup_date; ?></td>  
                              <?php }else if($status === 'TRUCKINGDELIVERYDATE'){ ?>
                                 <td><?php echo $value->delivery_date; ?></td>  
                              <?php } ?>
                           </tr>
                           <?php
                              $s++;
                              }
                              } elseif ($selecteddate === '3 Days Before' && !empty($threeDay)) {
                              $s = 1;
                              foreach ($threeDay as $key => $value) {
                              ?>
                           <tr>
                              <td><?php echo $s; ?></td>
                              <td style="display: none;"><input type="hidden" class="on_date" value="<?php echo $s; ?>" /></td>
                              
                              <?php if($status === 'NewSaleETD'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'NewSaleETA'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'NewSalePAYMENTDUEDATE'){ ?> 
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'OceanexporttrackingETD'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/ocean_export_tracking_update_form/'.$value->ocean_export_tracking_id) ?>"><?php echo $value->ocean_export_tracking_id; ?></a></td>
                              <?php }else if($status === 'ocean_export_tracking'){ ?> 
                                 <td><a href="<?php echo base_url('Cinvoice/ocean_export_tracking_update_form/'.$value->ocean_export_tracking_id) ?>"><?php echo $value->ocean_export_tracking_id; ?></a></td>
                              <?php }else if($status === 'TRUCKINGCONTAINERPICKUPDATE'){ ?>  
                                 <td><a href="<?php echo base_url('Cinvoice/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td> 
                              <?php }else if($status === 'TRUCKINGDELIVERYDATE'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php } ?>

                              <?php if($status === 'NewSaleETD'){ ?>
                                 <td><?php echo $value->etd; ?></td>
                              <?php }else if($status === 'NewSaleETA'){ ?>
                                 <td><?php echo $value->eta; ?></td>
                              <?php }else if($status === 'NewSalePAYMENTDUEDATE'){ ?> 
                                 <td><?php echo $value->payment_due_date; ?></td> 
                              <?php }else if($status === 'OceanexporttrackingETD'){ ?>
                                 <td><?php echo $value->etd; ?></td> 
                              <?php }else if($status === 'ocean_export_tracking'){ ?> 
                                 <td><?php echo $value->eta; ?></td> 
                              <?php }else if($status === 'TRUCKINGCONTAINERPICKUPDATE'){ ?>  
                                 <td><?php echo $value->container_pickup_date; ?></td>  
                              <?php }else if($status === 'TRUCKINGDELIVERYDATE'){ ?>
                                 <td><?php echo $value->delivery_date; ?></td>  
                              <?php } ?>
                           </tr>
                           <?php
                              $s++;
                              }
                              } elseif ($selecteddate === '7 Days Before' && !empty($sevenDay)) {
                              $s = 1;
                              foreach ($sevenDay as $key => $value) {
                              ?>
                           <tr>
                              <td><?php echo $s; ?></td>
                              <td style="display: none;"><input type="hidden" class="on_date" value="<?php echo $s; ?>" /></td>
                              
                              <?php if($status === 'NewSaleETD'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'NewSaleETA'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'NewSalePAYMENTDUEDATE'){ ?> 
                                 <td><a href="<?php echo base_url('Cinvoice/invoice_update_form/'.$value->invoice_id) ?>"><?php echo $value->invoice_id; ?></a></td>
                              <?php }else if($status === 'OceanexporttrackingETD'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/ocean_export_tracking_update_form/'.$value->ocean_export_tracking_id) ?>"><?php echo $value->ocean_export_tracking_id; ?></a></td>
                              <?php }else if($status === 'ocean_export_tracking'){ ?> 
                                 <td><a href="<?php echo base_url('Cinvoice/ocean_export_tracking_update_form/'.$value->ocean_export_tracking_id) ?>"><?php echo $value->ocean_export_tracking_id; ?></a></td>
                              <?php }else if($status === 'TRUCKINGCONTAINERPICKUPDATE'){ ?>  
                                 <td><a href="<?php echo base_url('Cinvoice/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td> 
                              <?php }else if($status === 'TRUCKINGDELIVERYDATE'){ ?>
                                 <td><a href="<?php echo base_url('Cinvoice/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php } ?>

                              <?php if($status === 'NewSaleETD'){ ?>
                                 <td><?php echo $value->etd; ?></td>
                              <?php }else if($status === 'NewSaleETA'){ ?>
                                 <td><?php echo $value->eta; ?></td>
                              <?php }else if($status === 'NewSalePAYMENTDUEDATE'){ ?> 
                                 <td><?php echo $value->payment_due_date; ?></td> 
                              <?php }else if($status === 'OceanexporttrackingETD'){ ?>
                                 <td><?php echo $value->etd; ?></td> 
                              <?php }else if($status === 'ocean_export_tracking'){ ?> 
                                 <td><?php echo $value->eta; ?></td> 
                              <?php }else if($status === 'TRUCKINGCONTAINERPICKUPDATE'){ ?>  
                                 <td><?php echo $value->container_pickup_date; ?></td>  
                              <?php }else if($status === 'TRUCKINGDELIVERYDATE'){ ?>
                                 <td><?php echo $value->delivery_date; ?></td>  
                              <?php } ?>
                           </tr>
                           <?php
                              $s++;
                              }
                              } else {
                              ?>
                           <tr>
                              <td colspan="3" class="text-center">No alert notifications found.</td>
                           </tr>
                           <?php
                              }
                           ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>

       <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>Expense Alerts</h4>
                  </div>
                  </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="myTable">
                        <thead>
                           <tr>
                              <th>S.NO</th>
                              <th>Purchase ID</th>
                              <th>Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if ($selecteddates === 'On Date' && !empty($todays)) {
                              $s = 1;
                              foreach ($todays as $key => $value) {
                           ?>
                           <tr>
                              <td><?php echo $s; ?></td>
                              <td style="display: none;"><input type="hidden" class="on_date" value="<?php echo $s; ?>" /></td>
                              
                              <?php if($statuses === 'PaymentDuedate'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/purchase_update_form/'.$value->purchase_id) ?>"><?php echo $value->purchase_id; ?></a></td>
                              <?php }else if($statuses === 'Estshipmentdate'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/purchase_update_form/'.$value->purchase_id) ?>"><?php echo $value->purchase_id; ?></a></td>
                              <?php }else if($statuses === 'oceanimportETA'){ ?> 
                                 <td><a href="<?php echo base_url('Cpurchase/ocean_import_tracking_update_form/'.$value->ocean_import_tracking_id) ?>"><?php echo $value->ocean_import_tracking_id; ?></a></td>
                              <?php }else if($statuses === 'oceanimportETD'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/ocean_import_tracking_update_form/'.$value->ocean_import_tracking_id) ?>"><?php echo $value->ocean_import_tracking_id; ?></a></td>
                              <?php }else if($statuses === 'ContainerGoodspickupdate'){ ?> 
                                 <td><a href="<?php echo base_url('Ccpurchase/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php }else if($statuses === 'DELIVERYDATE'){ ?>  
                                 <td><a href="<?php echo base_url('Ccpurchase/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php } ?>

                              <?php if($statuses === 'PaymentDuedate'){ ?>
                                 <td><?php echo $value->payment_due_date; ?></td>
                              <?php }else if($statuses === 'Estshipmentdate'){ ?>
                                 <td><?php echo $value->etd; ?></td>
                              <?php }else if($statuses === 'oceanimportETA'){ ?> 
                                 <td><?php echo $value->eta; ?></td> 
                              <?php }else if($statuses === 'oceanimportETD'){ ?>
                                 <td><?php echo $value->etd; ?></td> 
                              <?php }else if($statuses === 'ContainerGoodspickupdate'){ ?> 
                                 <td><?php echo $value->container_pickup_date; ?></td> 
                              <?php }else if($statuses === 'DELIVERYDATE'){ ?>  
                                 <td><?php echo $value->delivery_date; ?></td>  
                              <?php } ?>
                              
                           </tr>
                           <?php
                              $s++;
                              }
                              } elseif ($selecteddates === '1 Day Before' && !empty($yesterdays)) {
                              $s = 1;
                              foreach ($yesterdays as $key => $value) {
                              ?>
                           <tr>
                              <td><?php echo $s; ?></td>
                              <td style="display: none;"><input type="hidden" class="on_date" value="<?php echo $s; ?>" /></td>
                              
                              <?php if($statuses === 'PaymentDuedate'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/purchase_update_form/'.$value->purchase_id) ?>"><?php echo $value->purchase_id; ?></a></td>
                              <?php }else if($statuses === 'Estshipmentdate'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/purchase_update_form/'.$value->purchase_id) ?>"><?php echo $value->purchase_id; ?></a></td>
                              <?php }else if($statuses === 'oceanimportETA'){ ?> 
                                 <td><a href="<?php echo base_url('Cpurchase/ocean_import_tracking_update_form/'.$value->ocean_import_tracking_id) ?>"><?php echo $value->ocean_import_tracking_id; ?></a></td>
                              <?php }else if($statuses === 'oceanimportETD'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/ocean_import_tracking_update_form/'.$value->ocean_import_tracking_id) ?>"><?php echo $value->ocean_import_tracking_id; ?></a></td>
                              <?php }else if($statuses === 'ContainerGoodspickupdate'){ ?> 
                                 <td><a href="<?php echo base_url('Ccpurchase/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php }else if($statuses === 'DELIVERYDATE'){ ?>  
                                 <td><a href="<?php echo base_url('Ccpurchase/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php } ?>

                              <?php if($statuses === 'PaymentDuedate'){ ?>
                                 <td><?php echo $value->payment_due_date; ?></td>
                              <?php }else if($statuses === 'Estshipmentdate'){ ?>
                                 <td><?php echo $value->etd; ?></td>
                              <?php }else if($statuses === 'oceanimportETA'){ ?> 
                                 <td><?php echo $value->eta; ?></td> 
                              <?php }else if($statuses === 'oceanimportETD'){ ?>
                                 <td><?php echo $value->etd; ?></td> 
                              <?php }else if($statuses === 'ContainerGoodspickupdate'){ ?> 
                                 <td><?php echo $value->container_pickup_date; ?></td> 
                              <?php }else if($statuses === 'DELIVERYDATE'){ ?>  
                                 <td><?php echo $value->delivery_date; ?></td>  
                              <?php } ?>
                           </tr>
                           <?php
                              $s++;
                              }
                              } elseif ($selecteddates === '3 Days Before' && !empty($threeDays)) {
                              $s = 1;
                              foreach ($threeDays as $key => $value) {
                              ?>
                           <tr>
                             <td><?php echo $s; ?></td>
                              <td style="display: none;"><input type="hidden" class="on_date" value="<?php echo $s; ?>" /></td>
                              
                             <?php if($statuses === 'PaymentDuedate'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/purchase_update_form/'.$value->purchase_id) ?>"><?php echo $value->purchase_id; ?></a></td>
                              <?php }else if($statuses === 'Estshipmentdate'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/purchase_update_form/'.$value->purchase_id) ?>"><?php echo $value->purchase_id; ?></a></td>
                              <?php }else if($statuses === 'oceanimportETA'){ ?> 
                                 <td><a href="<?php echo base_url('Cpurchase/ocean_import_tracking_update_form/'.$value->ocean_import_tracking_id) ?>"><?php echo $value->ocean_import_tracking_id; ?></a></td>
                              <?php }else if($statuses === 'oceanimportETD'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/ocean_import_tracking_update_form/'.$value->ocean_import_tracking_id) ?>"><?php echo $value->ocean_import_tracking_id; ?></a></td>
                              <?php }else if($statuses === 'ContainerGoodspickupdate'){ ?> 
                                 <td><a href="<?php echo base_url('Ccpurchase/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php }else if($statuses === 'DELIVERYDATE'){ ?>  
                                 <td><a href="<?php echo base_url('Ccpurchase/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php } ?>

                              <?php if($statuses === 'PaymentDuedate'){ ?>
                                 <td><?php echo $value->payment_due_date; ?></td>
                              <?php }else if($statuses === 'Estshipmentdate'){ ?>
                                 <td><?php echo $value->etd; ?></td>
                              <?php }else if($statuses === 'oceanimportETA'){ ?> 
                                 <td><?php echo $value->eta; ?></td> 
                              <?php }else if($statuses === 'oceanimportETD'){ ?>
                                 <td><?php echo $value->etd; ?></td> 
                              <?php }else if($statuses === 'ContainerGoodspickupdate'){ ?> 
                                 <td><?php echo $value->container_pickup_date; ?></td> 
                              <?php }else if($statuses === 'DELIVERYDATE'){ ?>  
                                 <td><?php echo $value->delivery_date; ?></td>  
                              <?php } ?>
                           </tr>
                           <?php
                              $s++;
                              }
                              } elseif ($selecteddates === '7 Days Before' && !empty($sevenDays)) {
                              $s = 1;
                              foreach ($sevenDays as $key => $value) {
                              ?>
                           <tr>
                              <td><?php echo $s; ?></td>
                              <td style="display: none;"><input type="hidden" class="on_date" value="<?php echo $s; ?>" /></td>
                              
                              <!-- <td><a href="<?php echo base_url('Cpurchase/purchase_update_form/'.$value->purchase_id) ?>"><?php echo $value->purchase_id; ?></a></td> -->

                              <?php if($statuses === 'PaymentDuedate'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/purchase_update_form/'.$value->purchase_id) ?>"><?php echo $value->purchase_id; ?></a></td>
                              <?php }else if($statuses === 'Estshipmentdate'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/purchase_update_form/'.$value->purchase_id) ?>"><?php echo $value->purchase_id; ?></a></td>
                              <?php }else if($statuses === 'oceanimportETA'){ ?> 
                                 <td><a href="<?php echo base_url('Cpurchase/ocean_import_tracking_update_form/'.$value->ocean_import_tracking_id) ?>"><?php echo $value->ocean_import_tracking_id; ?></a></td>
                              <?php }else if($statuses === 'oceanimportETD'){ ?>
                                 <td><a href="<?php echo base_url('Cpurchase/ocean_import_tracking_update_form/'.$value->ocean_import_tracking_id) ?>"><?php echo $value->ocean_import_tracking_id; ?></a></td>
                              <?php }else if($statuses === 'ContainerGoodspickupdate'){ ?> 
                                 <td><a href="<?php echo base_url('Ccpurchase/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php }else if($statuses === 'DELIVERYDATE'){ ?>  
                                 <td><a href="<?php echo base_url('Ccpurchase/trucking_update_form/'.$value->trucking_id) ?>"><?php echo $value->trucking_id; ?></a></td>
                              <?php } ?>

                              <?php if($statuses === 'PaymentDuedate'){ ?>
                                 <td><?php echo $value->payment_due_date; ?></td>
                              <?php }else if($statuses === 'Estshipmentdate'){ ?>
                                 <td><?php echo $value->etd; ?></td>
                              <?php }else if($statuses === 'oceanimportETA'){ ?> 
                                 <td><?php echo $value->eta; ?></td> 
                              <?php }else if($statuses === 'oceanimportETD'){ ?>
                                 <td><?php echo $value->etd; ?></td> 
                              <?php }else if($statuses === 'ContainerGoodspickupdate'){ ?> 
                                 <td><?php echo $value->container_pickup_date; ?></td> 
                              <?php }else if($statuses === 'DELIVERYDATE'){ ?>  
                                 <td><?php echo $value->delivery_date; ?></td>  
                              <?php } ?>
                           </tr>
                           <?php
                              $s++;
                              }
                              } else {
                              ?>
                           <tr>
                              <td colspan="3" class="text-center">No alert notifications found.</td>
                           </tr>
                           <?php
                              }
                           ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

</div>
<style type="text/css">
   .content-header{
   padding: 25px 30px !important;
   }
   .pe-7s-note2:before{
   font-size: 45px;
   position: relative;
   bottom: 18px;
   }
   a:focus{
      color: #000 !important;
   }
</style>

<script>
   $(document).ready(function() {
      var count_value = $('.on_date').val();
       if (count_value !== '') {
         $("#total-alerts").append(count_value);
       } else {
         $("#total-alerts").text('0');
       }
   });
</script>

<!-- <script>
    var table = document.getElementById("myTable");
    var trCount = 0;
    var trElements = table.getElementsByTagName("tr");
    trCount = trElements.length;
    document.getElementById('total-alerts').innerText = trCount;
    console.log("Number of <tr> elements: " + trCount);
</script> -->