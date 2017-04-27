<?php
// Fetching other php-files to be used
require_once('dblogin.php');

class geopts {

    public function tomter($feltnr){
        global $dblogin;
        $sql = "SELECT DISTINCT(tomtenr) FROM Tomter_Geopts WHERE feltnr = $feltnr";
        $query = $dblogin->db->prepare( $sql );
        $result = $query->execute( array( $feltnr ) );
        
        if ($query->rowCount() > 0) {
            return array_map(function($obj) {
                return $obj['tomtenr'];
            }, $query->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return false;
        }
    }

    // Fetching articles from database to use in populate
    public function fetchgeopts($feltnr, $tomtenr){
        global $dblogin;
        // fetch all the tomter
        $query = "
        SELECT geo.lat, geo.lng, tomt.status_solgt as solgt, tomt.tomtenr AS tomtenr
        FROM Tomter_Geopts AS geo 
        JOIN Tomter AS tomt ON geo.feltnr = tomt.feltnr AND geo.tomtenr = tomt.tomtenr

        WHERE geo.feltnr = $feltnr AND geo.tomtenr = $tomtenr";
        $result = $dblogin->db->query($query)->fetchAll();
        if (!$result)
            die('Query failed:' . $database->conn->errorInfo()[2]);
            return $result;
    }
    
    // Fetching articles from database to use in populate
    public function fetchtomt($feltnr, $tomtenr){
        global $dblogin;
        // fetch all the tomter
        $query = "SELECT * FROM Tomter WHERE feltnr = $feltnr AND tomtenr = $tomtenr";
        $result = $dblogin->db->query($query)->fetchAll();
        if (!$result)
            die('Query failed:' . $database->conn->errorInfo()[2]);
            return $result;
    }
    
    // Fetching articles from database to use in populate
    public function fetcharea($feltnr){
        global $dblogin;
        // fetch all the tomter
        $query = "SELECT * FROM Tomteområde WHERE felt_nr = $feltnr";
        $result = $dblogin->db->query($query)->fetchAll();
        if (!$result)
            die('Query failed:' . $database->conn->errorInfo()[2]);
            return $result;
    }

}
$geopts = new geopts();