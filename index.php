<?php 
  ob_start();
include('server.php')
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

<link rel="stylesheet"
	href="https://stackpath.
	bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<style>
body {font-family: Arial, Helvetica, sans-serif;}


/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.centered_div {
   width: Xu;
   height: Yu;
   position: absolute;
   top: 50%;
   left: 50%;
   margin-left: -(X/2)u;
   margin-top: -(Y/2)u;
}
.firstDiv {
  width: 500px;

  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);

 }
 .Table-Normal {
	table-layout:fixed;
    position: static;
    margin: 0;
    padding: 0;
    width: 100%;
    height: 25%;
    border-collapse: separate;
    text-align: center;
	max-width:100%;
	border-spacing:0; 

	}
.Table-Normal td:nth-child(1),
.Table-Normal td:nth-child(3) {
	width: 12.5%;
  height:100%;
  margin: 0;
    padding: 0;
	border-collapse: collapse;
  white-space:nowrap;
  
}
.Table-Normal img{
	margin: 0;
    padding: 0;
}
.Table-Normal td:nth-child(2) {
  width: 75%;
  height:100%;
  margin: 0;
    padding: 0;
  height: auto;
  
} 

</style>
</head>
<body>
<table class="Table-Normal">
		<tr>
			<td>
				<div class = 'illustration'>
					<img src="txdot3.png"
						alt="Texas Department of Transportation Logo"  style="max-height:70%; max-width:60%"/>
				</div>
			</td>
			<td>
			<div class ="jumbotron bg-warning text-white" style="max-height:70%; max-width:100%">

					<h1 >Project Tx 0-6965</h1>
					<h3 >Characterization and Quantification of Traffic Load Spectra in
						Texas Overweight Corridors and Energy Sector Zones</h3>
			</td>
				</div>

			<td>
			<div class = 'illustration'>

				<img src="ctis.gif"  style="max-height:70%; max-width:60%"/>
			</div>

			</td>
		</tr>
	</table>



<div align="center">
<h1 align="center">Module Login Required</h1>
				<table >
		<tr>
			<td>
				
			</td>
			<td>
			<div >
      <table>
      <td>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
</td>
<td>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Register</button>
</td>
</table>
<div id="id01" class="modal">

<form class="modal-content animate" method="post">
<?php include('errors.php')?>


<div class="imgcontainer">
<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
<img src="ctis.gif" alt="Avatar" class="avatar" style="max-height:100%; max-width:20%">
</div>

<div class="container">
<label for="username"><b>Username</b></label>
<input type="text" placeholder="Enter Username" name="username" required>

<label for="password"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="password_1" required>

<button type="submit" name="login_user">Login</button>
<label>
<input type="checkbox" checked="checked" name="remember"> Remember me
</label>
</div>

<div class="container" style="background-color:#f1f1f1">
<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
<span class="psw">Forgot <a href="#">password?</a></span>
</div>
</form>
</div>
</div>
				</td>
							</div>

						<td>
						
						</td>
					</tr>
				</table>





        <div id="id02" class="modal">
        <form  class="modal-content animate" method="post">
        <?php include('errors.php')?>

        <div class="imgcontainer">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="ctis.gif" alt="Avatar" class="avatar" style="max-height:100%; max-width:20%">
</div>
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password_1" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_2" required>
    <hr>
<!--    
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> 
-->

    <button type="submit" name="reg_user" class="registerbtn">Register</button>
    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>

  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>
</form>
</div>




<script>
// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if(event.target == modal2){
      modal2.style.display = "none";
    }
}
</script>
<?php
if (isset($_POST['submit'])) {
  echo "Submitted";
}
?>
</body>
</html>