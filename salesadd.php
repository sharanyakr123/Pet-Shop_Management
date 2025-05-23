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
  <title>
  Sales details
  </title>
	<link rel="stylesheet" href="styles.css">
	<style>
	 body{background-color: #ffe6d9}
	</style> 
  </head>
<body>
  <div class="topnav">
	<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
	<a href="sales.php">Sales details</a>
	<div class="topnav-right">
	  <a href="logout.php">logout</a>
	</div>
  </div>

<div class="container">
<form>
<button type="submit" formaction="sales.php" class="secondary-button" style="margin-bottom:10px" >Back</button>
</form>
<form method="post" action="salesadd.php">

  <fieldset>
    <input type="text" id ="sd" name="id" placeholder="Enter the sales id" required>
   <br><br>
   <input type="text" name="csid" placeholder="Enter the customer id"  required>
  <br><br>
   <input type="date" name="date"  required>
  <br><br>
  <input type="submit" name="submit" value="Save" class="primary-button">&ensp; 
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
  $cs_id = $_POST["csid"];
  $date= $_POST["date"];
 // $total = $_POST["total"];
 




$sql = "INSERT INTO sales_details( sd_id,cs_id,date)
VALUES ('$id','$cs_id','$date')";
if ($conn->multi_query($sql) == TRUE) {
  echo'<div>
      <h1 style="color:#999;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">New record of id='
      .$id. ' inserted successfully</h1>
         </div>';
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}


?>