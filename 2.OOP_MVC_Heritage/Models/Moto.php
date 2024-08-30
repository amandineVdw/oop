<?php
// Models/Moto.php
namespace MonProjet\Models;

require_once 'Vehicule.php';

class Moto extends Vehicule {
    public bool $aCarter;

    public function __construct(string $marque, string $modele, bool $aCarter) {
        parent::__construct($marque, $modele);
        $this->aCarter = $aCarter;
    }

    public function getInfo(): string {
        return parent::getInfo() . ", Avec carter: " . ($this->aCarter ? "Oui" : "Non");
    }
}