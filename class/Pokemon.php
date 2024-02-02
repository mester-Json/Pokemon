<?php


include_once __DIR__ . '/../asset/bdd/bdd.php';
include_once __DIR__ . '/../asset/bdd/aff.php';
class Pokemon
{
    public $name;
    public $healthPoints;
    public $atk;

    public function __construct($name, $healthPoints, $atk)
    {
        $this->name = $name;
        $this->healthPoints = $healthPoints;
        $this->atk = $atk;

    }


    public function getName()
    {
        return $this->name;
    }

    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    public function getAtk()
    {
        return $this->atk;
    }

    public function isDead()
    {
        return $this->healthPoints <= 0;
    }

    public function attaquer($pokemon)
    {
        $pokemon->healthPoints -= $this->atk;
    }

    public function __toString()
    {
        return "Pokemon : " . $this->name . " | HP : " . $this->healthPoints . " | ATK : " . $this->atk;
    }

}

