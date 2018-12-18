<?php $title="SALES REPORTS";
include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
?>
<div id="reportbox">
<div class="reportheader">
<label><span class="fa fa-gear" aria-hidden="true"></span> Reports</label>
</div>
<div class="report1">
<form method="POST" action='report_result.php'>
<div>
<label>History</label>
</div>
<div>
<input type="radio" name="history" value="purchased_item" checked="checked">
<p>Sold Products</p>
</div>
<div>
<input type="radio" name="history" value="payments">
<p>Customer Payments</p>
</div>
</div>
<div class="report1">
<div>
	<label>Start Date:</label>
</div>
<div>
	<input type="date" name="start_date" class='fa fa-calendar' aria-hidden='true' required="">
</div>
<div>
	<label>End Date:</label>
</div>
<div>
	<input type="date" name="end_date"  class='fa fa-calendar' aria-hidden='true'  required="">
</div>
<div>
	<button type="submit" name="reports">Search</button>
</form>
</div>
</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>