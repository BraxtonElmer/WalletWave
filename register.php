<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WalletWave | Register</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
	<link rel='icon' type='image/x-icon' href='assets/logo.png'>
	<link rel='stylesheet' type='text/css' href="style.css">
	<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<style>
/*td{
	border:1px solid black;
}*/
</style>
<body>
	<?php include('sql.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $income_range = $_POST["income_range"];
    $bank_name = $_POST["bank_name"];
    $account_number = $_POST["account_number"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

	$sql = "INSERT INTO users (name, email, income_range, bank_name, account_number, password, income, expense, balance)
	VALUES ('$name', '$email', '$income_range', '$bank_name', '$account_number', '$password', 0, 0, 0)";

    if ($conn->query($sql) === TRUE) {
        ?><div class="alert success">
		<span class="closebtn">&times;</span>  
		<strong>Success!</strong> Account Created Successfully.
	  </div><?php
    } else {
		?><div class="alert">
		<span class="closebtn">&times;</span>  
		"<?php echo "Error: " . $sql . "<br>" . $conn->error; ?>"
	  </div><?php
    }
}

$conn->close();
?>
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
				<center><a href="login"><button class='navs'>Login</button></a></center>
			</td>

		</tr>


	</table>
	<br><br><br>
	<form action="" method="POST" onsubmit="return validateForm()">
	<div style='height:61vh;width:99vw;overflow-y: hidden;border-radius:30px;border-collapse: collapse;border:1px dashed navy'>
		<table style='width:100%;'>
		<tr id='row1'>
			<td style='width:10%;background:#1dbf4d;'></td>
			<td style='width:80%;'>
				<br><br>
				<center><div style='width:80%;height:50vh;border-radius:10px;box-shadow: 2px 2px 20px 0.8px black;'>
					<table style='width:100%;height:100%;'>
						<tr>
							<td style='width:70%;'>
								<center><h1 style='margin-top:-10px;font-family:Calibri;'>Personal Information</h1></center>
								<center>
									<input id='name' type='text' class='entries' placeholder="Enter Name:" name="name">
									<button style='height:40px;width:40px;' class='proceed' id='step1'><span class="fa fa-solid fa-right-long"></span></button>
								</center>
							</td>
							<td style='width:30%;'>
								<center><img style='width:100%;height:100%;' src='assets/avatar.png'></center>
							</td>
						</tr>
					</table>

				</div></center>
				<br><br>
			</td>
			<td style='width:10%;background:#1dbf4d;'></td>
		</tr>
		<tr id='row2'>
			<td style='width:10%;background:#358fe8;'></td>
			<td style='width:80%;'>
				<br><br>
				<center><div style='width:80%;height:50vh;border-radius:10px;box-shadow: 2px 2px 20px 0.8px black;'>
					<table style='width:100%;height:100%;'>
						<tr>
							<td style='width:70%;'>
								<center><h1 style='margin-top:-10px;font-family:Calibri;'>Personal Information</h1></center>
								<center>
									<input type='text' class='entries' placeholder="Enter E-Mail Id" name="email">
									<button style='height:40px;width:40px;' class='proceed' id='step2'><span class="fa fa-solid fa-right-long"></span></button>
								</center>
							</td>
							<td style='width:30%;'>
								<center><img style='width:100%;height:100%;' src='assets/mail.gif'></center>
							</td>
						</tr>
					</table>

				</div></center>
				<br><br>
				
			</td>
			<td style='width:10%;background:#358fe8;'></td>
			


		</tr>
		<tr id='row3'>
			<td style='width:10%;background:#d9e835;'></td>
			<td style='width:80%;'>
				<br><br>
				<center><div style='width:80%;height:50vh;border-radius:10px;box-shadow: 2px 2px 20px 0.8px black;'>
					<table style='width:100%;height:100%;'>
						<tr>
							<td style='width:70%;'>
								<center><h1 style='margin-top:-10px;font-family:Calibri;'>Income Details</h1></center>
								<center>
									<select class='entries' name="income_range">
										<option value='default'>--Select Range of Income per Month--</option>
										<option id='below10k' value='below10k'>Below Rs.10,000</option>
										<option id='10k-50k' value='10k-50k'>Rs.10,000 to Rs.50,0000</option>
										<option id='50k-1l' value='50k-1l'>Rs.50,000 to Rs.1,00,000</option>
										<option id='1l-5l' value='1l-5l'>Rs.1,00,000 to Rs.5,00,000</option>
										<option id='5l-10l' value='5l-10l'>Rs.5,00,000 to Rs.10,00,000</option>
										<option id='10l+' value='10l+'>Above Rs.10,00,000</option>
									</select>
									<button style='height:40px;width:40px;' class='proceed' id='step3'><span class="fa fa-solid fa-right-long"></span></button>
								</center>
							</td>
							<td style='width:30%;'>
								<center><img style='width:100%;height:100%;' src='assets/money.gif'></center>
							</td>
						</tr>
					</table>

				</div></center>
				<br><br>
				
			</td>
			<td style='width:10%;background:#d9e835;'></td>


		</tr>
		
		<tr id='row4'>
			<td style='width:10%;background:#7df5e5;'></td>
			<td style='width:80%;'>
				<br><br>
				<center><div style='width:80%;height:50vh;border-radius:10px;box-shadow: 2px 2px 20px 0.8px black;'>
					<table style='width:100%;height:100%;'>
						<tr>
							<td style='width:70%;'>
								<center><h1 style='margin:auto;font-family:Calibri;'>Bank Accounts</h1></center>
								<center>
									<select id='banks' class='entries' name="bank_name">
										<option value="default">--Add Bank Accounts--</option>
										<option id='ib'>Indian Bank</option>
										<option id='sbi'>State Bank of India</option>
										<option id='hdfc'>HDFC Bank</option>
										<option id='icici'>ICICI Bank</option>
										<option id='hsbc'>HSBC Bank</option>
										<option id='scb'>Standard Chartered Bank</option>


									</select>
									<br><br>
									<input type='text' class='entries' placeholder="Enter Account No." name="account_number">
									<button style='height:40px;width:40px;' class='proceed' id='add' onclick=(function(){event.preventDefault();})><span class="fa fa-solid fa-plus"></span></button>
									<button style='height:40px;width:40px;' class='proceed' id='step4'><span class="fa fa-solid fa-right-long"></span></button>
								</center>
								<br>
								<div style='margin:auto;width:90%;height:10%;max-height:50%;overflow-y: auto;background: #e3e4e6;border-radius:10px;'>
									<table style='width:100%;height:100%;'>
										<tr style='display:none;' id='ib'>
											<td style='width:90%;'><img style='width:10%;' src='assets/ib.png'><center><h1 style='margin-top: -40px;'>Indian Bank</h1></center></td>
											<td style='width:10%;'><center><button id='btn' class="deleteacc"><center><span class="fa fa-solid fa-minus"></span></center></button></center></td>
										</tr>
										<tr style='display:none;' id='sbi'>
											<td style='width:90%;'><img style='width:10%;' src='assets/sbi.png'><center><h1 style='margin-top: -40px;'>State Bank of India</h1></center></td>
											<td style='width:10%;'><center><button class="deleteacc"><center><span class="fa fa-solid fa-minus"></span></center></button></center></td>
										</tr>
										<tr style='display:none;' id='hdfc'>
											<td style='width:90%;'><img style='width:10%;' src='assets/icici.png'><center><h1 style='margin-top: -40px;'>ICICI Bank</h1></center></td>
											<td style='width:10%;'><center><button class="deleteacc"><center><span class="fa fa-solid fa-minus"></span></center></button></center></td>
										</tr>
										<tr style='display:none;' id='icici'>
											<td style='width:90%;'><img style='width:10%;' src='assets/hsbc.png'><center><h1 style='margin-top: -40px;'>HSBC Bank</h1></center></td>
											<td style='width:10%;'><center><button class="deleteacc"><center><span class="fa fa-solid fa-minus"></span></center></button></center></td>
										</tr>
										<tr style='display:none;' id='hsbc'>
											<td style='width:90%;'><img style='width:10%;' src='assets/hdfc.png'><center><h1 style='margin-top: -40px;'>HDFC Bank</h1></center></td>
											<td style='width:10%;'><center><button class="deleteacc"><center><span class="fa fa-solid fa-minus"></span></center></button></center></td>
										</tr>
										<tr style='display:none;' id='scb'>
											<td style='width:90%;'><img style='width:10%;' src='assets/scb.png'><center><h1 style='margin-top: -40px;'>Standard Chartered Bank</h1></center></td>
											<td style='width:10%;'><center><button class="deleteacc"><center><span class="fa fa-solid fa-minus"></span></center></button></center></td>
										</tr>
									</table>
								</div>
							</td>

							<td style='width:30%;'>
								<center><img style='width:100%;height:100%;' src='assets/bank.gif'></center>
							</td>
						</tr>
					</table>

				</div></center>
				<br><br>
				
			</td>
			<td style='width:10%;background:#7df5e5;'></td>

		</tr>
		<tr id='row5'>
			<td style='width:10%;background:#6140f5;'></td>
			<td style='width:80%;'>
				<br><br>
				<center><div style='width:80%;height:50vh;border-radius:10px;box-shadow: 2px 2px 20px 0.8px black;'>
					<table style='width:100%;height:100%;'>
						<tr>
							<td style='width:70%;'>
								<center><h1 style='margin-top:-10px;font-family:Calibri;'>Security</h1></center>
								<center>
									<input type='password' class='entries' id='passwd' placeholder="Enter Password" name="password">
									<br><br>
									<input type='password' class='entries' id='conpasswd' placeholder="Confirm Password">
									<p id="passwordError" style="color: red;"></p>
									<button style='height:40px;width:40px;' class='proceed' id='step5' type="submit"><span class="fa fa-solid fa-right-long"></span></button>
</form>
								</center>
							</td>
							<td style='width:30%;'>
								<center><img style='width:100%;height:100%;' src='assets/passwd.gif'></center>
							</td>
						</tr>
					</table>

				</div></center>
				<br><br>
				
			</td>
			<td style='width:10%;background:#6140f5;'></td>
			


		</tr>


	</table></div>
	


</body>
<script>
	document.getElementById('step1').onclick=function(){
		document.getElementById('row2').scrollIntoView({behavior:'smooth',block:'nearest',inline:'center'})
		event.preventDefault();

	}
	document.getElementById('step2').onclick=function(){
		document.getElementById('row3').scrollIntoView({behavior:'smooth',block:'nearest',inline:'center'})
		event.preventDefault();

	}
	document.getElementById('step3').onclick=function(){
		document.getElementById('row4').scrollIntoView({behavior:'smooth',block:'nearest',inline:'center'})
		event.preventDefault();

	}
	document.getElementById('step4').onclick=function(){
		document.getElementById('row5').scrollIntoView({behavior:'smooth',block:'nearest',inline:'center'})
		event.preventDefault();

	}

	function validateForm() {
    var password = document.getElementById('passwd').value;
    var confirmPassword = document.getElementById('conpasswd').value;
    var passwordError = document.getElementById('passwordError');

    if (password === confirmPassword && password !== "") {
        // Passwords match and are not empty
        passwordError.textContent = ""; // Clear any previous error message
        return true; // Allow the form to be submitted
    } else {
        // Passwords do not match or are empty, display error message
        passwordError.textContent = "Passwords do not match or cannot be empty. Please try again.";
        return false; // Prevent the form from being submitted
    }
}

	document.getElementById('btn').onclick=function(){
		document.getElementById('btn').click();
		document.getElementById('ib').remove();
	}

</script>

<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
</html>