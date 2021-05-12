<?php
include("objects/BaseEntity.php");
include("objects/Hero.php");
include("objects/Beast.php");
include("objects/EncounterGenerator.php");

$orderus = new Hero();
$beast = new Beast();
echo "Base stats".PHP_EOL;
print_r($orderus);
print_r($beast);

$encounterGenerator = new EncounterGenerator($orderus, $beast);

$winner = $encounterGenerator->fight();

echo PHP_EOL.get_class($winner)." is our winner".PHP_EOL;
