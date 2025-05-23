<html>
<head>
        <title>Animals </title>
		<link rel="stylesheet" href="styles.css">
        <style>
			body{background-color: #fff1ff}
		</style>
<body>
<div class="topnav">
	<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
            <a href="animals.php">Animals</a>
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
$pet_id=$_POST["t1"];

$Query2="select count(*) from pets where pet_id='$pet_id'";
$Execute = mysqli_query($conn,$Query2);
$count = mysqli_fetch_row($Execute);


if($count[0]==1)
{ 
    
    $sql = "DELETE FROM pets WHERE pet_id='$pet_id'";
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
    <button type="submit" class="secondary-button" formaction="animals.php">Back</button>
</form>
</div>
<body>
<html>