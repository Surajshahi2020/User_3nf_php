<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD operation</title>
</head>
<body>
	<h1>User Form</h1>
	<form action="process.php" method="post">
	<label for="name">Name:</label><br>
	<input type="text" id="name" name="name" required><br><br>
	
	<label for="date">Date:</label><br>
	<input type="date" id="date" name="date" required><br><br>
	
	<label for="email">Email:</label><br>
	<input type="email" id="email" name="email" required><br><br>
	
	<label for="zip">Zipcode:</label><br>
	<input type="text" id="zip" name="zip" pattern="[0-9]{3}" required><br><br>

	<input type="submit" value="Submit">
	</form>
</body>
</html>
