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
        <title>Sale details </title>
        <link rel="stylesheet" href="styles.css">
	<style>
	 body{background-color: #ffe6d9}
	</style>  
</head>
<body>
<div class="topnav">
<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
<a href="soldproducts.php">Sold products</a>
<div class="topnav-right">
  <a href="logout.php">logout</a>
</div>
</div>

<div class="container">
<div class="custombutton" style="margin-bottom:10px">         
<form>
<button  formaction="sales.php" class="secondary-button">Back</button>
<button  formaction="soldpdadd.php"  class="primary-button">Add new details</button>
</form>
</div>
<?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from sold_products ");
echo "<table>";
echo "<tr>
<th>sd_ID</th>
<th>pp_id</th>
<th>quantity</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
<div style="margin-top:25px">
<form action="deletesoldpd.php" method="post">
<input  type="text" name="t1" placeholder="Enter  sales_id to delete" required>
<input   type="text" name="t2" placeholder="Enter product_id number" required>
    <input type="submit" value="Delete" class="secondary-button">
</form> 
</div>
</div>
</body>
</html>