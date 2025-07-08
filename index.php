<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <?php 
require_once 'bootstrap.php';
 $error = trim((string) ($_GET['error'] ?? ''));
$error = str_replace("%", " ", $error);
    ?>
    <div class="login-form">
        <form action="/handlers/auth.handler.php" method="POST">
        <label for="username" class="label">Username</label>
        <input id="username" name="username" type="text" required class="input">

        <label for="password" class="label">Password</label>
        <input id="password" name="password" type="password" required class="input">

        <input type="hidden" name="action" value="login">
        <button type="submit" class="button">Log In</button>

        <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
    </form>
    </div>
    
</body>
</html>