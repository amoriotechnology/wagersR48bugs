 <div class="content-wrapper">
 <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>

        </div>
        <div class="header-title">
            <h1><?php echo display('dashboard') ?></h1>
            <small><?php echo display('home') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li class="active"><?php echo "" ?></li>
            </ol>
        </div>
    </section>
 <?php
  foreach ($service_list as $services) {

                         ?>
<h1><?php echo html_escape($services['title']);?></h1>
<p><?php echo html_escape($services['description']);?></p>
<?php } ?>
  </div>