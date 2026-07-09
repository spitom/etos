<?php
defined( 'ABSPATH' ) || exit;

$software = $args['software'] ?? array();
$hero     = $software['hero'] ?? array();

get_template_part(
    'template-parts/components/hero',
    'text',
    array(
        'kicker'  => $hero['kicker'] ?? '',
        'title'   => $hero['title'] ?? '',
        'lead'    => $hero['lead'] ?? '',
        'actions' => $hero['actions'] ?? array(),
    )
);