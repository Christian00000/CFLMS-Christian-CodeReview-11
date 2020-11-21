<?php 
ob_start();
session_start();
require_once'dbconnect.php';
if(!isset($_SESSION['admin']) &&!isset($_SESSION['user'])){
	header("Location:index.php");
	exit;
}
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

$resAni = mysqli_query($conn,"SELECT * FROM animal WHERE age >='8'");


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<style>
		header{
			text-align:center;
			margin: 1rem;
			}
            img{
                 
                height:18rem;
            }
         #contents{
         	width: 87rem;
         }
          #title{
          		display:inline;
          }
          #card{
            background-color: rgba(136,183,219,.8);
            box-shadow: 0 0.2rem 0.5rem 0 rgba(0, 0, 0, 0.6), 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
          	 margin: 1.5rem;

          }
          

	</style>
</head>
<body style="background-image: url('./img/bg2.jpg');
background-position: center;
background-repeat: no-repeat;
background-size: cover; ">
	<header>
    <span class="badge badge-primary text-wrap text-center mb-5" style='width:15rem;  font-size:2rem;' >Hallo <?php echo $userRow['userName' ]; ?></span>
		<nav class="nav nav-pills flex-column flex-sm-row">
			<a class="flex-sm-fill text-sm-center text-light nav-link " href="home.php">Home</a>
			<a class="flex-sm-fill text-sm-center text-light nav-link" href="general.php">Small and Big Animals</a>
			<a class="flex-sm-fill text-sm-center text-light nav-link active" href="senior.php">Senior Animals</a>
			<a class="flex-sm-fill text-sm-center text-light nav-link" href="logout.php?logout">Logout</a>
		</nav>

	</header>
	<div id = "contents"class="d-flex flex-wrap justify-content-center">
	<?php
        if($resAni-> num_rows == 0){
        	echo "No result";
        }elseif($resAni->num_rows==1){
        	$row = $resAni ->fetch_assoc();
            echo '
            <div class="card" id="card" style="width: 18rem;">
            <img src="'.$row["image"].'" class="card-img-top" alt="..." >
            <div class="card-body">
            <h5 class="card-title">'."My Name is " .$row["name"].'</h5>
            <p class="card-text">'.$row["description"].'</p>
            <p class="card-text">'."Hobbys: " .$row["hobbies"].'</p>
            <p class="card-text">'."I am " .$row["age"].  " years old". '</p>
            <p class="card-text">'.$row["zipCode"]. "" .$row["city"].'</p>
            <p class="card-text">'.$row["address"].'</p>
            
            
            <a href="'.$row["website"].'" class="btn btn-primary">Read more..</a>
            </div>
            </div>';
        }else{
        	$rows =$resAni->fetch_all(MYSQLI_ASSOC);
        	foreach($rows as $value){
                echo '
                <div class="card" id="card" style="width: 18rem;">
                <img src="'.$value["image"].'" class="card-img-top" alt="..." >
                <div class="card-body">
                <h5 class="card-title">'."My Name is " .$value["name"].'</h5>
                <p class="card-text">'.$value["description"].'</p>
                <p class="card-text">'."Hobbys: " .$value["hobbies"].'</p>
                <p class="card-text">'."I am " .$value["age"].  " years old". '</p>
                <p class="card-text">'.$value["zipCode"]. "" .$value["city"].'</p>
                <p class="card-text">'.$value["address"].'</p>
                
                
                <a href="'.$row["website"].'" class="btn btn-primary">Read more..</a>
                </div>
                </div>';
        	}
        }

	?>
</div>
</body>
</html>