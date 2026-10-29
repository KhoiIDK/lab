<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
    <?php
        // Extract personal details safely
        $firstname = isset($_POST["firstname"]) ? htmlspecialchars($_POST["firstname"]) : "";
        $lastname  = isset($_POST["lastname"])  ? htmlspecialchars($_POST["lastname"])  : "";
        $age       = isset($_POST["age"])       ? htmlspecialchars($_POST["age"])       : "";
        
        // Map species radio button values (M, D, E, H) to full names
        $species_code = isset($_POST["species"]) ? $_POST["species"] : "";
        switch ($species_code) {
            case "M": $species = "Human"; break;
            case "D": $species = "Dwarf"; break;
            case "E": $species = "Elf"; break;
            case "H": $species = "Hobbit"; break;
            default:  $species = "Unknown"; break;
        }

        // Collect selected booking checkboxes (accom, 4day, 10day)
        $tours = array();
        if (isset($_POST["accom"])) {
            $tours[] = "One-day tour";
        }
        if (isset($_POST["4day"])) {
            $tours[] = "Four-day tour";
        }
        if (isset($_POST["10day"])) {
            $tours[] = "Ten-day tour";
        }
        $tour_string = !empty($tours) ? implode(" and ", $tours) : "No tour selected";

        // Extract trip preferences
        $food      = isset($_POST["food"])      ? htmlspecialchars($_POST["food"])      : "";
        $partysize = isset($_POST["partysize"]) ? htmlspecialchars($_POST["partysize"]) : "";

        // Display output matching the lab target layout
        echo "<p>Welcome $firstname $lastname !</p>";
        echo "<p>You are now booked on the $tour_string</p>";
        echo "<p>Species: $species</p>";
        echo "<p>Age: $age</p>";
        echo "<p>Meal Preference: $food</p>";
        echo "<p>Number of travellers: $partysize</p>";
    ?>
</body>
</html>