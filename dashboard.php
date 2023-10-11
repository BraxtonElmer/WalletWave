<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Walletwave | User Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
	<link rel='icon' type='image/x-icon' href='assets/logo.png'>
	<link rel='stylesheet' type='text/css' href="style.css">
</head>
<style>
	th{
		border:1px solid white;
		background: navy;
		color:white;
		font-size:35px;
	}
</style>
<body style='overflow-x:hidden;'>
	<table style='width:99vw;height:10vh;border-radius:10px;'>
		<tr style='width:100%;'>
			<td style='width:10%;'>
				<img style='width:60%;height:60%;float: right;' src='assets/logo.png'>

			</td>
			<td style='width:20%;'>
				<h1 style='font-family:Calibri;'>Walletwave</h1>

			</td>
			<td style='width:49%;'></td>
			<td style='width:7%;'>
				<center><button class='navs'>About Us</button></center>
			</td>
			<td style='width:7%;'></td>
			<td style='width:7%;'>
				<center><button class='navs' style='width:auto;border-radius:50%;'><span class="fa fa-solid fa-user"></span></button></center>
			</td>

		</tr>
		


	</table>
	<br><br>
	<table style='width:100%;border:1px solid black;'>
		<tr>
			<td style='width:50%;'><h3><span class="fa fa-solid fa-bars"></span> ToolBar</h3></td>
			<td style='width:10%;'></td>
			<td style='width:10%;'></td>
			<td style='width:10%;'>
				
			</td>
			<td style='width:10%;'>
				<center>
					<button class='tools' style='height:38px;'><span style='color:skyblue;' class="fa fa-solid fa-pencil"></span> Edit History </button>
				</center></td>
			<td style='width:10%;'>
				<center>
					<button class='tools'><span style='color:#fcca03;' class="fa fa-solid fa-bell"></span>  Remind Bill Payments </button>
				</center>
			</td>
			
		

	</table>
	<br><br>
	<center>
		<table style='width:99vw;'>
			<tr>
				<td style='width:30%;'></td>
				<td style='width:40%;'>
					<center>
						<div style='width:100%;box-shadow:2px 2px 10px 0.08px;border-radius:20px;'>
							<center><h1 style='color:#0e664e;'>Hi, <span id='name'><?php echo $_SESSION["username"]; ?> </span></h1></center>
							<br>
							<center>
								<h1 style='color:green;'>Income: Rs.<span id='inc'><?php echo $_SESSION["income"]; ?></span></h1>
							</center>
							<center>
								<h1 style='color:red;'>Expenses: Rs.<span id='inc'><?php echo $_SESSION["expense"]; ?></span></h1>
							</center>
							<center>
								<h1 style='color:navy;'>Balance: Rs.<span id='inc'><?php echo intval($_SESSION["income"]) - intval($_SESSION["expense"]); ?></span></h1>
							</center>
							<br>
							<center>
								<button class='navs' style='width:auto;'> <span class="fa fa-solid fa-pencil"></span>Edit History</button>
							</center>
							<br><br>






						</div>
					</center>
				<td style='width:30%;'></td>
			</td>
		</tr>
	</table>
	<br><br>
	<center>
		<center><h1 style='font-family: Calibri;'>Payment Reminders</h1></center>
		<div style='width:75%;max-height:50vh;'>
			<table style='width:100%;border-collapse:collapse;'>
				<tr>
					<th style='width:25%;'>Category</th>
					<th style='width:25%;'>Description</th>
					<th style='width:25%;'>Amount to be Paid</th>
				</tr>
				<tr>
					<td class='amountent' style='width:25%;'><center>Bills</center></td>
					<td class='amountent' style='width:25%;'><center>House Rent</center></td>
					<td class='amountent' style='width:25%;'><center>Rs.20,000</center></td>
				</tr>
			</table>


		</div></center>

</body>
</html>
