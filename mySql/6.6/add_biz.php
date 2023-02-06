<!DOCTYPE html>
<html lang="en">

<head>
    <title>add bix</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php

    $server = 'localhost';
    $user = 'postgres';
    $pass = '10026060';
    $database = 'business_service';
    $connect = pg_connect("host=$server dbname=$database user=$user password=$pass");
    $table_name = 'Categories';

    $query = 'SELECT * FROM "' . $table_name . '";';
    $results_id = pg_query($connect, $query);
    if ($results_id) {
    } else {
        die("Query=$query failed!");
    }
    pg_close($connect);
    ?>
</head>

<body>

    <div class="container">

        <form action="./server_add_biz.php" method="post">
            <div class="row">
                <div class="col">
                    <h1>Business Registration</h1>
                    <p>Click on one, or control-click on muptiple categories:</p>
                    <div class="my-5" style="overflow-y:scroll;height:200px;">

                    <?php
                        while ($row = pg_fetch_row($results_id)) {
                            echo '<div class="form-check"><input class="form-check-input" type="checkbox" name="categories[]" value="'.$row[0].'">
                            <label class="form-check-label">';
                            echo $row[1];
                            echo '</label></div>';
                        }
                        pg_free_result($results_id);
                    ?>
                    </div>

                    <input type="submit" class="btn btn-secondary mb-3" value="Add Business">
                </div>
                <div class="col mt-5 mb-3">
                    <div class="row mt-5 mb-3">
                        <div class="col-3">
                            <label for="name" class="form-label">Business Name:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="name" id="" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="address" class="form-label">Address:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="address" id="" class="form-control"  required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="city" class="form-label">City:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="city" id="" class="form-control"  required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="telephone" class="form-label">Telephone:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="telephone" id="" class="form-control"  required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="URL" class="form-label">URL:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="URL" id="" class="form-control"  required>
                        </div>
                    </div>
                </div>
            </div>

        </form>


    </div>


</body>

</html>