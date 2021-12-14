<?php

include('config/db_connect.php');


$sql = 'SELECT first_name, last_name, email, phone,sno FROM all_contacts ORDER BY sno';

$result = mysqli_query($conn, $sql);

$allContacts = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);


//explode(',', $pizzas[0]['ingredients'])


?>


<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>

<style type="text/css">
	.pizzaCont {
		width: 90%;
		background-color: darkred;
		border-radius: 20px;
		margin: 20px auto 100px;
		padding: 40px 20px 0px;
	}

	.topH3 {
		text-align: center;
		margin: 20px;
		color: white;
		font-size: 50px;
		font-family: monospace;
		text-shadow: 0 0 10px red;
	}

	.cont1 {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: space-evenly;
		padding: 10px;
	}

	.col {
		background-color: #f7f5b2;
		min-width: 230px;
		padding: 20px;
		box-shadow: 0 0 5px #e9e9e9;
		border-radius: 10px;
		margin: 30px;
		transition: 0.5s all;
		cursor: pointer;

	}

	.card_content {
		width: 100%;
		text-align: left;
	}

	.card_content>label {
		color: darkred;
		font-weight: bold;
	}
	a{
		text-decoration: none;
	}

	.card_content>h4 {
		font-size: 18px;
		margin: 0 0 8px;
		color: black;
	}



	.card_action {
		font-size: 16px;
		background-color: darkred;
		border: 1px solid red;
		padding: 10px;
		display: flex;
		flex-direction: row;
		justify-content: flex-end;
		margin: 10px 0px 0px;
		border-radius: 10px;

	}

	.card_action a {
		text-decoration: none;
		color: white;
		font-weight: bold;

	}

	.size {
		width: 100px;
		margin: 0 0 10px;
	}

	.card {
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.col:hover {
		transform: scale(1.05);
		transition: 0.3s all;
	}

	.list li {
		list-style-type: none;
		margin: 5px 0px;
		text-transform: capitalize;
	}

	.card_action {
		transform: scale(1.04);
	}
	.img{
		display: flex;
		justify-content: center;
	}
	.brand{
		width: 100%;
	}
</style>




<div class="pizzaCont">
	<h2 class="topH3">Saved Contacts!</h2>

	<div class="cont1">
		<?php foreach ($allContacts as $contact) { ?>

			<div class="col">
				<a class="brand" href="details.php?id=<?php echo $contact['sno'] ?>">
					<div class="card">
						<div class="img">
						<img class="size" src="user.png">
						</div>
						<div class="card_content">
							<label for="name">Name</label>
							<h4>
								<?php echo htmlspecialchars($contact['first_name']) . " "; ?>
								<?php echo htmlspecialchars($contact['last_name']); ?>
							</h4>
							<label for="email">Email</label>
							<h4><?php echo htmlspecialchars($contact['email']); ?></h4>
							<label for="phone">Phone</label>
							<h4><?php echo htmlspecialchars($contact['phone']); ?></h4>
						</div>
				</a>
			</div>
	</div>

<?php } ?>
</div>

</div>

<?php include 'template/footer.php'; ?>

</html>