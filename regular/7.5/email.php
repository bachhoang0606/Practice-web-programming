<?php
$email = $_POST['email'];
if(preg_match("/^[\w-\.]+@[\w-]+\.+[\w-]$/", $email)){
    print "email=$email is valid";
}else{
    print "email=$email is invalid";
}