<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Used Car Dealership - Car List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #faf5f5; }
    </style>
</head>
<body>
    <h1>Used Car Inventory</h1>

    <?php
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        echo "<p>Database connection failure: " . mysqli_connect_error() . "</p>";
    } else {
        $sql_table = "cars";
        $query = "SELECT * FROM cars WHERE yom < 2010";
        //WHERE price > 30000
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "<p>Database query failure.</p>";
        } else if (mysqli_num_rows($result) == 0) {
            echo "<p>There are no cars to display.</p>";
        } else {
            echo "<table>";
            echo "<tr>";
            echo "<th>Car ID</th>";
            echo "<th>Make</th>";
            echo "<th>Model</th>";
            echo "<th>Price</th>";
            echo "<th>Year of Manufacture (YOM)</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['car_id'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>$" . number_format($row['price']) . "</td>";
                echo "<td>" . $row['yom'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }
    ?>

</body>
</html>