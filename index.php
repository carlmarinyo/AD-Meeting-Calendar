<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once TEMPLATES_PATH . '/head.component.php';
require_once TEMPLATES_PATH . '/foot.component.php';
require_once LAYOUTS_PATH . '/main.layout.php';

$error = trim((string) ($_GET['error'] ?? ''));
$error = str_replace("%", " ", $error);

renderMainLayout(function () use ($error) {
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
<?php
}, "Login", ['css' => ["/assets/css/style.css"]]);
