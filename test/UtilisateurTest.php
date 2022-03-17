<?php
require_once "Modeles/ModeleTest.php";
require_once "Modeles/Utilisateur.php";

use PHPUnit\Framework\TestCase;

class UtilisateurTest extends TestCase {

    public function testGetUsername() {
        $User = new Utilisateur(10);
        $User->setNom("test");
        $this->assertSame("loris", $User->getNom());
    }
}