<?php $title="ADMIN"; include"side_nav.php"; 
require"../php/connect.php";
$id = (isset($_GET['id']) ? $_GET['id']:"");
if(isset($_POST['edit'])){
$supplier_name = $_POST['supplier_name'];
$contact_person = $_POST['contact_person']; 
$address = $_POST['address'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$note = $_POST['note'];

	$update = "UPDATE suppliers SET supplier_name = '$supplier_name',contact_person = '$contact_person',address='$address',contact='$contact',email='$email',note='$note' WHERE $id ='$id'";
	$result = mysqli_query($connect,$update);
	if($result){
		echo"<script>alert('Info Updated');window.location.href=('supplier.php');</script>";
	}
	else{
		echo"Error";
	}
}
$sql = "SELECT * FROM suppliers WHERE id = '$id'";
$result = mysqli_query($connect,$sql);
while($row = mysqli_fetch_array($result)){
?>
<form method="POST">
<div id="supplier_edit">
<div class="edit_supplier">
<label>Edit Information</label>
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
	<input type="submit" name="edit" value="Save Info">
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
<label>Email :</label>
</div>
<div>
<input type="text" name="email"  value="<?php echo $row['email'] ?>" required>
</div>
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