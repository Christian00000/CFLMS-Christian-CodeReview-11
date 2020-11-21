<?php 

require_once 'dbconnect.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM animal WHERE id = {$id}" ;
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title >Delete Animal Set Card</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body style="background-image: url('./img/bgadmin.jpg');
background-position: center;
background-repeat: no-repeat;
background-size: cover; ">
<div class="jumbotron jumbotron-fluid">
<div class="container">
<h1>Do you really want to delete this entry?</h1>
<form action ="action/a_delete.php" method="post">

   <input type="hidden" name= "id" value="<?php echo $data['id'] ?>" />
   <button type="submit">Yes, delete it!</button >
   <a href="admin.php"><button type="button">No, go back!</button ></a>
</form>
</div>
</body>
</html>

<?php
}
?>