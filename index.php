<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $password = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 
  if( $count == 1 && $row['userPass' ]==$password ) {
    if($row["status"] == 'admin'){
      $_SESSION["admin"] = $row["userId"];
      header("Location: admin.php");

    }else {
      $_SESSION['user'] = $row['userId'];
      header( "Location: home.php");
    }
   
  } else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
 
 }

}
?>


   <!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<style> 
    #frame{
        background-color: rgba(136,183,219,.6);
    }
    </style>
</head>
<body style="background-image: url('./img/bg2.jpg');
background-position: center;
background-repeat: no-repeat;
background-size: cover; "> 
<div class="container mt-5" > 
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
 <h1 class="text-center">Congratulations to your exelent choice.</h1>
 
            
            
           
            <?php
  if ( isset($errMSG) ) {
echo  $errMSG;} ?>
             
    <div id="frame">
           <div class="mt-5">
           <h3 class="mt-5">Sign in</h3>
           <div class="row col-6 ">
    
           <p class="text-muted pt-5">For testing purposes use user@mail.com or admin@mail.com</p>
            <input  type="email" name="email"  class="form-control text-center my-5" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40"/>
            <span class="text-danger"><?php  echo $emailError; ?></span >
            
            <h5 class="text-muted" >Password for test purpose 123456</h5>
            <input  type="password" name="pass"  class="form-control text-center my-5" placeholder ="Your Password" maxlength="15" />      
           <span  class="text-danger"><?php  echo $passError; ?></span>
            
            <button style="width:8rem;" class="btn btn-primary " type="submit" name= "btn-login">Sign In</button>
        <hr>
            <a class="text-danger" href="register.php">Sign Up Here...</a>
            
            </div>
            </div>
            </div>
   </form>
   </div>
</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>