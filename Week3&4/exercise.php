<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 4 In-Class activities</title>
</head>
<body>

<?php

    // Function to fetch user data from the JSONPlaceholder API
    function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
    }
    // Get the list of users
    $users = getUsers();

    foreach ($users as $user) {
        echo "id: " . $user['id'] . "<br>";
        echo "name: " . $user['name'] . "<br>";
        echo "<a href='mailto:" . $user['email'] . "'>" . $user['email'] .  " </a>" . "<br>";

        $address = $user['address'];
        echo "street: " . $address['street'] . "<br>";
        echo "city: " . $address['city'] . "<br>";

    }


    // echo "<a href='mailto:" . $user['email'] . "'>" . $user['email'] .  " </a>"

?>
    
</body>
</html>