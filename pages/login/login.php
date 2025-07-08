<?php
declare(strict_types=1);

// Load core first
require_once __DIR__ . '/../../bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once TEMPLATES_PATH . '/head.component.php';
require_once TEMPLATES_PATH . '/foot.component.php';
require_once LAYOUTS_PATH . '/main.layout.php';
require_once TEMPLATES_PATH . '/nav.component.php';
require_once COMPONENTS_PATH . '/card.component.php';

Auth::init();
if (session_status() === PHP_SESSION_NONE) session_start();

if (!Auth::check()) {
    header('Location: /errors/login_failed.error.php');
    exit;
}

$user = Auth::user();

renderMainLayout(function () {
    navHeader(); ?>

    <div class="card-container">
        <?php
        renderCard(
            "My Profile",
            "Manage your personal details and account preferences.",
            "./assets/img/profile.jpg",
            "/pages/profile.php"
        );

        renderCard(
            "Calendar",
            "View scheduled activities and stay on top of upcoming events or deadlines.",
            "./assets/img/calendar.jpg",
            "/pages/calendar.php"
        );

        renderCard(
            "Settings",
            "Adjust your preferences, update account information, and manage security options.",
            "./assets/img/settings.jpg",
            "/pages/settings.php"
        );
        ?>
    </div>

<?php }, "Dashboard", ['css' => ["./assets/css/login.css"]]); ?>
