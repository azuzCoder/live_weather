<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather App</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $city = $_GET['city'];
    $temp = $_GET['temp'];
    $pressure = $_GET['pressure'];
    $wind = $_GET['wind'];
    $back_src = $_GET['back_src'];

    try {
        require_once "connection.php";

        $query = "INSERT INTO live_data (city, temp, pressure, wind_speed) VALUES (?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$city, $temp, $pressure, $wind]);

        $pdo = null;
        $stmt = null;

        $url = "index.php?city=" . $city . "&temp=" . $temp . "&pressure=" . $pressure . "&wind=" . $wind . "&back_src=" . $back_src;

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ./index.php");
}

?>

<script>
    // header("Location: ./index.php?city=" . $city . "&temp=" . $temp . "&humidity=" . $humidity . "&wind_speed=" . $wind_speed . "&description=" . $description . "&image_src=" . $image_src, false);
    console.log('ishla')
    window.location.href="<?php echo $url ?>"
</script>
</body>
</html>