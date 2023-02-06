<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device inventory</title>
</head>
<body>
    <h1>Hardware Hary's Inventory Infomation</h1>
    <form action="./show_inventory.php" method="post">

        Select path number for more infomation
        <div>
            <input type="radio" name="id" value="AC1000"> AC1000
            <input type="radio" name="id" value="AC1001"> AC1001
            <input type="radio" name="id" value="AC1002"> AC1002
            <input type="radio" name="id" value="AC1003"> AC1003
        </div>
        
        <div>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
        
    </form>
</body>
</html>