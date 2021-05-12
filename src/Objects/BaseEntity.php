<?php

namespace EmagHero\Objects;

abstract class BaseEntity
{


    private int $health;
    private int $strength;
    private int $defence;
    private int $speed;
    private int $luck;


    /**
     * Default values if not overridden in a class that extends this one.
     */
    const HEALTH = array(
        "min" => 1,
        "max" => 10,
    );
    const STRENGTH = array(
        "min" => 1,
        "max" => 10,
    );
    const DEFENCE = array(
        "min" => 1,
        "max" => 10,
    );
    const SPEED = array(
        "min" => 1,
        "max" => 10,
    );
    const LUCK = array(
        "min" => 1,
        "max" => 10,
    );

    /**
     * BaseEntity constructor.
     */
    public function __construct()
    {
        $this->health = rand(static::HEALTH["min"], static::HEALTH["max"]);
        $this->strength = rand(static::STRENGTH["min"], static::STRENGTH["max"]);
        $this->defence = rand(static::DEFENCE["min"], static::DEFENCE["max"]);
        $this->speed = rand(static::SPEED["min"], static::SPEED["max"]);
        $this->luck = rand(static::LUCK["min"], static::LUCK["max"]);
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     */
    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @param int $defence
     */
    public function setDefence(int $defence): void
    {
        $this->defence = $defence;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     */
    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * @param int $luck
     */
    public function setLuck(int $luck): void
    {
        $this->luck = $luck;
    }

    function isAlive(): bool
    {
        return $this->getHealth() > 0;
    }

    public function getEntityName()
    {
        $array = explode("\\", get_class($this));
        return end($array);
    }

    abstract function takeHit($damage);

    abstract function basicAttack(BaseEntity $target);

    abstract function fetchBasicDamage(BaseEntity $target);

    function typeIsHero(){
        if (!($this instanceof \EmagHero\Objects\Hero)){
            die("Only hero can use this spell");
        }
    }
}

