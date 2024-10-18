
<?php  error_reporting(1); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<!-- Add new role start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo "Create Role Permission" ?></h1>
            <small></small>
            <ol class="breadcrumb">
                <!-- <li><a href="#"><i class="pe-7s-home"></i> <?php //home</a></li>
                // <li><a href="#"><?php   ech permission  ?>/a></li>
                <li class="active"><?php //echo $title ?></li> -->

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('permission') ?></a></li>
                <li class="active" style="color:orange"><?php  echo "Role Permission" ?></li>

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
                     <?php echo form_open("Permission/insert_rolepermission/") ?>
                    <div class="panel-body">
                         <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label"><?php echo display('role_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="rolename" id="type" placeholder="<?php echo display('role_name') ?>" required />
                            </div>
                        </div>





                        <div class="panel-body">

<div class="table-responsive">
<table id="" class="table table-bordered table-striped table-hover">
   <thead>
   <tr>
       <th style="text-align: center;     width: 50%;"><?php echo ('Name') ?></th>
       <th style="text-align: center;"><?php echo ('Access Permission') ?> </th>
     
        <!-- <th width="130"><?php echo display('action') ?></th> -->
    
   </tr>
   </thead>
<tbody>



<!-- <?php// print_r($accounts); ?> -->


        <table class="table table-striped">
             <?php
            $m=0;



            foreach($accounts as $key=>$value2) {          
                ?>  
                    
                    <tr style="text-align: center;">                     <td ><?php echo display($value2['name']);?></td>
                      <td><input type="checkbox" name="<?php echo display($value2['name']);?>_create"> </td>
                      <!-- <td><input type="checkbox" name="<?php echo display($value['name']);?>_create"><?php echo ('read') ?>_read</td>  -->
                      <!-- <td><input type="checkbox" name="<?php echo display($value['name']);?>_delete"><?php echo display('Delete') ?></td> 
                      <td><input type="checkbox" name="<?php echo display($value['name']);?>_update"><?php echo display('Update') ?></td>  -->

                   </tr>
 
                    <?php $sl = 0 ?>
                <?php $m++; } ?>
                </table>






                <div class="form-group text-right">
                <button type="reset" class="btnclr btn  btn-sm" style="background-color: #3CA5DE;" ><?php echo display('reset') ?></button>
                <button type="submit"  class="btnclr btn  btn-sm" style="background-color: #3CA5DE;" ><?php echo display('save') ?></button>

               

            </div>
            <?php echo form_close() ?>
                    </div>
                   
                </div>
            </div>
        </div>

    </section>
</div>
<!-- Add new role end -->





