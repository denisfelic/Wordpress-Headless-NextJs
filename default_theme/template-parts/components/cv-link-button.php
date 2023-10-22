<?php

if (!isset($args['props'])) {
    return;
}

// validations
$title = isset($args['props']['title']) ? $args['props']['title'] : '';
$url = isset($args['props']['url']) ? $args['props']['url'] :  '';
$target = isset($args['props']['target']) ? $args['props']['target'] : '_self';
$id = isset($args['props']['id']) ? $args['props']['id'] : '';

// variants
$color =  isset($args['props']['color'])  &&  $args['props']['color'] == 'secondary' ? 'secondary' : 'primary';
$elementClass = isset($args['props']['elementClass']) ? $args['props']['elementClass'] : '';
// additional styles here
?>

<a id="<?php echo $id ?>" class="w-full flex text-center items-center justify-center no-underline  <?php echo $elementClass; ?>  <?php echo $color; ?>" title="<?php echo $title; ?> "  href="<?php echo $url; ?>" target="<?php echo $target; ?>" ><?php echo $title ?></a>