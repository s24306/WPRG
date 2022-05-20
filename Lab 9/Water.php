<?php

class Water extends Pokemon{
    public array $strengths;
    public array $weaknesses;
    public string $cardColor;

    public function __construct($name, $type, $hp_max, $strength, $photo){
        parent::__construct($name, $type, $hp_max, $strength, $photo);
        $this->strengths = array('Ground', 'Rock', 'Fire');
        $this->weaknesses = array('Water', 'Grass', 'Dragon');
        $this->cardColor = '#eed535';
    }
    public function specialEffect(Pokemon $targetPokemon){
        return false;
    }
}