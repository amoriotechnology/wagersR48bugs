
//Quantity calculat
    "use strict";
function quantity_calculate(item) {
    var quantity = $("#total_qntt_" + item).val();
      console.log("quantity"+quantity);
    var available_quantity = $(".available_quantity_" + item).val();
    var price_item = $("#price_item_" + item).val();

    var invoice_discount = $("#invoice_discount").val();
    var discount = $("#discount_" + item).val();
    var total_tax = $("#total_tax_" + item).val();
    var total_discount = $("#total_discount_" + item).val();
    var taxnumber = $("#txfieldnum").val();
    var dis_type = $("#discount_type_" + item).val();
    if (parseInt(quantity) > parseInt(available_quantity)) {
        console.log("amount");
        var message = "You can Sale maximum " + available_quantity + " Items";
        alert(message);
        $("#total_qntt_" + item).val('');
        var quantity = 0;
        $("#total_price_" + item).val(0);
        for(var i=0;i<taxnumber;i++){
        $("#all_tax"+i+"_" + item).val(0);
           quantity_calculate(item);
    }
    }

if (quantity < 0 || discount < 0) {
      console.log("hello2");
        if (dis_type == 1) {
              console.log("hello3");
            var price = quantity * price_item;
            var dis = +(price * discount / 100);
            $("#all_discount_" + item).val(dis);
            //Total price calculate per product
            var temp = price - dis;
            var ttletax = 0;
            $("#total_price_" + item).val(temp);
             for(var i=0;i<taxnumber;i++){
           var tax = (temp-ttletax) * $("#total_tax"+i+"_" + item).val();
           ttletax += Number(tax);
            $("#all_tax"+i+"_" + item).val(tax);
    }

          
        } else if (dis_type == 2) {
              console.log("hello4");
            var price = quantity * price_item;

            // Discount cal per product
            var dis = (discount * quantity);

            $("#all_discount_" + item).val(dis);

            //Total price calculate per product
            var temp = price - dis;
            $("#total_price_" + item).val(temp);

            var ttletax = 0;
             for(var i=0;i<taxnumber;i++){
           var tax = (temp-ttletax) * $("#total_tax"+i+"_" + item).val();
           ttletax += Number(tax);
            $("#all_tax"+i+"_" + item).val(tax);
    }
        } else if (dis_type == 3) {
              console.log("hello5");
            var total_price = quantity * price_item;
             var dis =  discount;
            // Discount cal per product
            $("#all_discount_" + item).val(dis);
            //Total price calculate per product
            var price = total_price - dis;
            $("#total_price_" + item).val(price);

             var ttletax = 0;
             for(var i=0;i<taxnumber;i++){
           var tax = (price-ttletax) * $("#total_tax"+i+"_" + item).val();
           ttletax += Number(tax);
            $("#all_tax"+i+"_" + item).val(tax);
    }
        }
    } 
else {
          console.log("hello6");
        var n = parseFloat(quantity) * price_item;
        console.log(price_item+"/"+"surya");
        console.log("satyam|"+quantity);
        var c = quantity * price_item * total_tax;
       
        $("#total_price_" + item).val(n),
                $("#all_tax_" + item).val(c)
    }
    calculateSum();
    invoice_paidamount();
}
//Calculate Sum
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

//Invoice Paid Amount
    "use strict";
function invoice_paidamount() {
 var  prb = parseFloat($("#previous").val(), 10);
 var pr = 0;
 var d = 0;
 var nt = 0;
    if(prb != 0){
        pr =  prb;
    }else{
        pr = 0;
    }
    var t = $("#grandTotal").val(),
            a = $("#paidAmount").val(),
            e = t - a,
            f = e + pr,
            nt = parseFloat(t, 10) + pr;
            d = a - nt;
    $("#n_total").val(nt.toFixed(2, 2));      
     if(f > 0){
    $("#dueAmmount").val(f.toFixed(2,2));
     if(a <= f){
     $("#change").val(0);   
    }
   }else{
    if(a < f){
     $("#change").val(0);   
    }
    if(a > f){
        $("#change").val(d.toFixed(2,2))
    }
  $("#dueAmmount").val(0)   

}
}

//Stock Limit
    "use strict";
function stockLimit(t) {
    var a = $("#total_qntt_" + t).val(),
            e = $(".product_id_" + t).val(),
            o = $(".baseUrl").val();

    $.ajax({
        type: "POST",
        url: o + "Cinvoice/product_stock_check",
        data: {
            product_id: e
        },
        cache: !1,
        success: function (e) {
            alert(e);
            if (a > Number(e)) {
                var o = "You can Sale maximum " + e + " Items";
                alert(o), $("#qty_item_" + t).val("0"), $("#total_qntt_" + t).val("0"), $("#total_price_" + t).val("0")
            }
        }
    })
}


    "use strict";
function stockLimitAjax(t) {
    var a = $("#total_qntt_" + t).val(),
            e = $(".product_id_" + t).val(),
            o = $(".baseUrl").val();
            
    $.ajax({
        type: "POST",
        url: o + "Cinvoice/product_stock_check",
        data: {
            product_id: e
        },
        cache: !1,
        success: function (e) {
            alert(e);
            if (a > Number(e)) {
                var o = "You can Sale maximum " + e + " Items";
                alert(o), $("#qty_item_" + t).val("0"), $("#total_qntt_" + t).val("0"), $("#total_price_" + t).val("0.00"), calculateSum()
            }
        }
    })
}

//Invoice full paid
    "use strict";
function full_paid() {
    var grandTotal = $("#n_total").val();
    $("#paidAmount").val(grandTotal);
    invoice_paidamount();
    calculateSum();
}

//Delete a row of table
    "use strict";
function deleteRow(t) {
    var a = $(".normalinvoice > tbody > tr").length;
    if (1 == a)
        alert("There only one row you can't delete.");
    else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e),
                calculateSum();
        invoice_paidamount();
     
 $('.table').each(function() {
     var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
      var sum=0;
 // var overall_sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
$('#Total_'+id).val(sum).trigger('change');


var overall_sum=0;
     $('.table').find('.b_total').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
 $('#Over_all_Total').val(overall_sum).trigger('change');
});
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
  var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');
 //$('.table').each(function() {
    // var overall_sum=0;
    // $('.table .total_price').each(function() {
    //     var precio = $(this).val();
    //     if (!isNaN(precio) && precio.length !== 0) {
    //       overall_sum += parseFloat(precio);
    //     }
    //     $('#Over_all_Total').val(overall_sum).trigger('change');
    //   });

     
 //   });

  //});


       // var current = 1;
        // $(".normalinvoice > tbody > tr td input.productSelection").each(function () {
        //     current++;
        //     $(this).attr('id', 'product_name' + current);
        // });
        // var common_qnt = 1;
        // $(".normalinvoice > tbody > tr td input.common_qnt").each(function () {
        //     common_qnt++;
        //     $(this).attr('id', 'total_qntt_' + common_qnt);
        //     $(this).attr('onkeyup', 'quantity_calculate('+common_qnt+');');
        //     $(this).attr('onchange', 'quantity_calculate('+common_qnt+');');
        // });
        // var common_rate = 1;
        // $(".normalinvoice > tbody > tr td input.common_rate").each(function () {
        //     common_rate++;
        //     $(this).attr('id', 'price_item_' + common_rate);
        //     $(this).attr('onkeyup', 'quantity_calculate('+common_qnt+');');
        //     $(this).attr('onchange', 'quantity_calculate('+common_qnt+');');
        // });
        // var common_discount = 1;
        // $(".normalinvoice > tbody > tr td input.common_discount").each(function () {
        //     common_discount++;
        //     $(this).attr('id', 'discount_' + common_discount);
        //     $(this).attr('onkeyup', 'quantity_calculate('+common_qnt+');');
        //     $(this).attr('onchange', 'quantity_calculate('+common_qnt+');');
        // });
        // var common_total_price = 1;
        // $(".normalinvoice > tbody > tr td input.common_total_price").each(function () {
        //     common_total_price++;
        //     $(this).attr('id', 'total_price_' + common_total_price);
        // });

       

    }

    calculateSum();
}
var count = 2,
        limits = 500;



    "use strict";
    function bank_info_show(payment_type)
    {
        if (payment_type.value == "1") {
            document.getElementById("bank_info_hide").style.display = "none";
        } else {
            document.getElementById("bank_info_hide").style.display = "block";
        }
    }

     "use strict";
    function active_customer(status)
    {
        if (status == "payment_from_2") {
            document.getElementById("payment_from_2").style.display = "none";
            document.getElementById("payment_from_1").style.display = "block";
            document.getElementById("myRadioButton_2").checked = false;
            document.getElementById("myRadioButton_1").checked = true;
        } else {
            document.getElementById("payment_from_1").style.display = "none";
            document.getElementById("payment_from_2").style.display = "block";
            document.getElementById("myRadioButton_2").checked = false;
            document.getElementById("myRadioButton_1").checked = true;
        }
    }


        window.onload = function () {
        $('body').addClass("sidebar-mini sidebar-collapse");
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

    $(document ).ready(function() {
    $('#normalinvoice .toggle').on('click', function() {
    $('#normalinvoice .hideableRow').toggleClass('hiddenRow');
  })
});

     "use strict";
    function customer_due(id){
   var csrf_test_name = $('[name="csrf_test_name"]').val();
   var base_url = $("#base_url").val();
        $.ajax({
            url: base_url + 'Cinvoice/previous',
            type: 'post',
            data: {customer_id:id,csrf_test_name:csrf_test_name}, 
            success: function (msg){
               
                $("#previous").val(msg);
            },
            error: function (xhr, desc, err){
                 alert('failed');
            }
        });        
    }

       $('.ac').click(function () {
        $('.customer_hidden_value').val('');
    });
    $('#myRadioButton_1').click(function () {
        $('#customer_name').val('');
    });

    $('#myRadioButton_2').click(function () {
        $('#customer_name_others').val('');
    });
    $('#myRadioButton_2').click(function () {
        $('#customer_name_others_address').val('');
    });


      "use strict";
    function customer_autocomplete(sl) {

    var customer_id = $('#customer_id').val();
    // Auto complete
    var options = {
        minLength: 0,
        source: function( request, response ) {
            var customer_name = $('#customer_name').val();
            var csrf_test_name = $('[name="csrf_test_name"]').val();
            var base_url = $("#base_url").val();
         
        $.ajax( {
          url: base_url + "Cinvoice/customer_autocomplete",
          method: 'post',
          dataType: "json",
          data: {
            term: request.term,
            customer_id:customer_name,
            csrf_test_name:csrf_test_name,
          },
          success: function( data ) {
            response( data );

          }
        });
      },
       focus: function( event, ui ) {
           $(this).val(ui.item.label);
           return false;
       },
       select: function( event, ui ) {
            $(this).parent().parent().find("#autocomplete_customer_id").val(ui.item.value); 
            var customer_id          = ui.item.value;
            customer_due(customer_id);

            $(this).unbind("change");
            return false;
       }
   }

   $('body').on('keypress.autocomplete', '#customer_name', function() {
       $(this).autocomplete(options);
   });

}

    "use strict";
function cancelprint(){
   location.reload();
}

$(document).ready(function(){

    $('#full_paid_tab').keydown(function(event) {
        if(event.keyCode == 13) {
 $('#add_invoice').trigger('click');
        }
    });
});



     $(document).ready(function() {
    "use strict";
   var frm = $("#insert_sale");
    var output = $("#output");
    frm.on('submit', function(e) {
         e.preventDefault(); 
               $.ajax({
            url : $(this).attr('action'),
            method : $(this).attr('method'),
            dataType : 'json',
            data : frm.serialize(),
            success: function(data) 
            {
                 
                if (data.status == true) {
                    output.empty().html(data.message).addClass('alert-success').removeClass('alert-danger').removeClass('hide');
              
                    $("#inv_id").val(data.invoice_id);
                  $('#printconfirmodal').modal('show');
                   if(data.status == true && event.keyCode == 13) {
        }
                } else {
                    output.empty().html(data.exception).addClass('alert-danger').removeClass('alert-success').removeClass('hide');
                }
            },
            error: function(xhr)
            {
              //  alert('failed ok!');
            }
        });
    });
     });
     $("#printconfirmodal").on('keydown', function ( e ) {
    var key = e.which || e.keyCode;
    if (key == 13) {
       $('#yes').trigger('click');
    }
});


    "use strict";
     function invoice_productList(sl) {

 var priceClass = 'product_rate_'+sl;
        var available_quantity = 'available_quantity_'+sl;
        var unit = 'unit_'+sl;
        var tax = 'total_tax_'+sl;
        var serial_no = 'serial_no_'+sl;
        var discount_type = 'discount_type_'+sl;
        var csrf_test_name = $('[name="csrf_test_name"]').val();
        var base_url = $("#base_url").val();

    // Auto complete
    var options = {
        minLength: 0,
        source: function( request, response ) {
            var product_name = $('#product_name_'+sl).val();
        $.ajax( {
          url: base_url + "Cinvoice/autocompleteproductsearch",
          method: 'post',
          dataType: "json",
          data: {
            term: request.term,
            product_name:product_name,
            csrf_test_name:csrf_test_name,
          },
          success: function( data ) {
            response( data );

          }
        });
      },
       focus: function( event, ui ) {
           $(this).val(ui.item.label);
           return false;
       },
       select: function( event, ui ) {
            $(this).parent().parent().find(".autocomplete_hidden_value").val(ui.item.value); 
                $(this).val(ui.item.label);
                var id=ui.item.value;
                var dataString = 'product_id='+ id;
                var base_url = $('.baseUrl').val();

                $.ajax
                   ({
                        type: "POST",
                        url: base_url+"Cinvoice/retrieve_product_data_inv",
                        data: {product_id:id,csrf_test_name:csrf_test_name},
                        cache: false,
                        success: function(data)
                        {
                            console.log(data);

                            var obj = jQuery.parseJSON(data);
                            console.log(obj);
                           //  for (var i = 0; i < (obj.txnmber); i++) {
                           //  var txam = obj.taxdta[i];
                           //  var txclass = 'total_tax'+i+'_'+sl;
                           // $('.'+txclass).val(obj.taxdta[i]);
                           //  }

                            $('#'+priceClass).val(obj.price);
                            $('.'+available_quantity).val(obj.total_product.toFixed(2,2));
                            $('.'+unit).val(obj.unit);
                            $('.'+tax).val(obj.tax);
                            $('#txfieldnum').val(obj.txnmber);
                            $('#'+serial_no).html(obj.serial);
                            $('#'+discount_type).val(obj.discount_type);
                                   quantity_calculate(sl);
                            
                        } 
                    });

            $(this).unbind("change");
            return false;
       }
   }

   $('body').on('keypress.autocomplete', '.productSelection', function() {
       $(this).autocomplete(options);
   });

}

 $( document ).ready(function() {
        "use strict";
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
 $("#newcustomer").submit(function(e){
        e.preventDefault();
        var customeMessage   = $("#customeMessage");
        var customer_id      = $("#autocomplete_customer_id");
        var customer_name    = $("#customer_name");
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function()
            {
                customeMessage.removeClass('hide');
               
            },
            success: function(data)
            {
                if (data.status == true) {
                    customeMessage.addClass('alert-success').removeClass('alert-danger').html(data.message);
                    customer_id.val(data.customer_id);
                    customer_name.val(data.customer_name);
                     $("#cust_info").modal('hide');
                } else {
                    customeMessage.addClass('alert-danger').removeClass('alert-success').html(data.error_message);
                }
            },
            error: function(xhr)
            {
               // alert('failed ok1!');
            }

        });

    });
 });