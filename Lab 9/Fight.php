<?php

class Fight{
    public $pokemon1;
    public $pokemon2;

    public function __construct($p1, $p2) {
        $this->pokemon1 = $p1;
        $this->pokemon2 = $p2;
    }
    public function go(){
        while ($this->pokemon1->getHpCurrent() > 0 && $this->pokemon2->getHpCurrent() > 0) {
            echo "<ul>";
            echo "<li><p>".$this->pokemon1->printCard()."</p></li>
                  <li><p>".$this->pokemon2->printCard()."</p></li>
                  </ul>";
            if($this->pokemon1->isConfused() || $this->pokemon1->isParalyzed()){
                echo $this->pokemon1->getName()." is unable to move!";
                $this->pokemon1->setConfused(False);
                $this->pokemon1->setParalyzed(False);
            } else {
                $this->pokemon1->attack($this->pokemon2);
            }
            if($this->pokemon2->getHpCurrent() <= 0){
                break;
            }
            if($this->pokemon2->isConfused() || $this->pokemon2->isParalyzed()){
                echo $this->pokemon2->getName()."Is unable to move!";
                $this->pokemon2->setConfused(False);
                $this->pokemon2->setParalyzed(False);
            } else {
                $this->pokemon2->attack($this->pokemon1);
            }
            echo "</div>";
        }
        if($this->pokemon1->getHpCurrent() <= 0){
            $this->pokemon2->printCard();
            echo "<h3> ".$this->pokemon2->getName()." won.</h3> ";
        } else {
            $this->pokemon1->printCard();
            echo "<h3> ".$this->pokemon1->getName()." won.</h3> ";
        }
    }
}