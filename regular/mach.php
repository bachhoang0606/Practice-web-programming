<?php

$part = "AA100";
$pattern = "/^\^/";
if (preg_match($pattern, $part)) {
    print 'Match';
} else {
    print 'No match';
}