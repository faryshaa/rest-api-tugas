<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection configuration
    $host = 'localhost';
    $db = 'restapi';
    $user = 'root';
    $pass = '';

    // Create a new PDO instance
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);

        // Perform user registration
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);

        // Optionally, display a success message or redirect to a success page
        echo "User registered successfully!";
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }
}
?>
