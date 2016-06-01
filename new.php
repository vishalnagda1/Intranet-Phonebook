<!DOCTYPE html>
<html>
<head>

	<title>New Contacts</title>

	<style type="text/css">
	
		button{ font-family: Verdana, Tahoma; color: #444; border: 0; background-color: white;}
		h2{ font-family: Bookman Old Style, Cambria; color: red;};
	
	</style>

</head>

<body>

<center>

	<h1 style="font-family: Verdana ,Tahoma; color: green;">New Contacts</h1><br/>

	<img src="image/add.png" height="100" width="100"/>

</center>

<?php for($i=0; $i<5; $i++)echo '<br/>'; ?>

<table align="center" cellspacing="5" cellpadding="6" width="80%" border="0" >

	<tr>
	
		<td align="center"><button onclick="window.location.href='contact.php'"/><img src="image/contact.png" height="100" width="100"/><br/>Contacts</td>
		<td align="center"><button onclick="window.location.href='index.php'"/><img src="image/phone.png" height="100" width="100"/><br/>Home</td>
		<td align="center"><button onclick="window.location.href='update.php'"/><img src="image/edit.png" height="100" width="100"/><br/>Update</td>
		<td align="center"><button onclick="window.location.href='delete.php'"/><img src="image/delete.png" height="100" width="100"/><br/>Delete</td>
		<td align="center"><button onclick="window.location.href='search.php'"/><img src="image/search.png" height="100" width="100"/><br/>Search</td>
	
	</tr>

</table>

<?php

	for($i=0; $i<3; $i++)echo '<br/>';

	$phonebook = @mysql_connect("localhost", "root", "password") or die("<center><h2>SORRY, We Are Unable To Add Contacts Because<br/>Its Failed To Connect To The Database On Server !!!</h2></center>");
	
	@mysql_select_db("phonebook", $phonebook) or die("<center><h2>SORRY, We Are Unable To Add Contacts Because<br/>No Database Found On Server !!!</h2></center>");
	
?>

<center>

	<form action="add.php" method="POST">

		<input type="hidden" name="hidden" value="TRUE" />
	
		<table border="0" style="height: 435px; width: 100px" cellpadding="3" cellspacing="3">

			<tbody align="center">

				<tr>
					<td align="right"><input type="text" placeholder="First Name" name="Fname" style="height: 30px; width: 193px; "/></td>
					<td align="left"><input type="text" placeholder="Last Name" name="Lname" style="height: 30px; width: 193px; "/></td>
				</tr>

				<tr>
					<td colspan="2"><input type="tel" placeholder="Phone 1, Phone 2, ..." name="cnum" style="height: 30px; width: 400px;" /></td>
				</tr>

				<tr>
					<td colspan="2"><input type="email" placeholder="e-Mail (Optional)" name="mail" style="height: 30px; width: 400px;" /></td>
				</tr>

				<tr>
					<td colspan="2"><input type="text" placeholder="Address (Optional)" name="add" style="height: 30px; width: 400px;" /></td>
				</tr>

				<tr>
					<td colspan="2"><input type="date" placeholder="Date Of Birth (Optional)" name="dob" style="height: 30px; width: 400px;" /></td>
				</tr>

				<tr>
					<td colspan="2">
					
						<select name="gender" style="height: 30px; width: 400px;">
							<option value="Male" selected >Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
					
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" value="Submit" style="height: 30px; width: 130px;" />
						<input type="reset" style="height: 30px; width: 130px;" />
					</td>
				</tr>
				
			</tbody>
		
		</table>

	</form>

</center>

</body>
</html>
