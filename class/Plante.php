<?php

include_once 'Pokemon.php';


class Plante extends Pokemon
{
    public function attaquer($pokemon)
    {
        if ($pokemon instanceof Eau) {
            $pokemon->healthPoints -= $this->atk * 2;
        } elseif ($pokemon instanceof Plante || $pokemon instanceof Feu) {
            $pokemon->healthPoints -= $this->atk * 0.5;
        } else {
            $pokemon->healthPoints -= $this->atk;
        }
    }
}