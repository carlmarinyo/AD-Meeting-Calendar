<?php
function renderMainLayout(callable $content, string $title, array $customJsCss = []): void
{
    head($title, $customJsCss['css'] ?? []);
    $content();
    footer($customJsCss['js'] ?? []);
}

?>