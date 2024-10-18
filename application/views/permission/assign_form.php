<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
  background-color: #4B9CDB;
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
    background-color: #F5634A;
    width: 170px;
  }
}
.select2{
    display:none;
}
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
       <ol class="breadcrumb"   style=" border: 3px solid #D7D4D6;"   >
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('permission') ?></a></li>
            <li class="active" style="color:orange;"><?php echo $title ?></li>
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
      <div class="row" style="display:flex; justify-content: center;">
         <div class="col-sm-10">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                  </div>
               </div>
               <div class="panel-body">
                  <?php echo form_open("Permission/usercreate") ?>
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="blood">
                              <?php echo display('user') ?> *
                              </label>
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
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="blood" class="col-sm-3 col-form-label">
                              <?php echo display('role_name') ?> *
                              </label>
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
                     </div>
                     
                    <div class="row">
                        <div class="col-md-6">
                           <button type="reset" class="btnclr btn  m-b-5 m-r-2"  ><?php echo display('reset') ?></button>
                           <button type="submit" class="btnclr btn  m-b-5 m-r-2"  ><?php echo display('save') ?></button>  
                        </div>
                        <div class="col-md-12">
                            <!--<h4><?php //echo display('exsisting_role') ?></h4>-->
                            <div id="existrole">
                            </div>
                        </div>
                    </div>
                  </div>
                  <?php echo form_close() ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>