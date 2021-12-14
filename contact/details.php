<?php 
include('config/db_connect.php');

if(isset($_POST['delete'])){

	$id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);

	$sql="DELETE FROM all_contacts WHERE sno=$id_to_delete";

	if(mysqli_query($conn, $sql)){

		header('Location: index.php');

	}else{
		echo 'query error: '. mysqli_error($conn);
	}
}

if(isset($_GET['id'])){

$id=mysqli_real_escape_string($conn,$_GET['id']);

$sql="SELECT * FROM all_contacts WHERE sno = $id";

$result=mysqli_query($conn, $sql);

$contact= mysqli_fetch_assoc($result);


mysqli_free_result($result);

mysqli_close($conn);


}


 ?>

 <!DOCTYPE html>
 <html>


<?php include 'template/header.php';?>

<style type="text/css">
	.detailsAll{
		width: 400px;
		background-color: darkred;
		border-radius:20px ;
		padding: 25px;
		margin: 20px auto;
		text-align: center;
		box-shadow: 0 0 5px gray;
	}
	.detailsAll h2{
		color: white;
		font-size: 35px;
		text-shadow: 0 0 10px gray;
		margin: 0px 0px 10px;
		text-transform: uppercase;
	}
	.detailsAll p{
		font-size: 18px;
		color: #f7f5b2;
		font-weight: bold;
		margin: 5px 0px;
	}
	.detailsAll h6{
		color: white;
		font-size: 19px;
		margin: 30px 0px 0px;
	}
	.button{
		color: darkred;
		font-size: 17px;
		font-weight: bold;
		border-radius: 10px;
		background-color: #f7f5b2;
		padding:10px 20px;
		margin: 20px 0px 10px;
		outline: none;
		border: none;
	}


</style>

<div class="detailsAll">
<?php if($contact): ?>

<h2><?php echo htmlspecialchars($contact['first_name']) . " "; ?></h2>
<h2><?php echo htmlspecialchars($contact['last_name']); ?></h2>
<h6>Email Id </h6>
<p><?php echo htmlspecialchars($contact['email']); ?></p>
<h6>Phone Number </h6>
<p><?php echo date($contact['phone']); ?></p>

<form action="details.php" method="POST">
	<input type="hidden" name="id_to_delete" value="<?php echo $contact['sno'] ?>">
	<input type="submit" name="delete" value="Delete" class="button">
</form>

<?php else: ?>

<h6>No contact on that name!</h6>

<?php endif; ?>

	

</div>




<?php include 'template/footer.php';?>


 </html>