<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<!doctype html>
<html>
<head>
        <title>Birds </title>
       <link rel="stylesheet" href="styles.css">
        <style>
		body {background: #dbebf9;}
		</style>
</head>
<body>
<div class="topnav">
	<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
	<a href="birds.php">Birds</a>
	<div class="topnav-right">
	  <a href="logout.php">logout</a>
	</div>
</div>

<div class="container">
<form>
    <button type="submit" formaction="birds.php" style="margin-bottom: 10px" class="secondary-button">Back</button>
</form>  
<form method="post" action="birdsupdate.php">  
<fieldset>
  <input type="text" name="id" placeholder=" Enter pet_id" style="width:97.5%;"  required>
  <br><br>
   <input type="text" name="category" placeholder=" Enter pet_category"  style="width:97.5%;"  required>
  <br><br>
   <input type="text" name="type" placeholder=" Enter bird type"  style="width:97.5%;"  required>
  <br><br>
  <select name="noise"  style="width:100%;">
	  <option value="low">low</option>
	  <option value="moderate">moderate</option>
	  <option value="high">high</option>
  </select>
  <br><br>
  <input type="number" name="cost" placeholder=" Enter cost"  style="width:97.5%;" min="0"  required>
  <br><br>
  <input type="submit" name="submit" value="Update" class="primary-button">&ensp; 
  </fieldset>  
</form> 
</div>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
 // define variables and set to empty values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Petshop_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "  CONNECTION ESTABLISHED \r\n";
//echo "  INSERTION IN PROCESS";
$id = $_POST["id"];
  $category = $_POST["category"];
  $type= $_POST["type"];
  $noise = $_POST["noise"];
  $cost = $_POST["cost"];

  $Query2="select count(*) from pets where pet_id='$id'";
  $Execute = mysqli_query($conn,$Query2);
  $count = mysqli_fetch_row($Execute);

  if($count[0]==1)
  {$sql = "UPDATE pets SET pet_category='$category' ,cost='$cost' WHERE pet_id='$id';
    UPDATE birds SET type= '$type',noise='$noise' where pet_id='$id";
    if ($conn->multi_query($sql) == TRUE) {
      echo'<div>
      <h1 style="color:#999;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">'
      .$id. ' updated successfully</h1>
         </div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }
  else{
    echo '<div>
    <h1 style="color:#999;font-size:30px; font-family: "Roboto", sans-serif;margin:auto;">Given pet_id not found</h1>
       </div>';
}

$conn->close();
}

?>
