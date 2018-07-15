<?php
require"connect.php";
if(isset($_POST['search'])){
    $brand_name = $_POST['brand_name'];
    $sql = "SELECT * FROM inventory WHERE brand_name = '$brand_name'";
    $result  = $connect->query($sql);
    if($result->num_rows){
    while($row = $result->fetch_array()){
    date_default_timezone_get('Asia,Manila');
    $date1 = time();
    $date2  = date('Y-m-d', $date1);
    $product_id = $row['product_id'];
    $brand_name = $row['brand_name'];
    $generic_name = $row['generic_name'];
    $category = $row['category'];  
    $dosage = $row['dosage'];  
    $expiration = $row['expiration']; 
    $price = $row['price'];
    $quantity = $row['quantity'];
        }
    }
    else if(empty($_POST['brand_name'])){
        header("location:../user/pos.php");
            $product_id = "";
             $brand_name = "";
             $generic_name = "";
             $category = "";
             $dosage = "";
             $expiration = "";
             $price = "";
             $quantity = "";
    }
    else{
         echo "<script>alert('No result');window.location.href=('../user/pos.php');</script>";
        //echo"no results";
             $product_id = "";
             $brand_name = "";
             $generic_name = "";
             $category = "";
             $dosage = "";
             $expiration = "";
             $price = "";
             $quantity = "";
            
    }
    if($expiration <= $date2){
         echo "<script>alert('Error Transaction You Have Searched Expired Medicine');window.location.href=('../user/pos.php');</script>";
             $product_id = "";
             $brand_name = "";
             $generic_name = "";
             $category = "";
             $dosage = "";
             $expiration = "";
             $price = "";
             $quantity = "";
    }    
    $result->free_result();
    $connect->close();
    
}
else{
             $product_id = "";
             $brand_name = "";
             $generic_name = "";
             $category = "";
             $dosage = "";
             $expiration = "";
             $price = "";
             $quantity = ""; 
} 

if(isset($_POST['add'])){
    $product_id = $_POST['product_id'];
    $brand_name = $_POST['brand_name'];
    $generic_name = $_POST['generic_name'];
    $expiration = $_POST['expiration'];
    $category = $_POST['category'];
    $dosage = $_POST['dosage'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $subtotal = $qty * $price;
    $date_purchased = date("Y-m-d");

$select = "SELECT * FROM inventory WHERE product_id = '$product_id'";
$result1 = $connect->query($select);
//date_default_timezone_get('Asia,Manila');
$res = $result1->fetch_assoc();
//$date1 = time();
//$date2  = date('Y-m-d', $date1);
$current_qty = $res['quantity'];
//$exp = $res['expiration'];
$select1 = "SELECT * FROM sold WHERE product_id = '$product_id'";
$result2 = $connect->query($select1);
$res1 = $result2->fetch_assoc();

if(empty($_POST['brand_name'])){
      echo"<script>alert('Sorry! Transaction Not Process Empty Data Please Search Medicine');window.location.href=('../user/pos.php')</script>";
}
else if($res['quantity']<=$qty) {
    echo"<script>alert('Transaction Not Process You Have Enter Equal or Maximum Quantity');window.location.href=('../user/pos.php')</script>";
}
//else if($exp<=$date2){
  //    echo"<script>alert('Transaction Not Process You Have Enter Expired Product');window.location.href=('../user/pos.php')</script>";
//}
else if($qty==0){
     echo"<script>alert('Unable to process you have enter empty value');window.location.href=('../user/pos.php')</script>";
}
else if($current_qty > $qty){
$insert = $connect->prepare("INSERT INTO sold(product_id,brand_name,generic_name,expiration,category,dosage,qty,price,subtotal,date_purchased)VALUES('$product_id','$brand_name','$generic_name','$expiration','$category','$dosage','$qty','$price','$subtotal','$date_purchased')");
$insert->execute();
$quantity = $res['quantity'] - $qty;
$update = $connect->prepare("UPDATE inventory SET quantity ='$quantity' WHERE product_id = '$product_id'");
$update->execute();
$qty = $res1['qty'] + $qty;
if($subtotal = $qty * $res1['price']){
     $update3 = $connect->prepare("UPDATE sold SET qty = '$qty',subtotal='$subtotal' WHERE product_id = '$product_id'");
    $update3->execute();
    echo"<script>alert('Quantity Has Been Added to $brand_name');window.location.herf=('../user/pos.php');</script>";
}
else if($qty==0&&$subtotal==0){
    $delete_sold = $connect->prepare("DELETE FROM sold WHERE product_id = '$product_id'");
    $delete_sold->execute();
    echo"<script>alert('You Have Empty Quantity Your Medicine will be deleted');window.location.href=('../user/pos.php');</script>";
 }
}
else {
    echo"<script>alert('Error Transactions');window.location.href=('../user/pos.php')</script>";
}
}
if(isset($_POST['payment'])){

    $paid = $_POST['paid'];
    $vat = $_POST['vat'];
    $total_items = $_POST['total_items'];
    $total_qty = $_POST['total_qty'];
    $total_payment = $_POST['total_payment'];
    $discount = $_POST['discount'];
    $date_paid = date("Y-m-d");
    $rs = date('mis');
    $total_change = (isset($_POST['total_change'])?$_POST['total_change']:"");
    $process = "SELECT * FROM sold";
    $result3 = $connect->query($process);
    while($row = $result3->fetch_array()){
        $product_id = $row['product_id'];
        $brand_name = $row['brand_name'];
        $generic_name = $row['generic_name'];
        $expiration = $row['expiration'];
        $category = $row['category'];
        $dosage = $row['dosage'];
        $price = $row['price'];
        $qty = $row['qty'];
        $subtotal = $row['subtotal'];
        $date_purchased = $row['date_purchased'];
    $process1 = $connect->prepare("INSERT INTO purchased_item(rs,product_id,brand_name,generic_name,expiration,category,dosage,price,qty,subtotal,date_purchased)VALUES('$rs','$product_id','$brand_name','$generic_name','$expiration','$category','$dosage','$price','$qty','$subtotal','$date_purchased')");
    $process1->execute();
}
if(empty($_POST['total_payment'])){
    header("Location:../user/pos.php");
}
else if($total_payment>$paid){
    $del = $connect->prepare("DELETE FROM purchased_item WHERE rs = '$rs'");
    $del->execute();
    echo"<script>alert('Error Transaction You must Enter Equal or Maximum Payment');window.location.href=('../user/pos.php');</script>";
}
else if(abs($total_payment == $paid)){
    $total_change = $paid - $total_payment;
      $payment1 = $connect->prepare("INSERT INTO payment(total_qty,total_items,discount,vat,total_payment,paid,total_change,date_paid,rs)VALUES('$total_qty','$total_items','$discount','$vat','$total_payment','$paid','$total_change','$date_paid','$rs')");
      $payment1->execute();
        $id = $connect->insert_id;
        header("Location:../user/receipt.php?id=$id&&RS=$rs");
       if($senior_dis = $vat*$discount){
        $amount_collectible = $vat-$senior_dis;
        $total_change = $paid-$amount_collectible;
        $updated = $connect->prepare("UPDATE payment SET total_change = '$total_change' WHERE rs = '$rs'");
        $updated->execute();
    }
}
else if(abs($senior_dis = $vat*$discount)){
     $amount_collectible = $vat-$senior_dis;
     $total_change = $paid-$amount_collectible;
     $payment2 = $connect->prepare("INSERT INTO payment(total_qty,total_items,discount,vat,total_payment,paid,total_change,date_paid,rs)VALUES('$total_qty','$total_items','$discount','$vat','$total_payment','$paid','$total_change','$date_paid','$rs')");
       $payment2->execute();
        $id = $connect->insert_id;
     header("Location:../user/receipt.php?id=$id&&RS=$rs");
}
else if(abs($total_change = $paid - $total_payment)){
      $payment3 = $connect->prepare("INSERT INTO payment(total_qty,total_items,discount,vat,total_payment,paid,total_change,date_paid,rs)VALUES('$total_qty','$total_items','$discount','$vat','$total_payment','$paid','$total_change','$date_paid','$rs')");
       $payment3->execute();
       $id = $connect->insert_id;
     header("Location:../user/receipt.php?id=$id&&RS=$rs");
}
else{
    echo"Error";
}
}
?>