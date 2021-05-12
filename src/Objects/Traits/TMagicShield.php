<?php


namespace EmagHero\Objects\Traits;

trait TMagicShield
{
    function magicShield($damage)
    {
        $this->typeIsHero();
        $this->setHealth($this->getHealth() - ($damage >> 1));
        echo "Beast dealt " . ($damage >> 1) . " to " . $this->getEntityName() . PHP_EOL;

        echo $this->getEntityName() . " remains in: " . $this->getHealth() . " HP" . PHP_EOL;
    }
}