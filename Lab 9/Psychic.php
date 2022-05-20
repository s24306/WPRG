<?php

class Psychic extends Pokemon{
    public array $strengths;
    public array $weaknesses;
    public string $cardColor;

    public function __construct($name, $type, $hp_max, $strength, $photo){
        parent::__construct($name, $type, $hp_max, $strength, $photo);
        $this->strengths = array('Fighting', 'Poison');
        $this->weaknesses = array('Steel', 'Psychic', 'Dark');
        $this->cardColor = '#f366b9';
    }
    public function specialEffect(Pokemon $targetPokemon){
        if (rollTheDice()) {
            $targetPokemon->set_confuse(True);
        }else return false;
    }
}