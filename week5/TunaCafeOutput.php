<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuna Cafe</title>

    <!-- Neu gan cho gia tri thi khong hoat dong nhung dung truc tiep thi duoc -->
    <?php $perfer = $_POST["prefer"]; ?>
</head>
<body>
    <h3 style="color:blue;">Tuna cafe result receve</h3>
    <p>Your selection were</p>
    <ul>
        <?php
            foreach($perfer as $item){
                echo "<li>".$item."</li>";
            }
        ?>
    </ul>
    
    <a href="./TunaCafe.php">
        <button>Back</button>
    </div>
</body>
</html>