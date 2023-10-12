<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WalletWave | Login</title>
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
.alert.wrong {background-color: #e05c53;}

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
</head>
<body>
	<?php if(isset($_GET['wrong'])){echo'<div class="alert wrong">
		<span class="closebtn">&times;</span>  
		The credentials do not match.
	  </div>'; }?>
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
				<center><a href='about'><button class='navs'>About Us</button></a></center>
			</td>
			<td style='width:7%;'></td>
			<td style='width:7%;'>
				<center><a href="register"><button class='navs'>Register</button></a></center>
			</td>

		</tr>
		


	</table>
	<br><br><br><br>
	<center>
			<div style='border-radius:15px;width:40%;height:60vh;box-shadow:2px 2px 10px 0.08px;background-color:white;'>
				<img src='assets/cashfall.jpg' style='width:100%;height:15%;object-fit: cover;border-radius:15px 15px 0 0;'>
				<br>
				<center><h1>Login</h1></center>
				<form action="login_handler.php" method="POST">
				<center><input type='text' id='username' class='entries' placeholder="Enter E-mail ID" name="username"></center>
				<br><br>
				<center><input style='margin-left:32px;' type='password' class='entries' id='passwd' placeholder="Enter Password" name="password">
					<button id='see' style='margin-left:8px;' class='see'><span class="fa fa-solid fa-eye"></span></button>
				</center>
				<br><br><br>
				<center><button class='login' type="submit">CONFIRM</button></center>
				</form>
				<center><h5>Don't have an account ? | <a href='register'>Register Now</a></h5></center>




			</div>
		</center>


</body>
<script>
	seeing=false;
	document.getElementById('see').onclick=function(){
		if (seeing==false){
			document.getElementById('passwd').type='text';
			seeing=true;
			document.getElementById('see').innerHTML=`<span class="fa fa-solid fa-eye-slash"></span>`;
		}
		else{
			document.getElementById('passwd').type='password';
			document.getElementById('see').innerHTML=`<span class="fa fa-solid fa-eye"></span>`;
			seeing=false;
		}
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