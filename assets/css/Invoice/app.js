$(function () {

    'use strict';

    /**
     * Generating PDF from HTML using jQuery
     */
    $(document).on('click', '#invoice_download_btn', function () {

      




        var contentWidth = $("#invoice_wrapper").width();
        var contentHeight = $("#invoice_wrapper").height();
        var topLeftMargin = 20;
        var pdfWidth = contentWidth + (topLeftMargin * 2);
        var pdfHeight = (pdfWidth * 1.5) + (topLeftMargin * 2);
        var canvasImageWidth = contentWidth;
        var canvasImageHeight = contentHeight;
        var totalPDFPages = Math.ceil(contentHeight / pdfHeight) - 1;

   html2canvas($('#invoice_wrapper'), {
                onrendered: function (canvas) {
                             var imgWidth = 210;
var pageHeight = 295;
var imgHeight = canvas.height * imgWidth / canvas.width;
var heightLeft = imgHeight;

     var imgData = canvas.toDataURL('image/png');

var doc = new jsPDF('p', 'mm');
var position = 0;

doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
heightLeft -= pageHeight;

while (heightLeft >= 0) {
position = heightLeft - imgHeight;
doc.addPage();
doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
heightLeft -= pageHeight;
}
doc.save( 'file.pdf');
                }
            });



      
    });
})