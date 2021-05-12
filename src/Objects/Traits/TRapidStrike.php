<?php


namespace EmagHero\Objects\Traits;


trait TRapidStrike
{
    function rapidStrikeAttack(\EmagHero\Objects\Beast $target, int $flatDamage)
    {
        $this->typeIsHero();
        $target->takeHit($flatDamage << 1);
    }
}