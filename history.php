<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Walletwave | Transaction History</title>
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
<body>
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
				<center><a href='about'><button class='navs'>About Us</button></a></center>
			</td>
			<td style='width:7%;'></td>
			<td style='width:7%;'>
				<center><a href='logout'><button class='navs' style='width:auto;border-radius:10px'><span class="fa fa-solid fa-user"></span> Logout</button></a></center>
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
					<a href='dashboard'><button class='tools' style="height:38px;"><span style='color:red;' class="fa fa-solid fa-home"></span>  Home </button></a>
				</center>
			</td>
			<td style='width:10%;'>
				<center>
					<a href='reminder'><button class='tools'><span style='color:#fcca03;' class="fa fa-solid fa-bell"></span>  Remind Bill Payments </button></a>
				</center></td>
			
			
		

	</table>
	<br><br><br>
	<table style='width:99vw;'>
		<tr>
			<td style='width:75%;'>
				<div style='width:100%;max-height:60vh;'>
					<!-- <table style='width:100%;border-collapse: collapse;'>
						<tr>
							<th style='width:25%;'><center>Income/Expense</center></th>
							<th style='width:25%;'><center>Amount</center></th>
							<th style='width:25%;'><center>Date of Transfer</center></th>
							<th style='width:25%;'><center>Account</center></th>
						</tr>
						<tr>
							<td class='amountent' style='width:25%;color:green;'><center>Income</center></td>
							<td class='amountent' style='width:25%;color:green;'><center>2,00,000</center></td>
							<td class='amountent' style='width:25%;color:green;'><center>2023-10-12</center></td>
							<td class='amountent' style='width:25%;color:green;'><center>Indian Bank</center></td>
						</tr>
						<tr>
							<td class='amountent' style='width:25%;color:red;'><center>Expense</center></td>
							<td class='amountent' style='width:25%;color:red;'><center>1,00,000</center></td>
							<td class='amountent' style='width:25%;color:red;'><center>2023-10-12</center></td>
							<td class='amountent' style='width:25%;color:red;'><center>Indian Bank</center></td>
						</tr>
					</table> -->

					<?php
					session_start();
					
					require 'sql.php';
					
					// Fetch transactions data from the database
					$userEmail = $_SESSION["email"];
					$sql = "SELECT * FROM transactions WHERE user_email='$userEmail'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						echo "<table style='width:100%;border-collapse: collapse;'>
								<tr>
									<th style='width:25%;'><center>Income/Expense</center></th>
									<th style='width:25%;'><center>Amount</center></th>
									<th style='width:25%;'><center>Date of Transfer</center></th>
									<th style='width:25%;'><center>Account</center></th>
								</tr>";
					
						// Output data of each row
						while($row = $result->fetch_assoc()) {
							$transactionType = $row["transaction_type"];
							$amount = number_format($row["amount"]); // Format amount with comma
							$date = $row["transaction_date"];
							$bankAccount = $row["bank_account"];
					
							// Set text color based on transaction type
							$textColor = ($transactionType == 'Expense') ? 'red' : 'green';
					
							echo "<tr>
									<td class='amountent' style='width:25%;color:$textColor;'><center>$transactionType</center></td>
									<td class='amountent' style='width:25%;color:$textColor;'><center>$amount</center></td>
									<td class='amountent' style='width:25%;color:$textColor;'><center>$date</center></td>
									<td class='amountent' style='width:25%;color:$textColor;'><center>$bankAccount</center></td>
								  </tr>";
						}
						echo "</table>";
					} else {
						echo "<center class='amountent'>No transactions found.</center>";
					}
					
					$conn->close();
					?>
					

				</div>
			</td>
			<td style='width:25%;'>
				<div style='width:100%;'>
					<center><h1>Add Entry</h1></center>
					<form id="transactionForm" method="POST" action="add_transaction.php">
					<center><select class='entries' style='width:80%;' name="transactionType">
						<option value='default'>--Select Type Of Transfer--</option>
						<option id='income'>Income</option>
						<option id='expense'>Expense</option>
					</select></center>
					<br>
					<center><input type='number' name='amount' class='entries' style='width:80%;' placeholder="Enter Amount"></center>
					<br>
					<center><input onfocusout="(this.type='text')" name='transactionDate' onfocus="(this.type='date')" class='entries' placeholder="Date of transfer" style='width:80%;'></center>
					<br>
					<center><select id='banks' class='entries' name='bankAccount'>
						<option value="default">--Select Bank Account--</option>
						<option id='ib'>Indian Bank</option>
						<option id='sbi'>State Bank of India</option>
						<option id='hdfc'>HDFC Bank</option>
						<option id='icici'>ICICI Bank</option>
						<option id='hsbc'>HSBC Bank</option>
						<option id='scb'>Standard Chartered Bank</option>


					</select></center>
					<br>
					<center><button id='addtrans' class='addtrans' style='font-size:20px;height:50px;' type="submit"><span class="fa fa-solid fa-plus"></span>Add Transaction</button>
					</form>
					<div id="transactionHistory"></div>
					</center>


			</td>
		</tr>
</body>
</html>
