<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "Assignment1";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Movie Collection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>My Movie Collection</h1>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='movie-card'>";
                echo "<h2>" . $row["title"] . "</h2>";
                echo "<p><span class='highlight'>Genre:</span> " . $row["genre"] . "</p>";
                echo "<p><span class='highlight'>Rating:</span> " . $row["rating"] . "</p>";

                if ($row["rating"] >= 9.0) {
                    echo "<p style='color: green;'>🌟 Must Watch</p>";
                } elseif ($row["rating"] >= 8.0) {
                    echo "<p style='color: orange;'>👍 Great Movie</p>";
                } else {
                    echo "<p style='color: red;'>😐 Average</p>";
                }

                echo "<p><span class='highlight'>Release Date:</span> " . $row["release_date"] . "</p>";
                echo "<p><span class='highlight'>Duration:</span> " . $row["duration_mins"] . " mins</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No movies found.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
