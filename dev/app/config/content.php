<?php
/**
 * Common Settings
 */
$CPF_CONFIG['APP']['CONTENT']['PAGE_TYPES'] = array('content', 'component');
$CPF_CONFIG['APP']['CONTENT']['CONTENT_TYPES'] = array('blocks', 'images', 'videos', 'galleries');
$CPF_CONFIG['APP']['CONTENT']['COMPONENTS'] = array(
    'main_page' => array(
        'route' => 'frontend_index'
    ),
    'contacts' => array(
        'route' => 'frontend_contacts'
    ),
    'brochure' => array(
        'route' => 'frontend_brochure'
    ),
    'reservation' => array(
        'route' => 'frontend_reservation'
    ),
    'gallery' => array(
        'route' => 'frontend_gallery'
    ),
    'recipes' => array(
        'route' => 'frontend_recipes'
    ),
);
?>