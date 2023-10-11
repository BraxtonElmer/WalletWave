<?php
session_start();
require 'sql.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["email"])) {
    $transactionType = $_POST["transactionType"];
    $amount = $_POST["amount"];
    $date = $_POST["transactionDate"];
    $bankAccount = $_POST["bankAccount"];
    $userEmail = $_SESSION["email"];

    // Insert transaction into the transactions table
    $transactionSql = "INSERT INTO transactions (transaction_type, amount, transaction_date, bank_account, user_email)
            VALUES ('$transactionType', '$amount', '$date', '$bankAccount', '$userEmail')";

    if ($conn->query($transactionSql) === TRUE) {
        // Update user's expense or income based on the transaction type
        $userSql = "";
        if ($transactionType == "Expense") {
            $userSql = "UPDATE users SET expense = expense + $amount WHERE email = '$userEmail'";
        } elseif ($transactionType == "Income") {
            $userSql = "UPDATE users SET income = income + $amount WHERE email = '$userEmail'";
        }

        if ($conn->query($userSql) === TRUE) {
            header("Location: history");
        } else {
            echo "Error updating user's data: " . $conn->error;
        }
    } else {
        echo "Error adding transaction: " . $conn->error;
    }

    // Retrieve and display transaction history
    $historySql = "SELECT * FROM transactions WHERE user_email='$userEmail'";
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
