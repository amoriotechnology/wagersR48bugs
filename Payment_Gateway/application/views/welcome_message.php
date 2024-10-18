<?php
// print_r($detail); die();
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Payment Success</title>
      <style type="text/css">
         ::selection { background-color: #E13300; color: white; }
         ::-moz-selection { background-color: #E13300; color: white; }
         body {
         background-color: #fff;
         margin: 40px;
         font: 13px/20px normal Helvetica, Arial, sans-serif;
         color: #4F5155;
         }
         a {
         color: #003399;
         background-color: transparent;
         font-weight: normal;
         }
         h1 {
         color: #444;
         background-color: transparent;
         border-bottom: 1px solid #D0D0D0;
         font-size: 19px;
         font-weight: normal;
         margin: 0 0 14px 0;
         padding: 14px 15px 10px 15px;
         }
         code {
         font-family: Consolas, Monaco, Courier New, Courier, monospace;
         font-size: 12px;
         background-color: #f9f9f9;
         border: 1px solid #D0D0D0;
         color: #002166;
         display: block;
         margin: 14px 0 14px 0;
         padding: 12px 10px 12px 10px;
         }
         #body {
         margin: 0 15px 0 15px;
         }
         p.footer {
         text-align: right;
         font-size: 11px;
         border-top: 1px solid #D0D0D0;
         line-height: 32px;
         padding: 0 10px 0 10px;
         margin: 20px 0 0 0;
         }
         #container {
         margin: 10px;
         border: 1px solid #D0D0D0;
         box-shadow: 0 0 8px #D0D0D0;
         }
         h5{
         padding-left: 90;
         }
         .modal-header {
         padding: 0.5rem 0.5rem;
         }
      </style>
   </head>
   <body>
      <div id="container">
         <div id="body">
            <div>
            </div>
         </div>
      </div>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="exampleModalLabel" > <img src="../../Amorio_Logo.png" alt="Amorio" /> <br><b class="text-center">Your payment has been processed successfully</b></h6>
               </div>
               <div class="modal-body">
                  <p><b>Invoice No : </b><?=$detail[0]['purchase_id']?>  </p>
                  <p><b>Amount : </b>€<?=$detail[0]['total_amt'];?>  </p>
                  <p><b>Description : </b><?=$detail[0]['description']?>  </p>
                  <p><b>Status : </b> <?= $detail[0]['status']; ?> </p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location = '../../../Cpurchase/manage_purchase'">Close</button>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">
        $(window).on('load', function() {
          $('#myModal').modal('show');
        });
      </script>
   </body>
</html>