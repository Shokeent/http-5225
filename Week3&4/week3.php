<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Management</title>
</head>
<body>

<?php

    $hour = rand(1, 23);
    if (5 < $hour && $hour < 9) {
        echo "The animals should have breakfast (Bananas, Apples, and Oats)";
    } elseif (12 < $hour && $hour < 14) {
        echo "The anikmals should have lunch (Fish, Chicken, and Vegetables)";
    } elseif (19 < $hour && $hour < 21) {
        echo "The animals should have dinner (Steak, Carrots, and Broccoli)";
    } else {
        echo "The animals are not being fed right now.";
    }

?>

<hr>

<?php

    $inputNum = rand(3, 100);
    if ($inputNum % 3 === 0 && $inputNum % 5 === 0) {
        echo "FizzBuzz ($inputNum)";
    } elseif ($inputNum % 5 === 0) {
        echo "Buzz ($inputNum)";
    } elseif ($inputNum % 3 === 0) {
        echo "Fizz ($inputNum)";
    } else {
        echo $inputNum;
    }

?>
    
</body>
</html>