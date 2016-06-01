<!DOCTYPE html>
<html>
<head>
	<title>Phonebook</title>
	
	<style type="text/css">
	
		button{ font-family: Verdana, Tahoma; color: #444; border: 0; background-color: white;}
	
	</style>
	
</head>
<body>

<center>

	<h1 style="font-family: Verdana ,Tahoma; color: green;">Phone Book</h1><br/>

	<img src="image/phone.png" height="100" width="100"/>

</center>

<?php for($i=0; $i<5; $i++)echo '<br/>'; ?>

<table align="center" cellspacing="5" cellpadding="6" width="80%" border="0" >

	<tr>
	
		<td align="center"><button onclick="window.location.href='contact.php'"/><img src="image/contact.png" height="100" width="100"/><br/>Contacts</td>
		<td align="center"><button onclick="window.location.href='new.php'"/><img src="image/add.png" height="100" width="100"/><br/>New</td>
		<td align="center"><button onclick="window.location.href='update.php'"/><img src="image/edit.png" height="100" width="100"/><br/>Update</td>
		<td align="center"><button onclick="window.location.href='delete.php'"/><img src="image/delete.png" height="100" width="100"/><br/>Delete</td>
		<td align="center"><button onclick="window.location.href='search.php'"/><img src="image/search.png" height="100" width="100"/><br/>Search</td>
	
	</tr>

</table>

</body>
</html>