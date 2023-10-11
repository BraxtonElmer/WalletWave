<?php
session_start();
require 'sql.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["email"])) {
    $transactionType = $_POST["transactionType"];
    $amount = $_POST["amount"];
    $date = $_POST["transactionDate"];
    $bankAccount = $_POST["bankAccount"];
    $Email=$_SESSION["email"];

    // Insert transaction into the database
    $sql = "INSERT INTO transactions (transaction_type, amount, transaction_date, bank_account, user_email)
            VALUES ('$transactionType', '$amount', '$date', '$bankAccount', '$Email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: history");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Retrieve and display transaction history
    $historySql = "SELECT * FROM transactions WHERE user_id='$userId'";
    $result = $conn->query($historySql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>{$row['transaction_type']} - {$row['amount']} - {$row['transaction_date']} - {$row['bank_account']}</div>";
        }
    } else {
        echo "No transactions found.";
    }
} else {
    echo "Invalid request.";
}
$conn->close(); // Close the database connection
?>
