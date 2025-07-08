<?php

$message = $_GET['message'] ?? 'Something went wrong.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Error</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color:rgb(22,22,22);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-box {
            background-color: white;
            padding: 2rem 3rem;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .error-box h1 {
            font-size: 2rem;
            color: #d9534f;
            margin-bottom: 1rem;
        }

        .error-box p {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 1.5rem;
        }

        .error-box a {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .error-box a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>⚠ Error</h1>
        <p><?= htmlspecialchars($message) ?></p>
        <a href="/index.php">Return to Home</a>
    </div>
</body>
</html>
