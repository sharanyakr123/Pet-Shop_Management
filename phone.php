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
        <title>Customer </title>
    <link rel="stylesheet" href="styles.css">
	<style>
	 body{background-color: #f7e4ef}
	</style>  
</head>
<body>
<div class="topnav">
	<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
	<a href="phone.php">Customer numbers</a>
	<div class="topnav-right">
	  <a href="logout.php">logout</a>
	</div>
  </div> 
<div class="container">
<div class="custombutton">
<form>
<button  formaction="customer.php" class="secondary-button">Back</button>
<button  formaction="phoneadd.php" class="primary-button">Add new number</button>
</form>
</div>

    <?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from phone ");
echo "<table>";
echo "<tr>
<th>cs_ID</th>
<th>cs_phone</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
<div style="margin-top:25px">
	<form action="deletephone.php" method="post">
	<input  type="text" name="t1" placeholder="Enter the id to delete" required>
	<input   type="number" name="t2" placeholder="Enter the number" required>
	<input class="primary-button" type="submit" value="Delete">
	</form> 
</div>
</div>
</body>
</html>