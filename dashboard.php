<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WalletWave | User Dashboard</title>
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
				<h1 style='font-family:Calibri;'>WalletWave</h1>

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
				<a href="history"><button class='tools' style='height:38px;'><span style='color:skyblue;' class="fa fa-solid fa-pencil"></span> Edit History </a></button>
				</center></td>
			<td style='width:10%;'>
				<center>
				<a href="reminder"><button class='tools'><span style='color:#fcca03;' class="fa fa-solid fa-bell"></span>  Remind Bill Payments </a></button>
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
						<?php
require 'sql.php'; 


$userEmail = $_SESSION["email"];


$userSql = "SELECT * FROM users WHERE email='$userEmail'";
$userResult = $conn->query($userSql);

if ($userResult->num_rows > 0) {

    while($row = $userResult->fetch_assoc()) {
        $username = $_SESSION["username"];
        $income = $row["income"];
        $expense = $row["expense"];

        echo "<center><h1 style='color:#0e664e;'>Hi, <span id='name'>$username</span></h1></center>";
        echo "<br>";
        echo "<center><h1 style='color:green;'>Income: Rs.<span id='inc'>$income</span></h1></center>";
        echo "<center><h1 style='color:red;'>Expenses: Rs.<span id='inc'>$expense</span></h1></center>";
        echo "<center><h1 style='color:navy;'>Savings: Rs.<span id='inc'>" . (intval($income) - intval($expense)) . "</span></h1></center>";
        echo "<br>";
        echo "<center><a href='history'><button class='navs' style='width:auto;'> <span class='fa fa-solid fa-pencil'></span>Edit History</button></a></center>";
    }
} else {
    echo "User data not found.";
}
$conn->close(); // Close the database connection
?>

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
		<?php
require 'sql.php';

// Fetch reminders for the logged-in user
$userEmail = $_SESSION["email"];
$remindersQuery = "SELECT * FROM reminder WHERE user_email='$userEmail'";
$remindersResult = $conn->query($remindersQuery);
?>

<!-- HTML Table to Display Reminders -->
<table style='width:100%;border-collapse:collapse;'>
    <tr>
        <th style='width:25%;'><center>Category</center></th>
        <th style='width:25%;'><center>Description</center></th>
        <th style='width:25%;'><center>Amount to be Paid</center></th>
    </tr>
    <?php
    if ($remindersResult->num_rows > 0) {
        while ($row = $remindersResult->fetch_assoc()) {
            $category = htmlspecialchars($row["category"]);
            $description = htmlspecialchars($row["description"]);
            $amount = 'Rs. ' . number_format($row["amount"], 2);
            
            echo '<tr>
                    <td class="amountent" style="width:25%;"><center>' . $category . '</center></td>
                    <td class="amountent" style="width:25%;"><center>' . $description . '</center></td>
                    <td class="amountent" style="width:25%;"><center>' . $amount . '</center></td>
                </tr>';
        }
    } else {
        echo '<tr>
                <td colspan="3" class="amountent"><center>No reminders found.</center></td>
            </tr>';
    }
    ?>
</table>



		</div></center>

</body>
</html>
