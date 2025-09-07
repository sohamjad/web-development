<?php
$booking_id = $_GET['booking_id'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make API request to cancel the booking
    $response = file_get_contents('https://your-api-url.com/cancel?booking_id=' . $booking_id);
    $message = json_decode($response, true)['message'] ?? 'Cancellation failed!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cancel Booking</title>
</head>
<body>
    <header>
        <h1>Cancel Booking</h1>
    </header>
    <main>
        <?php if (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST">
            <p>Are you sure you want to cancel booking #<?php echo $booking_id; ?>?</p>
            <button type="submit">Confirm Cancellation</button>
        </form>
    </main>
</body>
</html>
