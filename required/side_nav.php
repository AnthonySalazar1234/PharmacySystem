<?php 
include($_SERVER['DOCUMENT_ROOT'].'/required/header.php');
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
if($user_type===admin){
echo"
<nav class='menu'>
  <ul>
     <li><a href='admin_index.php'><span class='fa fa-dashboard' aria-hidden='true'></span> DASHBOARD</a></li>
      <li><a href='admin_products.php'><span class='fa fa-cubes' aria-hidden='true'></span> MEDICINES</a></li>
      <li><a href='admin_sales.php'><span class='fa fa-bar-chart' aria-hidden='true'></span> SALES</a></li>
      <li><a href='admin_report.php'><span class='fa fa-line-chart' aria-hidden='true'></span> SALES REPORTS</a></li>
      <li><a href='admin_supplier.php'><span class='fa fa-truck' aria-hidden='true'></span> SUPPLIERS</a></li>
        <li><a href='user.php'><span class='fa fa-users' aria-hidden='true'></span> USERS</a></li>
    </ul>
</nav>
";
}

else if($user_type===user){
echo"
<nav class='menu'>
  <ul>
     <li><a href='index.php'><span class='fa fa-dashboard' aria-hidden='true'></span>DASHBOARD</a></li>
      <li><a href='products.php'><span class='fa fa-cubes' aria-hidden='true'></span> MEDICINES</a></li>
      <li><a href='pos.php'><span class='fa fa-shopping-cart' aria-hidden='true'></span> POINT OF SALE</a></li>
      <li><a href='transactions.php'><span class='fa fa-file' aria-hidden='true'></span> TRANSACTIONS</a></li>
      <li><a href='report.php'><span class='fa fa-bar-chart' aria-hidden='true'></span> SALES REPORTS</a></li>
       <li><a href='sales.php'><span class='fa fa-line-chart' aria-hidden='true'></span> SALES</a></li>
      <li><a href='supplier.php'><span class='fa fa-truck' aria-hidden='true'></span> SUPPLIERS</a></li>
    </ul>
</nav>
";
}

else{
	header('Location:/R&S/index.php');
}
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'required/footer.php'); ?>