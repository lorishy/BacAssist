<?php
session_start();

class Modele {
    
    protected function getBdd(){
        // return new PDO('mysql:host=ipssisqbtsassist.mysql.db;dbname=ipssisqbtsassist;charset=UTF8', 'ipssisqbtsassist', 'Ipssi2022btsassist', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // ONLINE
        
        return new PDO('mysql:host=localhost;dbname=btsassist;charset=UTF8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // LOCAL
    }
    public function str_random($lenght) {

        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $lenght)),0 ,$lenght);

    }
}
function dateFr($date) {
    if($date == null) {
        return null;
    }
    $newDate = new DateTime($date);
    return $newDate->format('d/m/Y');
}