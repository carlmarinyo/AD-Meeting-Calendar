<?php
require_once __DIR__ . '/../../bootstrap.php';
require TEMPLATES_PATH . '/nav.component.php';
require COMPONENTS_PATH . '/card.component.php';
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
    <link rel="stylesheet" href="assets/css/login.css" />
</head>
<body>
        <div class="card-container">
    <?php
    renderCard(
    "My Profile",
    "Manage your personal details and account preferences.",
    "./assets/img/profile.jpg",
    "/pages/login.php"
);  
    renderCard(
    "Calendar",
    "View scheduled activities and stay on top of upcoming events or deadlines.",
    "./assets/img/calendar.jpg",
    "/pages/login.php"
);  
    renderCard(
    "Settings",
    "Adjust your preferences, update account information, and manage security options.",
    "./assets/img/settings.jpg",
    "/pages/login.php"
);  
    ?>
       </div>
</body>
</html>