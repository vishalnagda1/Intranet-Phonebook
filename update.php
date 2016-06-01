<!DOCTYPE html>
<html>
<head>

	<title>Update Contacts</title>
	
	<style type="text/css">
	
		button{ font-family: Verdana, Tahoma; color: #444; border: 0; background-color: white;}
		h2{ font-family: Bookman Old Style, Cambria; color: red;};
	
	</style>

</head>

<body>

<center>

	<h1 style="font-family: Verdana ,Tahoma; color: green;">Update Contacts</h1><br/>

	<img src="image/edit.png" height="100" width="100"/>

</center>

<?php for($i=0; $i<5; $i++)echo '<br/>'; ?>

<table align="center" cellspacing="5" cellpadding="6" width="80%" border="0" >

	<tr>
	
		<td align="center"><button onclick="window.location.href='contact.php'"/><img src="image/contact.png" height="100" width="100"/><br/>Contacts</td>
		<td align="center"><button onclick="window.location.href='new.php'"/><img src="image/add.png" height="100" width="100"/><br/>New</td>
		<td align="center"><button onclick="window.location.href='index.php'"/><img src="image/phone.png" height="100" width="100"/><br/>Home</td>
		<td align="center"><button onclick="window.location.href='delete.php'"/><img src="image/delete.png" height="100" width="100"/><br/>Delete</td>
		<td align="center"><button onclick="window.location.href='search.php'"/><img src="image/search.png" height="100" width="100"/><br/>Search</td>
	
	</tr>

</table>

<?php
	
	for($i=0; $i<3; $i++)echo '<br/>';
	
	$phonebook = @mysql_connect("localhost", "root", "password") or die("<center><h2>SORRY, We Are Unable To Update Contacts Because<br/>Its Failed To Connect To The Database On Server !!!</h2></center>");
	
	@mysql_select_db("phonebook", $phonebook) or die("<center><h2>SORRY, We Are Unable To Update Contacts Because<br/>No Database Found On Server !!!</h2></center>");
	
	if(!@mysql_num_rows($sql = mysql_query("SELECT * FROM phone", $phonebook)))
		die("<center><h2>SORRY, No Record Available !!!</h2></center>");
	

	if(!@$_POST['Search'])
	{
		echo '<center>

		<form action="update.php" method="POST">
	
			<input type="hidden" name="hidden" value="TRUE" />
	
			<table border="0" style="width: 540px; height: 120px" cellpadding="3" cellspacing="3">
		
				<tr>
					<td><input type="text" placeholder="Search" name="search" style="height: 30px; width: 300px;"/></td>
					<td>
						<select name="option" style="height: 30px; width: 200px;">
							<option value="ID">ID</option>
							<option value="Fname" selected>First Name</option>
							<option value="Lname">Last Name</option>
							<option value="Phone">Phone</option>
						</select>
					</td>
				</tr>
			
				<tr align="center">
					<td colspan = "2">
						<input type="Submit" value="Search" name="Search" style="height: 30px; width: 130px;"/>
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
	
			if($search === "") die(header("Location:update.php"));
	
			$option = $_POST['option'];
	
			if(!@mysql_num_rows($sql = mysql_query("SELECT * FROM phone WHERE $option = '$search'", $phonebook)))
				die("<center><h2>SORRY, Searched Record Not Found !!!</h2><br/><input type='button' onclick=\"window.location.href='update.php'\" value='Try Again'></center>");

			$row = mysql_fetch_array($sql);
			function Gender($option, $gender)
			{
				if($option === $gender) return "selected";
			}
			
			echo '<center>
			
				<form action="add.php" method="POST">
				
				<input type="hidden" name="hidden" value="TRUE" />
				<input type="hidden" name="ID" value="' . $row["ID"] . '" />
			
					<table border="0" style="height: 435px; width: 100px" cellpadding="3" cellspacing="3">

						<tbody align="center">

							<tr>
								<td align="right"><input type="text" placeholder="First Name" value="' . $row["Fname"] . '" name="Fname" style="height: 30px; width: 193px; "/></td>
								<td align="left"><input type="text" placeholder="Last Name" value="' . $row["Lname"] . '" name="Lname" style="height: 30px; width: 193px; "/></td>
							</tr>

							<tr>
							<td colspan="2"><input type="tel" placeholder="Phone 1, Phone 2, ..." value="' . $row["Phone"] . '" name="cnum" style="height: 30px; width: 400px;" /></td>
							</tr>

							<tr>
								<td colspan="2"><input type="email" placeholder="e-Mail (Optional)" value="' . $row["eMail"] . '" name="mail" style="height: 30px; width: 400px;" /></td>
							</tr>

							<tr>
								<td colspan="2"><input type="text" placeholder="Address (Optional)" value="' . $row["Address"] . '" name="add" style="height: 30px; width: 400px;" /></td>
							</tr>

							<tr>
								<td colspan="2"><input type="date" placeholder="Date Of Birth (Optional)" value="' . $row["DateOfBirth"] . '" name="dob" style="height: 30px; width: 400px;" /></td>
							</tr>

							<tr>
								<td colspan="2">
			
									<select name="gender" style="height: 30px; width: 400px;">
										<option value="Male"' . Gender("Male", $row["Gender"]) . '>Male</option>
										<option value="Female"' . Gender("Female", $row["Gender"]) . '>Female</option>
										<option value="Other"' . Gender("Other", $row["Gender"]) . '>Other</option>
									</select>
			
								</td>
							</tr>
			
							<tr>
								<td colspan="2">
									<input type="submit" value="Update" name="Update" style="height: 30px; width: 130px;" />
								</td>
							</tr>
			
						</tbody>

					</table>
		
				</form>
		
			</center>';
		}
	}

?>

</body>
</html>
