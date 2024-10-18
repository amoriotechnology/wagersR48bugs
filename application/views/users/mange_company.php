<?php error_reporting(1); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">





<!-- Add User start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Manage Company</h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active" style="color:orange;">Add Admin</li>
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

        

        <div class='row'> 
                    
        </div>
        <!-- New user -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
              

                    <div class="panel-heading">
                    <div class="row">
            <div class="col-sm-12">
              
                  <a href="<?php echo base_url('User/index')?>" style="color:white;background-color:#38469f;" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>Add Company</a>
              
            </div>
        </div>

                    </div>
                    
                    <div class="panel-body">
                   <table class="table table-striped">
                 <?php    if($company_info){ ?>
                       <tr>
                           <th>Sno</th>
                           <th>company_name</th>
                           <th>Email</th>
                           <th>Address</th>
                           <th>Mobile</th>
                           <th>Website</th>
                           <th>Status</th>
                           <th>change</th>      
                          
                       </tr>
               <?php } ?>

                   <?php 

if($company_info){
                  for($i=0;$i<count($company_info);$i++)
                  {
                    $j=$i+1;
                     ?>
                   <tr>
                      <td><?php echo $i+1; ?></td>
                        <td><?php echo $company_info[$i]['company_name']; ?></td>
                          <td><?php echo $company_info[$i]['email']; ?></td>
                           <td><?php echo $company_info[$i]['address']; ?></td>
                           <td><?php echo $company_info[$i]['mobile']; ?></td>
                           <td><?php echo $company_info[$i]['website']; ?></td>
                           <td><?php  if($company_info[$i]['status']==0)
                           {
                            echo '<i style="color:red;font-size:16px;">Deactive</i>';
                           }
                           else
                           {
                            echo '<i style="color:Green;font-size:16px;">Active</i>';  
                           }

                            ?></td>
                           <td>
                            <?php 
                             $cid=$company_info[$i]["company_id"];
                             if($company_info[$i]['status']==0)
                            {
                              
                             ?>
                            
                            <a href="<?php echo base_url('user/chnage_company_status/1/').$cid; ?>" class="btn btn-success" style="background:green;" style='
                                font-size: 10px;
                                '>Active</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('user/chnage_company_status/0/').$cid; ?>" class="btn btn-danger" style='
                                font-size: 10px;
                                '>Deactive</a>
                        <?php }  ?>
                            </td>   
                           

                </tr>
                       <?php }} else{
                        echo "No Results Found";
                       }
                        ?>
                   </table>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit user end -->



