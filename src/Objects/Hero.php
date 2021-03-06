<?php

namespace EmagHero\Objects;

class Hero extends BaseEntity
{
    use Traits\TRapidStrike, Traits\TMagicShield;

    const HEALTH = array(
        "min" => 70,
        "max" => 100,
    );
    const STRENGTH = array(
        "min" => 70,
        "max" => 80,
    );
    const DEFENCE = array(
        "min" => 45,
        "max" => 55,
    );
    const SPEED = array(
        "min" => 40,
        "max" => 50,
    );
    const LUCK = array(
        "min" => 10,
        "max" => 30,
    );

    const RAPID_STRIKE_CHANCE = 10;
    const MAGIC_SHIELD_CHANCE = 10;

    /**
     * Hero constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    function fetchBasicDamage(BaseEntity $target): int
    {
        if ($target instanceof Beast)
            return $this->getStrength() - $target->getDefence();

        throw new \Exception("Target is not a beast");
    }

    function basicAttack(BaseEntity $target)
    {
        if ($target instanceof Beast) {
            $flatDamage = $this->fetchBasicDamage($target);

            if (rand(1, 100) <= self::RAPID_STRIKE_CHANCE) {
                echo "Our hero was lucky. He strikes twice." . PHP_EOL;
                $this->rapidStrikeAttack($target, $flatDamage);
                return;
            }
            $target->takeHit($flatDamage);
        } else throw new \Exception("Target is not a beast");
    }

    function takeHit($damage)
    {
        if (rand(1, 100 <= self::MAGIC_SHIELD_CHANCE)) {
            echo "Our hero was lucky. He uses magic shield" . PHP_EOL;
            $this->magicShield($damage);
            return;
        }
        $this->setHealth($this->getHealth() - $damage);
        echo "Beast dealt " . ($damage) . " to " . $this->getEntityName() . PHP_EOL;
        echo $this->getEntityName() . " remains in: " . $this->getHealth() . " HP" . PHP_EOL;
    }
}