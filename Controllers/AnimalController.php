<?php
namespace MonProjet\Controllers;

use MonProjet\Models\Chien;

class AnimalController {
    // Méthode pour afficher les informations sur un chien
    public function afficherChien() {
        // Création d'un objet Chien
        $chien = new Chien("Rex");
        // Appel de la méthode aboyer pour obtenir l'information
        return $chien->aboyer();
    }
}