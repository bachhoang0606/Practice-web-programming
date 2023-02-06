<?php
$products = array(
    'AB01' => '25-Pound Sledgehammer',
    'AB02' => 'Extra Strong Nails',
    'AB03' => 'Super Adjustable Wrench',
    'AB04' => '3-Speed Electric Screwdriver'
);
$description = $_POST["description"];
$code = $_POST["code"];

if (preg_match('/boat|plane/', $description)) {
    print 'Sorry, we do not sell boats or planes anymore';
} else {
    if (preg_match("/^AB/", $code)) {
        if (isset($products[$code])) {
            print "Code $code Description $products[$code]";
        } else
            print 'Sorry, product code not found';
    } else {
        print 'Sorry, all our product codes start with AB';
    }
}

?>