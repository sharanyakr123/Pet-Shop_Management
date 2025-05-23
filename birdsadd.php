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
    <button type="submit" formaction="birds.php" style="margin-bottom:10px" class="secondary-button">Back</button>
</form>  
<form method="post" action="birdsadd.php">  
<fieldset>
  <input type="text" name="id" placeholder=" Enter pet_id" style="width:97.5%"  required>
  <br><br>
   <input type="text" name="category" placeholder=" Enter pet_category" style="width:97.5%"   required>
  <br><br>
   <input type="text" name="type" placeholder=" Enter bird type"  style="width:97.5%"  required>
  <br><br>
  <select name="noise"  style="width:97.5%">
	  <option value="low">low</option>
	  <option value="moderate">moderate</option>
	  <option value="high">high</option>
</select>
  <br><br>
  <input type="number" name="cost" placeholder=" Enter cost"  min="0" style="width:97.5%" required>
  <br><br>
  <input type="submit" name="submit" value="Save" class="primary-button" >&ensp; 
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




$sql = "INSERT INTO pets( pet_id,pet_category,cost)
VALUES ('$id','$category','$cost');
INSERT INTO birds(pet_id,type,noise)
 VALUES('$id','$type','$noise')";
if ($conn->multi_query($sql) == TRUE) {
  echo'<div>
  <h1 style="color:#999;font-size:20px; font-family: "Roboto", sans-serif;margin:auto;">New record of id='
  .$id. ' inserted successfully</h1>
     </div>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
