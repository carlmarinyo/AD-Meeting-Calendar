<?php
function footer(array $customJs = []): void
{
    foreach ($customJs as $js) {
        echo '<script src="' . htmlspecialchars($js) . '"></script>';
    }
    ?>
    </body>
    </html>
    <?php
}