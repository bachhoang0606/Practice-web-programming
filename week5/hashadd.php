<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hash Add</title>
</head>
<body>
    <?php
        $invent = array('Nuts'=>44, 'Nails'=>34, 'Bolts'=>31);
        $operation = $_POST['operation'];
        $value = $_POST["value"];
        $index = $_POST['index'];
        if ($operation == "add"){
            if(isset($invent[$index])){
                echo "Sory, already exits $index<br>";
            }else {
                $invent[$index] = $value;
                echo "Adding index=$index value=$value <br>";
                echo '-----<br>';
                foreach($invent as $key => $item){
                    echo "Index is $key, value is $item<br>";
                }
            }
        }else{
            echo "Sory, no such action=$operation<br>";
        }
    ?>
</body>
</html>