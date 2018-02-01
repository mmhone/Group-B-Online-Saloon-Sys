

<?php

$con =  mysqli_connect("Localhost","root","");

 $status = mysqli_query($con,"CREATE DATABASE IF NOT EXISTS Saloon" );


 if ($status===true)
 {
	 mysqli_select_db($con,"Saloon");
	 
 mysqli_query($con,"CREATE TABLE Users( 
					UserId INT NOT NULL PRIMARY KEY,  
					UserName  varchar(200), 
					Password varchar(50),
					Role varchar (50))");	

mysqli_query($con,"CREATE TABLE Staff(
					StaffID int(20) NOT NULL PRIMARY KEY, 
					fName varchar(100), 
					lName varchar(100),
					Position varchar(60),
					Specialization varchar(100),
					Email varchar(100), 
					Phone varchar (20), 
					Address varchar(200))");
					
mysqli_query($con,"CREATE TABLE Customers( 
					CustomerID int(20) NOT NULL PRIMARY KEY,
					fName varchar(100),	
					lName varchar(200),
					Address varchar(200),
					Email varchar(100),
					Phone varchar (20))");

mysqli_query($con,"CREATE TABLE Services( 
					ServiceCode int(20) NOT NULL PRIMARY KEY,
					Name varchar(100),	
					Description varchar(200), 
					Price float (6.2))");					
					
mysqli_query($con,"CREATE TABLE Bookings( 
					BookingCode Varchar(20) NOT NULL PRIMARY KEY, 
					CustomerID int(20) NOT NULL, 
					ServiceCode int(20) NOT NULL,
					BookedDate DATE,
					BookedTime TIME,
					Status varchar(20),
					FOREIGN KEY (CustomerID) references Customers (CustomerID),
					FOREIGN KEY (ServiceCode) references Services (ServiceCode))");	
						 
mysqli_query($con,"CREATE TABLE Assignments( 
					AssCode varchar(20) NOT NULL PRIMARY KEY, 
					Description varchar(300), 
					StaffID int(20) NOT NULL,
					ServiceCode int(20) NOT NULL,
					DateAssigned DATE,
					FOREIGN KEY (StaffID) references Staff (StaffID),
					FOREIGN KEY (ServiceCode) references Services (ServiceCode))");				 
	 
	
Header("Location:index.php");
	 
	 
 }


?>					
	 
 


</body>

</html>	 
	 
	 
	 
	 
	 