<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DateTimeFunction</title>
</head>
<body>
    <div style="text-align:center;">
        <?php
            if ( !empty($_SESSION["error"]) ){
                echo "<p style='color:red;'>" . $_SESSION['error']. "</p>";
            }

            $_SESSION["error"] = NULL;
        ?>
    </div>
    <form action="./2_7_DateTimeFunction_Result.php" method="post">
        <div style="border:solid 2px black;padding:30px;margin:10px;">
            <label for="user_name_1">User name 1</label>
            <input type="text" name="user_name_1" id="user_name_1" required>
            <label for="user_birthday_1">birth day</label>
            <input type="text" name="user_birthday_1" id="user_birthday_1" required>
        </div>
        <div style="border:solid 2px black;padding:30px;margin:10px;">
            <label for="user_name_2">User name 2</label>
            <input type="text" name="user_name_2" id="user_name_2" required>
            <label for="user_birthday_2">birth day</label>
            <input type="text" name="user_birthday_2" id="user_birthday_2" required>
        </div>
        <div style="display: flex;justify-content: center;align-items: center;;">
            <input type="submit" value="submit">
        </div>
    </form>
</body>
</html>