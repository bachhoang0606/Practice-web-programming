<html>

<head>
    <title>Guess A Number</title>
</head>

<body>

    <form method="POST" action="">
        <label for="guess">Enter a number from 0 to 100 : </label>
        <input type="text" size="10" maxlength="3" name="guess">
        <input type="submit" value="Guess" />
    </form>
    <?php
    $session_id = session_id();
    if (empty($session_id))
        session_start();

    if (empty($_SESSION['ran'])) {
        $_SESSION['times'] = 0;
        $_SESSION['ran'] = rand(0, 10);
        $ran = $_SESSION['ran'];
    }
    if (isset($_POST['guess'])) {
        $g = $_POST['guess'];
        if (is_numeric($g)) {
            $ran = $_SESSION['ran'];
            if ($g == $ran) {
                echo "You Win! <br> You have guessed {$_SESSION['times']} times!";
                unset($_SESSION['ran']);
            } else if ($g < $ran) {
                $_SESSION['times']++;
                echo "Wrong. Please try a higher number. You have guessed {$_SESSION['times']} time!";
            } else {
                $_SESSION['times']++;
                echo "Wrong. Please try a lower number. You have guessed {$_SESSION['times']} time!";
            }
        } else {
            echo "You must enter a number!";
        }
    }

    ?>
</body>

</html>