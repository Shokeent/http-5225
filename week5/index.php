<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $connect= mysqli_connect('localhost', 'root', '', 'colors', 3306, '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock');

    if(!$connect){
        die("Connection Failed: " . mysqli_connect_error());
    }
    
    $query = 'SELECT * FROM colors WHERE `COL 1` != "Name"';
    $colors = mysqli_query($connect, $query);

    if($colors) {
        foreach($colors as $color){
       echo "<div class='colorsname' style='background-color: {$color['COL 2']}; padding:10px; margin:5px; color: white;'>";
        echo htmlspecialchars($color['COL 1']);
        echo "</div>";
    }
}
    ?>
</body>
</html>