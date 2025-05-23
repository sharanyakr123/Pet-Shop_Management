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
	<title>Animals </title>
	<link rel="stylesheet" href="styles.css">
	<style>
	 body{background-color: #fff1ff}
	</style>
</head>
<body>
<div class="topnav">
            <a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="animals.php">Animals</a>
            <div class="topnav-right">
              <a href="logout.php">logout</a>
            </div>
          </div>
		  
<div class="container">
<form>
    <button type="submit"  formaction="animals.php" class="secondary-button" style="margin-bottom:10px">Back</button>
</form> 

<form method="post" action="animalsupdate.php">  
<fieldset>
<input type="text" name="id" placeholder=" Enter pet_id" style="width:97.5%;" required  >
    <br><br>
   <input type="text" name="category" placeholder="Enter pet_category" style="width:97.5%;" required  >
   <br><br>
  
  <input type="text" name="breed"  placeholder="Enter breed" style="width:97.5%;" required >
  <br><br>
  <input type="number" step=any name="weight"  placeholder="Enter weight" style="width:45%;" min="1" required  >
  
 <input type="number" step=any name="height"  placeholder="Enter height" style="width:45%;" min="15" required >
  <br><br>
  <input type="number" name="age"  placeholder="Enter age" style="width:45%;"  min="1"required >
 
  <input type="text" name="fur"  placeholder="Enter fur" style="width:45%;"  required >
  <br><br>
  <input type="number" name="cost"  placeholder="Enter cost" style="width:45%;" min="0"  required >
  <br><br>
  <input type="submit" name="submit" value="update" class="primary-button" >&ensp; 
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
  $breed= $_POST["breed"];
  $weight = $_POST["weight"];
  $height = $_POST["height"];
  $age = $_POST["age"];
  $fur= $_POST["fur"];
  $cost = $_POST["cost"];

  $Query2="select count(*) from pets where pet_id='$id'";
  $Execute = mysqli_query($conn,$Query2);
  $count = mysqli_fetch_row($Execute);

  if($count[0]==1)
  {
    $sql = "UPDATE pets SET pet_category='$category' ,cost='$cost' WHERE pet_id='$id';
    UPDATE animals SET breed='$breed',weight='$weight',height='$height',age='$age',fur='$fur' WHERE pet_id='$id'";
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