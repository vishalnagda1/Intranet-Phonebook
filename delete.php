<!DOCTYPE html>
<html>
<head>

	<title>Delete Contacts</title>
	
	<style type="text/css">
	
		button{ font-family: Verdana, Tahoma; color: #444; border: 0; background-color: white;}
		h2{ font-family: Bookman Old Style, Cambria; color: red;};
	
	</style>

</head>

<body>

<center>

	<h1 style="font-family: Verdana ,Tahoma; color: green;">Delete Contacts</h1><br/>

	<img src="image/delete.png" height="100" width="100"/>

</center>

<?php for($i=0; $i<5; $i++)echo '<br/>'; ?>

<table align="center" cellspacing="5" cellpadding="6" width="80%" border="0" >

	<tr>
	
		<td align="center"><button onclick="window.location.href='contact.php'"/><img src="image/contact.png" height="100" width="100"/><br/>Contacts</td>
		<td align="center"><button onclick="window.location.href='new.php'"/><img src="image/add.png" height="100" width="100"/><br/>New</td>
		<td align="center"><button onclick="window.location.href='update.php'"/><img src="image/edit.png" height="100" width="100"/><br/>Update</td>
		<td align="center"><button onclick="window.location.href='index.php'"/><img src="image/phone.png" height="100" width="100"/><br/>Home</td>
		<td align="center"><button onclick="window.location.href='search.php'"/><img src="image/search.png" height="100" width="100"/><br/>Search</td>
	
	</tr>

</table>

<?php
	
	for($i=0; $i<3; $i++)echo '<br/>';
	
	$phonebook = @mysql_connect("localhost", "root", "password") or die("<center><h2>SORRY, We Are Unable To Delete Contacts Because<br/>Its Failed To Connect To The Database On Server !!!</h2></center>");
	
	@mysql_select_db("phonebook", $phonebook) or die("<center><h2>SORRY, We Are Unable To Delete Contacts Because<br/>No Database Found On Server !!!</h2></center>");
	
	if(!@mysql_num_rows($sql = mysql_query("SELECT * FROM phone", $phonebook)))
		die("<center><h2>SORRY, No Record Available !!!</h2></center>");

	if(!@$_POST['Delete'])
	{
		echo '<center>

		<form action="delete.php" method="POST">
	
			<input type="hidden" name="hidden" value="TRUE" />
	
			<table border="0" style="width: 540px; height: 120px" cellpadding="3" cellspacing="3">
		
				<tr>
					<td><input type="text" placeholder="Search" name="search" style="height: 30px; width: 300px;"/></td>
					<td>
						<select name="option" style="height: 30px; width: 200px;">
							<option value="ID" selected>ID</option>
							<option value="Fname">First Name</option>
							<option value="Lname">Last Name</option>
							<option value="Phone">Phone</option>
						</select>
					</td>
				</tr>
			
				<tr align="center">
					<td colspan = "2">
						<input type="Submit" value="Delete" name="Delete" style="height: 30px; width: 130px;"/>
						<input type="Reset" value="Reset" style="height: 30px; width: 130px;"/>
					</td>
				</tr>
		
			</table>
	
		</form>

		</center>';
	}
	else
	{
		if(isset($_POST['hidden']))
		{

			$search = $_POST['search'];
	
			if($search === "") die(header("Location:delete.php"));
	
			$option = $_POST['option'];
	
			if(!@mysql_num_rows($sql = mysql_query("SELECT * FROM phone WHERE $option = '$search'", $phonebook)))
				die("<center><h2>SORRY, Searched Record Not Found !!!</h2><br/><input type='button' onclick=\"window.location.href='delete.php'\" value='Try Again'></center>");

			$row = mysql_fetch_array($sql);
			
			$row = $row['ID'];
			
			mysql_query("DELETE FROM phone WHERE ID = '$row'");
			
			echo "<center><h2>Record Deleted Successfully !!!</h2></center>";
		}
	}
?>

</body>
</html>
