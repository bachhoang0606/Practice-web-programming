<html>

<head>
    <title>Product Update Results</title>
</head>

<body>
    <?php
    $server = 'localhost';
    $user = 'postgres';
    $pass = '10026060';
    $database = 'hoclaravel';
    $connect = pg_connect("host=$server dbname=$database user=$user password=$pass");
    $table_name = 'Products';

    $Product = $_POST['Product'];
    print '<font size="5" color="blue">';
    print "Update Results for Table $table_name</font><br>\n";
    $query = "UPDATE $table_name SET Numb = Numb-1 WHERE (Product_desc = '$Product')";
    print "The query is <i> $query </i> <br><br>\n";
    $results_id = pg_query($connect, $query);
    if ($results_id) {
        Show_all($connect, $database, $table_name);
    } else {
        print "Update=$query failed";
    }
    pg_close($connect);
    function Show_all($connect, $database, $table_name)
    {
        $query = "SELECT * from $table_name";
        $results_id = pg_query($connect, $query);
        print "<table border=1><th> Num </th> <th> Product</th><th>Cost</th> <th> Weight</th><th>Count</th>";
        while ($row = pg_fetch_row($results_id)) {
            echo '<tr>';
            foreach ($row as $field) {
                print "<td>$field</td> ";
            }
            echo '</tr>';
        }
        pg_free_result($results_id);
    }
    ?>
</body>

</html>