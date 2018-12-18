<?php $title="ADMIN"; include($_SERVER['DOCUMENT_ROOT']."/required/side_nav.php"); 
require($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
$id = $_GET['id'];
if(isset($_POST['edit'])){
$supplier_name = $_POST['supplier_name'];
$contact_person = $_POST['contact_person']; 
$address = $_POST['address'];
$contact = $_POST['contact'];
$note = $_POST['note'];

	$update = "UPDATE suppliers SET supplier_name = '$supplier_name',contact_person = '$contact_person',address='$address',contact='$contact',note='$note' WHERE $id ='$id'";
	if($connect->query($update)==TRUE){
		echo"<script>alert('Info Updated');window.location.href=('admin_supplier.php');</script>";
	}
	else{
		echo"Error";
	}
}
$sql = "SELECT * FROM suppliers WHERE id = '$id'";
$result = $connect->query($sql);
while($row = $result->fetch_array()){
?>
<form method="POST">
<div id="supplier_edit">
<div class="edit_supplier">
<label><span class='fa fa-edit' aria-hidden='true'></span> Edit Information</label>
</div>
<div class="edit_info">
<div>
<label>Supplier Name:</label>
</div>
<div>
<input type="text" name="supplier_name" value="<?php echo $row['supplier_name'] ?>" required>
</div>
<div>
<label>Contact Person:</label>
</div>
<div>
<input type="text" name="contact_person" value="<?php echo $row['contact_person'] ?>" required>
</div>
<div>
	<button type='submit' name='edit'><span class='fa fa-save' aria-hidden='true'></span> Save</button>
</div>
</div>
<div class="edit_info">
<div>
<label>Address:</label>
</div>
<div>
<input type="text" name="address" value="<?php echo $row['address'] ?>" required>
</div>
<div>
<label>Contact #:</label>
</div>
<div>
<input type="text" name="contact"  value="<?php echo $row['contact'] ?>" required>
</div>
</div>
<div class="edit_info">
<div>
<label>Note:</label>
</div>
<div>
<textarea name="note" required="">
<?php echo $row['note'] ?>

</textarea>
</div>
</div>
</div>
</form>
<?php } ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/required/footer.php'); ?>