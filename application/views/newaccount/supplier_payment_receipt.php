<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>
<!--its for pos style css start--> 



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('supplier_payment') ?></h1>
            <small><?php //echo display('supplier_payment') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange"><?php echo display('supplier_payment') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
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
        <div class="row">
             <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <div class="panel panel-bd">
                    <div id="printableArea">
                        <div class="panel-body">
                            <div bgcolor='#e4e4e4' text='#ff6633' link='#666666' vlink='#666666' alink='#ff6633' class="phdiv" >
                              <table border="0" cellpadding="0" cellspacing="0" style="width:50%;float:left">
                                <tbody>
                                    <tr><td>    <date>
                                                       <span style="font-weight:bold;"> <?php echo  display('date')?>:</span> <?php echo  html_escape($payment_info[0]['VDate'])?> 
                                                    </date></td></tr>
                                                    <tr><td>&nbsp;</td></tr>
                                                    <tr>
                                                         <td style="font-weight:bold;">Company Information :</td>
                                                    </tr>
                                <tr>
                                                   <td align="left">
                                                        {company_info}
                                                        <span class="company-txt">
                                                            {company_name}
                                                        </span><br>
                                                        {address}<br>
                                                        {mobile}<br>
                                                        {/company_info}
                                                        
                                                    </td>
                                                </tr>
                              <tbody>
    </table>

    <table border="0" cellpadding="0" cellspacing="0" style="width:50%;float:left">
<tbody>
    <tr><td> &nbsp;  </td></tr> <tr><td> &nbsp;  </td></tr>
       <tr>
                                                         <td style="font-weight:bold;">Supplier Information :</td>
                                                    </tr>                                             
<tr>
                            <td align="left"><b><?php echo  html_escape($supplier_info[0]['supplier_name']);?></b><br>
                                <?php if ($supplier_info[0]['address']) { ?>
                                    <?php echo  html_escape($supplier_info[0]['address']);?><br>
                                <?php } ?>
                                <?php if ($supplier_info[0]['mobile']) { ?>
                                   <?php echo  html_escape($supplier_info[0]['mobile']);?>
                                <?php } ?>
                            </td>
                                                </tr>
</tbody>
</table>
                            
                            
              
                            
                      
                            <table border="0" width="100%">
                              <tr>
                                       
                                        <td class="text-left">&nbsp;</td>
                                    </tr>
                                    <tr>
                                       
                                        <td class="text-left"><span style="font-weight:bold;"><?php echo display('voucher_no'); ?> : </span> <?php echo  html_escape($payment_info[0]['VNo'])?></td>
                                    <td class="text-left"><span style="font-weight:bold;"><?php echo display('payment_type'); ?> :</span> <?php echo  'Payment';?></td>
                                    </tr>
                                    <tr>
                                    <td class="text-left"><span style="font-weight:bold;"><?php echo display('amount'); ?> :</span> <?php echo  html_escape($payment_info[0]['Debit']);?></td>
                                     <td> <span style="font-weight:bold;"><?php echo display('paid_by')?>: </span><?php echo  $this->session->userdata('u_name');?>
</td>
                                    </tr>
                                

                                     <tr>
                                <td>&nbsp;</td>    
                                   
                                </tr>
                                                                     <tr>
                                    <td class="text-left"><span style="font-weight:bold;"><?php echo display('remark'); ?> : </span><?php echo  html_escape($payment_info[0]['Narration']);?></td>
                </tr>
                                </tr>
                                 <tr>
                                <td>&nbsp;</td>    
                                   
                                </tr>
                                    <tr>
                                   
                                 <td>&nbsp;</td>
                                    
                                       <td >  <div  class="psigpart">
                                       <span style="font-weight:bold;"> <?php echo display('signature');  ?>:</span>
                                          
                                    </div></td>
                                    </tr>
                                <!-- <tr>{company_info}
                                    <td>Powered  By: <a href="{website}">{company_name}</a></td>
                                     {/company_info}
                                </tr> -->
                                 <tr>
                                <td>&nbsp;</td>    
                                   
                                </tr>
                                </table>


                            </div>


                        </div>
                          <div class="col-sm-2"></div>
                    </div>

                    <div class="panel-footer text-left">
                        <a  class="btn btn-danger" href="<?php echo base_url('accounts/supplier_payment'); ?>"><?php echo display('cancel') ?></a>
                        <a  class="btn btn-info" href="#" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></a>

                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

