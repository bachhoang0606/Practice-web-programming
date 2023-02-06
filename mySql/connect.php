<html>

<head>
    <title>Create Table</title>
</head>

<body>
    <?php
    $server = 'localhost';
    $user = 'postgres';
    $pass = '10026060';
    $mydb = 'hoclaravel';
    $table_name = 'Products';
    $connect = pg_connect("host=$server dbname=$mydb user=$user password=$pass");
    if (!$connect) {
        die("Cannot connect to $server using $user");
    } else {
        $SQLcmd = " CREATE TABLE $table_name (
                        ProductID INT NOT NULL PRIMARY KEY,
                        Product_desc VARCHAR(50),
                        Cost INT, 
                        Weight INT, 
                        Numb INT
                    )";
        if (pg_query($connect, $SQLcmd)) {
            print '<font size="4" color="blue" >Created Table';
            print "<i>$table_name</i> in database<i>$mydb</i><br></font>";
            print "<br>SQLcmd=$SQLcmd";
        } else {
            die("Table Create Creation Failed SQLcmd=$SQLcmd");
        }
        pg_close($connect);
    }
    ?>
</body>

</html>