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
<form method="post" action="salesupdate.php">

  <fieldset>
  
    <input type="text"  id ="sd" name="id" placeholder="Enter the sales id"  required>
   <br><br>
   <input type="text" name="csid" placeholder="Enter the customer id"  required>
  <br><br>
   <input type="date" name="date"  required>
  <br><br>
  <input type="number" name="total" min="0"  required placeholder="Enter total amount">
  <br><br>
  <input type="submit" name="submit" value="Update" class="primary-button" >&ensp; 
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
  $total = $_POST["total"];
 
  $Query2="select count(*) from sales_details WHERE sd_id='$id'";
  $Execute = mysqli_query($conn,$Query2);
  $count = mysqli_fetch_row($Execute);
  if($count[0]==1)
  {
    $sql = "UPDATE sales_details SET cs_id='$cs_id' ,date='$date' ,total='$total' where sd_id='$id'";
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
    <h1 style="color:#999;font-size:30px; font-family: "Roboto", sans-serif;margin:auto;">Given sales_id not found</h1>
       </div>';
}




$conn->close();
}


?>