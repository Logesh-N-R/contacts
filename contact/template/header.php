<head>
	<title>Contacts</title>
	<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
	}
		body{
			background-color: #dcdcdc9e;
		}
		.nav{
			box-shadow: 0 0 5px gray;
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			align-items: center;
			padding: 10px 40px;
		}
		.brand-logo{
			text-decoration: none;

		}
		.left-cont ul{
			display: flex;
			list-style-type: none;
			flex-direction: row;
		}
		.link{
			margin: 0px 20px;
			padding: 10px 20px;
			background-color: darkred;
			border: 1px solid black;
			border-radius: 10px;
			cursor: pointer;
			color: white;
			font-weight: bold;
		}
		.link a{
			color: white;
			text-decoration: none;

		}
		.foot{
			text-align: center;
			color: gray;

		}		
		.brand-logo{
			padding: 10px 20px;
			margin: 0 20px;
			background-color: darkred;
			border: 1px solid black;
			border-radius: 10px;
			cursor: pointer;
			color: white;
			font-weight: bold;
		}
	</style>
</head>
<body >
	<nav class="nav">
		
		<div class="container">
			<a href="index.php" class="brand-logo">All Contacts</a>
		</div>
		<div class="left-cont">
			<ul>
				<li class="link"> <a href="add.php" class="btn">Add a new contact</a></li>
			</ul>
		</div>
	</nav>

