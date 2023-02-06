<?php
$phone = $_POST['phone'];
if(preg_match("/^[0-9]{10}$/", $phone)){
    print "phone=$phone is valid";
}else{
    print "phone=$phone is invalid";
}