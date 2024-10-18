<html>
   <head>
      <title>Invoice</title>
      <script src="https://code.jquery.com/jquery-latest.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
   </head>
   <body>
      <style>
         table  td, table th {
         background-color: transparent !important;
         }
         #last_table tr td {
         width: 12.5%; /* Equal distribution of 8 columns */
         }
         table  {
         border-collapse: collapse;
         }
         .tableWrapper {
         page-break-inside: avoid;
         }
         input {
         border: none;
         }
         textarea:focus, input:focus{
         outline: none;
         }
         .text-right {
         text-align: left; 
         }
         th{
         font-size:10px;
         }
         #content {
         padding: 30px;
         }
         /* @media print {
         thead { 
         display: table-header-group; 
         }
         }
         thead { 
         display: table-header-group; 
         } */
      </style>
      <!-- <?php  echo  base_url()."tableExport.js";   ?> -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <!-- <div class="header-title">
            <h1><?php echo display('Sale Invoice') ?></h1>
            <small><?php echo display('invoice_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_details') ?></li>
            </ol>
            </div> -->
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
      <?php
        //  $myArray = explode('(',$tax_details); 
        //  $tax_amt=$myArray[0];
        //  $tax_des=$myArray[1];

         // echo $template; die();
         
         //  $template=1;
         ?>
      <div id="tablecontainer">
      <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
      <input type="hidden" id="Bill_Id" value="<?php echo $bill_id; ?>">
      <b id="customerName" style='display:none;font-size:12px;'>  <?php echo $customer_name; ?></b><br>
      <b id="companyName" style='display:none;font-size:12px;'>   <?php echo $company[0]['company_name']; ?></b>
       <table id="myTabletop" style='margin-top: -20px;'>

    <tr style='border:none !important;'>
        <td style='border:none!important;width:50%; margin-left: 20px !important;'>
            <?php echo "<span style='font-size:35px;font-weight:bold;'>Company Info</span>"; ?><br>
            <h1 style='font-size:40px;' id="companyName"> <?php echo 'Amorio Technologies'; ?></h1>
            <b></b><?php echo '12 Cross Street,New Jersey,USA'; ?><br>
            <b></b><?php echo 'amorio@tech.com'; ?><br>
            <b></b><?php echo '987654321'; ?><br>
        </td>
        <td colspan="2" >
            <?php echo "<span style='font-size:35px;font-weight:bold;'>Bill to</span>"; ?><br>
            <h1 style='font-size:40px;' id="companyName"> <?php echo $company_info[0]['company_name']; ?></h1>
            <b id="customerName" style="font-weight: bold; text-align: justify;"><?php echo $company[0]['company_name']; ?></b>
            <?php echo $company_info[0]['address']; ?><br>
            <?php echo $company_info[0]['email']; ?><br>
            <?php echo $company_info[0]['mobile']; ?><br>
        </td>
    </tr>
    <tr style='height:30px;'>
        <td></td>
    </tr>
    <tr style='border:none !important;'>
        <td style='border:none!important;width:50%; margin-left: 20px !important;'>
            <h1 style='font-size:40px;font-weight:bold;' id="companyName"> <?php echo 'Invoice Info'; ?></h1>
            <b></b><?php echo 'Invoice # ' . $company_info['invoice_no']; ?><br>
            <b></b><?php echo 'Invoice Date ' . $company_info['bill_date']; ?><br>
            <b></b><?php echo 'Invoice Amount ' . $company_info['subscription_fees']; ?><br>
        </td>
        <td colspan="2" >
            <h1 style='font-size:40px;font-weight:bold;' id="companyName"> <?php echo 'Subscription Info'; ?></h1>
            <?php echo 'ID : ' . $company_info[0]['subscription_id']; ?><br>
            <?php echo 'Billing Period : ' . $company_info[0]['bill_period']; ?><br>
            <?php //echo $company_info[0]['mobile']; ?><br>
        </td>
    </tr>

    <tr style='height:30px;'>
        <td></td>
    </tr>

    <tr class="padded-row" style='padding:20px;'>
        <th><?php echo ('DESCRIPTION'); ?></td>
        <th><?php echo ('PRICE'); ?></td>
        <th><?php echo ('DISCOUNT'); ?></td>
        <th><?php echo ('AMOUNT'); ?></td>
    </tr>
    <tr class="padded-row" style='padding:20px;'>
        <td class="key"><?php echo ('STOCKEAI-PREMIUM') ?></td>
        <td class="value"><?php echo $currency . $company_info[0]['subscription_fees']; ?></td>
        <td class="key"><?php echo '-'; ?></td>
        <td class="value"><?php echo $currency . $company_info[0]['subscription_fees']; ?></td>
    </tr>
    <tr class="padded-row" style='padding:20px;'>
        <td></td>
        <td></td>
        <td class="key"><?php echo ('Subtotal') ?></td>
        <td class="value"><?php echo $currency . $company_info[0]['subscription_fees']; ?></td>
    </tr>
    <tr class="padded-row" style='padding:20px;'>
        <td></td>
        <td></td>
        <td class="key"><?php echo ('TOTAL') ?></td>
        <td class="value"><?php echo $currency . $company_info[0]['subscription_fees']; ?></td>
    </tr>
    <tr class="padded-row" style='padding:20px;'>
        <td></td>
        <td></td>
        <td class="key"><?php echo ('Tax') ?></td>
        <td class="value"><?php echo $currency; '0.00' ?></td>
    </tr>
</table>
      <div class="modal fade" id="myModal_sale" role="dialog" >
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
               <div class="modal-header" style="color:white;background-color:#38469f;">
                  <h4 class="modal-title"><?php echo display('New Sale') ?></h4>
               </div>
               <div class="content">
                  <div class="modal-body" style="text-align:center;font-weight:bold;">
                     <h4><?php echo display('New Sale Downloaded Successfully') ?></h4>
                  </div>
                  <div class="modal-footer">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         $(document).ready(function(){
         // window.onload = function (){ 
         $(".normalinvoice").each(function(i,v){
         if($(this).find("tbody").html().trim().length === 0){
         $(this).hide()
         }
         })
         $('.normalinvoice').each(function(){
         var tid=$(this).attr('id');
         const indexLast = tid.lastIndexOf('_');
         var idt = tid.slice(indexLast + 1);
         
         
         if ($(".normalinvoice td:not(:empty)").length == 0){
         alert("hurru");
         $(".normalinvoice").hide();
         }
         
         
         var sum=0;
         
         $( '.normalinvoice' + '> tbody > tr').find('.total_price').each(function() {
         var v=$(this).html();
         sum += parseFloat(v);
         
         });
         
         $(this).closest('table').find('#Total_'+idt).val("<?php   echo $currency ; ?>"+sum.toFixed(3));
         
         var sum_net=0;
         
         $( '.normalinvoice' + '> tbody > tr').find('.net_sq_ft').each(function() {
         var v=$(this).html();
         sum_net += parseFloat(v);
         
         });
         
         $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));
         
         
         });
         });
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
      <script>
        var csrfName = $('.txt_csrfname').attr('name'); 
        var csrfHash = $('.txt_csrfname').val();
        function adjustLastTwoRows() {
            var firstTwoRows = $('#myTabletop tr').slice(0, 3); // Select the first two rows

            // Apply styling to th and td elements in the first two rows
            firstTwoRows.find('th, td').css({
                'font-size': '30px' // Adjust font size as desired
            });

            var lastTwoRows = $('#myTabletop tr.padded-row');

            // Apply padding to cells in the last two rows
            lastTwoRows.find('th, td').css('padding', '20px');

            // Other styling adjustments for last two rows
            lastTwoRows.css({
                'border': '1px solid #000',
                'font-size': '30px'
            });
            lastTwoRows.find('th, td').addClass('bold-text').css({
                'text-align': 'center',
                'font-size': '25px'
            });
        }

        function generatePDF() {
            var pdf = new jsPDF();
            var companyTable = document.getElementById('myTabletop');

            // Ensure proper spacing for the first row
            var firstRowHeight = $('#myTabletop tr:first').height();
            var paddingTop = 30; // Adjust this padding value as needed

            var firstTd = companyTable.querySelector('td:first-child');
            if (firstTd) {
                firstTd.style.marginTop = firstRowHeight + paddingTop + 'px';
            }

            // Call function to adjust the last two rows before capturing the table as an image
            adjustLastTwoRows();

            html2canvas(companyTable, {
                scale: 1 // Adjust the scale if needed
            }).then(function (companyCanvas) {
                var imgData = companyCanvas.toDataURL('image/png');
                var imgWidth = pdf.internal.pageSize.width - 25; // Adjust margins
                var imgHeight = (companyCanvas.height * imgWidth) / companyCanvas.width;
                pdf.addImage(imgData, 'PNG', 14, 20, imgWidth, imgHeight);
                // pdf.save("Sale Invoice.pdf");
                var blob = pdf.output('blob');
                var csrfToken = $('#csrf_token').val();
                var id = $('#Bill_Id').val();
                var formData = new FormData();
                var currentDate = new Date();
                var formattedDate = currentDate.toISOString().replace(/[-:]/g, '').replace('T', '_').split('.')[0]; 
                var filename = 'Sale_Invoice_' + formattedDate + '.pdf';
                formData.append('pdfData', blob, filename);
                formData.append('id', id);
                formData.append(csrfName, csrfHash); 
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>Cinvoice/movePdf', 
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log('PDF uploaded successfully!');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });

            });
        }


        $(window).on('load', function () {
            var img = new Image();
            setTimeout(function () {
                generatePDF();
            }, 100);
        }); 
      </script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.3/jspdf.plugin.autotable.js'></script>
   </body>
</html>