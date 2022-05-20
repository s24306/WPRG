<?php

abstract class Pokemon {
    public string $name;
    public string $type;
    public int $hp_max;
    public int $hp_current;
    public int $strength;
    public string $pathToPhoto;
    public bool $is_confused = false;
    public bool $is_paralyzed = false;


    public function __construct($name, $type, $hp_max, $strength, $photo) {
        $this->name = $name;
        $this->type = $type;
        $this->hp_max = $hp_max;
        $this->hp_current = $hp_max;
        $this->strength = $strength;
        $this->pathToPhoto = $photo;
    }

    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }

    function set_type($type) {
        $this->color = $type;
    }
    function get_type() {
        return $this->type;
    }

    function set_maxhp($hp) {
        $this->hp_max = $hp;
    }
    function get_maxhp() {
        return $this->max_hp;
    }

    function set_actualhp($hp) {
        $this->hp_current = $hp;
    }
    function get_actualhp() {
        return $this->hp_current;
    }

    function set_sila($sila) {
        $this->strength = $sila;
    }
    function get_sila() {
        return $this->strength;
    }

    function set_paralyze($is_paralyzed) {
        $this->is_paralyzed = $is_paralyzed;
    }
    function get_paralyze() {
        return $this->is_paralyzed;
    }

    function set_confuse($is_confused) {
        $this->$is_confused = $is_confused;
    }
    function get_confuse() {
        return $this->is_confused;
    }

    function attack(Pokemon $targetPokemon){
        $strengthMultiplier = hasStrength($this, $targetPokemon);
        $this->specialEffect($targetPokemon);
        echo "<h1>$strengthMultiplier</h1>";
        $targetHp= $targetPokemon->get_actualhp();
        $targetHp-=$this->strength*$strengthMultiplier;
        $targetPokemon->set_actualhp($targetHp);
    }

    function printCard(){
        echo "<div class=\"card\"style='background-color: $this->cardColor;'>";
        echo "<img class='cardImage' src='$this->pathToPhoto'>";
        echo "<div class=\"content\">
          <h4>Name: $this->name</h4>
          Type: $this->type <br/>
          Strength: $this->strength <br/>
          Current HP: $this->hp_current <br/>
          </div>";
        echo "</div>";
    }
}

function hasStrength($source, $target){
    foreach($source->strengths as $strength){
        if (in_array($strength, $target->weaknesses)) {
            return 0.5;
        }
    }
    foreach($source->weaknesses as $weakness){
        if (in_array($weakness, $target->weaknesses)) {
            return 2.0;
        }
    }
    return 1;
}