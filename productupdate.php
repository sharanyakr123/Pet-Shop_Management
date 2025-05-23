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
        <title>Pet products </title>
        <link rel="stylesheet" href="styles.css">
		<style>
		 body{background-color: #ffe6e4}
		</style>      
</head>
<body>
<div class="topnav">
	<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
	<a href="petproducts.php">Pets products</a>
	<div class="topnav-right">
	  <a href="logout.php">logout</a>
	</div>
</div>

<div class="container">
<form>
    <button type="submit" formaction="petproducts.php" class="secondary-button" style="margin-bottom: 10px">Back</button>
</form>
<form method="post" action="productupdate.php">  
<fieldset> 
   <input type="text" name="id" placeholder=" Enter product_id" style="width: 97.5%" required>
  <br><br>
  <input type="text" name="name" placeholder=" Enter product name" style="width: 97.5%" required>
  <br><br>
   <input type="text" name="type" placeholder=" Enter product type" style="width: 97.5%" required>
  <br><br>
  <input type="number" name="cost" placeholder=" Enter cost"  min="0" style="width: 97.5%" required>
  <br><br>
  <input type="text" name="belong" placeholder=" which pet category it belongs to" style="width: 97.5%" required>
  <br><br>
  <input type="submit" name="submit" value="Update" class="primary-button"  placeholder=" which pet category it belongs to" >&ensp; 
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
  $name = $_POST["name"];
  $type= $_POST["type"];
  $belongs = $_POST["belong"];
  $cost = $_POST["cost"];

  $Query2="select count(*) from pet_products where pp_id='$id'";
  $Execute = mysqli_query($conn,$Query2);
  $count = mysqli_fetch_row($Execute);
  if($count[0]==1)
  {
    $sql = "UPDATE  pet_products SET pp_name='$name' ,pp_type= '$type',cost='$cost' ,belongs_to='$belongs' 
    WHERE pp_id='$id'";
    if ($conn->query($sql) == TRUE) {
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
    <h1 style="color:#999;font-size:30px; font-family: "Roboto", sans-serif;margin:auto;">Given pp_id not found</h1>
       </div>';
}


$conn->close();
}
?>