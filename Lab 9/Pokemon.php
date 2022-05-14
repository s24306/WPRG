<?php

class Pokemon{
    private $name, $type, $hp_max, $hp_current, $attack_strength = 20;

    public function __construct($name, $type, $hp_max)
    {
        $this->name = $name;
        $this->type = $type;
        $this->hp_max = $hp_max;
        $this->hp_current = $hp_max;
    }

    public function attack($enemy, $damage){
        $enemy->setHpCurrent($enemy->setHpCurrent - $damage);
    }
    public function getHpCurrent()
    {
        return $this->hp_current;
    }

    public function setHpCurrent($hp_current): void
    {
        $this->hp_current = $hp_current;
    }

    public function getHpMax()
    {
        return $this->hp_max;
    }

    public function setHpMax($hp_max): void
    {
        $this->hp_max = $hp_max;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }


}