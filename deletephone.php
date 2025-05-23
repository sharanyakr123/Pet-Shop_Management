
<html>
<head>
        <title>Customer </title>
        <link rel="stylesheet" href="styles.css">
	<style>
	 body{background-color: #f7e4ef}
	</style>  

<body>
<div class="topnav">
<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
<a href="customer.php">Customers</a>

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
$cs_id=$_POST["t1"];
$phone=$_POST["t2"];
$Query2="select count(*) from phone where cs_id='$cs_id' AND cs_phone='$phone'";
$Execute = mysqli_query($conn,$Query2);
$count = mysqli_fetch_row($Execute);
if($count[0]==1)
{
  $sql = "DELETE FROM phone WHERE cs_id='$cs_id' AND cs_phone='$phone'";
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
       <button type="submit" formaction="phone.php" class="secondary-button">Back</button>
</form> 
</div>
</body>
</html>