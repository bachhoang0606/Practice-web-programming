<html>

<head>
    <title>Insert Results</title>
</head>

<body>
    <?php
    $server = 'localhost';
    $user = 'postgres';
    $pass = '10026060';
    $database = 'hoclaravel';
    $connect = pg_connect("host=$server dbname=$database user=$user password=$pass");
    $table_name = 'Products';

    $Item = $_POST['Item'];
    $Cost = $_POST['Cost'];
    $Weight = $_POST['Weight'];
    $Quantity = $_POST['Quantity'];

    $query = "INSERT INTO $table_name VALUES ('1','$Item','$Cost','$Weight','$Quantity')";
    print "The Query is <i>$query</i><br>";
    print '<br><font size="4" color="blue">';
    if (pg_query($connect, $query)) {
        print "Insert into $database was successful!</font>";
    } else {
        print "Insert into $database failed!</font>";
    }
    pg_close($connect);
    ?>
</body>

</html>