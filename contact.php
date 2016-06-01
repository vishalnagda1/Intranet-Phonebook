<!DOCTYPE html>
<html>
<head>

	<title>Contacts</title>
	
	<style type="text/css">
	
		button{ font-family: Verdana, Tahoma; color: #444; border: 0; background-color: white;}
		h2{ font-family: Bookman Old Style, Cambria; color: red;};
	
	</style>

</head>

<body>

<center>

	<h1 style="font-family: Verdana ,Tahoma; color: green;">Contacts</h1><br/>

	<img src="image/contact.png" height="100" width="100"/>

</center>

<?php for($i=0; $i<5; $i++)echo '<br/>'; ?>

<table align="center" cellspacing="5" cellpadding="6" width="80%" border="0" >

	<tr>
	
		<td align="center"><button onclick="window.location.href='index.php'"/><img src="image/phone.png" height="100" width="100"/><br/>Home</td>
		<td align="center"><button onclick="window.location.href='new.php'"/><img src="image/add.png" height="100" width="100"/><br/>New</td>
		<td align="center"><button onclick="window.location.href='update.php'"/><img src="image/edit.png" height="100" width="100"/><br/>Update</td>
		<td align="center"><button onclick="window.location.href='delete.php'"/><img src="image/delete.png" height="100" width="100"/><br/>Delete</td>
		<td align="center"><button onclick="window.location.href='search.php'"/><img src="image/search.png" height="100" width="100"/><br/>Search</td>
	
	</tr>

</table>

<?php
	
	for($i=0; $i<3; $i++)echo '<br/>';
	
	$phonebook = @mysql_connect("localhost", "root", "password") or die("<center><h2>SORRY, We Are Unable To Show Contacts Because<br/>Its Failed To Connect To The Database On Server !!!</h2></center>");
	
	@mysql_select_db("phonebook", $phonebook) or die("<center><h2>SORRY, We Are Unable To Show Contacts Because<br/>No Database Found On Server !!!</h2></center>");
	
	if(!@mysql_num_rows($sql = mysql_query("SELECT * FROM phone ORDER BY ID", $phonebook)))
		die("<center><h2>SORRY, No Record Available !!!</h2></center>");
?>

<center>
<table align="center" cellspacing="5" cellpadding="6" width="90%" border="1" bordercolor="white"/>

	<thead>
	
		<tr><th>ID</th><th width="20%">Name</th><th width="15%">Phone</th><th width="25%">eMail</th><th width="40%">Address</th><th>Date Of Birth</th><th>Gender</th></tr>
	
	</thead>
	<tbody bordercolor="red">
	
		<tr>
			<?php

				while($row = mysql_fetch_array($sql))
				{	?>
					<td><?php echo $row['ID'] . '.'; ?></td>
					<td><?php echo $row['Fname'] . ' ' . $row['Lname']; ?></td>
					<td><?php $Phone = explode(',', $row['Phone']); for($i=0;@$Phone[$i];$i++)echo $Phone[$i] . '<br/>';?></td>
					<td><?php echo $row['eMail']; ?></td>
					<td><?php echo $row['Address']; ?></td>
					<td><?php echo $row['DateOfBirth']; ?></td>
					<td><?php echo $row['Gender']; ?></td>
					</tr>
					<?php
				}
			?>
				
	</tbody>

</table>
</center>

</body>
</html>
