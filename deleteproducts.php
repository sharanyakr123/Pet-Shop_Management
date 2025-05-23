<!doctype html>
<html>
<head>
        <title>Pet products </title>
         <link rel="stylesheet" href="styles.css">
		<style>
		 body{background-color: #ffe6e4}
		</style> 
<body>
<div class="topnav">
	<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
	<a href="petproducts.php">Pets products</a>
   
  </div>
<div class="container">
<?php

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
$pp_id=$_POST["t1"];

$Query2="select count(*) from pet_products where pp_id='$pp_id'";
$Execute = mysqli_query($conn,$Query2);
$count = mysqli_fetch_row($Execute);

if($count[0]==1)
{
  $sql = "DELETE FROM pet_products WHERE pp_id='$pp_id'";
  if ($conn->query($sql) == TRUE) {
      echo '<div>
      <h1 style="color:#999;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">Data deleted successfully</h1>
         </div>';
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else{
  echo '<div>
  <h1 style="color:#999;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;"> Data not found</h1>
     </div>';
}


$conn->close();
?>
<form>
        <button type="submit"  class="secondary-button" formaction="petproducts.php">Back</button>
</form>
</div>
</body>
</html>
