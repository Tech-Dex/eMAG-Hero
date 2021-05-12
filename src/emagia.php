<?php

require_once __DIR__ . '/../vendor/autoload.php';

$orderus = new EmagHero\Objects\Hero();
$beast = new EmagHero\Objects\Beast();
echo "Base stats" . PHP_EOL;
print_r($orderus);
print_r($beast);

$encounterGenerator = new EmagHero\Objects\EncounterGenerator($orderus, $beast);

$winner = $encounterGenerator->fight();

echo PHP_EOL . $winner->getEntityName() . " is our winner" . PHP_EOL;
