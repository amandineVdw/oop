<?php
namespace MonProjet\Controllers;

use MonProjet\Models\Voiture;

class VehiculeController {
    public function afficherVoiture() {
        // Crée un objet Voiture (données du modèle)
        $voiture = new Voiture("rouge", "Toyota");
        
        // Obtenir les informations sur la voiture
        $infoVoiture = $voiture->getInfo();

        return $infoVoiture;
    }
}