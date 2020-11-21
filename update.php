<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
  header("Location: home.php");
  exit;
}

if ($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM animal WHERE id = {$id}" ;
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    
    $conn->close();
 }
?>

<!DOCTYPE html>
<html>
<head>
  <title>UPDATE</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <h1>Update Entrys</h1>
  <form action="action/a_update.php" method="post"class="col-md-6"> 
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
    <div class="form-row">
     <div class="form-group col-md-6" >
      <label for="inputState">Category</label>
      <select id="inputState" class="form-control" name="category">
         <option value="small" >Small</option>
         <option value="large">Large</option>
         
      </select>
     </div>
     <div  class="form-group col-md-6">
      <label >Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>" >
    </div>  
    </div>
    
    <div class="form-row">
    <div  class="form-group col-md-3">
      <label >Zip Code</label>
      <input type="text" class="form-control" name="zipCode" value="<?php echo $data['zipCode'] ?>">
    </div>
      <div  class="form-group col-md-3">
      <label >City</label>
      <input type="text" class="form-control" name="city" value="<?php echo $data['city'] ?>">
    </div>
    <div  class="form-group col-md-6">
      <label >Street</label>
      <input type="text" class="form-control" name="address" value="<?php echo $data['address'] ?>">
    </div>
     
     </div>
     <div  class="form-group">
      <label >Image URL</label>
      <input type="text" class="form-control" name="image" value="<?php echo $data['image'] ?>">
    </div>
    <div  class="form-group">
      <label >Description</label>
      <input type="text" class="form-control" name="description" value="<?php echo $data['description'] ?>">
    </div>
    <div  class="form-group">
      <label >Hobbies</label>
      <input type="text" class="form-control" name="hobbies" value="<?php echo $data['hobbies'] ?>">
    </div>
    <div  class="form-group">
      <label >Website</label>
      <input type="text" class="form-control" name="website" value="<?php echo $data['website'] ?>">
    </div>
    <div class="form-row">
     <div  class="form-group col-md-6">
      <label >Age</label>
      <input type="text" class="form-control" name="age" value="<?php echo $data['age'] ?>">
    </div>
    
      </div>
      
    
     
    
    
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <a href="admin.php" class="btn btn-primary" >Back</a>
   
  
  </form>
</body>
</html>