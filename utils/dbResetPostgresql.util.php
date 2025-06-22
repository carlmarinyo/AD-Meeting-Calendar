<?php
declare(strict_types=1);


if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/../');
}

require BASE_PATH . 'vendor/autoload.php';

if (file_exists(BASE_PATH . 'bootstrap.php')) {
    require BASE_PATH . 'bootstrap.php';
}

require_once BASE_PATH . 'utils/envSetter.util.php';

echo "✅ Connected to PostgreSQL.\n";

// ——— Connect to PostgreSQL ———
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// ——— Apply schemas before truncating ———
echo "📦 Applying schema files...\n";
$schemaFiles = [
    'database/user.model.sql',
    'database/meetings.model.sql',
    'database/meeting_users.model.sql',
    'database/agenda.model.sql'
];

foreach ($schemaFiles as $file) {
    echo "📄 Applying $file...\n";
    $sql = file_get_contents($file);
    if ($sql === false) {
        throw new RuntimeException("❌ Could not read $file");
    }
    $pdo->exec($sql);
}

echo "🔁 Truncating tables…\n";
$tables = ['meeting_users', 'agenda', 'meetings', 'users'];
foreach ($tables as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}

echo "✅ Tables reset successfully.\n";