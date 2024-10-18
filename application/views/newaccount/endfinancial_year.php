<script src="<?php echo base_url() ?>assets/js/financial_year.js" type="text/javascript"></script>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo "Financial Year End"; ?></h1>
            <small><?php //echo "Vocher Report"; ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo "Accounts"; ?></a></li>
                <li class="active" style="color:orange"><?php echo "Financial Year End"; ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable" style="color:white;background-color:#38469f;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable" style="color:white;background-color:#38469f;font-weight:bold;">
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
                <div class="panel-title">
                    <h4>

                    </h4>
                </div>
            </div>
            <div class="panel-body" style="text-align:center;">

            
                <div class="row" id="">
                     <div class="col-sm-4"></div>
                    <div class="col-sm-4" style="text-align:center;">
  <p class="alert autoupdate-error-message" id="errormsg">You can end Financial Year at the end of
                        Financial Year. If you end Financial year Your all closing balance will be added in opening
                            Balance for new Financial year</p>
                         <input type="hidden" value="" id="finid">
               <input type="button" id="add_year" class="btn btn-danger btn-sm form-control"
                            value="End Your Financial Year" onclick="yearending()">
                    </div>
                        <div class="col-sm-4"></div>
                </div>
              
            </div>
        </div>
    </div>
</div>
 
            <?php //endif; ?>
            </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>





