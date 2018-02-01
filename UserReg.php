
<html class='w3-container w3-padding-jumbo'style="margin-top: 50px">


<head>
<title> GROUP B ONLINE SALOON SYSTEM</title>
<link rel="stylesheet" href="App\css\w3.css" type="text/css"/>
</head>

<body>

<div  class='w3-container w3-threequarter w3-center w3-card-12 w3-padding-large'  style="margin-left: 200px";>
<div class= 'w3-left'><img src="App/images/hair.png" style= "width:300px"height=300px"/></div>

</br>
<h2 class='w3-blue-grey'>GROUP B ONLINE SALOON SYSTEM</h2>
</br>

<h3>User Registration</h3>


<div id="userReg"></br>
    
	<fieldset>
	<form class='w3-form w3-padding' action="userReg.php" method="POST">
	
	<table>
	<tr>
	<th style="float:right">User Name</th>
	<td>
	<input  type="text" id="username" name="username">
	</td>
	</tr>
	
	<tr>
	<th style="float:right">Password </th>
	<td>
	<input type="password"  name="password">
	</td>
	</tr>
	
	<th style="float:right">User Role</th>
	<td>
	<input type="text"  name="role">
	</td> 
	
	</table>
	
	</br>
	</br>
	<input Class='w3-btn w3-round' type="submit" value="Register"  name="Register">
	
	</form>

	</fieldset>
	</div>

	</br>
		<div class='w3-container w3-blue' style= "height:40px">
			<footer>
			<p >Copyright &copy 2017 All rights reserved  <a href="" target="">Group B Online Saloon System </a>  </p>
			
			</footer>
		</div>	




  
<?php
  
  if (isset($_POST['Register']))
	{

	   $username = $_POST['username'];
	   $password = $_POST['password'];
	   $role = $_POST['role'];
	   
	$con = new mysqli("Localhost","root","","Saloon");
	  	  
		  
		 $result = $con->query("SELECT * FROM Users");
		 
		 $count = $result->num_rows;
		  
		  		   
		   if ($count===0)
		   {
			   $newId = '100';
			   
			    $S = '1';
					  
					  $statement  = $con->prepare("INSERT INTO Users (UserId,UserName,Password,Role) VALUES(?,?,?,?)");
					  $statement->bind_param('isss',$newId,$username,$password,$role);
					   
					   $statement->execute();
			   
		   }
		   else
		   {
			      $result = $con->query("SELECT max(UserId) FROM Users");
		 
						 $gotId = $result->fetch_row();
						  				  
						  $newId = $gotId[0];
						  
						  $newId = $newId + 1;
							
					  $S = '1';
					  
					  $statement  = $con->prepare("INSERT INTO Users (UserId,UserName,Password,Role) VALUES(?,?,?,?)");
					  $statement->bind_param('isss',$newId,$username,$password,$role);
					   
					   $statement->execute();
					   
					Header("Location:index.php");   
		   } 
	
   }

 
?>  
</div>
</body>
</html>