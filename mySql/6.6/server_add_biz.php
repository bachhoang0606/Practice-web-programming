<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    

<?php

    $server = 'localhost';
    $user = 'postgres';
    $pass = '10026060';
    $database = 'business_service';
    $connect = pg_connect("host=$server dbname=$database user=$user password=$pass");
    $table_name = 'Businesses';

    $query = 'INSERT INTO "Businesses"( "Name", "Address", "City", "Telephone", "URL")
        VALUES ('."'".$_POST['name']."'".', '."'".$_POST['address']."'".', '."'".$_POST['city']."'".', '."'".$_POST['telephone']."'".', '."'".$_POST['URL']."'".');';
    $results_id = pg_query($connect, $query);
    if ($results_id) {
    } else {
        die("Query=$query failed!");
    }

    $query = 'SELECT "BusinessID"
	FROM "Businesses" WHERE "Name" = '."'".$_POST['name']."'".'AND "Address" = '."'".$_POST['address']."'".'AND "City" = '."'".$_POST['city']."'".'AND "Telephone" = '."'".$_POST['telephone']."'".';';
    $results_id = pg_query($connect, $query);
    if ($results_id) {
    } else {
        die("Query=$query failed!");
    }

    $row = pg_fetch_row($results_id);
    $id = $row[0];
    foreach($_POST['categories'] as $category){
        $query = 'INSERT INTO "Biz_Categories"( "BusinessID", "CategoryID")
            VALUES ('."'".$id."'".', '."'".$category."'".');';
        $results_id = pg_query($connect, $query);
        if ($results_id) {
        } else {
            die("Query=$query failed!");
        }
    }
    pg_close($connect);
    ?>

    <div class="container">
    <h1 class="text-center">Dang ky thanh cong</h1>
    <a href="./add_biz.php"><button class="btn btn-secondary">Back</button></a>
    </div>

    
</body>