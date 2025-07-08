<?php
function navHeader(): void
{
    $user = $_SESSION['user'] ?? null;
    ?>
    <header>
        <nav>
            <ul>
                <div style="display: flex; align-items: center;">
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/pages/gallery/index.php">Gallery</a></li>
                    <li><a href="/pages/profile.php">Profile</a></li>
                    <li><a href="/pages/settings.php">Settings</a></li>
                    <li>
                        <form class="logout-form" action="/handlers/auth.handler.php?action=logout" method="POST">
                            <button type="submit">Logout</button>
                        </form
                    </li>
                </div>

                <?php if ($user): ?>
                    <li class="user-info">
                        Logged in as: <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>
                        (<?= htmlspecialchars($user['role']) ?>)
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>


    <style>
        form.logout-form {
    margin: 0;
}

        form.logout-form button {
            background: none;
            border: none;
            color: white;
            font: inherit;
            cursor: pointer;
            padding: 0;
            text-decoration: underline;
        }

        form.logout-form button:hover {
            text-decoration: none;
        }

        header {
             background-color: #007bff;
            color: white;
            padding: 15px 20px;
            font-family: Arial, sans-serif;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav li {
            margin: 0 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .user-info {
            font-size: 0.9em;
        }
    </style>
    <?php
}
?>
