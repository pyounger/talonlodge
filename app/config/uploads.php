<?php
/**
 * Common Settings
 */
$CPF_CONFIG['APP']['UPLOADS']['PREFIX'] = 'tl';
$CPF_CONFIG['APP']['UPLOADS']['BACKEND']['PREVIEW']['WIDTH'] = '160';
$CPF_CONFIG['APP']['UPLOADS']['BACKEND']['PREVIEW']['HEIGHT'] = '120';

/**
 * Banners Configuration
 */

$CPF_CONFIG['APP']['BANNERS']['URL'] = 'uploads/banners/';
$CPF_CONFIG['APP']['BANNERS']['PATH'] = CPF_ROOT_DIR . $CPF_CONFIG['APP']['BANNERS']['URL'];
$CPF_CONFIG['APP']['BANNERS']['PREFIX'] = 'tl-';
$CPF_CONFIG['APP']['BANNERS']['WIDTH'] = '300';
$CPF_CONFIG['APP']['BANNERS']['HEIGHT'] = '1200';
$CPF_CONFIG['APP']['BANNERS']['TYPES'] = array("image/jpeg", "image/gif", "image/png", "application/x-shockwave-flash");

/* Navigation */
$CPF_CONFIG['APP']['NAVIGATION']['URL'] = 'uploads/navigation/';
$CPF_CONFIG['APP']['NAVIGATION']['PATH'] = CPF_ROOT_DIR . $CPF_CONFIG['APP']['NAVIGATION']['URL'];

/* Recipes */
$CPF_CONFIG['APP']['RECIPES']['URL'] = 'uploads/recipes/';
$CPF_CONFIG['APP']['RECIPES']['PATH'] = CPF_ROOT_DIR . $CPF_CONFIG['APP']['RECIPES']['URL'];
$CPF_CONFIG['APP']['RECIPES']['FULL_WIDTH'] = '1300';
$CPF_CONFIG['APP']['RECIPES']['FULL_HEIGHT'] = '705';
$CPF_CONFIG['APP']['RECIPES']['WIDTH'] = '300';
$CPF_CONFIG['APP']['RECIPES']['HEIGHT'] = '168';
?>