<?php
    class BaseClass {
        protected $name = "BaseClass";

        function __construct(){
            print("In ".$this->name." constructor<br>");
        }

        function __destruct(){
            print("Destroy ".$this->name."<br>");
        }
    };

    class SubClass extends BaseClass{
        function __construct(){
            $this->name = "SubClass";
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }
    };

    //$obj1 = new SubClass();

    /*

    In SubClass constructor
    Destroy SubClass

    */

    $obj2 = new BaseClass();

    /*

    In BaseClass constructor
    Destroy BaseClass

    */
?>