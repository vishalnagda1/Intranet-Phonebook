<!DOCTYPE html>
<html>
<head>

	<title>New Contacts</title>

	<style type="text/css">
		
		h2{ font-family: Bookman Old Style, Cambria; color: red;}
		span {color:#777;}
		
	</style>

</head>
<body>
<?php

$phonebook = @mysql_connect("localhost", "root", "password") or die("<center><h2>SORRY, We Are Unable To Add Contacts Because<br/>Its Failed To Connect To The Database On Server !!!</h2></center>");
	
@mysql_select_db("phonebook", $phonebook) or die("<center><h2>SORRY, We Are Unable To Add Contacts Because<br/>No Database Found On Server !!!</h2></center>");

if(isset($_POST['hidden']))
{

	if(!mysql_query("SELECT * FROM phone", $phonebook))
		mysql_query("CREATE TABLE phone(ID int NOT NULL AUTO_INCREMENT,PRIMARY KEY(ID),Fname varchar(20),Lname varchar(20),Phone varchar(150),eMail varchar(100),Address varchar(200),DateOfBirth varchar(10),Gender varchar(6))", $phonebook);

	$Fname = $_POST['Fname'];
	$Lname = $_POST['Lname'];
	$Phone = $_POST['cnum'];
	
	if($Fname === "" and $Lname === "" and $Phone === "") die("<center><h2>All Required Fields Are Missing,<br/>Go Back And Fill <span>First Name</span>, <span>Last Name</span> & <span>Phone</span> !!!</h2></center>");
	elseif($Fname === "" and $Lname === "") die("<center><h2>Some Required Fields Are Missing,<br/>Go Back And Fill <span>First Name</span> & <span>Last Name</span> !!!</h2></center>");
	elseif($Fname === "" and $Phone === "") die("<center><h2>Some Required Fields Are Missing,<br/>Go Back And Fill <span>First Name</span> & <span>Phone</span> !!!</h2></center>");
	elseif($Lname === "" and $Phone === "") die("<center><h2>Some Required Fields Are Missing,<br/>Go Back And Fill <span>Last Name</span> & <span>Phone</span> !!!</h2></center>");
	elseif($Fname === "") die("<center><h2>First Name Should Be Required To Fill,<br/>Go Back And Fill <span>First Name</span> !!!</h2></center>");
	elseif($Lname === "") die("<center><h2>Last Name Should Be Required To Fill,<br/>Go Back And Fill <span>Last Name</span> !!!</h2></center>");
	elseif($Phone === "") die("<center><h2>Phone Number Should Be Required To Fill,<br/>Go Back And Fill <span>Phone Number</span> !!!</h2></center>");

	$eMail = $_POST['mail'];
	$Address = $_POST['add'];
	$DateOfBirth = $_POST['dob'];
	$Gender = $_POST['gender'];

	
	if(!$_POST['Update'])
	{
		mysql_query("INSERT INTO phone(Fname, Lname, Phone, eMail, Address, DateOfBirth, Gender) VALUES('$Fname', '$Lname', '$Phone', '$eMail', '$Address', '$DateOfBirth', '$Gender')", $phonebook) or die("<center><h2>Please Check Values !!!</h2></center>");

		header("Location:new.php");
	}
	else
	{
	
		$ID = $_POST['ID'];
	
		mysql_query("UPDATE phone SET Fname = '$Fname', Lname = '$Lname', Phone = '$Phone', eMail = '$eMail', Address = '$Address', DateOfBirth = '$DateOfBirth', Gender = '$Gender' WHERE ID = $ID");
		
		header("Location:update.php");
	
	}
	
}
else echo "<center><h2>SORRY, We Are Unable To Add Contacts Because<br/>Some Errors Are Occured While Transferring The Data !!!</h2></center>";

?>
</body>
</html>
