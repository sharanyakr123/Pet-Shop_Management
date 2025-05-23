<html>
<head>
        <title>Saledetails </title>
    <link rel="stylesheet" href="styles.css">
	<style>
	 body{background-color: #ffe6d9}
	</style>
<head>
<body>
<div class="topnav">
<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
<a href="sales.php">Sales details</a>

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
$id=$_POST["t1"];
$Query2="select count(*) from sales_details WHERE sd_id='$id'";
$Execute = mysqli_query($conn,$Query2);
$count = mysqli_fetch_row($Execute);
if($count[0]==1)
{
  $sql = "DELETE FROM sales_details WHERE sd_id='$id'";
  if ($conn->query($sql) == TRUE) {
      echo '<div>
      <h1 style="color:#999;font-size:50px; font-family: "Roboto", sans-serif;margin:auto;">Data deleted successfully</h1>
         </div>';
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else{
  echo '<div>
  <h1 style="color:#999;font-size:40px; font-family: "Roboto", sans-serif;margin:auto;"> Data not found</h1>
     </div>';
}



$conn->close();
?>
<form>
<button type="submit" class="secondary-button" formaction="sales.php">Back</button>
</form>
</div>
</body>
</html>