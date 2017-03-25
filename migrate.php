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
            'f_name' => 'Bjørn',
            'l_name' => 'Hermansen',
            'tlf'    => '47360030',
            'email'  => 'bjorn@tindeutvikling.no',
            'role'   => 'selger',
           ],
        ]);
        
        $this->insert('Fasiliteter', [
           [
            'navn' => 'Strøm',
            'type' => 'Teknisk',
           ],[
            'navn' => 'Vei',
            'type' => 'Teknisk',
           ],[
            'navn' => 'Avløp',
            'type' => 'Teknisk',
           ],[
            'navn' => 'Langrenn',
            'type' => 'Aktiviteter',
           ],
        ]);
        
        $this->insert('Område', [
           [
            'name' => 'Hedemark',
           ],[
            'name' => 'Gudbrandsdalen',
           ],[
            'name' => 'Valdres',
           ],
        ]);
        
        $this->insert('Område_selger', [
           [
            'ansatt_id' => 1,
            'feltnr' => 1,
           ],
        ]);
        
        $this->insert('Tomtefasiliteter', [
           [
            'feltnr' => 1,
            'fasilitet_navn' => 'Strøm',
           ],[
            'feltnr' => 1,
            'fasilitet_navn' => 'Vei',
           ],
        ]);
        
        $this->insert('Tomteområde', [
           [
            'navn' => 'Skreikampen',
            'lat' => 60.567125,
            'lng' => 11.149905,
            'lng' => 11.149905,
            'ingress' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.',
            'oneliner' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'tekst' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.',
            'reg_plan' => 'docs/regplan/omr/regplan1.pdf',
            'reg_plan' => 'docs/regmap/omr/regmap1.pdf',
            'area_name' => 'Valdres',
           ],
        ]);
        
        $this->insert('Tomter', [
           [
            'feltnr' => 1,
            'tomtenr' => 1,
            'gnr_bnr' => 'Gårdsnr 101, Bruksnummer 3',
            'areal' => 300,
            'pris' => 800000,
            'tekst' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi.',
            'status_solgt' => 1,
            'reg_plan' => 'docs/regplan/omr/tomt/regplan1.pdf' ,
            'reg_kart' => 'docs/regplan/omr/tomt/regkart1.pdf' ,
           ],
        ]);
        
    }
    
}

$m = new Migrate();

$m->run();

