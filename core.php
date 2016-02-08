<?php

include 'person.php';

if( isset($_POST['firstname']) && !empty($_POST['firstname']) && 
	isset($_POST['lastname']) && !empty($_POST['lastname']) &&
	isset($_POST['id']) && !empty($_POST['id']) &&
	isset($_POST['age']) && !empty($_POST['age']) && 
	isset($_POST['gender']) && !empty($_POST['gender']) && 
	isset($_POST['phone']) && !empty($_POST['phone']) &&
	isset($_POST['email']) && !empty($_POST['email']) ) {
	# code...
	$person1 = new person();
	$person1->set_person($_POST['firstname'], $_POST['lastname'], $_POST['id'], $_POST['age'], $_POST['gender'], $_POST['phone'], $_POST['email']);
	$person1->show_person();
	$person1->add_person_to_file();
	//$person1->import_person_file_to_db();
}


/*<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>Add Another Person</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<form action="reg_person.php" method="GET" name="frm_another">
		<input type="submit" name="button" class="btn btn-success" value="Add Another Person">
	</form>
</body>
</html>
*/

?>
