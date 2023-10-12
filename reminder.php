<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Walletwave | Reminders</title>
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
		font-size:25px;
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
				<center><a href="about"><button class='navs'>About Us</button></a></center>
			</td>
			<td style='width:7%;'></td>
			<td style='width:7%;'>
				<center><a href="logout"><button class='navs' style='width:auto;border-radius:10px;'><span class="fa fa-solid fa-user"></span> Logout</button></a></center>
			</td>

		</tr>
		


	</table>
	<br>
	<table style='width:100%;border:1px solid black;'>
		<tr>
			<td style='width:50%;'><h3><span class="fa fa-solid fa-bars"></span> ToolBar</h3></td>
			<td style='width:10%;'></td>
			<td style='width:10%;'></td>
			<td style='width:10%;'>
			</td>
			<td style='width:10%;'>
				<center>
					<a href='dashboard'><button class='tools' style='height:38px;'><span style='color:red;' class="fa fa-solid fa-home"></span>  Home </button></a>
				</center></td>
			<td style='width:10%;'>
				<center>
					<center>
					<a href='history'><button class='tools' style='height:38px;'><span style='color:skyblue;' class="fa fa-solid fa-pencil"></span> Edit History </button></a>
				</center>
			</td>
			
		

	</table>
	
	<table style='width:100%;'>
		<tr>
			
		
			<td style='width:75%;'>
				<center><h1>Existing Reminders</h1></center>
				<div style='background: whitesmoke;width:100%;max-height:50vh;overflow-y:auto;'>
					<?php
					session_start();
					
					require 'sql.php';
					
					// Fetch reminders for the logged-in user
					$userEmail = $_SESSION["email"];
					$sql = "SELECT * FROM reminder WHERE user_email='$userEmail'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						echo '<table style="width:100%;border-collapse:collapse;">
								<tr>
									<th style="width:25%;"><center>Amount to Be Paid</center></th>
									<th style="width:25%;"><center>Category</center></th>
									<th style="width:25%;"><center>Description</center></th>
									<th style="width:25%;"><center>Remind On:</center></th>
								</tr>';
					
						while($row = $result->fetch_assoc()) {
							$amount = 'Rs. ' . number_format($row["amount"], 2);
							$category = htmlspecialchars($row["category"]);
							$description = htmlspecialchars($row["description"]);
							$remindDate = $row["datelas"];
							
							// Convert remind date to a more readable format (e.g., "7th of Every Month")
							$remindDateFormatted = substr($remindDate,0,2) . ' of Every Month';
					
							echo '<tr>
									<td class="amountent" style="width:25%;"><center>' . $amount . '</center></td>
									<td class="amountent" style="width:25%;"><center>' . $category . '</center></td>
									<td class="amountent" style="width:25%;"><center>' . $description . '</center></td>
									<td class="amountent" style="width:25%;"><center>' . $remindDateFormatted . '</center></td>
								</tr>';
						}
					
						echo '</table>';
					} else {
						echo "<center class='amountent'>No reminders found.</center>";
					}
					
					$conn->close();
					?>
					
				</div>
			</td>
			<td style='width:25%;'>
				<div style='width:100%;'>
					<center><h1>Add Record</h1></center>
					<form action="add_reminder" method="POST">
					<center><input class='entries' style='width:80%;' type='number' placeholder="Enter Amount to be paid" name="amount"></center>
					<br>
					<center><input class='entries' style='width:80%;' type='text' placeholder="Category Name" name="category"></center>
					<br>
					<center><textarea class='entries' style='width:80%;resize:none;height:12vh;' placeholder="Enter Description about the payment" name="desc"></textarea></center>
					<br>
					<center><select id='remindon' class='entries' style='width:80%;' name="date">
						<option value='default'>--Select Reminder Date--</option>
						
					</select></center>
					<br>
					<center><button id='addtrans' class='addtrans' style='font-size:20px;height:50px;' type="submit"><span class="fa fa-solid fa-bell"></span>Set Reminder</button>
						</center></form>

				</div>
			</td>
		</tr>
	</table>

</body>
<script>
	let i=1;
	while (i<31){
		var opt=document.createElement('option');
		opt.setAttribute('id',i.toString()+'remind');
		opt.setAttribute('value',i.toString()+'remind');
		opt.innerHTML=i.toString()+' of every month';
		document.getElementById('remindon').appendChild(opt);
		i++;

	}

</script>
</html>
