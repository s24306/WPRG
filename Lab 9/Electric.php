<?php

class Electric extends Pokemon{
    public array $strengths;
    public array $weaknesses;
    public string $cardColor;

    public function __construct($name, $type, $hp_max, $strength, $photo){
        parent::__construct($name, $type, $hp_max, $strength, $photo);
        $this->strengths = array('Flying', 'Water');
        $this->weaknesses = array('Ground', 'Grass', 'Electric', 'Dragon');
        $this->cardColor = '#4592c4';
    }
    public function specialEffect(Pokemon $targetPokemon){
        if (rollTheDice()) {
            echo "$this->name użył paraliżu na $this->get_nazwa()<br/>";
            $targetPokemon->set_paralyze(True);
        }else return false;
    }
}