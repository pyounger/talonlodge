<?php

$CPF_CONFIG['VIEW']['SMARTY']['PAGER']['ORDERS'] = array(



    'backend_recipecategories-default' => array(

        'title'		=> 'App_Model_RecipeCategory',

        ),

    'backend_recipes-default' => array(

        'title'		=> 'App_Model_Recipe',

        ),

    'backend_testingcategories-default' => array(

        'title'     => 'App_Model_TestingCategory',

        ),

    'backend_testings-default' => array(

        'title'     => 'App_Model_Testing',

        ),

    'backend_accomodation-default' => array(
        'priority'  => 'App_Model_Accomodation',
        ),

    'backend_emailtemplates-default' => array(

        'title'		=> 'App_Model_EmailTemplate',

        ),

    'backend_layouts-default' => array(

        'title'		=> 'App_Model_Layout',

        ),



    'backend_messages-default' => array(

        'id'		=> 'App_Model_Message',

        ),

    'backend_help-default' => array(

        'id'        => 'App_Model_Help',

        ),

    'backend_reservations-default, backend_reservations-export' => array(

        'id'        => 'App_Model_Reservation',

        ),

    'backend_reservations-default' => array(

        'id'        => 'App_Model_Reservation',

        ),

    'backend_pages-default' => array(

        'id'		=> 'App_Model_Page',

        'title'		=> 'App_Model_Page',

        ),



    'backend_banners-default' => array(

        'priority'	=> 'App_Model_Banner',

        ),



    'backend_navigationelements-view' => array(

        'priority'	=> 'App_Model_NavigationMenuElement',

        'title'		=> 'App_Model_NavigationMenuElement',

        'key'		=> 'App_Model_NavigationMenuElement',

        ),



    'backend_navigation-default' => array(

        'id'		=> 'App_Model_NavigationMenu',

        'title'		=> 'App_Model_NavigationMenu',

        'key'		=> 'App_Model_NavigationMenu',

        ),



    'backend_reviews-default' => array(

        'priority'	=> 'App_Model_Review',

        ),



    'backend_facebook-default' => array(

        'priority'	=> 'App_Model_Facebook',

        ),



    'backend_twitter-default' => array(

        'priority'	=> 'App_Model_Twitter',

        ),



    'backend_users-default' => array(

        'login'		=> 'App_Model_User', //default order first

        'id'		=> 'App_Model_User',

        'name'		=> '{App_Model_User.name} ***, {App_Model_User.login}',

        'group'		=> '{App_Model_Group.title} ***, {App_Model_User.login}'

        ),



    'backend_groups-default' => array(		

        'title'			=> 'App_Model_Group', //default order first,

        'id'			=> 'App_Model_Group',

        'users_count' 	=> '`users_count`'

        ),

    );





    ?>