<?php

/*
Class for connection to DB 
*/

class db_connection
{
	private $server;
	private $dbname;
	private $dbusr;
	private $dbpw;

	public function __construct() {
		$this->server = "localhost";
		$this->dbname = "myowndb";
		$this->dbusr = "root";
		$this->dbpw = "mysql79";
	}

	/*public function __construct($srv, $db, $usr, $pw)
	{
		$this->server = $srv;
		$this->dbname = $db;
		$this->dbusr = $usr;
		$this->dbpw = $pw;
	}*/

	public function get_server() {
		return $this->$server;
	}
	public function set_server($srv) {
		$this->server = $srv;
	}
	public function get_dbname() {
		return $this->dbname;
	}
	public function set_dbname($db) {
		$this->dbname = $db;
	}
	public function get_dbusr() {
		return $this->dbusr;
	}
	public function set_dbusr($usr) {
		$this->dbusr = $usr;
	}
	public function get_dbpw() {
		return $this->dbpw;
	}
	public function set_dbpw($pw) {
		$this->dbpw = $pw;
	}

	public function __destruct()
	{
		unset($this->server);
		unset($this->dbname);
		unset($this->dbusr);
		unset($this->dbpw);
	}
}

?>