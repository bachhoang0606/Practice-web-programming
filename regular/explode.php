<?php
$line = 'Please , pass    thepepper';
$result = preg_split ('/[[:space:]]+/', $line );
print "result[0]=$result[0]<br> result[1]=$result[1]<br> result[2]=$result[2]<br> result[3]=$result[3]";