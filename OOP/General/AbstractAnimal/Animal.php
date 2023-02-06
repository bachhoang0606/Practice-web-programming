<?php

    class Animal{
        

        // dem so luong dong vat
        public static $count = 0;

        public function __construct(){
            echo "This is animal";
        }
        public static function eat($food){
            echo "Eating $food";
            echo "<br>";
        }

    }
    
