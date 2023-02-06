<?php

    require_once "AbstractAnimal/Animal.php";
    class Chicken extends Animal{

        public function __construct(){
            parent::$count++;
            echo parent::__construct().": is chicken<br>";
        }

        public function sounding(){
            echo "Cuc tac cuc tac<br>";
        }
    }
