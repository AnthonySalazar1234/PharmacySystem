function PrintDiv() {    
var divToPrint = document.getElementById('divToPrint');
var popupWin = window.open('Test', '_blank', 'width=500,height=500');
popupWin.document.open();
popupWin.document.write('<html><head><title>R&S PHARMACY - Print Report</title><style type="text/css" media="print">table {width: 100%; border-collapse: collapse;}tr.resultsrow td,tr.resultslabel th {border: black 1px solid; padding: 5px 10px;}th {text-align: center;}</style></head><body onload="window.print()">' + table_box.innerHTML + '</body></html>');
popupWin.document.close();
}