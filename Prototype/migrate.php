<?php

//Migrations:

//db connection

require_once('classes/dblogin.php');

class Migrate extends dblogin {
    
    private function arrayBinder(&$query, array &$args){
        foreach($args as $key => $value){
            $query->bindValue(':'.$key, htmlspecialchars($value));
        }
    }
    
    private function query($sql, array $vars = null){
        
        $query = $this->db->prepare($sql);
        
        if(!is_null($vars)) {
            $this->arrayBinder($query, $vars);
        }
        
        $query->execute();
        
        return $query->rowCount();
    }
    
   
    public function run(){
        
        $this->query('DROP DATABASE IF EXISTS '.$this->db_database);
        $drop = $this->query('CREATE DATABASE IF NOT EXISTS `'.$this->db_database.'` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; USE `'.$this->db_database.'`;');
            
		if($drop){
			 $this->query(file_get_contents('resources/database.sql'));
		}
        
        
    }
    
}


$m = new Migrate();

$m->run();

