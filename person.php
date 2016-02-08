<?php
/*
Program to learning PHP and practice POO
Class for manage people
*/
include 'dbconnection.php';

class person
{
	//Attributes
	private $fname;
	private $lname;
	private $id;
	private $age;
	private $gender;
	private $phone;
	private $email;

	//Methods
	public function __construct() {
		//Inicialize the attributes in blank
		$this->fname = "";
		$this->lname = "";
		$this->id = "";
		$this->age = "";
		$this->gender = "";
		$this->phone = "";
		$this->email = "";
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
	public function get_gender() {
		return $this->gender;
	}
	public function set_gender($gender) {
		$this->gender = $gender;
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
		echo "ID: ".$this->id."</br>";
		echo "Age: ".$this->age."</br>";
		echo "Gender: ".$this->gender."</br>";
		echo "Phone: ".$this->phone."</br>";
		echo "Email: ".$this->email."</br></br>";
	}

	public function set_person($fname, $lname, $id, $age, $gender, $phone, $email) {
		//Set the person's attributes from the form
		# code...
		$this->fname = $fname;
		$this->lname = $lname;
		$this->id = $id;
		$this->age = $age;
		$this->gender = $gender;
		$this->phone = $phone;
		$this->email = $email;
	}

	public function add_person_to_file() {
		//Store the person's information to a file
		$file = fopen("personinfo.txt", "a")
		or die("ERROR: Fail creating or opening the file");
		if ($file) {
			$string = $this->fname.";";
			$string .= $this->lname.";";
			$string .= $this->id.";";
			$string .= $this->age.";";
			$string .= $this->gender.";";
			$string .= $this->phone.";";
			$string .= $this->email.";";
			$string .= "\n";
			fwrite($file, $string);
			fclose($file);
		}
	}

	public function import_person_file_to_db() {
		//Import to a DB the data of a file
		$dbinfo = new db_connection();
		$file = fopen("personinfo.txt", "r")
		or die("ERROR: Fail reading the file");
		try {
    		$conn = new PDO("mysql:host=localhost;dbname=myowndb", $dbinfo->get_dbusr(), $dbinfo->get_dbpw());
    		// set the PDO error mode to exception
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		//echo "Connected successfully<br><br>";
    		
    		while (!feof($file)) {
    			$line = fgets($file);
				$datarray = explode(";", $line);
				/*if( !isset($datarray[0]) && !isset($datarray[1]) && !isset($datarray[2]) && 
					!isset($datarray[3]) && !isset($datarray[4]) && !isset($datarray[5]) && !isset($datarray[6]) ) {
   					$datarray[0] = null;
   					$datarray[1] = null;
   					$datarray[2] = null;
   					$datarray[3] = null;
   					$datarray[4] = null;
   					$datarray[5] = null;
   					$datarray[6] = null;
   				}*/
   				$sql = "INSERT INTO person (firstname, lastname, id, age, gender, phone, email) VALUES ('$datarray[0]', '$datarray[1]', '$datarray[2]', '$datarray[3]', '$datarray[4]', '$datarray[5]', '$datarray[6]')";
				$conn->exec($sql);
			}
		} catch(PDOException $e) {
    		echo "Connection failed: ".$e->getMessage();
    	}
	}
	
	public function __destruct() {
		//Free the memory used for the attributes
		unset($fname);
		unset($lname);
		unset($id);
		unset($age);
		unset($gender);
		unset($phone);
		unset($email);
		//echo "</br>The memory was freed";
	}
}
