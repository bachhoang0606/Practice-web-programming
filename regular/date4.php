<html>

<head>
    <title>Date Check</title>
</head>

<body>
    <?php
    $date = $_POST['date'];
    $month = '[0-1][[:digit:]]';
    $day = '[0-3][[:digit:]]';
    $year = "2[[:digit:]]{3}";
    if (preg_match("/^$day\/$month\/$year$/", $date)) {
        list($day, $mon, $year) = explode('/', $date);
        if ($mon >= 1 && $mon <= 12) {

            switch($mon){
                case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                    if ($day <= 31) {
                        print "Valid date mon=$mon day=$day year=$year";
                    } else {
                        print " Illegal day specifed Day=$day";
                    }
                    break;
                case 4: case 6: case 9: case 11:
                    if ($day <= 30) {
                        print "Valid date mon=$mon day=$day year=$year";
                    } else {
                        print " Illegal day specifed Day=$day";
                    }
                    break;
                case 2:
                    if ($day <= 29) {
                        print "Valid date mon=$mon day=$day year=$year";
                    } else {
                        print " Illegal day specifed Day=$day";
                    }
                    break;
            }  
        } else {
            print " Illegal month specifed Mon=$mon";
        }
    } else {
        print("Invalid date format= $date");
    }
    ?>
</body>

</html>