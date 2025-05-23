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
<div class="custombutton">          
<form>
<button class="secondary-button" type="submit" formaction="home.html">Back</button>
<div class="float-right">
	<button class="primary-button" formaction="productsadd.php">Add new product</button>
	<button class="primary-button" formaction="productupdate.php">Update product</button>
</div>
</form>
</div>
    <?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from pet_products ");
echo "<table>";
echo "<tr>
<th>pp_ID</th>
<th>pp_name</th>
<th>pp_type</th>
<th>cost</th>
<th>belongs_to</th>
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
<div style="margin-top:25px">
<form action="deleteproducts.php" method="post" >
    <input type="text" name="t1" placeholder="Enter the id to delete" required >
    <input  class="secondary-button" type="submit" value="Delete">
</form> 
</div>
</div>
</body>
</html>