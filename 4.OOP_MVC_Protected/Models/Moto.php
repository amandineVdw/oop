<?php
// Models/Moto.php
namespace MonProjet\Models;

class Moto extends Vehicule {
    protected bool $aCarter;

    public function __construct(string $marque, string $modele, bool $aCarter) {
        parent::__construct($marque, $modele);
        $this->aCarter = $aCarter;
    }

    public function getInfo(): string {
        return parent::getInfo() . ", Avec carter: " . ($this->aCarter ? "Oui" : "Non");
    }
}