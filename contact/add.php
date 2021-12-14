<?php

include('config/db_connect.php');

// $email=$title=$ingredients="";
$first_name = $last_name = $email = $phone = "";


$errors = array('first_name' => '', 'last_name' => '', 'email' => '', 'phone' => '');


if (isset($_POST['submit'])) {
	if (empty($_POST['email'])) {
		$errors['email'] = "An email is required!<br/>";
	} else {
		$email = $_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Enter a valid email";
		}
	}
	if (empty($_POST['first_name'])) {
		$errors['first_name'] = "First name is required!<br/>";
	} else {
		$first_name = $_POST['first_name'];
		if (!preg_match('/^[a-zA-Z\s]+$/', $first_name)) {
			$errors['first_name'] = 'First name must be letters and spaces only';
		}
	}
	if (empty($_POST['last_name'])) {
		$errors['last_name'] = "Last name is required!<br/>";
	} else {
		$last_name = $_POST['last_name'];
		if (!preg_match('/^[a-zA-Z\s]+$/', $last_name)) {
			$errors['last_name'] = 'Last name must be letters and spaces only';
		}
	}
	if (empty($_POST['phone'])) {
		$errors['phone'] = "Phone number is required!";
	}

	if (array_filter($errors)) {
	} else {

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);

		$sql = "INSERT INTO all_contacts(first_name,last_name,email,phone) VALUES('$first_name','$last_name','$email','$phone')";

		if (mysqli_query($conn, $sql)) {
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);

		}
	}
}


?>

<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>

<style type="text/css">
	.section {
		text-align: center;
		width: 400px;
		box-shadow: 0 0 5px gray;
		background-color: #e6d7d7;
		padding: 20px;
		border-radius: 20px;
		margin: 30px auto;
	}

	form label {
		display: block;
		text-align: left;
		margin: 10px;
	}

	form input {
		margin: 0px 0px 20px;
		width: 70%;
		padding: 5px 20px;
		font-size: 18px;
		outline: none;
		border: none;
		font-weight: bold;
	}

	.btn1 {
		width: 150px;
		padding: 10px 20px;
		background-color: darkred;
		color: white;
		border: 1px solid black;
		border-radius: 20px;
		margin: 20px 0px;

	}

	.error {
		color: red;
		margin: 0 0 20px;
	}

</style>

<section class="section">
	<h3>Add new contact</h3>
	<form action="add.php" method="POST">

		<label>First Name:</label>
		<input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name) ?>">
		<div class="error"><?php echo $errors['first_name']; ?></div>


		<label>Last Name:</label>
		<input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name) ?>">
		<div class="error"><?php echo $errors['last_name']; ?></div>

		<label>Your Email:</label>
		<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
		<div class="error"><?php echo $errors['email']; ?></div>

		<label>Your Phone No:</label>
		<input type="text" name="phone" value="<?php echo htmlspecialchars($phone) ?>">
		<div class="error"><?php echo $errors['phone']; ?></div>


		<div>
			<input type="submit" name="submit" value="Submit" placeholder="tomato" class="btn1">
		</div>
	</form>
</section>

<?php include 'template/footer.php'; ?>

</html>