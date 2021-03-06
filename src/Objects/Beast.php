<?php

namespace EmagHero\Objects;

class Beast extends BaseEntity
{
    const HEALTH = array(
        "min" => 60,
        "max" => 90,
    );
    const STRENGTH = array(
        "min" => 60,
        "max" => 90,
    );
    const DEFENCE = array(
        "min" => 40,
        "max" => 60,
    );
    const SPEED = array(
        "min" => 40,
        "max" => 50,
    );
    const LUCK = array(
        "min" => 25,
        "max" => 40,
    );

    /**
     * Hero constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    function fetchBasicDamage(BaseEntity $target): int
    {
        if ($target instanceof Hero)
            return $this->getStrength() - $target->getDefence();

        throw new \Exception("Target is not a hero");
    }

    function takeHit($damage)
    {
        $this->setHealth($this->getHealth() - $damage);
        echo "Hero dealt " . ($damage) . " to " . $this->getEntityName() . PHP_EOL;
        echo $this->getEntityName() . " remains in: " . $this->getHealth() . " HP" . PHP_EOL;
    }

    function basicAttack(BaseEntity $target)
    {
        if ($target instanceof Hero) {
            $flatDamage = $this->fetchBasicDamage($target);
            $target->takeHit($flatDamage);
        } else throw new \Exception("Target is not a hero");
    }
}