<?php

/**

 * Common Settings

 */

$CPF_CONFIG['APP']['UPLOADS']['PREFIX'] = 'tl';

$CPF_CONFIG['APP']['UPLOADS']['BACKEND']['PREVIEW']['WIDTH'] = '160';

$CPF_CONFIG['APP']['UPLOADS']['BACKEND']['PREVIEW']['HEIGHT'] = '120';


/*
    Accomodation
*/
    $CPF_CONFIG['APP']['ACCOMODATION']['URL'] = 'uploads/accomodation/';
    $CPF_CONFIG['APP']['ACCOMODATION']['PATH'] = CPF_ROOT_DIR . $CPF_CONFIG['APP']['ACCOMODATION']['URL'];
    $CPF_CONFIG['APP']['ACCOMODATION']['PREFIX'] = 'ac-';
    $CPF_CONFIG['APP']['ACCOMODATION']['WIDTH'] = '395';
    $CPF_CONFIG['APP']['ACCOMODATION']['HEIGHT'] = '364';
    $CPF_CONFIG['APP']['ACCOMODATION']['TYPES'] = array("image/jpeg", "image/gif", "image/png");

/*
    Accomodation
*/
    $CPF_CONFIG['APP']['DEMO']['URL'] = 'uploads/demos/';
    $CPF_CONFIG['APP']['DEMO']['PATH'] = CPF_ROOT_DIR . $CPF_CONFIG['APP']['DEMO']['URL'];
    $CPF_CONFIG['APP']['DEMO']['PREFIX'] = 'dm-';
    $CPF_CONFIG['APP']['DEMO']['WIDTH'] = '395';
    $CPF_CONFIG['APP']['DEMO']['HEIGHT'] = '364';
    $CPF_CONFIG['APP']['DEMO']['TYPES'] = array("image/jpeg", "image/gif", "image/png");
    
    
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

// testing

$CPF_CONFIG['APP']['TESTINGS']['URL'] = 'uploads/testings/';

$CPF_CONFIG['APP']['TESTINGS']['PATH'] = CPF_ROOT_DIR . $CPF_CONFIG['APP']['TESTINGS']['URL'];

$CPF_CONFIG['APP']['TESTINGS']['FULL_WIDTH'] = '1300';

$CPF_CONFIG['APP']['TESTINGS']['FULL_HEIGHT'] = '705';

$CPF_CONFIG['APP']['TESTINGS']['WIDTH'] = '300';

$CPF_CONFIG['APP']['TESTINGS']['HEIGHT'] = '168';

?>