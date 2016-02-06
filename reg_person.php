<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>People Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<form action="person.php" method="POST" name="frm">
		First Name: <input type="text" name="firstname"></br>
		Last Name: <input type="text" name="lastname"></br>
		Identification: <input type="text" name="id"></br>
		Age: <input type="text" name="age"></br>
		Phone: <input type="text" name="phone"></br>
		Email: <input type="text" name="email"></br>
		<input class="btn btn-success" type="submit" name="button" value="Submit">
	</form>
</body>
</html>