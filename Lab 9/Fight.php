<?php

class Fight{
    public Pokemon $poke1;
    public Pokemon $poke2;

    public function __construct($poke1, $poke2) {
        $this->poke1= $poke1;
        $this->poke2= $poke2;
    }
    public function go(){
        while ($this->poke1->get_actualhp() >= 0 && $this->poke2->get_actualhp() >= 0) {
            $this->poke1->attack($this->poke2);
            $this->poke2->attack($this->poke1);
        }

    }
}