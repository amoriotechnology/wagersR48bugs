<!-- Manage Language Start -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" /> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo  ('Manage Import CSV') ?></h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('Home') ?></a></li>
                <li><a href="#"><?php echo  ('Import CSV') ?></a></li>
                <li class="active" style="color:orange"><?php echo  ('Manage Import CSV') ?></li>
            </ol>
        </div>
    </section>
<style>
    th{
        text-align:center;
    }
    </style>
    <section class="content">
        <!-- Manage Language -->

        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
        ?>
        <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message ?>                    
        </div>
        <?php 
            }
        ?>

        <div class="row">
            <div class="col-sm-12"> 
                <?php if($this->permission1->method('add_language','create')->access()){?>
                <a href="<?php echo  base_url('Language/phrase') ?>" class="btn btn-info"><?php echo display('Add Phrase') ?></a>
            <?php }?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample3" style="text-align:center;" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr>
                                    
                                    </tr>


                                    <!-- <tr style="background-color: #337AB7;border-color: #2E6DA4;color:white;"> -->
                                        <!-- <th><?php echo  ('Sales') ?></th> -->
                                        <!-- <th><i class="fa fa-cogs"></i></th> -->
                                        <!-- <th><i class="fa fa-th-list"></i></th> -->

                                    <!-- </tr> -->
                                </thead>


                                <tbody>

                                 


                                            <!-- <tr>
                                            <td><?php echo 'Create Invoice'; ?>    </td><td>link</td>
                                            
                                            </tr>
                                            <tr>
                                            <td><?php echo 'Quote'; ?></td><td>link</td>
                                            </tr>
                                            </tr>
                                            <td><?php echo 'Ocean Export Tracking'; ?></td><td>link</td>
                                            </tr>
                                            <tr>
                                            <td><?php echo 'Road Transport'; ?></td><td>link</td>
 
                                            </tr>
                                            
                                            <th><?php echo  ('Customer') ?></th>
                                            <th><i class="fa fa-th-list"></i></th>

                                            <tr>
                                            <td><?php echo 'Customer'; ?>    </td><td>link</td>
                                            
                                            </tr>


                                            <th><?php echo  ('Product') ?></th>
                                            <th><i class="fa fa-th-list"></i></th>

                                            <tr>
                                            <td><?php echo 'Product'; ?>    </td><td>link</td>
                                            
                                            </tr>

                                            <th><?php echo  ('Vendor') ?></th>
                                            <th><i class="fa fa-th-list"></i></th>

                                            <tr>
                                            <td><?php echo 'Vendor'; ?>    </td><td>link</td>
                                            
                                            </tr>


                                            <th><?php echo  ('Expenses') ?></th>
                                            <th><i class="fa fa-th-list"></i></th>

                                            <tr>
                                            <td><?php echo 'Product Supplier'; ?>    </td><td>link</td>
                                            
                                            </tr>
                                            <tr>
                                            <td><?php echo 'Purchase Order'; ?></td><td>link</td>
                                            </tr>
                                            </tr>
                                            <td><?php echo 'Ocean Import Tracking'; ?></td><td>link</td>
                                            </tr>
                                            <tr>
                                            <td><?php echo 'Road Transport'; ?></td><td>link</td>
 
                                            </tr>

 -->






                            <table style="margin-left: 350px;width: 900px;text-align:center;height:250px;">
  <tr>
  <th><?php echo  ('Import Csv') ?></th>
  <th><?php echo  ('Link') ?></th>

   </tr>



  <tr>
    <td rowspan="2">Sales</td>
    <td style="text-align: center;">
    
    <a href="<?php echo base_url(); ?>/Cinvoice/add_product_csv"><?php  echo ('Create Invoice'); ?> </a>

   </td>
  </tr>


  <tr>
  <td style="text-align: center;">
  
  <a href="<?php echo base_url(); ?>/Cinvoice/add_profarma_product_csv"><?php  echo ('Quote'); ?> </a>

  </td>
  </tr>


 
 
  <tr>
  <td><?php echo  ('Customer') ?></td>
  <td style="text-align: center;">
  
  
    <a href="<?php echo base_url(); ?>/Ccustomer/add_customer_csv"><?php  echo ('Customer'); ?> </a>

  </td>
   </tr>

   <tr>
  <td><?php echo  ('Product') ?></td>
  <td style="text-align: center;">
  
  <a href="<?php echo base_url(); ?>/Cproduct/add_product_csv"><?php  echo ('Product'); ?> </a>

</td>
   </tr>

   <tr>
  <td><?php echo  ('Vendor') ?></td>
  <td style="text-align: center;">
      
        <a href="<?php echo base_url(); ?>/Csupplier/add_vendor_csv"><?php  echo ('Vendor'); ?> </a>

       </td>
   </tr>

 
  <tr>
    <td rowspan="3">Expenses</td>
    <td   colspan="2"  style="text-align: center;">
    <!-- Create Expense -->
    
    <a href="<?php echo base_url(); ?>/Cpurchase/add_csv_product"><?php  echo ('Product Supplier'); ?> </a>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     | &nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;         <a href="<?php echo base_url(); ?>/Cpurchase/add_csv_serviceprovider"><?php  echo ('Service Provider'); ?> </a>


  </td>
  
  </tr>
  <tr>
  <td style="text-align: center;">
  <a href="<?php echo base_url(); ?>/Cpurchase/add_csv_purchase"><?php  echo ('Purchase Order'); ?> </a>

  </td>
  </tr>
   
   





 



</tbody>                   
                        
</table>







                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Manage Language End -->



<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>