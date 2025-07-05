<?php
declare(strict_types=1);

require_once 'bootstrap.php';
require VENDORS_PATH . 'autoload.php';
require_once UTILS_PATH . 'envSetter.util.php';

//Static datas
$users = require_once DUMMIES_PATH . 'user.staticData.php';
$meetings = require_once DUMMIES_PATH . 'meetings.staticData.php';
$agenda = require_once DUMMIES_PATH . 'agenda.staticData.php';
$meeting_users = require_once DUMMIES_PATH . 'meeting_users.staticData.php';


echo "✅ Connected to PostgreSQL.\n";
// ——— Connect to PostgreSQL ———
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// ——— Apply schemas before truncating ———
echo "📦 Applying schema files...\n";
$schemaFiles = [
    'database/users.model.sql',
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
    INSERT INTO users (first_name, middle_name, last_name, password, username, role)
    VALUES (:fn, :mn, :ln, :pw, :user, :role)
");

$stmtMeetings = $pdo->prepare("
    INSERT INTO meetings (title, description, meeting_time, location, created_at)
    VALUES (:title, :desc, :meet_time, :loc, :cre_at)
");

$stmtAgenda = $pdo->prepare("
    INSERT INTO agenda (meeting_id, assigned_to, title, description, due_date, created_at)
    VALUES (:m_id, :ass_to, :title, :desc, :due, :cre_at)
");

$stmtMeetingUsers = $pdo->prepare("
    INSERT INTO meeting_users (meeting_id,user_id, role)
    VALUES (:m_id, :u_id, :role)
");


echo "🔁 Seeding Users\n";
try {
    foreach ($users as $u) {
        $stmtUsers->execute([
            ':fn' => $u['first_name'],
            ':mn' => $u['middle_name'],
            ':ln' => $u['last_name'],
            ':pw' => password_hash($u['password'], PASSWORD_DEFAULT),
            ':ln' => $u['username'],
            ':ln' => $u['role'],
        ]);
    }
} catch (PDOException $e) {
    echo "❌ Error seeding users: " . $e->getMessage() . "\n";
    $allSeeded = false;
}

echo "🔁 Seeding Meetings\n";
try {
    foreach ($meetings as $m) {
        $stmtMeetings->execute([
            ':title' => $m['title'],
            ':desc' => $m['description'],
            ':meeting_time' => $m['meeting_time'],
            ':loc' => $m['location'],
            ':cre_at' => $m['created_at'],
        ]);
    }
} catch (PDOException $e) {
    echo "❌ Error seeding meetings: " . $e->getMessage() . "\n";
    $allSeeded = false;
}

echo "🔁 Seeding Agenda\n";
try {
    foreach ($agenda as $t) {
        $stmtAgenda->execute([
            ':m_id' => $t['meeting_id'],
            ':ass_to' => $t['assigned_to'],
            ':title' => $t['title'],
            ':desc' => $t['description'],
            ':due' => $t['due_date'],
            ':cre_at' => $t['created_at'],
        ]);
    }
} catch (PDOException $e) {
    echo "❌ Error seeding tasks: " . $e->getMessage() . "\n";
    $allSeeded = false;
}


echo "🔁 Seeding Meeting Users\n";
try {
    foreach ($meeting_users as $mu) {
        $stmtMeet_Usr->execute([
            ':m_id' => $mu['meeting_id'],
            ':u_id' => $mu['user_id'],
            ':role' => $mu['role'],
        ]);
    }
} catch (PDOException $e) {
    echo "❌ Error seeding meeting_users: " . $e->getMessage() . "\n";
    $allSeeded = false;
}

if ($allSeeded) {
    echo "✅ Tables have been populated!\n";
}