





// Counts and limit for purchase order


//Calculate store product
"use strict";
function calculate_store(sl) {
   
    var gr_tot = 0;
    var dis = 0;
    var item_ctn_qty    = $("#cartoon_"+sl).val();
    var vendor_rate = $("#product_rate_"+sl).val();

    var total_price     = item_ctn_qty * vendor_rate;
    $("#total_price_"+sl).val(total_price.toFixed(2));

   
    //Total Price
    $(".total_price").each(function() {
        isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
    });
     $(".discount").each(function() {
        isNaN(this.value) || 0 == this.value.length || (dis += parseFloat(this.value))
    });

    $("#Total").val(gr_tot.toFixed(2,2));
    var grandtotal = gr_tot - dis;
   //
    invoice_paidamount();
    var first=$("#Total").val();
var custo_amt=$('#custocurrency_rate').val();
var valuee=first*custo_amt;
console.log(first+"/"+custo_amt);
var custo_final = isNaN(parseInt(valuee)) ? 0 : parseInt(valuee);
$("#gtotal").val(custo_final);

$('#vendor_gtotal').val(custo_final);  
var paid=$('#amount_paid').val();
var f=parseInt(custo_final-paid);
$('#balance').val(f);
}


    function invoice_paidamount() {
  var t = $("#grandTotal").val(),
        a = $("#paidAmount").val(),
        e = t - a;
 if(e > 0){
$("#dueAmmount").val(e.toFixed(2,2))
}else{
$("#dueAmmount").val(0)   
}
}

"use strict";
function full_paid() {
var grandTotal = $("#grandTotal").val();
$("#paidAmount").val(grandTotal);
invoice_paidamount();
calculate_store();
}

//Delete row

"use strict";
function deleteRow(t) {
    var a = $("#purchaseTable > tbody > tr").length;
    if (1 == a)
        alert("There only one row you can't delete.");
    else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e),
                calculateSum();
        invoice_paidamount();
        var current = 1;
        $("#purchaseTable > tbody > tr td input.productSelection").each(function () {
            current++;
            $(this).attr('id', 'product_name' + current);
        });
        var common_qnt = 1;
        $("#purchaseTable > tbody > tr td input.common_qnt").each(function () {
            common_qnt++;
            $(this).attr('id', 'total_qntt_' + common_qnt);
            $(this).attr('onkeyup', 'quantity_calculate('+common_qnt+');');
            $(this).attr('onchange', 'quantity_calculate('+common_qnt+');');
        });
        var common_rate = 1;
        $("#purchaseTable > tbody > tr td input.common_rate").each(function () {
            common_rate++;
            $(this).attr('id', 'price_item_' + common_rate);
            $(this).attr('onkeyup', 'quantity_calculate('+common_qnt+');');
            $(this).attr('onchange', 'quantity_calculate('+common_qnt+');');
        });
        var common_discount = 1;
        $("#purchaseTable > tbody > tr td input.common_discount").each(function () {
            common_discount++;
            $(this).attr('id', 'discount_' + common_discount);
            $(this).attr('onkeyup', 'quantity_calculate('+common_qnt+');');
            $(this).attr('onchange', 'quantity_calculate('+common_qnt+');');
        });
        var common_total_price = 1;
        $("#purchaseTable > tbody > tr td input.common_total_price").each(function () {
            common_total_price++;
            $(this).attr('id', 'total_price_' + common_total_price);
        });
   var first=$("#Total").val();
var tax= $('#product_tax').val();
var field = tax.split('-');

var percent = field[1];
var answer=0;
var answer = parseInt((percent / 100) * first);
console.log("Answer : "+answer);
var gtotal = parseInt(first + answer);
console.log("gtotal :" +gtotal);
var final_g= $('#final_gtotal').val();


var amt=parseInt(answer)+parseInt(first);
var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
var custo_amt=$('#custocurrency_rate').val(); 
console.log("numhere :"+num +"-"+custo_amt);
var value=parseInt(num*custo_amt);
var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);  
calculate();
       

    }

   // calculateSum();
}

"use strict";
function calculateSum() {
     var taxnumber = $("#txfieldnum").val();
      var t = 0,
            a = 0,
            e = 0,
            o = 0,
            p = 0,
            f = 0,
            ad = 0,
            tx = 0,
            ds = 0,
            s_cost =  $("#shipping_cost").val();
    //Total Tax
   for(var i=0;i<taxnumber;i++){
var j = 0;
    $(".total_tax"+i).each(function () {
        isNaN(this.value) || 0 == this.value.length || (j += parseFloat(this.value))
    });
            $("#total_tax_ammount"+i).val(j.toFixed(2, 2));
    }
            //Total Discount
            $(".total_discount").each(function () {
        isNaN(this.value) || 0 == this.value.length || (p += parseFloat(this.value))
    }),
            $("#total_discount_ammount").val(p.toFixed(2, 2)),
             $(".totalTax").each(function () {
        isNaN(this.value) || 0 == this.value.length || (f += parseFloat(this.value))
    }),
            $("#total_tax_amount").val(f.toFixed(2, 2)),
            //Total Price
            $(".total_price").each(function () {
        isNaN(this.value) || 0 == this.value.length || (t += parseFloat(this.value))
    }),
 $(".dppr").each(function () {
        isNaN(this.value) || 0 == this.value.length || (ad += parseFloat(this.value))
    }),
            o = a.toFixed(2, 2),
            e = t.toFixed(2, 2),
            tx = f.toFixed(2, 2),
    ds = p.toFixed(2, 2);
 
    var test = +tx + +s_cost + +e + -ds + + ad;
    $("#Total").val(e);
}



"use strict";
function product_pur_or_list(sl) {

var supplier_id = $('#supplier_id').val();
var base_url = $('#base_url').val();
var csrf_test_name = $('[name="csrf_test_name"]').val();
if ( supplier_id == 0) {
    alert('Please select Supplier !');
    return false;
}

// Auto complete
var options = {
    minLength: 0,
    source: function( request, response ) {
        var product_name = $('#product_name_'+sl).val();
    $.ajax( {
      url: base_url + "Cpurchase/product_search_by_supplier",
      method: 'post',
      dataType: "json",
      data: {
        term: request.term,
        supplier_id:$('#supplier_id').val(),
        product_name:product_name,
        csrf_test_name:csrf_test_name
      },
      success: function( data ) {

        if(data=='No Product Found')
        {
            // $('.product_name').val('');
            alert('Please select product from the list');
        }
        else{
            response( data );
        }
        
      }
    });
  },
   focus: function( event, ui ) {
       $(this).val(ui.item.label);
       return false;
   },
   select: function( event, ui ) {
        $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value); 
        var sl = $(this).parent().parent().find(".sl").val(); 

        var product_id          = ui.item.value;
      
       var  supplier_id=$('#supplier_id').val();
 
       
        var base_url    = $('.baseUrl').val();

        var available_quantity    = 'available_quantity_'+sl;
        var product_rate    = 'product_rate_'+sl;

     
        $.ajax({
            type: "POST",
            url: base_url + "Cinvoice/retrieve_product_data",
            data: {product_id:product_id,supplier_id:supplier_id,csrf_test_name:csrf_test_name},
            cache: false,
            success: function(data)
            {
                console.log(data);
              var  obj = JSON.parse(data);
               $('#'+available_quantity).val(obj.total_product);
                $('#'+product_rate).val(obj.supplier_price);
              
            } 
        });

        $(this).unbind("change");
        return false;
   }
}

$('body').on('keypress.autocomplete', '.product_name', function() {
   $(this).autocomplete(options);
});

}



    "use strict";
  function bank_paymet(val){
    if(val==2){
       var style = 'block'; 
       document.getElementById('bank_id').setAttribute("required", true);
    }else{
var style ='none';
document.getElementById('bank_id').removeAttribute("required");
    }
       
document.getElementById('bank_div').style.display = style;
}

$( document ).ready(function() {
    var paytype = $("#editpayment_type").val();
    if(paytype == 2){
      $("#bank_div").css("display", "block");        
  }else{
   $("#bank_div").css("display", "none"); 
  }

  $(".bankpayment").css("width", "100%");
});


$(document).ready(function() { 
      "use strict";
 var csrf_test_name = $('[name="csrf_test_name"]').val();
 var total_purchase_no = $("#total_purchase_no").val();
 var base_url = $("#base_url").val();
   var currency = $("#currency").val();
var purchasedatatable = $('#PurList').DataTable({ 
         responsive: true,

         "aaSorting": [[4, "desc" ]],
         "columnDefs": [
            { "bSortable": false, "aTargets": [0,1,2,3,5,6] },

        ],
       'processing': true,
       'serverSide': true,

      
       'lengthMenu':[[10, 25, 50,100,250,500, total_purchase_no], [10, 25, 50,100,250,500, "All"]],

         dom:"'<'col-sm-4'l><'col-sm-4 text-center'><'col-sm-4'>Bfrtip", buttons:[ {
            extend: "copy",exportOptions: {
                   columns: [ 0,1,2,3,4,5 ] //Your Colume value those you want
                       }, className: "btn-sm prints"
        }
        , {
            extend: "csv", title: "PurchaseLIst",exportOptions: {
                   columns: [ 0,1,2,3,4,5] //Your Colume value those you want print
                       }, className: "btn-sm prints"
        }
        , {
            extend: "excel",exportOptions: {
                   columns: [0,1,2,3,4,5 ] //Your Colume value those you want print
                       }, title: "PurchaseLIst", className: "btn-sm prints"
        }
        , {
            extend: "pdf",exportOptions: {
                   columns: [0,1,2,3,4,5] //Your Colume value those you want print
                       }, title: "PurchaseLIst", className: "btn-sm prints"
        }
        , {
            extend: "print",exportOptions: {
                   columns: [ 0,1,2,3,4,5] //Your Colume value those you want print
                       },title: "<center> PurchaseLIst</center>", className: "btn-sm prints"
        }
        ],

        
        'serverMethod': 'post',
        'ajax': {
           'url':base_url + 'Cpurchase/CheckPurchaseList',
             "data": function ( data) {
     data.fromdate = $('#from_date').val();
     data.todate = $('#to_date').val();
     data.csrf_test_name = csrf_test_name;
    
}
        },
      'columns': [
         { data: 'sl' },
         { data: 'chalan_no'},
         { data: 'purchase_id'},
         { data: 'supplier_name'},
         { data: 'purchase_date' },
         { data: 'total_amount',class:"total_sale text-right",render: $.fn.dataTable.render.number( ',', '.', 2, currency )},
         { data: 'button'},
      ],

"footerCallback": function(row, data, start, end, display) {
var api = this.api();
api.columns('.total_sale', {
page: 'current'
}).every(function() {
var sum = this
  .data()
  .reduce(function(a, b) {
    var x = parseFloat(a) || 0;
    var y = parseFloat(b) || 0;
    return x + y;
  }, 0);
$(this.footer()).html(currency+' '+sum.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}));
});
}


});


$('#btn-filter').click(function(){ 
purchasedatatable.ajax.reload();  
});

});




$(document).ready(function() { 
      "use strict";
 var csrf_test_name = $('[name="csrf_test_name"]').val();
 var total_purchase_no = $("#total_purchase_no").val();
 var base_url = $("#base_url").val();
   var currency = $("#currency").val();
var purchasedatatable = $('#PurOrderList').DataTable({ 
         responsive: true,

         "aaSorting": [[4, "desc" ]],
         "columnDefs": [
            { "bSortable": false, "aTargets": [0,1,2,3,5,6] },

        ],
       'processing': true,
       'serverSide': true,

      
       'lengthMenu':[[10, 25, 50,100,250,500, total_purchase_no], [10, 25, 50,100,250,500, "All"]],

         dom:"'<'col-sm-4'l><'col-sm-4 text-center'><'col-sm-4'>Bfrtip", buttons:[ {
            extend: "copy",exportOptions: {
                   columns: [ 0,1,2,3,4,5 ] //Your Colume value those you want
                       }, className: "btn-sm prints"
        }
        , {
            extend: "csv", title: "PurchaseLIst",exportOptions: {
                   columns: [ 0,1,2,3,4,5] //Your Colume value those you want print
                       }, className: "btn-sm prints"
        }
        , {
            extend: "excel",exportOptions: {
                   columns: [0,1,2,3,4,5 ] //Your Colume value those you want print
                       }, title: "PurchaseLIst", className: "btn-sm prints"
        }
        , {
            extend: "pdf",exportOptions: {
                   columns: [0,1,2,3,4,5] //Your Colume value those you want print
                       }, title: "PurchaseLIst", className: "btn-sm prints"
        }
        , {
            extend: "print",exportOptions: {
                   columns: [ 0,1,2,3,4,5] //Your Colume value those you want print
                       },title: "<center> PurchaseLIst</center>", className: "btn-sm prints"
        }
        ],

        
        'serverMethod': 'post',
        'ajax': {
           'url':base_url + 'Cpurchase/CheckPurchaseOrderList',
             "data": function ( data) {
     data.fromdate = $('#from_date').val();
     data.todate = $('#to_date').val();
     data.csrf_test_name = csrf_test_name;
    
}
        },
      'columns': [
         { data: 'sl' },
         { data: 'chalan_no'},
         { data: 'purchase_id'},
         { data: 'supplier_name'},
         { data: 'purchase_date'},
         { data: 'total_amount',class:"total_sale text-right",render: $.fn.dataTable.render.number( ',', '.', 2, currency )},
         { data: 'button'},
      ],

"footerCallback": function(row, data, start, end, display) {
var api = this.api();
api.columns('.total_sale', {
page: 'current'
}).every(function() {
var sum = this
  .data()
  .reduce(function(a, b) {
    var x = parseFloat(a) || 0;
    var y = parseFloat(b) || 0;
    return x + y;
  }, 0);
$(this.footer()).html(currency+' '+sum.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}));
});
}


});


$('#btn-filter').click(function(){ 
purchasedatatable.ajax.reload();  
});

});



