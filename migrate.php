<?php

//Migrations:


//db connection

class Migrate{
    
    public $db;
    
    function __construct(){
        
        $dbname = "TindeUtvikling";
        $host = "localhost";
        
        $dns = "mysql:host=$host;dbname=$dbname";
        $username = 'root';
        $password = 'root';
        $this->db = new PDO($dns, $username, $password);
    }
    
    
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
        
        return $query->execute() ? $query : false;
    }
    
    
    
    /**
     * Insert rows to a table
     * @param  string  $table tablename
     * @param  array   array  $data [['rowname' => 'value', 'row2' => 'VALUE']]
     * @return integer inserted id
     */
    private function insert($table, array $data){
        
        // Generate SQL from array
        $trows = [];
        $placeholder = [];
        $values = [];
        $insertData = [];
        foreach($data[0] as $key => $value){
            $trows[] = $key;
        }

        foreach($data as $nr => $rows){
            $p = [];
            foreach($rows as $key => $row){
                $p[] = ":".$key.$nr;
                $insertData[$key.$nr] = $row;
            }
            $placeholder[] = '('.implode(", ", $p).')';
        }
        /*
        array = [
            [
                'rowname' => 'value',
                'row2' => 'VALUE'
            ],
            [
                'rowname' => 'value',
                'row2' => 'VALUE'
            ],
        ]
        
        INSERT INTO $table (rowname, row2), (rowname, row2) VALUES () (:value_1, :VALUE_1) (:value_2, :VALUE_2)
        
        */
        $trows = implode(", ", $trows);
        $placeholder = implode(", ", $placeholder);

        $sql = "INSERT INTO {$table} ({$trows}) VALUES {$placeholder}";
        
        //Run query
        $q = $this->query($sql, $insertData);
        
          return $q;
        
    }
    
    
    public function run(){
        
        //make drop db function
        
        //make create table function
        
        $this->insert('Ansatte', [
           [
            'f_name' => 'agne',
            'l_name' => 'odegaard',
            'tlf'    => '94865063',
            'email'  => 'mail@mail.mail',
            'role'  => 'admin',
           ],[
            'f_name' => 'agne',
            'l_name' => 'odegaard',
            'tlf'    => '94865063',
            'email'  => 'mail@mail.mail',
            'role'  => 'admin',
           ],[
            'f_name' => 'agne',
            'l_name' => 'odegaard',
            'tlf'    => '94865063',
            'email'  => 'mail@mail.mail',
            'role'  => 'admin',
           ],[
            'f_name' => 'agne',
            'l_name' => 'odegaard',
            'tlf'    => '94865063',
            'email'  => 'mail@mail.mail',
            'role'  => 'admin',
           ],[
            'f_name' => 'agne',
            'l_name' => 'odegaard',
            'tlf'    => '94865063',
            'email'  => 'mail@mail.mail',
            'role'  => 'admin',
           ], 
        ]);
        
    }
    
}

$m = new Migrate();

$m->run();

