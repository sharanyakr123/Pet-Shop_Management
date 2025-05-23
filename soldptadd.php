<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>

<html>
<head>
  <title>
  Salesdetails
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
    <button type="submit" formaction="soldpets.php" class="secondary-button">Back</button>
</form>  
<form method="post" action="soldptadd.php"> 
<fieldset> 
   <input type="text" name="id" placeholder="Enter sales details id"  required>
  <br><br>
   <input type="text" name="pp" placeholder="Enter pet  id"  required>
  <br><br>
  <input type="submit" name="submit" value="Add" class="primary-button" >&ensp;  
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
  $pet_id = $_POST["pp"];




$sql = "INSERT INTO sold_pets( sd_id,pet_id)
VALUES ('$id','$pet_id')";
if ($conn->query($sql) == TRUE) {
  echo'<div>
  <h1 style="color:#999;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">New record of sales_id='
  .$id.'and pet_id='.$pet_id. ' inserted successfully</h1>
     </div>';
    $conn->query("call calculations_for_pets('$pet_id','$id')");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>