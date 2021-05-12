<?php


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
        parent::__construct(
            rand(self::HEALTH["min"], self::HEALTH["max"]),
            rand(self::STRENGTH["min"], self::STRENGTH["max"]),
            rand(self::DEFENCE["min"], self::DEFENCE["max"]),
            rand(self::SPEED["min"], self::SPEED["max"]),
            rand(self::LUCK["min"], self::LUCK["max"]),
        );
    }

    function fetchBasicDamage(BaseEntity $target): int
    {
        if ($target instanceof Hero)
            return $this->getStrength() - $target->getDefence();

        throw new Exception("Target is not a hero");
    }

    function takeHit($damage)
    {
        $this->setHealth($this->getHealth() - $damage);
        echo "Hero dealt " . ($damage) . " to " . get_class($this) . PHP_EOL;
        echo get_class($this) . " remains in: " . $this->getHealth() . " HP" . PHP_EOL;
    }

    function basicAttack(BaseEntity $target)
    {
        if ($target instanceof Hero) {
            $flatDamage = $this->fetchBasicDamage($target);
            $target->takeHit($flatDamage);
        } else throw new Exception("Target is not a hero");
    }
}