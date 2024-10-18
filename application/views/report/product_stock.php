<?php error_reporting(1);  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>-->
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<style>
.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

   .Row {
   display: table;
   width: 100%; /*Optional*/
   table-layout: fixed; /*Optional*/
   border-spacing: 5px; /*Optional*/
   }
   .Column {
   display: table-cell;
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
  background-color: #4b9cdb;
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
    background-color: #f5634a;
    width: 110px;
  }

   
}
</style>
<div class="content-wrapper">
   <section class="content-header"  style="height: 74px;">
      <div class="header-icon">
 
         <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/productreportstocks.png"  class="headshotphoto" style="height:50px;" />
      </div>
          <div class="header-title">
          <div class="logo-holder logo-9">
          <h1 style="margin-top: 11px;"><strong><?php echo 'Product Stock' ?><strong></h1>
       </div>
         <small><?php echo ""; ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >


            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('product') ?></a></li>
            <li class="active" style="color:orange;"><?php echo 'Product Stock' ?></li>
       
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
         //   error_reporting(1);
                    $message = $this->session->userdata('message');
            if (isset($message)) {
                ?>
      <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
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
      <style>
         #for_filter_by{
         }
         th {
         padding: 10px !important;
         }
         .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
         vertical-align: middle;
         }
         .search_dropdown{
         background:center;
         }
         th{
         color:black;
         }
         .select2{
         display:none;
         }
      </style>
      <script>
         (function ($) {
             /* Initialize function */
             $.fn.tablemanager = function (options = null) {
                 /**
                 Get common variables, parts of tables and others utilities
                 **/
                 var Table   = $(this),
                     Heads   = $(this).find("thead th"),
                     tbody   = $(this).find("tbody"),
                     rows    = $(this).find("tbody tr"),
                     rlen    = rows.length,
                     arr     = [],
                     cells,
                     clen;
         
                 /**
                 Options default values
                 **/
                 var firstSort       = [[0, 0]],
                     dateColumn      = [],
                     dateFormat      = [],
                     disableFilterBy = [];
         
                 /**
                 Debug value true or false
                 **/
                 var debug = false;
                 var debug = options !== null && options.debug == true ? true : false;
         
                 /**
                 Set pagination true or false
                 **/
                 var pagination = false;
                 pagination =
                     options !== null && options.pagination == true ? true : false;
                 // default pagination variables
                 var currentPage = 0;
                 var numPerPage =
                     pagination !== true && showrows_option !== true ? rows.length : 5;
                 var numOfPages = options.numOfPages !== undefined && options.numOfPages > 0 ? options.numOfPages : 5;
         
                 /**
                 Set default show rows list or set if option is set
                 **/
                 var showrows = [5, 10, 50];
                 showrows =
                     options !== null &&
                     options.showrows != "" &&
                     typeof options.showrows !== undefined &&
                     options.showrows !== undefined
                         ? options.showrows
                         : showrows;
         
                 /**
                 Default labels translations
                 **/
                 var voc_filter_by = "Filter by",
                     voc_type_here_filter = "Type here to filter...",
                     voc_show_rows = "Show rows";
         
                 /**
                 Available options:
                 **/
                 var availableOptions = new Array();
                 availableOptions = [
                     "debug",
                     "firstSort",
                     "disable",
                     "appendFilterby",
                     "dateFormat",
                     "pagination",
                     "showrows",
                     "vocabulary",
                     "disableFilterBy",
                     "numOfPages"
                 ];
         
                 // debug
                 // make array form options object
                 arrayOptions = $.map(options, function (value, index) {
                     return [index];
                 });
                 for (i = 0; i < arrayOptions.length; i++) {
                     // check if options are in available options array
                     if (availableOptions.indexOf(arrayOptions[i]) === -1) {
                         if (debug) {
                             cLog(
                                 "Error! " + arrayOptions[i] + " is unavailable option."
                             );
                         }
                     }
                 }
         
                 /**
                 Get options if set
                 **/
                 if (options !== null) {
                     /**
                     Check options vocabulary
                     **/
                     if (
                         options.vocabulary != "" &&
                         typeof options.vocabulary !== undefined &&
                         options.vocabulary !== undefined
                     ) {
                         // Check every single label
         
                         voc_filter_by =
                             options.vocabulary.voc_filter_by != "" &&
                             options.vocabulary.voc_filter_by !== undefined
                                 ? options.vocabulary.voc_filter_by
                                 : voc_filter_by;
         
                         voc_type_here_filter =
                             options.vocabulary.voc_type_here_filter != "" &&
                             options.vocabulary.voc_type_here_filter !== undefined
                                 ? options.vocabulary.voc_type_here_filter
                                 : voc_type_here_filter;
         
                         voc_show_rows =
                             options.vocabulary.voc_show_rows != "" &&
                             options.vocabulary.voc_show_rows !== undefined
                                 ? options.vocabulary.voc_show_rows
                                 : voc_show_rows;
                     }
         
                     /**
                     Option disable
                     **/
                     if (
                         options.disable != "" &&
                         typeof options.disable !== undefined &&
                         options.disable !== undefined
                     ) {
                         for (var i = 0; i < options.disable.length; i++) {
                             // check if should be disabled last column
                             col =
                                 options.disable[i] == -1 || options.disable[i] == "last"
                                     ? Heads.length
                                     : options.disable[i] == "first"
                                     ? 1
                                     : options.disable[i];
                             Heads.eq(col - 1)
                                 .addClass("disableSort")
                                 .removeClass("sortingAsc")
                                 .removeClass("sortingDesc");
         
                             // debug
                             if (isNaN(col - 1)) {
                                 if (debug) {
                                     cLog('Error! Check your "disable" option.');
                                 }
                             }
                         }
                     }
         
                     /**
                     Option select number of rows to show
                     **/
                     var showrows = [100, 50, 10, 5];
                     var showrows_option = false;
                     if (
                         options.showrows != "" &&
                         typeof options.showrows !== undefined &&
                         options.showrows !== undefined
                     ) {
                         showrows_option = true;
         
                         // div num rows
                         var numrowsDiv =
                             '<div id="for_numrows"  class="for_numrows" style="display: inline;"><label for="numrows">' +
                             translate(voc_show_rows) +
                             ': </label><select id="numrows"></select></div>';
                         // append div to choose num rows to show
                         Table.before(numrowsDiv);
                         // get show rows options and append select to its div
                         for (i = 0; i < showrows.length; i++) {
                             $("select#numrows").append(
                                 $("<option>", {
                                     value: showrows[i],
                                     text: showrows[i],
                                 })
                             );
         
                             // debug
                             if (isNaN(showrows[i])) {
                                 if (debug) {
                                     cLog(
                                         'Error! One of your "show rows" options is not a number.'
                                     );
                                 }
                             }
                         }
         
                         var selectNumRowsVal = $("select#numrows").val();
                         numPerPage = selectNumRowsVal;
                         // on select num rows change get value and call function
                         $("select#numrows").on("change", function () {
                             selectNumRowsVal = $(this).val();
                             // reset current page to show always first page if select change
                             currentPage = 0;
                             generatePaginationValues();
                         });
                     }
         
                     /**
                     Pagination
                     **/
                     if (pagination === true || Table.hasClass("tablePagination")) {
                         var numPages = Math.ceil(rows.length / numPerPage);
         
                         // append num pages on bottom
                         var pagesDiv =
                             '<div id="pagesControllers" class="pagesControllers"></div>';
                         Table.after(pagesDiv);
         
                         // Showrows option and append
                         // If showrows is set get select val
                         if (showrows_option !== true) {
                             var selectNumRowsVal = numPerPage;
                         }
         
                         generatePaginationValues();
                     }
         
                     /**
                     Check if disable filter by is empty or undefined
                     **/
                     if (
                         options.disableFilterBy != "" &&
                         typeof options.disableFilterBy !== undefined &&
                         options.disableFilterBy !== undefined
                     ) {
                         for (var i = 0; i < options.disableFilterBy.length; i++) {
                             // check if should be disabled last column
                             col =
                                 options.disableFilterBy[i] == -1 ||
                                 options.disableFilterBy[i] == "last"
                                     ? Heads.length
                                     : options.disableFilterBy[i] == "first"
                                     ? 1
                                     : options.disableFilterBy[i];
                             Heads.eq(col - 1).addClass("disableFilterBy");
         
                             // debug
                             if (isNaN(col - 1)) {
                                 if (debug) {
                                     cLog('Error! Check your "disableFilterBy" option.');
                                 }
                             }
                         }
                     }
         
                     /**
                     Append filter option
                     **/
                     if (
                         options.appendFilterby === true ||
                         Table.hasClass("tableFilterBy")
                     ) {
                         // Create div and select to filter
                         var filterbyDiv ='';
                             // '<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by">' +"   "+
                             // " Filter By"+
                             // ': </label><select id="filter_by"></select> <input id="filter_input" type="text" placeholder="' +
                             // translate(voc_type_here_filter) +
                             // '"></div>';
                         $(this).before(filterbyDiv);
                         
         
                         // Populate select with every th text and as value use column number
                         $(Heads).each(function (i) {
                             if (!$(this).hasClass("disableFilterBy")) {
                                 $("select#filter_by").append(
                                     $("<option>", {
                                         value: i,
                                         text: $(this).text(),
                                     })
                                 );
                             }
                         });
         
                         // Filter on typing selecting column by select #filter_by
                         $("input#filter_input").on("keyup", function () {
                             var val = $.trim($(this).val())
                                 .replace(/ +/g, " ")
                                 .toLowerCase();
                             var select_by = $("select#filter_by").val();
         
                             Table.find("tbody tr")
                                 .show()
                                 .filter(function () {
                                     // search into column selected by #filter_by
                                     var text = $(this)
                                         .find("td:eq(" + select_by + ")")
                                         .text()
                                         .replace(/\s+/g, " ")
                                         .toLowerCase();
                                     return !~text.indexOf(val);
                                 })
                                 .hide();
                                 
                             if(val == '') paginate();
                         });
                     }
         
                     /**
                     Date format option
                     **/
                     if (
                         options.dateFormat != "" &&
                         typeof options.dateFormat !== undefined &&
                         options.dateFormat !== undefined
                     ) {
                         for (i = 0; i < options.dateFormat.length; i++) {
                             dateColumn.push(options.dateFormat[i][0] - 1);
                             dateFormat.push([
                                 options.dateFormat[i][0] - 1,
                                 options.dateFormat[i][1],
                             ]);
                         }
                         // check if column has table manager data attribute
                         Heads.each(function (col) {
                             if (
                                 $(this).data("tablemanager") &&
                                 $(this).data("tablemanager").dateFormat !== undefined
                             ) {
                                 var dateF = $(this).data("tablemanager").dateFormat;
                                 dateColumn.push(col);
                                 dateFormat.push([col, dateF]);
                             }
                         });
                     }
         
                     /**
                     Check if first element to sort is empty or undefined
                     **/
                     if (
                         options.firstSort != "" &&
                         typeof options.firstSort !== undefined &&
                         options.firstSort !== undefined
                     ) {
                         var firstSortColumn = [];
                         var firstSortRules = options.firstSort;
                         var firstSortOrder = [];
                         for (i = 0; i < options.firstSort.length; i++) {
                             firstSortColumn.push(options.firstSort[i][0]);
                             firstSortOrder.push(options.firstSort[i][1]);
                         }
                         TableSort(firstSortRules);
                     }
                 }
                 if (debug) {
                     cLog("Options set:", options);
                 }
         
                 /**
                 Detect theads click and sort by that column
                 **/
                 Heads.each(function (n) {
                     // check if has class disableSort or has data-attribute = disable
                     var disable =
                         $(this).data("tablemanager") === "disable"
                             ? true
                             : $(this).hasClass("disableSort")
                             ? true
                             : false;
         
                     if (!disable === true) {
                         $(this).on("click", function () {
                             if ($(this).hasClass("sortingAsc")) {
                                 $(Heads)
                                     .removeClass("sortingAsc")
                                     .removeClass("sortingDesc");
                                 $(this).addClass("sortingDesc");
                                 order = 1;
                             } else {
                                 $(Heads)
                                     .removeClass("sortingDesc")
                                     .removeClass("sortingAsc");
                                 $(this).addClass("sortingAsc");
                                 order = 0;
                             }
                             // TableSort(this, n, order);
                             var sortRules = [];
                             sortRules.push([n + 1, order]);
                             TableSort(sortRules);
                         });
                         $(this).addClass("sorterHeader");
                     }
                 });
         
                 /**
                 Main function: sort table
                 rules = array of column, order
                 **/
                 function TableSort(rules) {
                     cellsArray = [];
                     for (i = 0; i < rlen; i++) {
                         cells = rows[i].cells;
                         clen = cells.length;
                         cellsArray[i] = [];
                         for (j = 0; j < clen; j++) {
                             cellsArray[i].push(cells[j].outerHTML);
                         }
                     }
                     // For each firtsort rule
                     var firstSortData = [];
                     for (i = 0; i < rules.length; i++) {
                         var col = rules[i][0] - 1;
                         var thead = Heads.eq(col);
                         var order =
                             rules[i][1] == undefined
                                 ? 0
                                 : rules[i][1] == 0 || rules[i][1] == "asc"
                                 ? 0
                                 : rules[i][1] == 1 || rules[i][1] == "desc"
                                 ? 1
                                 : 0;
                         // Manage classes asc and desc
                         if (i == 0) {
                             var firstClassOrder =
                                 order == 0 ? "sortingAsc" : "sortingDesc";
                             $(thead).addClass(firstClassOrder);
                         }
                         asc = order == 0 ? 1 : -1;
                         // if column is date
                         if (dateColumn.indexOf(col) != -1) {
                             for (j = 0; j < dateFormat.length; j++) {
                                 if (dateFormat[j][0] == col) {
                                     var type = "date";
                                     var format = dateFormat[j][1];
                                 }
                             }
                         } else {
                             var type = "alphanumeric";
                             var format = null;
                         }
                         firstSortData.push([col, asc, type, format]);
                     }
         
                     multipleSortCol(cellsArray, firstSortData);
         
                     appendSortedTable(cellsArray);
                 }
         
                 /** 
                 Function which sort columns
                 array = what have to be sorted
                 data = columns, orders (asc and desc), types(alphanum or date), formats (for dates)
                 **/
                 function multipleSortCol(array, data) {
                     var cols = [];
                     var orders = [];
                     var types = [];
                     var formats = [];
                     for (i = 0; i < data.length; i++) {
                         cols.push(data[i][0]);
                         orders.push(data[i][1]);
                         types.push(data[i][2]);
                         formats.push(data[i][3]);
                     }
                     array.sort(function (a, b) {
                         for (i = 0; i < cols.length; i++) {
                             // initialize variables
                             var first = "",
                                 second = "";
                             var order = orders[i];
                             // get inner text from stringified elements
                             let firstCol = new DOMParser().parseFromString(
                                 a[cols[i]],
                                 "text/html"
                             ).documentElement.textContent;
                             let secondCol = new DOMParser().parseFromString(
                                 b[cols[i]],
                                 "text/html"
                             ).documentElement.textContent;
                             // If it's last col selected and a = b return 0
                             if (i == cols.length && firstCol == secondCol) {
                                 return 0;
                             }
                             // check col type if is aplhpanum or date
                             if (types[i] == "alphanumeric") {
                                 if (firstCol > secondCol) {
                                     return order;
                                 } else if (firstCol < secondCol) {
                                     return -1 * order;
                                 }
                             } else if (types[i] == "date") {
                                 if (
                                     formatDate(formats[i], firstCol) >
                                     formatDate(formats[i], secondCol)
                                 ) {
                                     return order;
                                 } else if (
                                     formatDate(formats[i], firstCol) <
                                     formatDate(formats[i], secondCol)
                                 ) {
                                     return -1 * order;
                                 }
                             }
                         }
                     });
                 }
         
                 /**
                 Append sorted table
                 arr = array with table html
                 **/
                 function appendSortedTable(arr) {
                     // create rows and cells by sorted array
                     // for(i = 0; i < rlen; i++){
                     //     arr[i] = "<td>"+arr[i].join("</td><td>")+"</td>";
                     // };
                     // reset tbody
                     tbody.html("");
                     // append new sorted rows
                     tbody.html("<tr>" + arr.join("</tr><tr>") + "</tr>");
                     // then launch paginate function (if options.paginate = false it will not do anything)
                     paginate();
                 }
         
                 /**
                 Format date
                 dateFormat = the date format passed by user
                 date = date to format
                 **/
                 function formatDate(dateFormat, date) {
                     var $date = date;
                     // debug variable
                     var format = 0;
                     if (dateFormat == "ddmmyyyy") {
                         $date = date.replace(
                             /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                             "$3$2$1"
                         );
                         format = 1;
                     }
                     if (dateFormat == "mmddyyyy") {
                         $date = date.replace(
                             /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                             "$3$1$2"
                         );
                         format = 1;
                     }
                     if (dateFormat == "dd-mm-yyyy") {
                         $date = date.replace(
                             /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                             "$3-$2-$1"
                         );
                         format = 1;
                     }
                     if (dateFormat == "mm-dd-yyyy") {
                         $date = date.replace(
                             /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                             "$3-$1-$2"
                         );
                         format = 1;
                     }
                     if (dateFormat == "dd/mm/yyyy") {
                         $date = date.replace(
                             /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                             "$3/$2/$1"
                         );
                         format = 1;
                     }
                     if (dateFormat == "mm/dd/yyyy") {
                         $date = date.replace(
                             /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                             "$3/$1/$2"
                         );
                         format = 1;
                     }
                     // For debugging
                     if (format == 0) {
                         if (debug) {
                             cLog('Error! Unvalid "date format".');
                         }
                     }
         
                     return $date;
                 }
         
                 /**
                 Generate page values: if numrows are selected or not it organize every value needed by pagination function and others
                 **/
                 function generatePaginationValues() {
                     // get first select num rows value
                     numPerPage = selectNumRowsVal;
                     numPages = Math.ceil(rows.length / numPerPage);
                     // append first controllers for pages
                     appendPageControllers(numPages);
                     // Give currentPage class to first page number
                     $(".pagecontroller-num").eq(0).addClass("currentPage");
                     paginate(currentPage, numPerPage);
                     pagecontrollersClick();
                     filterPages();
                 }
         
                 /**
                 Pagination function: reorganize entire table by pages
                 curPage = (can be null) current page if it's set
                 perPage = (can be null) number of rows per page
                 **/
                 function paginate(curPage = null, perPage = null) {
                     var curPage = curPage === null ? currentPage : curPage;
                     var perPage = perPage === null ? numPerPage : perPage;
                     Table.on("paginating", function () {
                         $(this)
                             .find("tbody tr")
                             .hide()
                             .slice(curPage * perPage, (curPage + 1) * perPage)
                             .show();
                     });
                     Table.trigger("paginating");
                 }
         
                 /**
                 Page controllers append: generate page controllers and append them on bottom of table
                 **/
                 function appendPageControllers(nPages) {
                     // reset div
                     $("#pagesControllers").html("");
                     // First
                     $("#pagesControllers").append(
                         $("<button>", {
                             value: "first",
                             text: "<<",
                             class: "pagecontroller pagecontroller-f",
                         })
                     );
                     // Previous
                     $("#pagesControllers").append(
                         $("<button>", {
                             value: "prev",
                             text: "<",
                             class: "pagecontroller pagecontroller-p",
                         })
                     );
                     // Numbers
                     for (i = 1; i <= nPages; i++) {
                         $("#pagesControllers").append(
                             $("<button>", {
                                 value: i,
                                 text: i,
                                 class: "pagecontroller pagecontroller-num",
                             })
                         );
                     }
                     // Next
                     $("#pagesControllers").append(
                         $("<button>", {
                             value: "next",
                             text: ">",
                             class: "pagecontroller pagecontroller-n",
                         })
                     );
                     // Last
                     $("#pagesControllers").append(
                         $("<button>", {
                             value: "last",
                             text: ">>",
                             class: "pagecontroller pagecontroller-l",
                         })
                     );
                 }
         
                 /**
                 Page controllers click: check if pagecontroller has clicked and change page to view
                 **/
                 function pagecontrollersClick() {
                     $(".pagecontroller").on("click", function () {
                         // on click on button do something
                         if ($(this).val() == "first") {
                             currentPage = 0;
                             paginate(currentPage, numPerPage);
                         } else if ($(this).val() == "last") {
                             currentPage = numPages - 1;
                             paginate(currentPage, numPerPage);
                         } else if ($(this).val() == "prev") {
                             if (currentPage != 0) {
                                 currentPage = currentPage - 1;
                                 paginate(currentPage, numPerPage);
                             }
                         } else if ($(this).val() == "next") {
                             if (currentPage != numPages - 1) {
                                 currentPage = currentPage + 1;
                                 paginate(currentPage, numPerPage);
                             }
                         } else {
                             currentPage = $(this).val() - 1;
                             paginate(currentPage, numPerPage);
                         }
                         // Reset class and give to currentPage
                         $(".pagecontroller-num").removeClass("currentPage");
                         $(".pagecontroller-num")
                             .eq(currentPage)
                             .addClass("currentPage");
         
                         filterPages();
                     });
                 }
         
                 function filterPages() {
                     $(".pagecontroller-num")
                         .hide()    
                         .filter(function(i, el) {
                             let mid = Math.ceil(numOfPages / 2);
                             if (currentPage < mid) {
                                 if(i < numOfPages) return true;
                             } else if(currentPage > (numPages - (numOfPages - 1))) {
                                 if(i >= numPages - numOfPages) return true;
                             } else {
                                 if(numOfPages % 2 == 0) {
                                     if(i >= currentPage - mid && i < currentPage + mid) return true;
                                 } else {
                                     if(i > currentPage - mid && i < currentPage + mid) return true;
                                 }
                             }
                         })
                         .show();
                 }
         
                 /**
                 Translating function
                 string = string to be translated
                 **/
                 function translate(string) {
                     return string;
                 }
         
                 /**
                 Debug function
                 name = label for data
                 string = string to pass by console.log
                 **/
                 function cLog(name, string = null) {
                     console.log(name);
                     if (string != null) {
                         console.log(JSON.parse(JSON.stringify(string)));
                     }
                 }
             };
         })(jQuery);
         
         
         
             
      </script>
      <?php   
         $categoryIds = array_unique(array_column($products, 'category_id'));
         
         ?>
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading" style="height: 80px;border: 3px solid #D7D4D6;">
            <div class="col-sm-12">
               <div class='col-sm-6'>
                  <table class="table" style='margin-top:-10px;' align="center">
                     <tr style='text-align:center;font-weight:bold;' class="filters">
                        <td style='border:none;width:200px;'></td>
                        <td class="search_dropdown" style="text-align: justify;border:none;width: 22%; color: black;">
                           Stock
                           <select id="stock-filter" class="form-control">
                              <option value="Any">Any</option>
                              <option value="1-50">1-50</option>
                              <option value="51-100">51-100</option>
                              <option value="101-200">101-200</option>
                              <option value="201-more">201-more</option>
                           </select>
                        </td>
                        <td class="search_dropdown" style="text-align: justify;border:none;width: 22%; color: black;">
                           Availability
                           <select id="availability-filter" class="form-control">
                              <option value="Any">Any</option>
                              <option value="1-50">1-50</option>
                              <option value="51-100">51-100</option>
                              <option value="101-200">101-200</option>
                              <option value="201-more">201-more</option>
                           </select>
                        </td>
                     </tr>
                  </table>
               </div>
               <div class='col-sm-4'></div>
               <div class='col-sm-2' style='margin-top:10px;'>
                  <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                     <button class="btnclr btn btn-default dropdown-toggle" type="button"  style="float:left;" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <span class="fa fa-download"></span> <?php echo display('download') ?>
                     </button>
                     <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                     </ul>
                     &nbsp;
                     <button type="button"   class="btnclr btn btn-default dropdown-toggle"  onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-body" style="    border: 3px solid #D7D4D6;">
                  <div class="sortableTable__container">
                     <div class="sortableTable__discard">
                     </div>
                     <div id="for_filter_by" class="for_filter_by" style="display: inline;">
                        <label for="filter_by"><?php echo display('Filter By') ?>&nbsp;&nbsp;
                        </label>
                        <select id="filterby" style="border-radius:5px;height:25px;" >
                           <option value="20"><?php echo 'Product Id'; ?></option>
                           <option value="2"><?php echo display('Name') ?></option>
                           <option value="3"><?php echo display('product_model') ?></option>
                           <option value="4"><?php  echo display('Inventry') ?></option>
                           <option value="5"><?php  echo 'Quantity in PO'; ?></option>
                        </select>
                        <input id="filterinput" style="height:25px;" type="text" >
                     </div>
                     <div id="printableArea">
                        <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                           <thead class="sortableTable">
                              <tr  class="sortableTable__header btnclr">
                                 <th class="1 value"  style="color:white;" data-col="1" data-control-column="1">S.No</th>
                                 <th class="20 value" style="color:white;" data-col="20" data-control-column="20">Product Id</th>
                                 <th class="2 value"  style="color:white;" data-col="2" data-control-column="2"><?php echo display('product_name') ?></th>
                                 <th class="3 value"  style="color:white;" data-col="3" data-control-column="3"><?php echo display('product_model') ?></th>
                                 <th class="4 value"  style="color:white;" data-col="4" data-control-column="4"><?php echo display('Inventry') ?></th>
                                 <th class="5 value"  style="color:white;" data-col="5" data-control-column="5"><?php echo 'Quantity in PO' ?></th>
                                 <th class="6 value"  style="color:white;" data-col="6" data-control-column="6"><?php echo 'Physical Count' ?></th>
                              </tr>
                           </thead>
                           <tbody class="sortableTable__body" id="tab">
                              <?php
                                 $i = 1;
                                 if ($products) {
                                     foreach ($products as $product) {
                                         $supplier_price = $this->db->select('*')->from('supplier_product')->where("product_id", $product['product_id'])->get()->result_array();
                                         $categry = $this->db->select('*')->from('product_category')->where("category_id", $product['category_id'])->get()->result_array();
                                         ;
                                         ?>
                              <tr id="task-<?php echo $i; ?>"
                                 class="task-list-row"
                                 data-task-id="<?php echo $i; ?>"
                                 data-pname="<?php echo $product['product_name']; ?>"
                                 data-model="<?php echo $product['product_model']; ?>"
                                 data-category="<?php echo $product['category_id']; ?>"
                                 data-unit="<?php echo $product['unit']; ?>"
                                 data-supplier="<?php echo $product['supplier_name']; ?>"
                                 data-stock="<?php echo $product['stock']; ?>"
                                 data-availability="<?php echo $product['availability']; ?>">
                                 <td data-col="1" style="text-align:center;" class="1"><?php echo $i; ?></td>
                                 <td data-col="20" style="text-align:center;" class="20"><?php echo $product['product_id']; ?></td>
                                 <td data-col="2" class="2" style="text-align:center;"><?php echo $product['product_name']; ?></td>
                                 <td data-col="3" class="3" style="text-align:center; white-space:nowrap;"><?php echo $product['product_model']; ?>
                                 </td>
                                 <td data-col="4" class="4" style="text-align: -webkit-center;">
                                    <div class="row" style="text-align:center; padding:5px; width:200px; border: 1px solid #d3d3d366; margin: -1px;">
                                       <div class="col-sm-6" style="font-weight:bold;"><?php echo display('In Stock') ?></div>
                                       <div class="col-sm-6" id='stock'><?php echo $product['p_quantity']; ?></div>
                                    </div>
                                    <div class="row" style="text-align:center; padding:5px; width:200px; border: 1px solid #d3d3d366; margin: -1px;">
                                       <div class="col-sm-6" style="font-weight:bold;"><?php echo display('Avaliablity') ?></div>
                                       <div id='avail' class="col-sm-6">
                                          <?php
                                             $sale_sum = false;
                                             $s = 0;
                                             $e = 0;
                                             $ex_sum = false;
                                             $total = 0;
                                             if (!empty($sale_count)) {
                                                 foreach ($sale_count as $sale) {
                                                     if ($product['product_id'] == $sale['product_id']) {
                                                         $avail = $product['p_quantity'] - $sale['available'];
                                                         $total += $avail;
                                                         $s = $avail;
                                                         $sale_sum = true;
                                                     }
                                                 }
                                             }
                                             if (!empty($expense_count)) {
                                                 foreach ($expense_count as $expense) {
                                                     if ($product['product_id'] == $expense['product_id']) {
                                                         $avail = $product['p_quantity'] + $expense['available'];
                                                         $total += $avail;
                                                         $ex_sum = true;
                                                         $e = $expense['available'];
                                                     }
                                                 }
                                             }
                                             if (!empty($expense_count) && !empty($sale_count)) {
                                                 if ($ex_sum == true && $sale_sum == true) {
                                                     $total = $s + $e;
                                                 }
                                             }
                                             if ($total == 0) {
                                                 $total = $product['p_quantity'];
                                                 echo $total;
                                             } else {
                                                 echo $total;
                                             }
                                             ?>
                                       </div>
                                    </div>
                                 </td>
                                 <td data-col="5" class="5"><?php echo $product['product_quantity']; ?></td>
                                 <td data-col="6" class="6"><?php echo ''; ?></td>
                              </tr>
                              <?php $i++;
                                 }
                                 } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <input type="hidden" id="total_product" value="<?php echo $total_product;?>" name="">
                  <input type="hidden" id="category_id" value="<?php echo $category_id;?>" name="">
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" value="Product/Product" id="url"/>
      <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
      <iframe id="txtArea1" style="display:none"></iframe>
      <div id="myModal_colSwitch"  class="modal_colSwitch">
         <div class="modal-content_colSwitch" style="width:50%;height:35%;">
            <span class="close_colSwitch">&times;</span>
            <div class="col-sm-1" ></div>
            <div class="col-sm-2" >
               <br>
               <div class="form-group row"  > 
                  <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>&nbsp;S.No<br>
                  <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>&nbsp;<?php echo display('product_name') ?><br>
                  <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3"  value="3"/>&nbsp;<?php echo display('product_model') ?><br>
                  <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>&nbsp;<?php echo ('Inventry')?><br>
                  <br><input type="checkbox"  data-control-column="5" class="5"   value="5"/>&nbsp;<?php echo display('category') ?><br>
               </div>
            </div>
            <div class="col-sm-2" >
               <br>
               <div class="form-group row"  >
                  <br><input type="checkbox"  data-control-column="6"   class="6"   value="6"/>&nbsp;<?php echo display('Unit') ?><br>
                  <!--<br><input type="checkbox"  data-control-column="7" checked = "checked" class="7"  value="7"/>&nbsp;<?php echo display('Vendor') ?><br>-->
                  <!--<br><input type="checkbox"  data-control-column="8" checked = "checked" class="8"   value="8"/>&nbsp;<?php //echo display('Vendor')." ".display('price') ?><br>-->
                  <br><input type="checkbox"  data-control-column="9"   class="9"   value="9"/>&nbsp;<?php echo display('Origin') ?><br>
                  <br><input type="checkbox"  data-control-column="10"   class="10"   value="10"/>&nbsp;<?php echo display('Account Category') ?><br>
               </div>
            </div>
            <div class="col-sm-2"  >
               <br>
               <div class="form-group row"  >
                  <br><input type="checkbox"  data-control-column="16"  class="16 "  checked = "checked"  value="16 "/>&nbsp;<?php echo display('quantity')?> <br>
                  <br><input type="checkbox"  data-control-column="17" class="17"  value="17"/>&nbsp;<?php echo display('Serial No')?><br>
                  <br><input type="checkbox"  data-control-column="18"  class="18"   value="18"/>&nbsp;<?php echo display('country')?><br>
                  <br><input type="checkbox"  data-control-column="15"  class="15"   value="15"/>&nbsp;<?php echo display('tax')?><br>
                  <br><input type="checkbox"  data-control-column="13" checked = "checked" class="13"   value="13"/>&nbsp;<?php echo display('price') ?><br>
               </div>
            </div>
            <div class="col-sm-3"  >
               <br>
               <div class="form-group row"  >
                  <br><input type="checkbox"  data-control-column="11"   class="11"   value="11"/>&nbsp;<?php echo display('Account Sub category') ?><br>
                  <br><input type="checkbox"  data-control-column="12"   class="12"  value="12"/>&nbsp;<?php echo display('Product Sub Category') ?><br>
                  <br><input type="checkbox"  data-control-column="14"  class="14"   value="14"/>&nbsp;<?php echo display('Account Category Name')?><br>
                  <br><input type="checkbox"  data-control-column="19" checked = "checked" class="19"   value="19"/>&nbsp;<?php echo display('action')?><br> 
               </div>
            </div>
            <div class="col-sm-1"  >
               <br>
               <div class="form-group row"  >
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>
   $(document).ready(function () {
      $('#availability-filter').on('change', function () {
          var selectedValue = $(this).val();
          $('#tab tr').show();  // Show all rows initially
   
          if (selectedValue !== 'Any') {
              $('#tab tr').each(function () {
                  var availability = parseInt($(this).find('#avail').text());
   
                  if ((selectedValue === '1-50' && availability > 50) ||
                      (selectedValue === '51-100' && (availability < 51 || availability > 100)) ||
                      (selectedValue === '101-200' && (availability < 101 || availability > 200)) ||
                      (selectedValue === '201-more' && availability <= 200)) {
                      $(this).hide();
                  }
              });
          }
      });
           $('#stock-filter').on('change', function () {
          var selectedValue = $(this).val();
          $('#tab tr').show();  // Show all rows initially
   
          if (selectedValue !== 'Any') {
              $('#tab tr').each(function () {
                  var availability = parseInt($(this).find('#stock').text());
   
                  if ((selectedValue === '1-50' && availability > 50) ||
                      (selectedValue === '51-100' && (availability < 51 || availability > 100)) ||
                      (selectedValue === '101-200' && (availability < 101 || availability > 200)) ||
                      (selectedValue === '201-more' && availability <= 200)) {
                      $(this).hide();
                  }
              });
          }
      });
          });
   
   
   $(document).ready(function(){
   
   $(".sidebar-mini").addClass('sidebar-collapse') ;
   });
   function pdf() {
   $(".myButtonClass").hide();
   var doc = new jsPDF("p", "pt");
   var res = doc.autoTableHtmlToJson(document.getElementById("ProfarmaInvList"));
   var height = doc.internal.pageSize.height;
   //doc.text("Generated PDF", 50, 50);
   
   doc.autoTable(res.columns, res.data, {
   
   // margin: { horizontal: 0 },
    
      styles: { overflow: 'linebreak', cellWidth: 'wrap' },
       horizontalPageBreak: true,
    horizontalPageBreakRepeat: 1,
   startY: doc.autoTableEndPosY() + 50,
   });
   doc.save("Generated PDF.pdf");
   }
   
   
   
   
   
   function fnExcelReport()
   {
   
   // var oldLastTableRow =  $("#ProfarmaInvList").clone();
   // $(oldLastTableRow).find("tr td a").each(function(index, item){
   //     $(this).removeAttr("href");
   //     console.log(this);
   // });
   
   table = $('#ProfarmaInvList').clone();
   
    
   
   var hyperLinks = table.find('a');
   
   var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
   var textRange; var j=0;
   tab = document.getElementById('ProfarmaInvList'); // id of table
   
   for(j = 0 ; j < tab.rows.length ; j++) 
   {   var sp=  $(hyperLinks[j]).text();
      tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
      //tab_text=tab_text+"</tr>";
        console.log(sp);
   }
   
   tab_text=tab_text+"</table>";
   tab_text= tab_text.replace(/<a[^>]*>/g, "");
   tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
   tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
   tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
   
   var ua = window.navigator.userAgent;
   var msie = ua.indexOf("MSIE "); 
   
   if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
   {
      txtArea1.document.open("txt/html","replace");
      txtArea1.document.write(tab_text);
      txtArea1.document.close();
      txtArea1.focus(); 
      sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
   }  
   else                 //other browser not tested on IE 11
      sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
   
   return (sa);
   }
   
   
   
   
   
   
   
   
</script>
<script>
   $(document).on('keyup', '#filterinput', function(){
   
      var value = $(this).val().toLowerCase();
      var filter=$("#filterby").val();
      $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
          $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
      });
   });
   
   
   
   
   
   
   function reload(){
      location.reload();
   }
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $editor = $('#submit'),
    $editor.on('click', function(e) {
      if (this.checkValidity && !this.checkValidity()) return;
      e.preventDefault();
      var yourArray = [];
                  $('.modal-content_colSwitch input[type=checkbox]:not(:checked)').each(function() {
        yourArray.push($(this).val());//push value in array
      });
      
      values = {
      
      extralist_text: yourArray
    
    };
    console.log(values)
    var json=values;
    var data = {
        page:$('#url').val(),
          content: yourArray
       
       };
       data[csrfName] = csrfHash;
   $.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Cinvoice/setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
        if(data) {
           console.log(data);
        }
    }  
   });
   });
   
   
   
   
    $(document).ready(function() {
  // Function to toggle column visibility
  function toggleColumnVisibility(columnSelector, isChecked) {
    $(columnSelector).toggle(isChecked);
  }

  // Loop through checkboxes and initialize column visibility
  $("input:checkbox").each(function() {
    var columnValue = $(this).attr("value");
    var columnSelector = "table ." + columnValue;
    var isChecked = localStorage.getItem(columnSelector) === "true" || $(this).prop("checked");
    
    // Store checkbox state in localStorage
    localStorage.setItem(columnSelector, isChecked);

    // Toggle column visibility based on checkbox state
    toggleColumnVisibility(columnSelector, isChecked);
    
    // Set checkbox state
    $(this).prop("checked", isChecked);
  });

  // When a checkbox is clicked, update localStorage and toggle column visibility
  $("input:checkbox").click(function() {
    var columnValue = $(this).attr("value");
    var columnSelector = "table ." + columnValue;
    var isChecked = $(this).is(":checked");
    
    // Store checkbox state in localStorage
    localStorage.setItem(columnSelector, isChecked);

    // Toggle column visibility based on checkbox state
    toggleColumnVisibility(columnSelector, isChecked);
  });
});
</script>




<script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var ProductStocklistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                ProductStocklistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("ProductStocklistvisibilityStates", JSON.stringify(ProductStocklistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("ProductStocklistvisibilityStates")) || {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                if (storedVisibilityStates.hasOwnProperty(rowID) && !storedVisibilityStates[rowID]) {
                    row.hide();
                } else {
                    row.show();
                }
            });
         }
         // Event listener for row clicks to toggle row visibility
         $(".bank_edit").on('click', function() {
            var row = $(this);
            row.toggle();
            storeVisibilityState(); // Store the updated visibility state
         });
         applyVisibilityState(); 
         });
      </script>




<style>
   .pagecontroller {
   margin: 5px;
   }
   /* .filip-horizontal:hover{
   background-color: crimson;
   transition: all 1s;
   -webkit-transform: rotateY(-360deg);
   -ms-transform: rotateY(-360deg);
   transform: rotateY(-360deg);
   } */
   .ads{
   max-width: 0px !important;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
   }
</style>