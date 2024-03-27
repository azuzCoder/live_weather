<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Weather</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/rainy.png" type="image/x-icon"/>
</head>
<body>
<h1><?php echo $_GET['temp'] ?></h1>
    <div class="card">
        <div class="search">
            <input type="text" placeholder="Enter city name" spellcheck="false">
            <button><img src="images/search.png" alt="searchPhoto"></button>
        </div>
        <div class="error">
            <p>Error city name</p>
        </div>
        <div class="weather" style="display: <?php if(empty($_GET)) echo "none"; else echo "block" ?>">
            <img src="<?php echo $_GET['back_src'] ?>" alt="weatherIcon" class="weather-icon">
            <h1 class="temperature"><?php echo $_GET['temp'] ?>°C</h1>
            <h2 class="city"><?php echo $_GET['city'] ?></h2>
            <div class="details">
                <div class="column">
                    <img src="images/PressureThermometer.png" alt="HumidityIcon">
                    <div>
                        <p class="pressure"><?php echo $_GET['pressure'] ?> hPA</p>
                        <p>Pressure</p>
                    </div>
                </div>
                <div class="column">
                    <img src="images/wind.png" alt="windIcon">
                    <div>
                        <p class="wind"><?php echo $_GET['wind'] ?> km/h</p>
                        <p>Wind Speed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>
