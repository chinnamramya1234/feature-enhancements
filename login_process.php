<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "task4");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM customers WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Check if the entered password matches the stored password (plaintext for admin)
        
        if ($row['role'] === 'customer' && password_verify($password, $row['password'])) {
            echo "customer";
        } elseif ($row['role'] === 'Admin' && $password === $row['password']) {
            echo "Admin";
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "Invalid username.";
    }
    $conn->close();
}
?>