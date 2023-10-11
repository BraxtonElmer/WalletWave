<?php
session_start();
require 'sql.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["email"])) {
    $desc = $_POST["desc"];
    $amount = $_POST["amount"];
    $date = $_POST["date"];
    $category = $_POST["category"];
    $Email=$_SESSION["email"];

    // Insert transaction into the database
    $sql = "INSERT INTO reminder (user_email, category, amount, description, datelas)
            VALUES ('$Email', '$category', '$amount', '$desc','$date')";

    if ($conn->query($sql) === TRUE) {
        header("Location: reminder");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    echo "Invalid request.";
}
$conn->close(); // Close the database connection
?>
