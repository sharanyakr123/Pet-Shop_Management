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
        <title>Customer </title>
     <link rel="stylesheet" href="styles.css">
	<style>
	 body{background-color: #f7e4ef}
	</style>     
</head>
<body>
<div class="topnav">
	<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
	<a href="customer.php">Customers</a>
	<div class="topnav-right">
	  <a href="logout.php">logout</a>
	</div>
  </div>
<div class="container">
<div class="margin-bottom-1">
<form>
    <button type="submit" formaction="phone.php" class="secondary-button">Back</button>
</form>  
</div>
<form method="post" action="phoneadd.php"> 
<fieldset>  
   <input type="text" name="id" placeholder="Enter customer id" required>
  <br><br>
   <input type="number" name="phone" placeholder="Enter phone no."  required>
  <br><br>
  <input type="submit" name="submit" value="Add" class="primary-button">&ensp;  
  </fieldset> 
</form> 

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
  $cs_phone = $_POST["phone"];
 




$sql = "INSERT INTO phone( cs_id,cs_phone)
VALUES ('$id','$cs_phone')";
if ($conn->query($sql) == TRUE) {
  echo'<div>
  <h1 style="color:#999;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">New record of cs_id='
  .$id. ' inserted successfully</h1>
     </div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
</div>
</body>
</html>