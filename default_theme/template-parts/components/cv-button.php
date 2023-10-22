<?php

if (!isset($args['props'])) {
    return;
}

$title = isset($args['props']['title']) ? $args['props']['title'] : '';
$url = isset($args['props']['url']) ? $args['props']['url'] :  '';
$target = isset($args['props']['target']) ? $args['props']['target'] : '_self';
$id = isset($args['props']['id']) ? $args['props']['id'] : '';

$color =  isset($args['props']['color'])  &&  $args['props']['color'] == 'secondary' ? 'secondary' : 'primary';
// TODO: add design system button variants here

$elementClass = isset($args['props']['elementClass']) ? $args['props']['elementClass'] : '';

?>

<button id="<?php echo $id ?>" class="<?php echo $elementClass; ?> <?php echo $color ?>" href="<?php echo $url ?>" target="<?php echo $target; ?>"><?php echo $title ?></button>