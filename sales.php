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
        <title>Sales details </title>
       <link rel="stylesheet" href="styles.css">
		<style>
		 body{background-color: #ffe6d9}
		</style> 
</head>
<body>
<div class="topnav">
<a class="active" href="home.html"><img src="ic_add_pet.png"></a>
<a href="sales.php">Sales details</a>
<div class="topnav-right">
  <a href="logout.php">logout</a>
</div>
</div>

<div class="container">
<div class="custombutton">           
<form>
<button class="secondary-button" type="submit" formaction="home.html">Back</button>
<button class="primary-button" formaction="salesadd.php">Add new details</button>
<button class="primary-button" formaction="salesupdate.php">Update details</button>
<div class="float-right">
<button class="primary-button" formaction="soldproducts.php">Sold products</button>
<button class="primary-button" formaction="soldpets.php">Sold pets</button>
</div>
</form>
</div>
<?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from sales_details ");
echo "<table>";
echo "<tr>
<th>sd_ID</th>
<th>cs_id</th>
<th>date</th>
<th>total</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
<div style="margin-top:25px">
	<form action="deletesales.php" method="post">
	<input id="dbutton" type="text" name="t1" placeholder="Enter the id to delete" required >
	<input type="submit" class="secondary-button" value="Delete">
	</form> 
	
</div>
</div>
</body>
</html>