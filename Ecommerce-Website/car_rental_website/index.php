<?php
// API URL for car rentals
$api_url = 'https://your-api-url.com/cars';
$cars = [];

// Fetch car data from the API
$response = file_get_contents($api_url);
if ($response) {
    $cars = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Car Rental Service</title>
</head>
<body>
    <header>
        <h1>Welcome to Car Rental Service</h1>
    </header>
    <main>
        <h2>Available Cars</h2>
        <div class="car-list">
            <?php foreach ($cars as $car): ?>
                <div class="car-item">
                    <h3><?php echo $car['make'] . ' ' . $car['model']; ?></h3>
                    <p>Price: $<?php echo $car['price']; ?>/day</p>
                    <a href="book.php?car_id=<?php echo $car['id']; ?>">Book Now</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
