<?php

class Pokemon {
    private $name;
    private $type;
    private $hp_max;
    private $hp_current;
    private $strength;
    private $pathToPhoto;
    private $confused = false;
    private $paralyzed = false;


    public function __construct($name, $type, $hp_max, $strength, $photo) {
        $this->name = $name;
        $this->type = $type;
        $this->hp_max = $hp_max;
        $this->hp_current = $hp_max;
        $this->strength = $strength;
        $this->pathToPhoto = $photo;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getHpMax()
    {
        return $this->hp_max;
    }

    /**
     * @param mixed $hp_max
     */
    public function setHpMax($hp_max)
    {
        $this->hp_max = $hp_max;
    }

    /**
     * @return mixed
     */
    public function getHpCurrent()
    {
        return $this->hp_current;
    }

    /**
     * @param mixed $hp_current
     */
    public function setHpCurrent($hp_current)
    {
        $this->hp_current = $hp_current;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return mixed
     */
    public function getPathToPhoto()
    {
        return $this->pathToPhoto;
    }

    /**
     * @param mixed $pathToPhoto
     */
    public function setPathToPhoto($pathToPhoto)
    {
        $this->pathToPhoto = $pathToPhoto;
    }

    /**
     * @return bool
     */
    public function isConfused()
    {
        return $this->confused;
    }

    /**
     * @param bool $confused
     */
    public function setConfused($confused)
    {
        $this->confused = $confused;
    }

    /**
     * @return bool
     */
    public function isParalyzed()
    {
        return $this->paralyzed;
    }

    /**
     * @param bool $paralyzed
     */
    public function setParalyzed($paralyzed)
    {
        $this->paralyzed = $paralyzed;
    }


    public function attack(Pokemon $targetPokemon){
        $strengthMultiplier = hasStrength($this, $targetPokemon);
        $this->specialEffect($targetPokemon);
        $targetHp = $targetPokemon->getHpCurrent();
        $dmgDone = $this->getStrength()*$strengthMultiplier;
        $targetHp -= $dmgDone;
        $targetPokemon->setHpCurrent($targetHp);
        echo "<p>".$this->getName()." dealt ".$dmgDone."dmg to ".$targetPokemon->getName()."</p><br/>";
    }

    public function printCard(){
        echo "<div class=\"card\" style='background-color: $this->cardColor;'>";
        echo "<img class='cardImage' alt='a' src='".$this->getPathToPhoto()."'>";
        echo "<div class=\"content\">
          <h4>Name: ".$this->getName()."</h4>
          Type: ".$this->getType()." <br/>
          Strength: ".$this->getStrength()." <br/>
          HP: ".$this->getHpCurrent()."/".$this->getHpMax()." <br/>
          </div>";
        echo "</div><br/>";
    }
}
