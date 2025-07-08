<?php
require_once __DIR__ . '/../../bootstrap.php';
require TEMPLATES_PATH . '/nav.component.php';
require_once UTILS_PATH . '/auth.util.php';

Auth::init();
if (!Auth::check()) {
    header('Location: /errors/login_failed.php');
    exit;
}
if (session_status() === PHP_SESSION_NONE) session_start();
navHeader();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>SUCCESS!!</h1>
    <form action="/handlers/auth.handler.php?action=logout" method="POST">
        <button type="submit">Logout</button>
    </form>
</body>
</html>