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
            echo "<ul>";
            echo "<li><p>".$this->poke1->printCard()."</p></li>
                  <li><p>".$this->poke2->printCard()."</p></li>
                  </ul>";
            if($this->poke1->isConfused() || $this->poke1->isParalyzed()){
                echo $this->poke1->getName()." is unable to move!";
                $this->poke1->setConfused(False);
                $this->poke1->setParalyzed(False);
            } else {
                $this->poke1->attack($this->poke2);
            }
            if($this->poke2->getHpCurrent() <= 0){
                break;
            }
            if($this->poke2->isConfused() || $this->poke2->isParalyzed()){
                echo $this->poke2->getName()."Is unable to move!";
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