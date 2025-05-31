<?php
$host = 'db';
$dbname = 'myapp';
$username = 'user';
$password = 'password';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $username,
        $password
    );
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create users table
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Insert a test user (password: test123)
    $stmt = $pdo->prepare("INSERT IGNORE INTO users (username, password) VALUES (?, ?)");
    $stmt->execute(['testuser', password_hash('test123', PASSWORD_DEFAULT)]);
    
    echo "Users table created and test user added successfully!";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 