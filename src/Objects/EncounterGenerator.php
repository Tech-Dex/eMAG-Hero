<?php

namespace EmagHero\Objects;

class EncounterGenerator
{
    private Hero $hero;
    private Beast $beast;
    private int $maxTurns = 20;

    function __construct(Hero $hero, Beast $beast)
    {
        $this->hero = $hero;
        $this->beast = $beast;
    }

    /**
     * @return Hero
     */
    public function getHero(): Hero
    {
        return $this->hero;
    }

    /**
     * @return Beast
     */
    public function getBeast(): Beast
    {
        return $this->beast;
    }

    function firstAttack(): Hero|Beast
    {
        if ($this->hero->getSpeed() == $this->beast->getSpeed()) {
            if ($this->hero->getLuck() == $this->beast->getLuck())
                return $this->hero;
            if ($this->hero->getLuck() > $this->beast->getLuck())
                return $this->hero;
            return $this->beast;
        }
        if ($this->hero->getSpeed() > $this->beast->getSpeed())
            return $this->hero;
        return $this->beast;
    }

    function processFight(Hero|Beast $firstAttacker, Hero|Beast $secondAttacker): Hero|Beast
    {
        $turns = $this->maxTurns;
        while ($turns--) {
            echo "Round number " . ($this->maxTurns - $turns) . PHP_EOL;
            $firstAttacker->basicAttack($secondAttacker);
            if (!$secondAttacker->isAlive())
                return $firstAttacker;
            $secondAttacker->basicAttack($firstAttacker);
            if (!$firstAttacker->isAlive())
                return $secondAttacker;
            echo "---------------------------------------------" . PHP_EOL;
        }
    }

    function fight(): Hero|Beast
    {
        $firstAttacker = $this->firstAttack();
        if ($firstAttacker instanceof Hero) {
            $secondAttacker = $this->beast;
            return $this->processFight($firstAttacker, $secondAttacker);
        }
        $secondAttacker = $this->hero;
        return $this->processFight($firstAttacker, $secondAttacker);
    }
}