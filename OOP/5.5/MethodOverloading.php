<?php
    class MethodTest {
        public function __call($name, $arguments){
            //
            echo "calling object methods '$name' ".implode(' ', $arguments)."<br>";

        }

        public static function __callStatic($name, $arguments){
            //
            echo "calling static methods '$name' ".implode(' ', $arguments)."<br>";

        }
    }

    $obj = new MethodTest;
    $obj->runTest("in object context");

    MethodTest::runTest("in object context");