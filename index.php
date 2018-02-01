
<html class='w3-padding-jumbo' style="margin-top: 50px";>

<head>
<title> Group B Online Saloon System</title>
<link rel="stylesheet" href="App\css\w3.css" type="text/css"/>
</head>

<body>

<?php

$con = mysqli_connect ("Localhost","root","");

 
$status  = mysqli_select_db($con,"Saloon");


if ($status===true)
{
	
}
else if ($status===false)
{
	Header ("Location:setup.php");
}
?>


<div class='w3-container w3-threequarter w3-center w3-card-12 w3-padding-large'  style="margin-left: 200px"; >

</br>
</br>
<h2 class='w3-blue-grey'>GROUP B ONLINE SALOON SYSTEM</h2>
</br>

<div class= 'w3-left'><img src="App/images/hair.png" style= "width:300px"height=300px"/></div>

</br>
<h3> LOGIN DETAILS</h3>



<form action="index.php" method="POST">
		<div class="form-group">
		
		<label> Username</label></br>
		<input type="text" class="form-group" placeholder="enter username" name= "username" >
		</div>
		<div class="form-group">
		<label> Password</label></br>
		<input type="password" class="form-group" placeholder="enter password" name="password" >
		</div>
		
		</br>
		
		<input class='w3-btn w3-round w3-green' type="Submit" name="login" value ="login" >
		 <a href="userReg.php"> Register Now </a>
		
		</br>
		</br>
		</br>
		</br>
		</br></br></br>
		<div class='w3-container w3-blue-grey' style= "height:40px">
			<footer>
			<p >Copyright &copy 2017 All rights reserved  <a href="" target="">Group B Online Saloon System </a> </p>
			
			</footer>
			
			
		</div>	
	
</form>

	

</div>

<?php
  
  
  if (isset($_POST['login']))
  {
	$username = $_POST['username'];
	$password = $_POST['password'];
	  
		  
	$con = new mysqli("Localhost","root","","Saloon");
	  
	$result  = $con->query("SELECT Role FROM Users WHERE UserName ='$username'  AND Password= '$password'");
	  
	  $role = $result->fetch_row();
	  $gotType =  $role[0];
	 	  	  
	   if ($gotType==="Admin")
	   {
		   $con= new mysqli ("localhost","root","","Saloon");
		    $result  = $con->query("SELECT UserName FROM Users WHERE UserName ='$username'  AND Password= '$password'
			AND Role = '$gotType'");
			$name = $result->fetch_row();
			
			$admname = $name[0];
			
			$_SESSION['name'] = $admname;
			
			 			
		   Header ('Location:App/Admin/AdminAccount.php');  
		     
	   }
	   
	   else if ($gotType==="Staff")
	   {
		 
		   $con= new mysqli ("localhost","root","","Saloon");
		    $result  = $con->query("SELECT UserName FROM Users WHERE UserName ='$username'  AND Password= '$password'
			AND Role = '$gotType'");
		  	$name = $result->fetch_row();
			$techname = $name[0];
			
			$_SESSION['name'] = $Staffname;
			
			Header ('Location:App/Staff/StaffAccount.php');
	   }
	   
	   else if ($gotType==="Customer")
	   {
		   $con= new mysqli ("localhost","root","","Saloon");
		   $result  = $con->query("SELECT UserName FROM Users WHERE UserName ='$username'  AND Password= '$password'
			AND Role = '$gotType'");
			$name = $result->fetch_row();
			
			$manager = $name[0];
			
			$_SESSION['name'] = $customer;
					
		   Header ('Location:App/Customer/CustomerAcnt.php');
	   }
	   
	  
  }

?>
	
 
	   

</body>

</html>