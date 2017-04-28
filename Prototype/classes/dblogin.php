<?php
// Contains login information to the database, as well as a construct
// function to setup a connection.
class dblogin {
	public $db_host = 'localhost';
	public $db_database = 'blablabla';
	public $db_user = 'root';
	public $db_pass = 'root';
    public $db;
    
	public function __construct() {
		try {
			$this->db = new PDO("mysql:host=$this->db_host; dbname=$this->db_database; charset=utf8", $this->db_user, $this->db_pass);
            
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		} catch(PDOException  $e) {
            
             try {
                $this->db = new PDO("mysql:host=$this->db_host; dbname=; charset=utf8", $this->db_user, $this->db_pass);

                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch(PDOException  $e) {

                die ("Error: ".$e->getMessage());
            }
		}
	}
}

$dblogin = new dblogin();