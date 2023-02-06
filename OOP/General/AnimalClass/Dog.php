<?php

    require_once "AbstractAnimal/Animal.php";
    class Dog extends Animal{

        public function __construct(){
            Animal::$count++;
            echo parent::__construct().": is dog<br>";
        }

        public function sounding(){
            echo "Gau Gau<br>";
        }
    }