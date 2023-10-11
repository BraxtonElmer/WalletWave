<?php
session_start(); // Start the session

require 'sql.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["username"];
    $password = $_POST["password"];

    // Check whether the input is an email or a username
    if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        // If it's an email, query the database using email
        $query = "SELECT id, name, password, income, expense FROM users WHERE email='$Email'";
    }

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User found, verify the password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password is correct, set session variables and redirect to welcome page
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["name"];
            $_SESSION["income"] = $row["income"];
            $_SESSION["expense"] = $row["expense"];
            header("Location: dashboard"); // Redirect to the welcome page after successful login
        } else {
            // Password is incorrect, display error message
            $loginError = "Invalid password. Please try again.";
            echo 'pass wrong';
        }
    } else {
        // User not found, display error message
        $loginError = "User not found. Please check your username or email.";
        echo 'not foumd';
    }
}
else{
    echo 'error';
}
?>