<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>


<style>

#select2-selection__placeholder{
  display:none;
}
#select2-search__field{
 display:none;
}

.select2-selection__placeholder{
    display:none;

}
.select2-user_type-container{
    display:none;
   
}
</style>
<!-- Add new customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('User assign role') ?></h1>
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
                   
                    <div class="panel-body">

                     <?php echo form_open("Permission/usercreate") ?>
                    <div class="form-group row">
                        <label for="blood" class="col-sm-3 col-form-label">
                            <?php echo display('user') ?> *
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control" name="user_id" id="user_type" onchange="userRole(this.value)">
                                <option value=""><?php echo display('select_one') ?></option>
                                <?php
                                foreach($user as $udata){
                                    ?>
                                    <option value="<?php echo $udata['user_id'] ?>"><?php echo $udata['first_name'].' '.$udata['last_name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                     </div>

                    <div class="form-group row">
                        <label for="blood" class="col-sm-3 col-form-label">
                            <?php echo display('role_name') ?> *
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control" name="user_type" id="user_type">
                                <option value=""><?php echo display('select_one') ?></option>
                                <?php
                                foreach($user_list as $data){
                                    ?>
                                    <option value="<?php echo $data['id'] ?>"><?php echo $data['type'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3><?php echo display('exsisting_role') ?></h3>
                        <div id="existrole">

                        </div>
                        
                    </div>
               
                        <div class="form-group row text-left">
                              <div class="col-md-12">
                            <button type="reset" class="btn  m-b-5 m-r-2" style="color:white;background-color: #38469f;"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn  m-b-5 m-r-2" style="color:white;background-color: #38469f;"><?php echo display('save') ?></button>
                            </div>
                        </div>
                    <?php echo form_close() ?>
                    </div>
                   
                </div>
            </div>
        </div>

    </section>
</div>


