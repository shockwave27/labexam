<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum Calculator</title>
</head>
<body>
    <h2>Enter numbers separated by spaces to calculate their sum:</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="numbers" placeholder="Enter numbers separated by spaces" required>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numbersInput = $_POST["numbers"];
        $numbersArray = explode(" ", $numbersInput);

        $sum = 0;
        foreach ($numbersArray as $number) {
            $sum += floatval($number);
        }

        echo "<h2>Sum Result:</h2>";
        echo "Sum: " . $sum;
    }
    ?>
</body>
</html>
