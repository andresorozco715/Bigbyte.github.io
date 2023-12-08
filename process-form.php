<?php
// Update these with your MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bigbyte_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$name = $_POST["name"];
$surname = $_POST["surname"];
$dob = $_POST["dob"];
$course = $_POST["course"];
$email = $_POST["email"];
$password = $_POST["password"];
$creditCard = $_POST["credit-card"];
$expiryDate = $_POST["expiry-date"];
$cvv = $_POST["cvv"];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO students (name, surname, dob, course, email, password, credit_card, expiry_date, cvv)
        VALUES ('$name', '$surname', '$dob', '$course', '$email', '$hashedPassword', '$creditCard', '$expiryDate', '$cvv')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.<br>";
    echo '<a href="web.html">Go to Home Page</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
