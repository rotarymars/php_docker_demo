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
    
    echo "<h1>Database Connection Successful!</h1>";
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS test (
        id INT AUTO_INCREMENT PRIMARY KEY,
        message VARCHAR(255)
    )");
    
    $stmt = $pdo->prepare("INSERT INTO test (message) VALUES (?)");
    $currenttime = date('Y-m-d H:i:s');
    $stmt->execute(["Hello from PHP! at $currenttime"]);
    
    $stmt = $pdo->query("SELECT * FROM test");
    echo "<h2>Messages in database:</h2>";
    echo "<ul>";
    while ($row = $stmt->fetch()) {
        echo "<li>" . htmlspecialchars($row['message']) . "</li>";
    }
    echo "</ul>";
    
} catch(PDOException $e) {
    echo "<h1>Connection failed</h1>";
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?> 