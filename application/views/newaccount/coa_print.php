<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />


<?php
include ('Class/CConManager.php');
include ('Class/Ccommon.php');
include ('Class/CResult.php');
include ('Class/CAccount.php'); 
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('coa_print') ?></h1>
            <small><?php //echo display('coa_print') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('coa_print') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
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
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-body"  id="printArea">
                    <table class="print-table" width="100%">
                                                
                                                <tr>
                                                    <td align="left" class="print-table-tr">
                                                    <img src="<?php echo  base_url().$logo; ?>"   style='width: 90px;'  />

                                                    </td>
                                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                         


                                                        <h3> <?php echo $company; ?> </h3>
                                                         <h4></b><?php echo $address; ?> </h4>
                                                         <h4></b><?php echo $email; ?> </h4>
                                                         <h4></b><?php echo $phone; ?> </h4>








                                                    </td>
                                                   
                                                     <td align="right" class="print-table-tr">
                                                        <date>
                                                                                     <?php echo display('date')?>: <?php
                                                        echo date('d-M-Y');
                                                        ?> 
                                                    </date>
                                                    </td>
                                                </tr>            
                                   
                                </table>
                        <table class="table text-left" cellpadding="0" cellspacing="0" border="1px solid #000" width="100%">
                            <?php
                            $oResult=new CResult();
                            $oAccount=new CAccount();

                            $sql="SELECT * FROM acc_coa WHERE IsActive=1 ORDER BY HeadCode";
                            $oResult=$oAccount->SqlQuery($sql);
                            for ($i = 0; $i < $oResult->num_rows; $i++)
                            {
                                $sql="SELECT MAX(HeadLevel) as MHL FROM acc_coa WHERE IsActive=1"  ;
                            
                                // $this->db->where('CreateBy', $this->session->userdata('id')) ;

                                $oResultLevel=$oAccount->SqlQuery($sql);
                                $maxLevel=$oResultLevel->row['MHL'];

                                $HL=$oResult->rows[$i]['HeadLevel'];
                                $Level=$maxLevel+1;
                                $HL1=$Level-$HL;

                                echo '<tr>';
                                for($j=0; $j<$HL; $j++)
                                {
                                    echo '<td>&nbsp;</td>';
                                }
                                echo '<td>'.$oResult->rows[$i]['HeadCode'].'</td>';
                                echo '<td colspan='.$HL1.'>'.$oResult->rows[$i]['HeadName'].'</td>';
                                echo '</tr>';

                            }
                            ?>
                        </table>

                    </div>
                    <div class="text-center" id="print">
                        <input type="button" class="btn btnclr" name="btnPrint" id="btnPrint" value="Print" onclick="printDiv('printArea');"/>
                    </div>
                </div>
            </div>
        
    </div>
</div>
</section>
</div>