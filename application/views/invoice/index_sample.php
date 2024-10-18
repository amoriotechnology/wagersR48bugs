<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Bootgrid with Image and Button cells</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
  <script type="text/javascript" src="tableExport.js"></script>
  <script type="text/javascript" src="jquery.base64.js"></script>
  <script type="text/javascript" src="html2canvas.js"></script>
  <script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
  <script type="text/javascript" src="jspdf/jspdf.js"></script>
  <script type="text/javascript" src="jspdf/libs/base64.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.2.0/jquery.bootgrid.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.css'>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<link rel="stylesheet" href="./style.css">
</head>
<body>
 
  <style type="text/css">
    
    

    </style>
	<style>

    </style>
  </style>
<section>
  <h3>Bootgrid with Image and Button cells</h3>
  <div id="result">
    <!-- Result will appear be here -->
 </div>
  <div class="dropdown" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span> Download
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   

                
      <li><a href="#" onclick="$('#data-table').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="images/pdf.png" width="24px"> PDF</a></li>
      
      <li class="divider"></li> 		
                  
                  <li><a href="#" onclick="$('#data-table').tableExport({type:'excel',escape:'false'});"> <img src="images/xls.png" width="24px"> XLS</a></li>
                 
    </ul>
  </div>
  <table class="table table-bordered" id="data-table">
    <thead>
      <tr>
        <th data-column-id="id" data-type="numeric">ID</th>
        <th data-column-id="sender" data-visible="false">Sender</th>
        <th data-column-id="received" data-order="desc">Received</th>
        <th data-column-id="imgsrc" data-identifier="true" data-type="string" data-visible="false">Img src</th>
        <th data-column-id="image" data-formatter="link">Link</th>
        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>10238</td>
        <td>eduardo@pingpong.com</td>
        <td>14.10.2013</td>
        <td>https://placeholdit.imgix.net/~text?txtsize=23&bg=F44336&txtclr=ffffff&w=50&h=50</td>
      </tr>
      <tr>
        <td>10243</td>
        <td>eduardo@pingpong.com</td>
        <td>19.10.2013</td>
        <td>https://placeholdit.imgix.net/~text?txtsize=23&bg=9C27B0&txtclr=ffffff&w=50&h=50</td>
      </tr>
      <tr>
        <td>10248</td>
        <td>eduardo@pingpong.com</td>
        <td>24.10.2013</td>
        <td>https://placeholdit.imgix.net/~text?txtsize=2&w=50&h=50</td>
      </tr>
  
    </tbody>
  </table>
</section>
<!-- partial -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.2.0/jquery.bootgrid.min.js'></script><script  src="./script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<script type="text/javascript">

  //$('#data-table').tableExport();
  $(function(){
    $('#data-table').bootgrid();
        }); 

  </script>
</body>
</html>
