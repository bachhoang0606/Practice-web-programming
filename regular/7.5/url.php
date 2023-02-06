<?php
$url = $_POST['url'];
if(preg_match("/^https?:\/\/(?:www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b(?:[-a-zA-Z0-9()@:%_\+.~#?&\/=]*)$/", $url)){
    print "url=$url is valid";
}else{
    print "url=$url is invalid";
}