
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
	<title>DataTables example - Language file</title>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="assets/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	

$(document).ready(function() {
	$('#example').DataTable( {

	} );
	$('#generate_btn').click(function()
	{
		var orderID_content=$('#get_orderID').val().split("\n");
		$('#get_orderID').val("");
		if (orderID_content=="")
		{
				alert("warning! Type the Order_ID");	
		}
		else
		{			
			var postdata = {};
			// postdata['array_orderID'] =orderID_content;
			$.ajax({
            type : "POST", 
            url  : "index.php/welcome/get_barcode",
            data : { postdata : orderID_content},
            success: function(data){  
            	 var allText="";
            	  var rawFile = new XMLHttpRequest();
				  rawFile.open("GET", "test.txt", true);
				  rawFile.onreadystatechange = function() {
				    if (rawFile.readyState === 4) {
				      allText = rawFile.responseText;
				      $('#divPrint').html(allText);
				      PrintDiv();
				      document.getElementById("textSection").innerHTML = allText;
				    }
				  }

				  rawFile.send();
				  



            	// PrintDiv();
       //                     var fs = require('fs');
							// var files = fs.readdirSync('application/cache/');
							//alert(data);
                    }
        });
    
		}
	})
} );

	function PrintDiv() {  
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=800,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
     }
	</script>
</head>
<body class="dt-example">
	<div class="container">
		<section style="margin-top:70px">
			<h1 class="demo-html">Manage barcodes</h1>
			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Order_ID</th>
						<th>Product_SKU</th>
						<th>Product_Title</th>
						<th>Product_QTY</th>
						<th>Order_Date</th>
					</tr>
				</thead>
				<tbody>
						<?php foreach ($products as $tabledata) { ?>
					<tr>
						<td><?= $tabledata->order_id?></td>
						<td><?= $tabledata->product_sku?></td>
						<td><?= $tabledata->product_title?></td>
						<td><?= $tabledata->product_qty?></td>
						<td><?= $tabledata->order_date?></td>
			
					</tr>
					<?php } ?>
				</tbody>

			</table>

		</section>
	</div>
			<div style="max-width: 100px; margin: auto;">
				<div style="display: flex;">
					<div>
					  <textarea id="get_orderID" rows="2" id="comment" style="display:inline;font-size: 16px;width: 90px"></textarea>
					</div>
					<div>
					   <button id="generate_btn" type="button" class="col-md-6 btn btn-success" style="font-size: 16px;max-width: 180px;width: 300px; height:55px;margin-left: 10px">Generate
					   </button>
					    </div>     
				</div>
			</div>
			<div id="divToPrint" style="display:none;">
				  <div id="divPrint" style="width: 620;height: 250;text-align: center">
				         
				  </div>
			</div>
<!-- 			<div>
			  <input type="button" value="print" onclick="PrintDiv();" />
			</div> -->
</body>
</html>