<?php

/**

 * Routes configuration

 * 

 * REGEXP part is inserted before 'default' (backend) route, REGEXP_AFTER -- after it.

 * 

 * @package app-start

 * @subpackage Config

 */

$CPF_CONFIG['URL']['ROUTES']['REGEXP'] = array(



    //home page

    'frontend_index' => array(

        'rule' => '',

        'controller' => 'frontend_index',

        'reverse' => ''

        ),



    // cron

    'frontend_cron' => array(

        'rule' => 'cron\/(.*)',

        'controller' => 'frontend_cron',

        'reverse' => 'cron/'

        ),



    // contacts

    'frontend_contacts' => array(

        'rule' => 'contacts\/(.*)',

        'controller' => 'frontend_contacts',

        'reverse' => 'contacts/'

        ),



    // brochure

    'frontend_brochure' => array(

        'rule' => 'brochure\/(.*)',

        'controller' => 'frontend_brochure',

        'reverse' => 'brochure/'

        ),

    'frontend_cities' => array(

        'rule' => 'cities\/(?P<id>[0-9]*?)\/',

        'controller' => 'frontend_brochure',

        'action' => 'get_cities',

        'reverse' => 'cities/%d/'

        ),



    // reservation

    'frontend_reservation_update' => array(

        'rule' => 'reservation\/update\/(.+)?',

        'controller' => 'frontend_reservation',

        'action' => 'update',

        'reverse' => 'reservation/update/'

        ),

    'frontend_reservation_view' => array(

        'rule' => 'reservation\/(?P<slug>[a-zA-Z0-9\/\-_]*?)\/(.+)?',

        'controller' => 'frontend_reservation',

        'action' => 'view',

        'reverse' => 'reservation/%s/'

        ),

    

    'frontend_reservation' => array(

        'rule' => 'reservation\/(.*)',

        'controller' => 'frontend_reservation',

        'reverse' => 'reservation/'

        ),



    // banners

    'frontend_banners' => array(

        'rule' => 'banner\/(?P<id>\d+)\/?',

        'controller' => 'frontend_banners',

        'reverse' => 'banner/%d/'

        ),



    // captcha

    'frontend_captcha' => array(

        'rule' => '',

        'controller' => 'frontend_index',

        'reverse' => 'captcha/%d/'

        ),



    // gallery

    'frontend_gallery_view' => array(

        'rule' => 'gallery\/(?P<id>\d+)\/?',

        'controller' => 'frontend_gallery',

        'action' => 'view',

        'reverse' => 'gallery/%d/'

        ),

    'frontend_gallery' => array(

        'rule' => 'gallery\/',

        'controller' => 'frontend_gallery',

        'reverse' => 'gallery/'

        ),






    //sitemap

    'frontend_sitemap_xml' => array(

        'rule' => 'sitemap\.xml\/?',

        'controller' => 'frontend_sitemap',

        'action' => 'xml',

        'reverse' => 'sitemap.xml/'

        ),



	// recipes

    'frontend_recipes_view' => array(

        'rule' => 'recipe\-finder\/(?P<id>[0-9]*?)\-(?P<slug>[a-zA-Z0-9\/\-_]*?)\/(.+)?',

        'controller' => 'frontend_recipes',

        'action' => 'view',

        'reverse' => 'recipe-finder/%d-%s/'

        ),

    'frontend_recipes' => array(

        'rule' => 'recipe\-finder\/(.*)',

        'controller' => 'frontend_recipes',

        'reverse' => 'recipe-finder/'

        ),





    );



$CPF_CONFIG['URL']['ROUTES']['REGEXP_AFTER'] = array(

    'frontend_page' => array(

        'rule' => '(?P<slug>[a-zA-Z0-9\/\-_\.]*?)\/?',

        'controller' => 'frontend_pages',

        'reverse' => '%s/'

        ),

    );




    ?>