<?php
// Chien.php
namespace MonProjet\Animaux;

class Chien {
    public string $nom;

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    public function aboyer(): string {
        return "{$this->nom} aboie: Woof!";
    }
}
