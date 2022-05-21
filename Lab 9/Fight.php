<?php

class Fight{
    public $poke1;
    public $poke2;

    public function __construct($poke1, $poke2) {
        $this->poke1 = $poke1;
        $this->poke2 = $poke2;
    }
    public function go(){
        while ($this->poke1->getHpCurrent() > 0 && $this->poke2->getHpCurrent() > 0) {
            echo "<div class=\"fight\">";
            $this->poke1->printCard();
            $this->poke2->printCard();
            if($this->poke1->isConfused() || $this->poke1->isParalyzed()){
                $this->poke1->setConfused(False);
                $this->poke1->setParalyzed(False);
            } else {
                $this->poke1->attack($this->poke2);
            }
            if($this->poke2->getHpCurrent() <= 0){
                break;
            }
            if($this->poke2->isConfused() || $this->poke2->isParalyzed()){
                $this->poke2->setConfused(False);
                $this->poke2->setParalyzed(False);
            } else {
                $this->poke2->attack($this->poke1);
            }
            echo "</div>";
        }
        if($this->poke1->getHpCurrent() <= 0){
            $this->poke2->printCard();
            echo "<h3> ".$this->poke2->getName()." won.</h3> ";
        } else {
            $this->poke1->printCard();
            echo "<h3> ".$this->poke1->getName()." won.</h3> ";
        }
    }
}