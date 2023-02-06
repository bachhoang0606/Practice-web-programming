<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuna Cafe</title>
    <?php
        $menu = array('Tuna Casserole', 'Tuna Sandwich', 'Tuna Pie', 'Grilled Tuna', 'Tuna Surprise');
        $bestseller = $menu[2];
    ?>
</head>
<body>
    <h3> Welcome to the Tuna Cafe Survey! </h3>
    <p>Please indicate all your favorite dishes.</p>
    <form action="./TunaCafeOutput.php" method="post">
        <?php
            foreach($menu as $item){
                print "<div>";
                echo "<input type=\"checkbox\" name=\"prefer[]\" value=\"".$item."\">"." ", $item;
                if($item == $bestseller){
                    echo '<font color="red"> Our Best Seller!!!! </font>';
                }
                print "</div>";
            }
        ?>
        <input type="submit" value="Click To Submit">
        <input type="reset" value="Erase and Restart">
    </form>
</body>
</html>