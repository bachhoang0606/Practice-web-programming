<?php

spl_autoload_register(function($className) {
    include_once "AnimalClass/".$className . '.php';
});

spl_autoload_register(function($className) {
    include_once "AbstractAnimal/".$className . '.php';
});


$dog = new Dog;
$dog->sounding();
$dog::eat("sub");
$amount = Animal::$count;
echo "Have $amount animal<br>";
echo '<br>';
$chicken = new Chicken;
$chicken->sounding();
$chicken::eat("price");
$amount = Animal::$count;
echo "Have $amount animal<br>";
