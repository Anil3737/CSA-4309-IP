<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "restaurant"; // Corrected spelling

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $restaurant = isset($_POST['Restaurant']) ? $_POST['Restaurant'] : '';
    $time = isset($_POST['time']) ? $_POST['time'] : '';
    $number_of_guests = isset($_POST['Number_of_guests']) ? $_POST['Number_of_guests'] : '';
    $tables = isset($_POST['tables']) ? $_POST['tables'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $html_page_url = "followUs.html";
    $linked_word = "Thank you visit again";

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO table1 VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $date, $restaurant, $time, $number_of_guests, $tables, $username, $email);

    // Execute
    if ($stmt->execute()) {
        echo "<span class='success-message'>Booked successfully</span>";
        echo "<a href='$html_page_url'>$linked_word</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
