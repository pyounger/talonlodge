<?php
$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Accomodation'] = array(
	'table' => 'accomodation',
	'props' => array(
		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),
		'title' => array('title', 'varchar'),
		'description' => array('description', 'text'),
		'one_bedroom_description' => array('one_bedroom_description', 'text'),
		'two_bedroom_description' => array('two_bedroom_description', 'text'),
		'main_image' => array('main_image', 'varchar'),
		'one_bedroom_image' => array('one_bedroom_image', 'varchar'),
		'two_bedroom_image' => array('two_bedroom_image', 'varchar'),
		'one_bedroom_small_image' => array('one_bedroom_small_image', 'varchar'),
		'two_bedroom_small_image' => array('two_bedroom_small_image', 'varchar'),
		'one_bedroom_popup_description' => array('one_bedroom_popup_description', 'text'),
		'two_bedroom_popup_description' => array('two_bedroom_popup_description', 'text'),
		'one_popup_image_description' => array('one_popup_image_description', 'text'),
		'two_popup_image_description' => array('two_popup_image_description', 'text'),
		'priority' => array('priority', 'int'),
		'is_published' => array('is_published', 'int', array('default' => '0')),
		'one_bedroom_title' => array('one_bedroom_title', 'varchar'),
		'two_bedroom_title' => array('two_bedroom_title', 'varchar'),
		'one_popup' => array('one_popup', 'int', array('default' => '0')),
		'two_popup' => array('two_popup', 'int', array('default' => '0')),
		'main_image_alt' => array('main_image_alt', 'varchar'),
		'one_bedroom_image_alt' => array('one_bedroom_image_alt', 'varchar'),
		'two_bedroom_image_alt' => array('two_bedroom_image_alt', 'varchar'),
		'one_bedroom_small_image_alt' => array('one_bedroom_small_image_alt', 'varchar'),
		'two_bedroom_small_image_alt' => array('two_bedroom_small_image_alt', 'varchar'),
		'url_one' => array('url_one', 'varchar'),
		'url_two' => array('url_two', 'varchar')
		),
	'associations' => array(),
	'resources' => array(
		'id' => t('tables.accomodation.id'),
		'title' => t('tables.accomodation.title'),
		'description' => t('tables.accomodation.description'),
		'one_bedroom_description' => t('tables.accomodation.one_bedroom_description'),
		'two_bedroom_description' => t('tables.accomodation.two_bedroom_description'),
		'main_image' => t('tables.accomodation.main_image'),
		'one_bedroom_image' => t('tables.accomodation.one_bedroom_image'),
		'two_bedroom_image' => t('tables.accomodation.two_bedroom_image'),
		'one_bedroom_small_image' => t('tables.accomodation.one_bedroom_small_image'),
		'two_bedroom_small_image' => t('tables.accomodation.two_bedroom_small_image'),
		'one_bedroom_popup_description' => t('tables.accomodation.one_bedroom_popup_description'),
		'two_bedroom_popup_description' => t('tables.accomodation.two_bedroom_popup_description'),
		'one_popup_image_description' => t('tables.accomodation.one_popup_image_description'),
		'two_popup_image_description' => t('tables.accomodation.two_popup_image_description'),
		'priority' => t('tables.accomodation.priority'),
		'is_published' => t('tables.accomodation.is_published'),
		'one_bedroom_title' => t('tables.accomodation.one_bedroom_title'),
		'two_bedroom_title' => t('tables.accomodation.two_bedroom_title'),
		'one_popup' => t('tables.accomodation.one_popup'),
		'two_popup' => t('tables.accomodation.two_popup'),
		'main_image_alt' => t('tables.accomodation.main_image_alt'),
		'one_bedroom_image_alt' => t('tables.accomodation.one_bedroom_image_alt'),
		'two_bedroom_image_alt' => t('tables.accomodation.two_bedroom_image_alt'),
		'one_bedroom_small_image_alt' => t('tables.accomodation.one_bedroom_small_image_alt'),
		'two_bedroom_small_image_alt' => t('tables.accomodation.two_bedroom_small_image_alt'),
		'url_one' => t('tables.accomodation.url_one'),
		'url_two' => t('tables.accomodation.url_two')
		),
	'html_fields' => array('text', 'content'),
	);
$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Banner'] = array(

	'table' => 'banners',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'start_date' => array('start_date', 'datetime'),

		'finish_date' => array('finish_date', 'datetime'),

		'priority' => array('priority', 'int'),

		'is_published' => array('is_published', 'int', array('default' => '0')),

		'shows_count' => array('shows_count', 'int', array('default' => '0')),

		'clicks_count' => array('clicks_count', 'int', array('default' => '0')),

		'filename' => array('filename', 'varchar'),

		'extension' => array('extension', 'varchar'),

		'url' => array('url', 'varchar'),

		'flag' => array('flag', 'int', array('default' => '0')),

		'last_show_date' => array('last_show_date', 'datetime')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.banners.id'),

		'title' => t('tables.banners.title'),

		'start_date' => t('tables.banners.start_date'),

		'finish_date' => t('tables.banners.finish_date'),

		'priority' => t('tables.banners.priority'),

		'is_published' => t('tables.banners.is_published'),

		'shows_count' => t('tables.banners.shows_count'),

		'clicks_count' => t('tables.banners.clicks_count'),

		'filename' => t('tables.banners.filename'),

		'extension' => t('tables.banners.extension'),

		'url' => t('tables.banners.url'),

		'flag' => t('tables.banners.flag'),

		'last_show_date' => t('tables.banners.last_show_date')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_BannersVisit'] = array(

	'table' => 'banners_visits',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'month' => array('month', 'date'),

		'banner_id' => array('banner_id', 'int'),

		'shows' => array('shows', 'int'),

		'clicks' => array('clicks', 'int')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.banners_visits.id'),

		'month' => t('tables.banners_visits.month'),

		'banner_id' => t('tables.banners_visits.banner_id'),

		'shows' => t('tables.banners_visits.shows'),

		'clicks' => t('tables.banners_visits.clicks')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Block'] = array(

	'table' => 'blocks',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'content' => array('content', 'text'),

		'is_html' => array('is_html', 'int', array('default' => '0')),

		'classname' => array('classname', 'varchar'),

		'parent_id' => array('parent_id', 'int'),

		'priority' => array('priority', 'int')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.blocks.id'),

		'title' => t('tables.blocks.title'),

		'content' => t('tables.blocks.content'),

		'is_html' => t('tables.blocks.is_html'),

		'classname' => t('tables.blocks.classname'),

		'parent_id' => t('tables.blocks.parent_id'),

		'priority' => t('tables.blocks.priority')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_City'] = array(

	'table' => 'cities',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true)),

		'city_name' => array('city_name', 'varchar'),

		'longitude' => array('longitude', 'varchar'),

		'latitude' => array('latitude', 'varchar'),

		'province_id' => array('province_id', 'int'),

		'province_name' => array('province_name', 'varchar'),

		'country_id' => array('country_id', 'int'),

		'country_name' => array('country_name', 'varchar')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.cities.id'),

		'city_name' => t('tables.cities.city_name'),

		'longitude' => t('tables.cities.longitude'),

		'latitude' => t('tables.cities.latitude'),

		'province_id' => t('tables.cities.province_id'),

		'province_name' => t('tables.cities.province_name'),

		'country_id' => t('tables.cities.country_id'),

		'country_name' => t('tables.cities.country_name')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_EmailTemplate'] = array(

	'table' => 'email_templates',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'subject' => array('subject', 'varchar'),

		'body' => array('body', 'text'),

		'variables' => array('variables', 'text'),

		'code' => array('code', 'varchar'),

		'values' => array('values', 'text')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.email_templates.id'),

		'title' => t('tables.email_templates.title'),

		'subject' => t('tables.email_templates.subject'),

		'body' => t('tables.email_templates.body'),

		'variables' => t('tables.email_templates.variables'),

		'code' => t('tables.email_templates.code'),

		'values' => t('tables.email_templates.values')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Facebook'] = array(

	'table' => 'facebook',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'content' => array('content', 'text'),

		'key' => array('key', 'varchar'),

		'date' => array('date', 'date'),

		'priority' => array('priority', 'int'),

		'is_published' => array('is_published', 'int', array('default' => '0'))

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.facebook.id'),

		'title' => t('tables.facebook.title'),

		'content' => t('tables.facebook.content'),

		'key' => t('tables.facebook.key'),

		'date' => t('tables.facebook.date'),

		'priority' => t('tables.facebook.priority'),

		'is_published' => t('tables.facebook.is_published')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_FacebookToken'] = array(

	'table' => 'facebook_tokens',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'token' => array('token', 'varchar'),

		'datetime' => array('datetime', 'datetime')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.facebook_tokens.id'),

		'token' => t('tables.facebook_tokens.token'),

		'datetime' => t('tables.facebook_tokens.datetime')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Gallery'] = array(

	'table' => 'galleries',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'content_type' => array('content_type', 'varchar'),

		'description' => array('description', 'text'),

		'parent_id' => array('parent_id', 'int'),

		'priority' => array('priority', 'int'),

		'settings' => array('settings', 'text'),

		'video_settings' => array('video_settings', 'text'),

		'classname' => array('classname', 'varchar'),

		'cover' => array('cover', 'text'),

		'is_published' => array('is_published', 'int', array('default' => '0')),

		'page_id' => array('page_id', 'int'),

		'text_position' => array('text_position', 'varchar'),

		'type_id' => array('type_id', 'int')

		),

	'associations' => array(array('many-to-one', 'App_Model_GalleryType', array('key'=>'type_id'))),

	'resources' => array(

		'id' => t('tables.galleries.id'),

		'title' => t('tables.galleries.title'),

		'content_type' => t('tables.galleries.content_type'),

		'description' => t('tables.galleries.description'),

		'parent_id' => t('tables.galleries.parent_id'),

		'priority' => t('tables.galleries.priority'),

		'settings' => t('tables.galleries.settings'),

		'video_settings' => t('tables.galleries.video_settings'),

		'classname' => t('tables.galleries.classname'),

		'cover' => t('tables.galleries.cover'),

		'is_published' => t('tables.galleries.is_published'),

		'page_id' => t('tables.galleries.page_id'),

		'text_position' => t('tables.galleries.text_position'),

		'type_id' => t('tables.galleries.type_id')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_GalleryType'] = array(

	'table' => 'gallery_types',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'image_settings' => array('image_settings', 'text'),

		'video_settings' => array('video_settings', 'text'),

		'display_type' => array('display_type', 'varchar')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.gallery_types.id'),

		'title' => t('tables.gallery_types.title'),

		'image_settings' => t('tables.gallery_types.image_settings'),

		'video_settings' => t('tables.gallery_types.video_settings'),

		'display_type' => t('tables.gallery_types.display_type')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_LayoutElement'] = array(

	'table' => 'layout_elements',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'layout_id' => array('layout_id', 'int'),

		'page_id' => array('page_id', 'int'),

		'element_type' => array('element_type', 'int'),

		'element_id' => array('element_id', 'int'),

		'layout_position' => array('layout_position', 'varchar'),

		'priority' => array('priority', 'int')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.layout_elements.id'),

		'layout_id' => t('tables.layout_elements.layout_id'),

		'page_id' => t('tables.layout_elements.page_id'),

		'element_type' => t('tables.layout_elements.element_type'),

		'element_id' => t('tables.layout_elements.element_id'),

		'layout_position' => t('tables.layout_elements.layout_position'),

		'priority' => t('tables.layout_elements.priority')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Layout'] = array(

	'table' => 'layouts',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'template_name' => array('template_name', 'varchar'),

		'settings' => array('settings', 'text'),

		'placeholders' => array('placeholders', 'text'),

		'grid' => array('grid', 'text'),

		'freestyle' => array('freestyle', 'int', array('default' => '0')),

		'is_default' => array('is_default', 'int', array('default' => '0')),

		'is_template' => array('is_template', 'int', array('default' => '0'))

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.layouts.id'),

		'title' => t('tables.layouts.title'),

		'template_name' => t('tables.layouts.template_name'),

		'settings' => t('tables.layouts.settings'),

		'placeholders' => t('tables.layouts.placeholders'),

		'grid' => t('tables.layouts.grid'),

		'freestyle' => t('tables.layouts.freestyle'),

		'is_default' => t('tables.layouts.is_default'),

		'is_template' => t('tables.layouts.is_template')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Message'] = array(

	'table' => 'messages',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'datetime' => array('datetime', 'datetime'),

		'first_name' => array('first_name', 'varchar'),

		'last_name' => array('last_name', 'varchar'),

		'email' => array('email', 'varchar'),

		'message' => array('message', 'text'),

		'ip' => array('ip', 'varchar')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.messages.id'),

		'datetime' => t('tables.messages.datetime'),

		'first_name' => t('tables.messages.first_name'),

		'last_name' => t('tables.messages.last_name'),

		'email' => t('tables.messages.email'),

		'message' => t('tables.messages.message'),

		'ip' => t('tables.messages.ip')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_NavigationMenuElement'] = array(

	'table' => 'navigation_menu_elements',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'menu_id' => array('menu_id', 'int'),

		'parent_id' => array('parent_id', 'int', array('default' => '0')),

		'title' => array('title', 'varchar'),

		'type' => array('type', 'varchar'),

		'url' => array('url', 'varchar'),

		'target' => array('target', 'varchar'),

		'attributes' => array('attributes', 'varchar'),

		'slug' => array('slug', 'varchar'),

		'priority' => array('priority', 'int'),

		'page_id' => array('page_id', 'int'),

		'component' => array('component', 'varchar'),

		'filename' => array('filename', 'varchar'),

		'extension' => array('extension', 'varchar'),

		'is_published' => array('is_published', 'int', array('default' => '0'))

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.navigation_menu_elements.id'),

		'menu_id' => t('tables.navigation_menu_elements.menu_id'),

		'parent_id' => t('tables.navigation_menu_elements.parent_id'),

		'title' => t('tables.navigation_menu_elements.title'),

		'type' => t('tables.navigation_menu_elements.type'),

		'url' => t('tables.navigation_menu_elements.url'),

		'target' => t('tables.navigation_menu_elements.target'),

		'attributes' => t('tables.navigation_menu_elements.attributes'),

		'slug' => t('tables.navigation_menu_elements.slug'),

		'priority' => t('tables.navigation_menu_elements.priority'),

		'page_id' => t('tables.navigation_menu_elements.page_id'),

		'component' => t('tables.navigation_menu_elements.component'),

		'filename' => t('tables.navigation_menu_elements.filename'),

		'extension' => t('tables.navigation_menu_elements.extension'),

		'is_published' => t('tables.navigation_menu_elements.is_published')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_NavigationMenu'] = array(

	'table' => 'navigation_menus',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'key' => array('key', 'varchar'),

		'has_em' => array('has_em', 'int', array('default' => '0')),

		'use_background_image' => array('use_background_image', 'int', array('default' => '0')),

		'is_dropdown' => array('is_dropdown', 'int', array('default' => '0')),

		'attributes' => array('attributes', 'text')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.navigation_menus.id'),

		'title' => t('tables.navigation_menus.title'),

		'key' => t('tables.navigation_menus.key'),

		'has_em' => t('tables.navigation_menus.has_em'),

		'use_background_image' => t('tables.navigation_menus.use_background_image'),

		'is_dropdown' => t('tables.navigation_menus.is_dropdown'),

		'attributes' => t('tables.navigation_menus.attributes')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Package'] = array(

	'table' => 'packages',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'Pms_Package_ID' => array('Pms_Package_ID', 'int'),

		'Account_ID' => array('Account_ID', 'int'),

		'Package_Name' => array('Package_Name', 'varchar'),

		'Arrival_Start_Date' => array('Arrival_Start_Date', 'datetime'),

		'Arrival_End_Date' => array('Arrival_End_Date', 'datetime'),

		'Package_Min_Days' => array('Package_Min_Days', 'int'),

		'Package_Min_Adults' => array('Package_Min_Adults', 'int'),

		'Package_Min_Children' => array('Package_Min_Children', 'int'),

		'Package_Min_People' => array('Package_Min_People', 'int'),

		'Package_Max_Days' => array('Package_Max_Days', 'int'),

		'Package_Max_Adults' => array('Package_Max_Adults', 'int'),

		'Package_Max_Children' => array('Package_Max_Children', 'int'),

		'Package_Max_People' => array('Package_Max_People', 'int'),

		'Arrival_Travel_Days' => array('Arrival_Travel_Days', 'int'),

		'Departure_Travel_Days' => array('Departure_Travel_Days', 'int'),

		'Adult_Cost' => array('Adult_Cost', 'int'),

		'Type_Of_Adventure' => array('Type_Of_Adventure', 'varchar'),

		'Package_Details' => array('Package_Details', 'text'),

		'Package_Includes' => array('Package_Includes', 'varchar'),

		'Package_DoesNot_Include' => array('Package_DoesNot_Include', 'varchar'),

		'Associated_Species' => array('Associated_Species', 'varchar'),

		'Adult_Deposit' => array('Adult_Deposit', 'int'),

		'People_Fees' => array('People_Fees', 'varchar'),

		'Package_Fees' => array('Package_Fees', 'text'),

		'Name' => array('Name', 'varchar'),

		'slug' => array('slug', 'varchar'),

		'Rooms_Available' => array('Rooms_Available', 'int'),

		'Resource_Type_Name' => array('Resource_Type_Name', 'varchar'),

		'Resource_Name' => array('Resource_Name', 'varchar'),

		'resource_name_fn' => array('resource_name_fn', 'varchar'),

		'resource_cost_fn' => array('resource_cost_fn', 'varchar'),

		'resource_Status_fn' => array('resource_Status_fn', 'int'),

		'Max_occupacy' => array('Max_occupacy', 'int'),

		'Min_occupacy' => array('Min_occupacy', 'int'),

		'resource_ID' => array('resource_ID', 'int')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.packages.id'),

		'Pms_Package_ID' => t('tables.packages.Pms_Package_ID'),

		'Account_ID' => t('tables.packages.Account_ID'),

		'Package_Name' => t('tables.packages.Package_Name'),

		'Arrival_Start_Date' => t('tables.packages.Arrival_Start_Date'),

		'Arrival_End_Date' => t('tables.packages.Arrival_End_Date'),

		'Package_Min_Days' => t('tables.packages.Package_Min_Days'),

		'Package_Min_Adults' => t('tables.packages.Package_Min_Adults'),

		'Package_Min_Children' => t('tables.packages.Package_Min_Children'),

		'Package_Min_People' => t('tables.packages.Package_Min_People'),

		'Package_Max_Days' => t('tables.packages.Package_Max_Days'),

		'Package_Max_Adults' => t('tables.packages.Package_Max_Adults'),

		'Package_Max_Children' => t('tables.packages.Package_Max_Children'),

		'Package_Max_People' => t('tables.packages.Package_Max_People'),

		'Arrival_Travel_Days' => t('tables.packages.Arrival_Travel_Days'),

		'Departure_Travel_Days' => t('tables.packages.Departure_Travel_Days'),

		'Adult_Cost' => t('tables.packages.Adult_Cost'),

		'Type_Of_Adventure' => t('tables.packages.Type_Of_Adventure'),

		'Package_Details' => t('tables.packages.Package_Details'),

		'Package_Includes' => t('tables.packages.Package_Includes'),

		'Package_DoesNot_Include' => t('tables.packages.Package_DoesNot_Include'),

		'Associated_Species' => t('tables.packages.Associated_Species'),

		'Adult_Deposit' => t('tables.packages.Adult_Deposit'),

		'People_Fees' => t('tables.packages.People_Fees'),

		'Package_Fees' => t('tables.packages.Package_Fees'),

		'Name' => t('tables.packages.Name'),

		'slug' => t('tables.packages.slug'),

		'Rooms_Available' => t('tables.packages.Rooms_Available'),

		'Resource_Type_Name' => t('tables.packages.Resource_Type_Name'),

		'Resource_Name' => t('tables.packages.Resource_Name'),

		'resource_name_fn' => t('tables.packages.resource_name_fn'),

		'resource_cost_fn' => t('tables.packages.resource_cost_fn'),

		'resource_Status_fn' => t('tables.packages.resource_Status_fn'),

		'Max_occupacy' => t('tables.packages.Max_occupacy'),

		'Min_occupacy' => t('tables.packages.Min_occupacy'),

		'resource_ID' => t('tables.packages.resource_ID')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Page'] = array(

	'table' => 'pages',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'parent_id' => array('parent_id', 'int'),

		'is_category' => array('is_category', 'int', array('default' => '0')),

		'title' => array('title', 'varchar'),

		'content' => array('content', 'text'),

		'is_published' => array('is_published', 'int', array('default' => '0')),

		'priority' => array('priority', 'int'),

		'slug' => array('slug', 'varchar'),

		'type' => array('type', 'varchar'),

		'component' => array('component', 'varchar'),

		'route_name' => array('route_name', 'varchar'),

		'route_value' => array('route_value', 'varchar'),

		'layout_id' => array('layout_id', 'int'),

		'seo_title' => array('seo_title', 'varchar'),

		'seo_keywords' => array('seo_keywords', 'text'),

		'seo_description' => array('seo_description', 'text'),

		'seo_robots' => array('seo_robots', 'varchar'),

		'is_template' => array('is_template', 'int', array('default' => '0'))

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.pages.id'),

		'parent_id' => t('tables.pages.parent_id'),

		'is_category' => t('tables.pages.is_category'),

		'title' => t('tables.pages.title'),

		'content' => t('tables.pages.content'),

		'is_published' => t('tables.pages.is_published'),

		'priority' => t('tables.pages.priority'),

		'slug' => t('tables.pages.slug'),

		'type' => t('tables.pages.type'),

		'component' => t('tables.pages.component'),

		'route_name' => t('tables.pages.route_name'),

		'route_value' => t('tables.pages.route_value'),

		'layout_id' => t('tables.pages.layout_id'),

		'seo_title' => t('tables.pages.seo_title'),

		'seo_keywords' => t('tables.pages.seo_keywords'),

		'seo_description' => t('tables.pages.seo_description'),

		'seo_robots' => t('tables.pages.seo_robots'),

		'is_template' => t('tables.pages.is_template')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Photo'] = array(

	'table' => 'photos',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'filename' => array('filename', 'varchar'),

		'extension' => array('extension', 'varchar'),

		'type' => array('type', 'varchar'),

		'datetime' => array('datetime', 'datetime'),

		'gallery_id' => array('gallery_id', 'int'),

		'priority' => array('priority', 'int'),

		'title' => array('title', 'varchar'),

		'titlee' => array('titlee', 'varchar'),

		'title2' => array('title2', 'varchar'),

		'description' => array('description', 'varchar'),

		'versions' => array('versions', 'text'),

		'slideshow_position' => array('slideshow_position', 'varchar'),

		'alt' => array('alt', 'varchar'),

		'atitle' => array('atitle', 'varchar'),

		'aurl' => array('aurl', 'varchar'),

		'atarget' => array('atarget', 'varchar')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.photos.id'),

		'filename' => t('tables.photos.filename'),

		'extension' => t('tables.photos.extension'),

		'type' => t('tables.photos.type'),

		'datetime' => t('tables.photos.datetime'),

		'gallery_id' => t('tables.photos.gallery_id'),

		'priority' => t('tables.photos.priority'),

		'title' => t('tables.photos.title'),

		'description' => t('tables.photos.description'),

		'versions' => t('tables.photos.versions'),

		'slideshow_position' => t('tables.photos.slideshow_position'),

		'alt' => t('tables.photos.alt'),

		'atitle' => t('tables.photos.atitle'),

		'aurl' => t('tables.photos.aurl'),

		'atarget' => t('tables.photos.atarget')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_RecipeCategory'] = array(

	'table' => 'recipe_categories',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'slug' => array('slug', 'varchar'),

		'type' => array('type', 'varchar'),

		'is_published' => array('is_published', 'int', array('default' => '0'))

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.recipe_categories.id'),

		'title' => t('tables.recipe_categories.title'),

		'slug' => t('tables.recipe_categories.slug'),

		'type' => t('tables.recipe_categories.type'),

		'is_published' => t('tables.recipe_categories.is_published')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Recipe'] = array(

	'table' => 'recipes',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'slug' => array('slug', 'varchar'),

		'category_id' => array('category_id', 'int'),

		'serves' => array('serves', 'varchar'),

		'prep_time' => array('prep_time', 'varchar'),

		'cook_time' => array('cook_time', 'varchar'),

		'ingredients' => array('ingredients', 'text'),

		'directions' => array('directions', 'text'),

		'nutritional' => array('nutritional', 'text'),

		'meal_type' => array('meal_type', 'varchar'),

		'fish_type' => array('fish_type', 'varchar'),

		'technique_type' => array('technique_type', 'varchar'),

		'filename' => array('filename', 'varchar'),

		'filename_thumb' => array('filename_thumb', 'varchar')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.recipes.id'),

		'title' => t('tables.recipes.title'),

		'slug' => t('tables.recipes.slug'),

		'category_id' => t('tables.recipes.category_id'),

		'serves' => t('tables.recipes.serves'),

		'prep_time' => t('tables.recipes.prep_time'),

		'cook_time' => t('tables.recipes.cook_time'),

		'ingredients' => t('tables.recipes.ingredients'),

		'directions' => t('tables.recipes.directions'),

		'nutritional' => t('tables.recipes.nutritional'),

		'meal_type' => t('tables.recipes.meal_type'),

		'fish_type' => t('tables.recipes.fish_type'),

		'technique_type' => t('tables.recipes.technique_type'),

		'filename' => t('tables.recipes.filename'),

		'filename_thumb' => t('tables.recipes.filename_thumb')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_RecipesInCategory'] = array(

	'table' => 'recipes_in_categories',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'recipe_id' => array('recipe_id', 'int'),

		'category_id' => array('category_id', 'int')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.recipes_in_categories.id'),

		'recipe_id' => t('tables.recipes_in_categories.recipe_id'),

		'category_id' => t('tables.recipes_in_categories.category_id')

		),

	'html_fields' => array('text', 'content'),

	);

// testing start

	$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_TestingCategory'] = array(

	'table' => 'testing_categories',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'slug' => array('slug', 'varchar'),

		'type' => array('type', 'varchar'),

		'is_published' => array('is_published', 'int', array('default' => '0'))

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.testing_categories.id'),

		'title' => t('tables.testing_categories.title'),

		'slug' => t('tables.testing_categories.slug'),

		'type' => t('tables.testing_categories.type'),

		'is_published' => t('tables.testing_categories.is_published')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Testing'] = array(

	'table' => 'testings',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'slug' => array('slug', 'varchar'),

		'category_id' => array('category_id', 'int'),

		'serves' => array('serves', 'varchar'),

		'prep_time' => array('prep_time', 'varchar'),

		'cook_time' => array('cook_time', 'varchar'),

		'ingredients' => array('ingredients', 'text'),

		'directions' => array('directions', 'text'),

		'nutritional' => array('nutritional', 'text'),

		'meal_type' => array('meal_type', 'varchar'),

		'fish_type' => array('fish_type', 'varchar'),

		'technique_type' => array('technique_type', 'varchar'),

		'filename' => array('filename', 'varchar'),

		'filename_thumb' => array('filename_thumb', 'varchar')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.testings.id'),

		'title' => t('tables.testings.title'),

		'slug' => t('tables.testings.slug'),

		'category_id' => t('tables.testings.category_id'),

		'serves' => t('tables.testings.serves'),

		'prep_time' => t('tables.testings.prep_time'),

		'cook_time' => t('tables.testings.cook_time'),

		'ingredients' => t('tables.testings.ingredients'),

		'directions' => t('tables.testings.directions'),

		'nutritional' => t('tables.testings.nutritional'),

		'meal_type' => t('tables.testings.meal_type'),

		'fish_type' => t('tables.testings.fish_type'),

		'technique_type' => t('tables.testings.technique_type'),

		'filename' => t('tables.testings.filename'),

		'filename_thumb' => t('tables.testings.filename_thumb')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_TestingsInCategory'] = array(

	'table' => 'testing_in_categories',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'testing_id' => array('testing_id', 'int'),

		'category_id' => array('category_id', 'int')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.testings_in_categories.id'),

		'testing_id' => t('tables.testings_in_categories.testing_id'),

		'category_id' => t('tables.testings_in_categories.category_id')

		),

	'html_fields' => array('text', 'content'),

	);

// testing end



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Review'] = array(

	'table' => 'reviews',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'content' => array('content', 'text'),

		'key' => array('key', 'varchar'),

		'date' => array('date', 'date'),

		'priority' => array('priority', 'int'),

		'is_published' => array('is_published', 'int', array('default' => '0'))

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.reviews.id'),

		'title' => t('tables.reviews.title'),

		'content' => t('tables.reviews.content'),

		'key' => t('tables.reviews.key'),

		'date' => t('tables.reviews.date'),

		'priority' => t('tables.reviews.priority'),

		'is_published' => t('tables.reviews.is_published')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_State'] = array(

	'table' => 'states',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'country_id' => array('country_id', 'int'),

		'title' => array('title', 'varchar'),

		'code' => array('code', 'varchar')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.states.id'),

		'country_id' => t('tables.states.country_id'),

		'title' => t('tables.states.title'),

		'code' => t('tables.states.code')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_TemplateLayout'] = array(

	'table' => 'template_layout',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'settings' => array('settings', 'text'),

		'placeholders' => array('placeholders', 'text'),

		'grid' => array('grid', 'text'),

		'content' => array('content', 'text')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.template_layout.id'),

		'settings' => t('tables.template_layout.settings'),

		'placeholders' => t('tables.template_layout.placeholders'),

		'grid' => t('tables.template_layout.grid'),

		'content' => t('tables.template_layout.content')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Twitter'] = array(

	'table' => 'twitter',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'content' => array('content', 'text'),

		'key' => array('key', 'varchar'),

		'date' => array('date', 'date'),

		'priority' => array('priority', 'int'),

		'is_published' => array('is_published', 'int', array('default' => '0'))

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.twitter.id'),

		'title' => t('tables.twitter.title'),

		'content' => t('tables.twitter.content'),

		'key' => t('tables.twitter.key'),

		'date' => t('tables.twitter.date'),

		'priority' => t('tables.twitter.priority'),

		'is_published' => t('tables.twitter.is_published')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Usergroup'] = array(

	'table' => 'usergroups',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'title' => array('title', 'varchar'),

		'level' => array('level', 'int'),

		'is_active' => array('is_active', 'int', array('default' => '0'))

		),

	'associations' => array(array('one-to-many', 'App_Model_User', array('key'=>'group_id'))),

	'resources' => array(

		'id' => t('tables.usergroups.id'),

		'title' => t('tables.usergroups.title'),

		'level' => t('tables.usergroups.level'),

		'is_active' => t('tables.usergroups.is_active')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_User'] = array(

	'table' => 'users',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'login' => array('login', 'varchar'),

		'password' => array('password', 'varchar'),

		'name' => array('name', 'varchar'),

		'group_id' => array('group_id', 'int')

		),

	'associations' => array(array('many-to-one', 'App_Model_Usergroup', array('key'=>'group_id'))),

	'resources' => array(

		'id' => t('tables.users.id'),

		'login' => t('tables.users.login'),

		'password' => t('tables.users.password'),

		'name' => t('tables.users.name'),

		'group_id' => t('tables.users.group_id')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Usertoken'] = array(

	'table' => 'usertokens',

	'props' => array(

		'id' => array('token', 'varchar', array('pk' => true)),

		'user_id' => array('user_id', 'int'),

		'created' => array('created', 'timestamp', array('default' => 'CURRENT_TIMESTAMP')),

		'type' => array('type', 'varchar')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.usertokens.id'),

		'user_id' => t('tables.usertokens.user_id'),

		'created' => t('tables.usertokens.created'),

		'type' => t('tables.usertokens.type')

		),

	'html_fields' => array('text', 'content'),

	);



$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Video'] = array(

	'table' => 'videos',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'gallery_id' => array('gallery_id', 'int'),

		'title' => array('title', 'varchar'),

		'description' => array('description', 'text'),

		'url' => array('url', 'varchar'),

		'type' => array('type', 'varchar'),

		'settings' => array('settings', 'text'),

		'filename' => array('filename', 'varchar'),

		'service_id' => array('service_id', 'varchar'),

		'width' => array('width', 'int'),

		'height' => array('height', 'int'),

		'page_id' => array('page_id', 'int')

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.videos.id'),

		'gallery_id' => t('tables.videos.gallery_id'),

		'title' => t('tables.videos.title'),

		'description' => t('tables.videos.description'),

		'url' => t('tables.videos.url'),

		'type' => t('tables.videos.type'),

		'settings' => t('tables.videos.settings'),

		'filename' => t('tables.videos.filename'),

		'service_id' => t('tables.videos.service_id'),

		'width' => t('tables.videos.width'),

		'height' => t('tables.videos.height'),

		'page_id' => t('tables.videos.page_id')

		),

	'html_fields' => array('text', 'content'),

	);

// Help Table
$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Help'] = array(

	'table' => 'help',

	'props' => array(

		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),

		'heading' => array('heading', 'varchar'),

		'subheading' => array('subheading', 'varchar'),

		'content' => array('content', 'varchar'),

		'comment' => array('comment', 'varchar'),

		),

	'associations' => array(),

	'resources' => array(

		'id' => t('tables.help.id'),

		'heading' => t('tables.help.heading'),

		'subheading' => t('tables.help.subheading'),

		'content' => t('tables.help.content'),

		'comment' => t('tables.help.comment'),

		),

	'html_fields' => array('text', 'content'),

	);

$CPF_CONFIG['MODEL']['OUTLET']['CONFIG']['classes']['App_Model_Reservation'] = array(
	'table' => 'reservations',
	'props' => array(
		'id' => array('id', 'int', array('pk' => true, 'autoIncrement' => true)),
		'first_name' => array('first_name', 'varchar'),
		'last_name' => array('last_name', 'varchar'),
		'email' => array('email', 'varchar'),
		'address' => array('address', 'varchar'),
		'city' => array('city', 'varchar'),
		'state' => array('state', 'varchar'),
		'postal' => array('postal', 'int'),
		'country' => array('country', 'varchar'),
		'phone' => array('phone', 'varchar'),
		'fax' => array('fax', 'varchar'),
		'arrival_date' => array('arrival_date', 'varchar'),
		'departure_date' => array('departure_date', 'varchar'),
		'adults' => array('adults', 'int'),
		'children' => array('children', 'int'),
		'how_did_you_hear' => array('how_did_you_hear', 'varchar'),
		'no_of_times' => array('no_of_times', 'varchar'),
		'comments' => array('comments', 'text'),
		'receive_updates' => array('receive_updates', 'int'),
		'datetime' => array('datetime', 'datetime')
		),
	'associations' => array(),
	'resources' => array(
		'id' => t('tables.reservations.id'),
		'first_name' => t('tables.reservations.first_name'),
		'last_name' => t('tables.reservations.last_name'),
		'email' => t('tables.reservations.email'),
		'address' => t('tables.reservations.address'),
		'city' => t('tables.reservations.city'),
		'state' => t('tables.reservations.state'),
		'postal' => t('tables.reservations.postal'),
		'country' => t('tables.reservations.country'),
		'phone' => t('tables.reservations.phone'),
		'fax' => t('tables.reservations.fax'),
		'arrival_date' => t('tables.reservations.arrival_date'),
		'departure_date' => t('tables.reservations.departure_date'),
		'adults' => t('tables.reservations.adults'),
		'children' => t('tables.reservations.children'),
		'how_did_you_hear' => t('tables.reservations.how_did_you_hear'),
		'no_of_times' => t('tables.reservations.no_of_times'),
		'comments' => t('tables.reservations.comments'),
		'receive_updates' => t('tables.reservations.receive_updates'),
		'datetime' => t('tables.reservations.datetime')
		),
	'html_fields' => array('text', 'content'),
);
	?>