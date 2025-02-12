<?php
$car_id = $_GET['car_id'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_data = [
        'car_id' => $car_id,
        'customer_name' => $_POST['customer_name'],
        'rental_days' => $_POST['rental_days'],
    ];
    // Make API request to book the car
    $response = file_get_contents('https://your-api-url.com/book?' . http_build_query($booking_data));
    $message = json_decode($response, true)['message'] ?? 'Booking failed!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Book Car</title>
</head>
<body>
    <header>
        <h1>Book Car</h1>
    </header>
    <main>
        <?php if (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="customer_name">Your Name:</label>
            <input type="text" id="customer_name" name="customer_name" required>
            <label for="rental_days">Rental Days:</label>
            <input type="number" id="rental_days" name="rental_days" required>
            <button type="submit">Confirm Booking</button>
        </form>
    </main>
</body>
</html>
