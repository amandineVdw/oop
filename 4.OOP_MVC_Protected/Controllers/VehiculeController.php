<?php
// Controllers/VehiculeController.php
namespace MonProjet\Controllers;

use MonProjet\Models\Voiture;
use MonProjet\Models\Moto;

class VehiculeController {
    public function afficherVoiture(): string {
        $voiture = new Voiture("Toyota", "Corolla", 4);
        return $voiture->getInfo();
    }

    public function afficherMoto(): string {
        $moto = new Moto("Kawasaki", "Ninja", true);
        return $moto->getInfo();
    }
}