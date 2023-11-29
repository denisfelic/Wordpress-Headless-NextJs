<?php
// Note: This is a example block

//$image = get_field('imagem') ?: 'Your testimonial here...';

$title = get_field('title');
$description = get_field('description');

$safe_data = htmlspecialchars(json_encode(
    [
        'title' => $title,
        'description' => $description
    ],
    JSON_UNESCAPED_SLASHES
));

echo $safe_data;
?>
