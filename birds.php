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
    <div class="custombutton">    
		<form>
		<button class="secondary-button" type="submit" formaction="home.html">Back</button>
		<div class="float-right">
		<button class="primary-button" formaction="birdsadd.php">Add new bird</button>
		<button class="primary-button" formaction="birdsupdate.php">Update bird</button>
		</div>
		</form> 
	</div>

    <?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select P.pet_id,P.pet_category,A.type,A.noise, P.cost from pets P,birds A where P.pet_id=A.pet_id ");
echo "<table>";
echo "<tr>
<th>pet_ID</th>
<th>petcategory</th>
<th>type</th>
<th>noise</th>
<th>cost</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
    <td>$arr[4]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
<div class="lastblock" style="margin-top:25px;">
<form action="deletebird.php" method="post">
    
    <input type="text" name="t1" placeholder="Enter the id to delete" required>
    <input class="secondary-button" type="submit" value="Delete">
</form> 
</div>
</div>
</body>
</html>