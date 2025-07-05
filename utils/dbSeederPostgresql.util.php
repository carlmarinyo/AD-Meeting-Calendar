<?php
declare(strict_types=1);

require_once 'bootstrap.php';
require VENDORS_PATH . 'autoload.php';
require_once UTILS_PATH . 'envSetter.util.php';

//Static datas
$users = require_once DUMMIES_PATH . 'users.staticData.php';
$meetings = require_once DUMMIES_PATH . 'meetings.staticData';
$agenda = require_once DUMMIES_PATH . 'agenda.staticData';
$meeting_users = require_once DUMMIES_PATH . 'meeting_users.staticData';


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

//For query
$stmtUsers = $pdo->prepare("
    INSERT INTO users (username, role, first_name, last_name, password)
    VALUES (:username, :role, :fn, :ln, :pw)
");

$stmtMeetings = $pdo->prepare("
    INSERT INTO meetings (title, description, meeting_time, location, created_at)
    VALUES (:title, :desc, :meet_time, :loc, :cre_at)
");

$stmtAgenda = $pdo->prepare("
    INSERT INTO agenda (meeting_id, assigned_to, title, description, due_date, created_at)
    VALUES (:m_id, :ass_to, :title, :desc, :due, cre_at)
");

$stmtMeetingUsers = $pdo->prepare("
    INSERT INTO meeting_users (meeting_id,user_id, role)
    VALUES (:m_id, :u_id, :role)
");



echo "🔁 Truncating tables…\n";
$tables = ['meeting_users', 'agenda', 'meetings', 'users'];
foreach ($tables as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}

echo "✅ Tables reset successfully.\n";