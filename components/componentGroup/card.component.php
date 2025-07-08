<?php
function renderCard(string $title, string $description, string $imageUrl, string $link = ''): void
{
    ?>
    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 16px;
            max-width: 300px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin:15px;
        }

            ..card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        display: block;
        aspect-ratio: 5 / 3; /* forces consistent shape */
}

        .card h2 {
            font-size: 1.3rem;
            margin: 0;
            color: #222;
        }

        .card p {
            margin: 0;
            color: #555;
            font-size: 0.95rem;
        }

        .card a {
            margin-top: auto;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 0.95rem;
        }

        .card a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="card">
        <img src="<?= htmlspecialchars($imageUrl) ?>" alt="<?= htmlspecialchars($title) ?>">
        <h2><?= htmlspecialchars($title) ?></h2>
        <p><?= $description ?></p>
        <?php if ($link): ?>
            <a href="<?= htmlspecialchars($link) ?>">Go</a>
        <?php endif; ?>
    </div>
    <?php
}
?>
