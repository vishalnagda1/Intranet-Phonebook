<!DOCTYPE html>
<html>
<head>

	<title>Search Contacts</title>
	
<style type="text/css">
	
		button{ font-family: Verdana, Tahoma; color: #444; border: 0; background-color: white;}
		h2{ font-family: Bookman Old Style, Cambria; color: red;};
	
	</style>

</head>

<body>

<center>

	<h1 style="font-family: Verdana ,Tahoma; color: green;">Search Contacts</h1><br/>

	<img src="image/search.png" height="100" width="100"/>

</center>

<?php for($i=0; $i<5; $i++)echo '<br/>'; ?>

<table align="center" cellspacing="5" cellpadding="6" width="80%" border="0" >

	<tr>
	
		<td align="center"><button onclick="window.location.href='contact.php'"/><img src="image/contact.png" height="100" width="100"/><br/>Contacts</td>
		<td align="center"><button onclick="window.location.href='new.php'"/><img src="image/add.png" height="100" width="100"/><br/>New</td>
		<td align="center"><button onclick="window.location.href='update.php'"/><img src="image/edit.png" height="100" width="100"/><br/>Update</td>
		<td align="center"><button onclick="window.location.href='delete.php'"/><img src="image/delete.png" height="100" width="100"/><br/>Delete</td>
		<td align="center"><button onclick="window.location.href='index.php'"/><img src="image/phone.png" height="100" width="100"/><br/>Home</td>
	
	</tr>

</table>

<?php
	
	for($i=0; $i<3; $i++)echo '<br/>';
	
	$phonebook = @mysql_connect("localhost", "root", "password") or die("<center><h2>SORRY, We Are Unable To Search Contacts Because<br/>Its Failed To Connect To The Database On Server !!!</h2></center>");
	
	@mysql_select_db("phonebook", $phonebook) or die("<center><h2>SORRY, We Are Unable To Search Contacts Because<br/>No Database Found On Server !!!</h2></center>");
	
	if(!@mysql_num_rows($sql = mysql_query("SELECT * FROM phone", $phonebook)))
		die("<center><h2>SORRY, No Record Available !!!</h2></center>");
	
	if(!@$_POST['Search'])
	{
		echo '<center>

		<form action="search.php" method="POST">
	
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
	
			if($search === "") die(header("Location:search.php"));
	
			$option = $_POST['option'];
	
			if(!@mysql_num_rows($sql = mysql_query("SELECT * FROM phone WHERE $option = '$search'", $phonebook)))
				die("<center><h2>SORRY, Searched Record Not Found !!!</h2><br/><input type='button' onclick=\"window.location.href='search.php'\" value='Try Again'></center>");

			if($option == "Fname") $option = "First Name";
			elseif ($option == "Lname") $option = "Last Name";
			
			echo '<center><h2 style="color: green;">Search Reseult For \'' . $option . ' : ' . $search . '\'</h2><br/>
<table align="center" cellspacing="5" cellpadding="6" width="90%" border="1" bordercolor="white"/>

	<thead>
	
		<tr><th>ID</th><th width="20%">Name</th><th width="15%">Phone</th><th width="25%">eMail</th><th width="40%">Address</th><th>Date Of Birth</th><th>Gender</th></tr>
	
	</thead>
	<tbody bordercolor="red">
	
		<tr>';?>
			<?php

				while($row = mysql_fetch_array($sql))
				{	
					echo '<td>' . $row["ID"] . '.</td>
					<td>' . $row["Fname"] . ' ' . $row["Lname"] . '</td>
					<td>';?><?php $Phone = explode(',', $row['Phone']); for($i=0;@$Phone[$i];$i++)echo $Phone[$i] . '<br/>';?><?php echo'</td>
					<td>' . $row["eMail"] . '</td>
					<td>' . $row["Address"] . '</td>
					<td>' . $row["DateOfBirth"] . '</td>
					<td>' . $row["Gender"] . '</td>
					</tr>';?><?php
				}
				
	echo '</tbody>

</table>
</center>';
		}
	}
	
?>

</body>
</html>
