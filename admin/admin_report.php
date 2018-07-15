<?php $title="SALES REPORTS"; include"side_nav.php";
echo"
<div id='reportbox'>
<div class='reportheader'>
<label>Reports</label>
</div>
<div class='report1'>
<form method='POST' action='admin_report_result.php'>
<div>
<label>History</label>
</div>
<div>
<input type='radio' name='history' value='purchased_item' checked='checked'>
<p>Sold Products</p>
</div>
<div>
<input type='radio' name='history' value='payments'>
<p>Customer Payments</p>
</div>
</div>
<div class='report1'>
<div>
	<label>Start Date:</label>
</div>
<div>
	<input type='date' name='start_date' value=".date('Y-m-d')." required=''>
</div>
<div>
	<label>End Date:</label>
</div>
<div>
	<input type='date' name='end_date'  required=''>
</div>
<div>
	<button type='submit' name='reports'>Search</button>
</form>
</div>
</div>
</div>
";?>