<?php
// Contains login information to the database, as well as a construct
// function to setup a connection.
class dblogin {
	public $db_host = 'localhost';
	public $db_database = 'tindeutvikling';
	public $db_user = 'root';
	public $db_pass = '';

	public function __construct() {
		try {
			$this->db = new PDO("mysql:host=$this->db_host; dbname=$this->db_database; charset=utf8", $this->db_user, $this->db_pass);
		} catch(PDOException  $e) {
			die ("Error: ".$e->getMessage());
		}
	}
}
?>