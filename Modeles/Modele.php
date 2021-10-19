<?php
session_start();

class Modele {
    
    protected function getBdd(){
        return new PDO('mysql:host=localhost;dbname=btsassist;charset=UTF8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}