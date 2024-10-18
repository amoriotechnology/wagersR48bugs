

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<style>
    
.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

</style>

<!-- Add new role start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo $title ?></h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('permission') ?></a></li>
                <li class="active" style="color:orange;"><?php echo $title ?></li>
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



        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">


                    



                        <div class="panel-title">
                        </div>
                    </div>
                     <?php echo form_open("Permission/create/") ?>
                    <div class="panel-body">
                         <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label"><?php echo display('role_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="rolename" id="type" placeholder="<?php echo display('role_name') ?>" required />
                            </div>
                        </div>
                        <table class="table table-striped">
             <?php
            $m=0;

            $sales = "";
            $expense = "expense";
            foreach($accounts as $key=>$value) {
           
                ?>
                
                    
                    <tr>  
                          <td><?php echo display($value['name']);?></td>
                          <td><input type="checkbox" name="<?php echo display($value['name']);?>_create">&nbsp;<?php echo display('Create') ?>
                          <?php   if($value['name'] == $sales  ){ ?>
                          <div> <input type="checkbox" name="<?php echo  $sales;?>_price" >&nbsp;<?php echo "Price Adjustment" ?> </div> 
                          </td> <?php } ?>
                          <?php   if($value['name'] ==$expense  ){ ?>
                          <div> <input type="checkbox" name="<?php echo $expense
                          
                        
                          ;?>_price" >&nbsp;<?php echo "Price Adjustment" ?> </div> 
                          </td> <?php } ?>
                          <td><input type="checkbox" name="<?php echo display($value['name']);?>_update">&nbsp;<?php echo display('Update') ?></td> 
                          <td><input type="checkbox" name="<?php echo display($value['name']);?>_delete">&nbsp;<?php echo display('Delete') ?></td> 

                   </tr>
                        
                   
              
                    
                    <?php $sl = 0 ?>
                
           
                <?php $m++; } ?>
                </table>

                <br>

                <div class="form-group text-left">
                <button type="reset" class="btnclr btn  m-b-5 m-r-2"  ><?php echo display('reset') ?></button>
                <button type="submit"  class="btnclr btn  m-b-5 m-r-2"   ><?php echo display('save') ?></button>

               

            </div>
            <?php echo form_close() ?>
                    </div>
                   
                </div>
            </div>
        </div>

    </section>
</div>
<!-- Add new role end -->


