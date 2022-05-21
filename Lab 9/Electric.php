<?php

class Electric extends Pokemon{
    public $strengths;
    public $weaknesses;
    public $cardColor;

    public function __construct($name, $type, $hp_max, $strength, $photo){
        parent::__construct($name, $type, $hp_max, $strength, $photo);
        $this->strengths = array('Flying', 'Water');
        $this->weaknesses = array('Ground', 'Grass', 'Electric', 'Dragon');
        $this->cardColor = '#4592c4';
    }
    public function specialEffect(Pokemon $targetPokemon){
        if (rollTheDice()) {
            echo $this->getName()." użył paraliżu na ".$targetPokemon->getName()."<br/>";
            $targetPokemon->setParalyzed(True);
        }else {
            return false;
        }
    }
}