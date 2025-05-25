<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
        .error-container {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #e74c3c;
            font-size: 4rem;
            margin: 0;
        }
        p {
            color: #666;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <?php
        $requestedUrl = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $requesterip = $_SERVER['REMOTE_ADDR'];
        $requesteruseragent = $_SERVER['HTTP_USER_AGENT'];
        $requestcurrentscript = $_SERVER['SCRIPT_NAME'];
        echo "<p>You tried to access: " . htmlspecialchars($requestedUrl) . "</p>";
        echo "<p>Your IP address is: " . htmlspecialchars($requesterip) . "</p>";
        echo "<p>Your user agent is: " . htmlspecialchars($requesteruseragent) . "</p>";
        echo "<p>The current script is: " . htmlspecialchars($requestcurrentscript) . "</p>";
        ?>
    </div>
</body>
</html> 