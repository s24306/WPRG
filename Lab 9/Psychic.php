<?php

class Psychic extends Pokemon{
    public $strengths;
    public $weaknesses;
    public $cardColor;

    public function __construct($name, $type, $hp_max, $strength, $photo){
        parent::__construct($name, $type, $hp_max, $strength, $photo);
        $this->strengths = array('Fighting', 'Poison');
        $this->weaknesses = array('Steel', 'Psychic', 'Dark');
        $this->cardColor = '#f366b9';
    }
    public function specialEffect(Pokemon $targetPokemon){
        if (rollTheDice()) {
            echo $this->getName()." ogłuszył ".$targetPokemon->getName()."<br/>";
            $targetPokemon->setConfused(True);
        } else {
            return false;
        }
    }
}