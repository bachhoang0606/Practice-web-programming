<html>

<head>
    <title>Table Output</title>
</head>

<body>
    <?php
    $server = 'localhost';
    $user = 'postgres';
    $pass = '10026060';
    $database = 'hoclaravel';
    $connect = pg_connect("host=$server dbname=$database user=$user password=$pass");
    $table_name = 'Products';

    print '<font size="5" color="blue">';
    print "$table_name Data</font><br>";
    $query = "SELECT * FROM $table_name";
    print "The query is <i>$query </i><br>";
    $results_id = pg_query($connect, $query);
    if ($results_id) {
        print '<table border=1>';
        print '<th>Num<th>Product<th>Cost<th>Weight<th>Count';
        while ($row = pg_fetch_row($results_id)) {
            print '<tr>';
            foreach ($row as $field) {
                print "<td>$field</td> ";
            }
            print '</tr>';
        }
        pg_free_result($results_id);
    } else {
        die("Query=$query failed!");
    }
    pg_close($connect);
    ?>
    </table>
</body>

</html>