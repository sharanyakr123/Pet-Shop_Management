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
	<a href="customer.php">Customers</a>
	<div class="topnav-right">
	  <a href="logout.php">logout</a>
	</div>
  </div>
  
<div class="container">
<div class="custombutton">         
<form>
<button class="secondary-button" type="submit" formaction="home.html">Back</button>
<button class="primary-button" formaction="customeradd.php">Add new customer</button>
<button class="primary-button" formaction="customerupdate.php">Update customer</button>
<button class="primary-button float-right" formaction="phone.php">Phone nos.</button>
</form>
</div>
    <?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");//change username and password according to your server settings
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from customer ");
echo "<table>";
echo "<tr>
<th>cs_ID</th>
<th>cs_fname</th>
<th>cs_minit</th>
<th>cs_lname</th>
<th>cs_address</th>
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
<form action="deletecustomer.php" method="post">
<input  id="dbutton" type="text" name="t1" placeholder="Enter the id to delete" required>
    <input class="secondary-button" type="submit" value="Delete">
</form> 
</div>
</div>
</body>
</html>