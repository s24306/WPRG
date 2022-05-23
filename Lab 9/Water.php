<?php

class Water extends Pokemon{
    public $strengths;
    public $weaknesses;
    public $cardColor;

    public function __construct($name, $type, $hp_max, $strength, $photo){
        parent::__construct($name, $type, $hp_max, $strength, $photo);
        $this->strengths = array('Ground', 'Rock', 'Fire');
        $this->weaknesses = array('Water', 'Grass', 'Dragon');
        $this->cardColor = '#4592c4';

    }
    public function specialEffect(Pokemon $targetPokemon){
        return false;
    }
}