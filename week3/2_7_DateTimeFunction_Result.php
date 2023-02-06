<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <?php 

        $userName1 = $_POST["user_name_1"];
        $userName2 = $_POST["user_name_2"];
        $dob1 = $_POST["user_birthday_1"];
        $dob2 = $_POST["user_birthday_2"];
        


        $d_m_y_1 = explode("/", $dob1);
        $d_m_y_2 = explode("/", $dob2);

        checkValidDate($d_m_y_1);
        if( checkValidDate($d_m_y_1) == TRUE && checkValidDate($d_m_y_2) == TRUE){
            $date1["day"] = $d_m_y_1[0];
            $date1["month"] = $d_m_y_1[1];
            $date1["year"] = $d_m_y_1[2];

            $date2["day"] = $d_m_y_2[0];
            $date2["month"] = $d_m_y_2[1];
            $date2["year"] = $d_m_y_2[2];
        }else {
            header("Location: ./2_7_DateTimeFunction.php");
            $_SESSION["error"] = "Invalid date field ,date must have type d/m/y ( E.g. 12/12/2008 ).";
            exit;
        }


        // echo "persion1: $username date of birth:". $date1["day"] . " " . $date1["month"] . " " . $date1["year"];
        // echo "persion2: $username date of birth:". $date2["day"] . " " . $date2["month"] . " " . $date2["year"];

        function isNamNhuan($year) {
            if ($year%4 == 0){

                if( $year%100 == 0 ){

                    if ( $year%400 == 0 ){
                        return TRUE;
                    }else return FALSE;

                }else return TRUE;
            }else return FALSE;
        }

        function isValidDay($date) {
            // echo "<script> console.log('check day') </script>";
            // echo "<script> console.log(". $date['month'] .") </script>";
            switch($date["month"]){
                case "1" : case "3" : case "5" : case "7" : case "8" : case "10" : case "12": 
                    // echo "<script> console.log('thang 31') </script>";
                    if ($date["day"] <= 31 && $date["day"] >= 1) return TRUE;
                    else return FALSE;
                case 4 : case 6 : case 9 : case 11:
                    // echo "<script> console.log('thang 30') </script>";
                    if ($date["day"] <=30 && $date["day"] >= 1) return TRUE;
                    else return FALSE;
                case 2:
                    // echo "<script> console.log('thang 2') </script>";
                    if ($date["day"] >= 1){
                        if ( isNamNhuan($date["year"])){
                            // echo "<script> console.log('thang nhuan') </script>";
                            if ($date["day"] <= 29 ) return TRUE;
                            else return FALSE;
                        }else {
                            // echo "<script> console.log('thang khong nhuan') </script>";
                            if ($date["day"] <= 28 ) return TRUE;
                            else return FALSE;
                        }
                    }else return FALSE;
                default: 
                    $_SESSION["error"]["month"] = "Invalid day month field ,date must have type d/m/y ( E.g. 12/12/2008 ).";
                    // echo "<script> console.log('day mac dinh') </script>";
                    return FALSE;
            }
        }

        function isVaidMonth($month) {
            if ($month <= 12 && $month >= 1 ) return TRUE;
            else return FALSE;
        }

        function checkValidDate($d_m_y){
            
            if(count($d_m_y) != 3){
                // echo "<script> console.log('count') </script>";

                return FALSE;
            }else {

                $date["day"] = $d_m_y[0];
                $date["month"] = $d_m_y[1];
                $date["year"] = $d_m_y[2];

                if( $date["year"] > date("Y") ) {

                    $_SESSION["error"]["year_invalid"] = "Invalid birthday is bigger now.";
                    return FALSE;
                } elseif ( $date["year"] = date("Y") ) {

                    if( $date["month"] > date("m") ) {
                        $_SESSION["error"]["month_invalid"] = "Invalid birthday is bigger now.";
                        return FALSE;
                    } elseif ( $date["month"] = date("m") ){

                        if( $date["day"] > date("d") ) {
                            $_SESSION["error"]["month_invalid"] = "Invalid birthday is bigger now.";
                            return FALSE;
                        }
                    }
                }

                if ( !isValidDay($date) ){
                    // echo "<script> console.log('day') </script>";
                    $_SESSION["error"]["day"] = "Invalid day date field ,date must have type d/m/y ( E.g. 12/12/2008 ).";
                    return FALSE;
                }

                if ( isVaidMonth($date["month"]) == FALSE ){
                    // echo "<script> console.log('false month') </script>";
                    return FALSE;
                }

                // echo "<script> console.log('true') </script>";
                return TRUE;
            }

        }

        function nameDay($date) {

            $nameDays = array("0"=>"Sunday", "1"=>"Monday", "2"=>"Tuesday", "3"=>"Wednesday", "4"=>"Thursday", "5"=>"Friday", "6"=>"Saturday");

            $n = $date["year"];
            $n--;

            $c = caculatorDayOfYear($date);
            $nameDay = ( $n + (int)( $n/4 ) - (int)( $n/100 ) + (int)( $n/400 ) + $c)%7;
            return $nameDays[$nameDay];
        }

        function caculatorDayOfYear($date){

            $c = 0;
            switch($date["month"]){
                case 1:
                    $c = 0;
                    break;
                case 2:
                    $c = 31;
                    break;
                case 3:
                    $c = 31 + 28;
                    break;
                case 4:
                    $c = 31 + 28 + 31;
                    break;
                case 5:
                    $c = 31 + 28 + 31 + 30;
                    break;
                case 6:
                    $c = 31 + 28 + 31 + 30 + 31;
                    break;
                case 7:
                    $c = 31 + 28 + 31 + 30 + 31 + 30;
                    break;
                case 8:
                    $c = 31 + 28 + 31 + 30 + 31 + 30 + 31;
                    break;
                case 9:
                    $c = 31 + 28 + 31 + 30 + 31 + 30 + 31 + 31;
                    break;
                case 10:
                    $c = 31 + 28 + 31 + 30 + 31 + 30 + 31 + 31 + 30;
                    break;
                case 11:
                    $c = 31 + 28 + 31 + 30 + 31 + 30 + 31 + 31 + 30 + 31;
                    break;
                case 12:
                    $c = 31 + 28 + 31 + 30 + 31 + 30 + 31 + 31 + 30 + 31 +30;
                    break;
            }
            if(isNamNhuan($date["year"])) $c++;
            $c += $date["day"];

            return $c;
        }

        function caculatorBetweenTwoDay($date1, $date2){

            if ($date1["year"] = $date2["year"]){
                $value["day"] = abs(caculatorDayOfYear($date1) - caculatorDayOfYear($date2));
                $value["year"] = 0;
                return $value;
            }

            if ($date1["year"] < $date2["year"]){
                $old = $date1;
                $young = $date2;
            }else {
                $old = $date2;
                $young = $date1;
            }

            $value["day"] = 0;
            
            for( $count = $old["year"]; $count < $young["year"]; $count++){
                if ( isNamNhuan($count) ){
                    $value["day"] += 366;
                }else $value["day"] += 365;
            }

            $value["day"] = $value["day"] + caculatorDayOfYear($young) - caculatorDayOfYear($old);
            $value["year"] = $young["year"] - $old["year"];

            return $value;
        }

        function caculatorAge($date){

            $now["day"] = date("d");
            $now["month"] = date("m");
            $now["year"] = date("Y");

            if ($now["year"] == $date["year"]){
                return caculatorBetweenTwoDay($now, $date);
            }

            $dob["day"] = $date["day"];
            $dob["month"] = $date["month"];
            $dob["year"] = date("Y");

            // xu ly neu sinh nam nhuan va nam nay la nam nhuan thi giu nguyen
            if ($date["day"] == 29 && $date["month"] == 2 && isNamNhuan(date("Y"))){
                // nothing
            }else{
                // xu ly neu sinh nam nhuan va nam nay khong phai nam nhuan chuyen nay sinh ve 28 roi xu ly
                $dob["day"] = 28;
            }

            $currentIsDob = caculatorDayOfYear($now) - caculatorDayOfYear($dob);
            $age["year"] = $now["year"] - $date["year"];
            
            if($currentIsDob <= 0) {
                $age["day"] = abs($currentIsDob);
                $age["year"]--;
            }else{
                $dob["year"]--;
                // xu ly neu sinh nam nhuan va nam nay la nam nhuan thi giu nguyen
                if ($date["day"] == 29 && $date["month"] == 2 && isNamNhuan($dob["year"])){
                    $dob["day"] = 29;
                }else{
                    // nothing
                }
                $age["day"] = caculatorBetweenTwoDay($now, $dob)["day"];
            }

            // echo $age["day"], " ", $age["year"];
            return $age;
        }

        $nameMonth = array("1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June","7"=>"July","8"=>"August","9"=>"September","10"=>"October","11"=>"November","12"=>"December");
    ?>

    <div style="text-align:center;border:solid 2px black;padding:30px;margin:10px;">
        <p>Persion : <?php echo $userName1; ?> has birthday is : <?php echo nameDay($date1)." ".$nameMonth[$date1["month"]]." ". $date1["month"]." ". $date1["year"]; ?></p>
        <p><?php echo $userName1; ?> age: <?php echo caculatorAge($date1)["day"] ?> day and <?php echo caculatorAge($date1)["year"]?> year </p>
    </div>
    <div style="text-align:center;border:solid 2px black;padding:30px;margin:10px;">
        <p>Persion : <?php echo $userName2; ?> has birthday is : <?php echo nameDay($date2)." ".$nameMonth[$date2["month"]]." ". $date2["month"]." ". $date2["year"]; ?></p>
        <p><?php echo $userName2; ?> age: <?php echo caculatorAge($date2)["day"] ?> day and <?php echo caculatorAge($date2)["year"]?> year </p>
    </div>
    <div style="text-align:center;border:solid 2px black;padding:30px;margin:10px;">
        <p>difference in days between two birthday: <?php echo caculatorBetweenTwoDay($date1, $date2)["day"] ?></p>
        <p>difference year between two birthday: <?php echo caculatorBetweenTwoDay($date1, $date2)["year"] ?></p>
    </div>
    <div style="display:flex;justify-content: center;">
        <button onclick="window.location.href='./2_7_DateTimeFunction.php'">Back</button>
    </div>
</body>
</html>