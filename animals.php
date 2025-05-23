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
        <title>Animals </title>
      <link rel="stylesheet" href="styles.css">
	  <style>
		body{background-color: #fff1ff}
	  </style>
</head>
<body>
<div class="topnav">
<a class="active logo" href="home.html"><img src="ic_add_pet.png"></a>
<a href="animals.php" class="logo-text">Animals</a>
<div class="topnav-right">
  <a href="logout.php">logout</a>
</div>
</div>
<div class="container">
	<div class="custombutton">   
	<form>
	<button class="secondary-button" type="submit" formaction="home.html">Back</button>
	<div class="float-right">
		<button class="primary-button" formaction="animalsadd.php">Add new animal</button>
		<button class="primary-button" formaction="animalsupdate.php">Update animal</button>
	</div>
	</form>
	</div>
		<?php
	   
	$con = mysqli_connect("localhost","root","","Petshop_management");
	if(!$con)
	{ 
	die("could not connect".mysql_error());
	}
	$var=mysqli_query($con,"select P.pet_id,P.pet_category,A.breed,A.weight,A.height,A.age,fur,P.cost from pets P,animals 

	A where P.pet_id=A.pet_id ");
	echo "<table>";
	echo "<tr>
	<th>pet_ID</th>
	<th>petcategory</th>
	<th>breed</th>
	<th>weight(kg)</th>
	<th>height(cm)</th>
	<th>age(m)</th>
	<th>fur</th>
	<th>cost(Rs)</th>
	</tr>";
	if(mysqli_num_rows($var)>0){
		while($arr=mysqli_fetch_row($var))
		{ echo "<tr>
		<td>$arr[0]</td>
		<td>$arr[1]</td>
		<td>$arr[2]</td>
		<td>$arr[3]</td>
		<td>$arr[4]</td>
		<td>$arr[5]</td>
		<td>$arr[6]</td>
		<td>$arr[7]</td>
		</tr>";}
		echo "</table>";
		mysqli_free_result($var);
	}

	mysqli_close($con);
		
		
	?>

	<div class="lastblock" style="margin-top:25px;">
	<form action="deleteanimal.php" method="post">
		<input  id="dbutton" type="text" name="t1" placeholder="Enter the id to delete" required>
		<input class="secondary-button" type="submit" value="Delete">
	</form> 
	</div>
</div>
</body>
</html>