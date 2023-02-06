<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check distance</title>
    <?php 
        
    ?>
</head>
<body>
    <?php
    $destinations = $_GET['city'];
    $cities = array ('Dallas' => 803, 'Toronto' => 435, 'Boston' => 848, 'Nashville' => 406, 'Las Vegas' => 1526, 'San Francisco' => 1835, 'Washington DC'=> 595, 'Miami' => 1189, 'Pittsburgh' => 409);
    $distances = array();
    foreach($destinations as $destination){

        if(isset($cities[$destination])){

            $distance = $cities[$destination];
            $time = round($distance/60, 2);
            $walktime = round($distance/5, 2);
            $distances[$destination] = array($distance, $time, $walktime);
        }else {
            echo "Sorry, do not have destination information for $destination.";
        }
    }
    ?>
    <table border=1>
        <tr>
            <th>No.</th>
            <th>Destination</th>
            <th>Distance</th>
            <th>Diving time</th>
            <th>Walking time</th>
        </tr>
        <?php
            $conter = 1;
            foreach($distances as $key => $distance){
                echo '<tr>';
                echo "<td>".$conter++."</td><td>$key</td><td>".$distance[0]."</td><td>".$distance[1]."</td><td>".$distance[2]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>