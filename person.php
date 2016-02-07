<?php
/*
Program to learning PHP and practice POO
Definition of parent class person
*/
include("db_conection.php")

class person
{
	//Atributes
	private $fname;
	private $lname;
	private $id;
	private $age;
	private $phone;
	private $email;

	//Methods
	public function __construct() {
		//Inicialize the attributes in blank
		$this->fname = "";
		$this->lname = "";
		$this->id = "";
		$this->age = "";
		$this->phone = "";
		$this->email = "";
	}
	public function add_person($fname, $lname, $id, $age, $phone, $email) {
		//Set the person's attributes from the form
		$this->fname = $fname;
		$this->lname = $lname;
		$this->id = $id;
		$this->age = $age;
		$this->phone = $phone;
		$this->email = $email;
	}

	//Methods to get and set the attributes of the class
	public function get_fname() {
		return $this->$fname;
	}
	public function set_fname($fname) {
		$this->fname = $fname;
	}
	public function get_lname() {
		return $this->lname;
	}
	public function set_lname($lname) {
		$this->lname = $lname;
	}
	public function get_id() {
		return $this->id;
	}
	public function set_id($id) {
		$this->id = $id;
	}
	public function get_age() {
		return $this->age;
	}
	public function set_age($age) {
		$this->age = $age;
	}
	public function get_phone() {
		return $this->phone;
	}
	public function set_phone($phone) {
		$this->phone = $phone;
	}
	public function get_email() {
		return $this->email;
	}
	public function set_email($email) {
		$this->email = $email;
	}

	public function show_person() {
		//Show the person's information
		echo "The information of this person is:</br>";
		echo "First Name: ".$this->fname."</br>";
		echo "Last Name: ".$this->lname."</br>";
		echo "Identification: ".$this->id."</br>";
		echo "Age: ".$this->age."</br>";
		echo "Phone: ".$this->phone."</br>";
		echo "Email: ".$this->email."</br></br>";
	}

	public function store_file() {
		//Store the person's information to a file
		
		//echo $string;
		$file = fopen("personinfo.txt", "a";
		or die("ERROR: Fail creating or opening the file");
		if ($file) {
			$string = $this->fname.";";
			$string .= $this->lname.";";
			$string .= $this->id.";";
			$string .= $this->age.";";
			$string .= $this->phone.";";
			$string .= $this->email.";";
			$string .= "\n";
			fwrite($file, $string);
			fclose($file);
		}
	}

	public function store_db() {
		//Store the person's information to a database
		$file = fopen("personinfo.txt", "r");
		or die("ERROR: Fail reading the file");
		if ($file) {
			# code...
			try {
    			$conn = new PDO("mysql:host=$srv;dbname=$db", $usr, $pw);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			//echo "Connected successfully";
    		}
			catch(PDOException $e) {
    			echo "Connection failed: ".$e->getMessage();
    		}
			while (!feof($file)) {
				# code...
				$line = fgets($file);
				
			}
		}
	}

	public function __destruct() {
		//Free the memory used for the attributes
		unset($fname);
		unset($lname);
		unset($id);
		unset($age);
		unset($phone);
		unset($email);
		//echo "</br>The memory was freed";
	}
}

if(isset($_POST['firstname']) && !empty($_POST['firstname']) && 
   isset($_POST['lastname']) && !empty($_POST['lastname']) &&
   isset($_POST['id']) && !empty($_POST['id']) &&
   isset($_POST['age']) && !empty($_POST['age']) &&
   isset($_POST['phone']) && !empty($_POST['phone']) &&
   isset($_POST['email']) && !empty($_POST['email'])
	)

$person1 = new person();
$person1->add_person($_POST['firstname'], $_POST['lastname'], $_POST['id'], $_POST['age'], $_POST['phone'], $_POST['email']);
$person1->show_person();
$person1->store_file();

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>Another Person</title>
</head>
<body>
	<form action="reg_person.php" method="GET" name="frm_another">
		<input type="submit" name="button" value="Add Another Person">
	</form>
</body>
</html>
