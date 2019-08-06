<?php 

ob_start();

session_start();

//initializing variables

$username = "";
$email = "";

$errors = array();
//connect to db

$db = mysqli_connect('irpsrvgis35.utep.edu','jaime','1234#','jaime_db') or die("could not connect to database");

//Register users

if(isset($_POST['reg_user'])){

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

$split = explode("@",$email);

//form validation
if(empty($username)){
  array_push($errors,"Username is required");
}
if(empty($email)){
  array_push($errors,"Email is required");
}
if($split[1] != "utep.edu" && $split[1] != "miners.utep.edu" && $split[1] != "txdot.gov"){
  array_push($errors,"Invalid email, only TxDOT and UTEP credentials allowed.");
}
if(empty($password_1)){
  array_push($errors,"Password is required");
}
if($password_1 != $password_2){
  array_push($errors,"Passwords do not match");
}

//check db for existing user with same username

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($db,$user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
  if($user['username']===$username){
    array_push($errors,"Username already exists");
  }
  if($user['email']===$email){
    array_push($errors,"This email id already has a registered username");
  }
}

//Register the user if no error

if(count($errors) === 0){
  $password = md5($password_1); //this will encrypt the password
  $query = "INSERT INTO user (username, email, password) VALUES ('$username','$email','$password')";

  mysqli_query($db,$query);
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "You are now logged in";
  
  echo "<script type='text/javascript'>  window.location='LoadDistribution.php'; </script>";
  
}
}

//LOGIN USER

if(isset($_POST['login_user'])){

  $username = mysqli_real_escape_string($db,$_POST['username']);
  $password = mysqli_real_escape_string($db,$_POST['password_1']);

  if(empty($username)){
    array_push($errors, "Username is required");
  }
  if(empty($password)){
    array_push($errors, "Password is required");
  }
  if(count($errors) === 0){
    $password = md5($password);
    $query = "SELECT * FROM user WHERE username = '$username' AND password='$password'";
    $results = mysqli_query($db, $query);

    if(mysqli_num_rows($results)){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Logged in successfully";
      
      echo "<script type='text/javascript'>  window.location='LoadDistribution.php'; </script>";
    }else{ //Going to Check if user entered Email address instead of username
      $query = "SELECT * FROM user WHERE email = '$username' AND password='$password'";
      $results = mysqli_query($db, $query);

      if(mysqli_num_rows($results)){
         $_SESSION['username'] = $username;
         $_SESSION['success'] = "Logged in successfully";
      
        echo "<script type='text/javascript'>  window.location='LoadDistribution.php'; </script>";
      }
      else{
        array_push($errors, "Wrong username/password combination. Please try again.");
      }
    }
  }
}

?>