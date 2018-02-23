<?php

// custom associations

$associations_custom = array(

	// galleries

	'App_Model_Gallery' => array(

		array(

			'model' => 'App_Model_GalleryType', 

			'relationship' => 'many-to-one', 

			'key' => 'type_id'

		)

	),

	'App_Model_GalleryTypr' => array(

		array(

			'model' => 'App_Model_Gallery', 

			'relationship' => 'one-to-many', 

			'key' => 'type_id'

		)

	),

);



// default associations

$associations_default = array(

	'App_Model_User' => array(

		array(

			'model' => 'App_Model_Usergroup', 

			'relationship' => 'many-to-one', 

			'key' => 'group_id'

		)

	),

	'App_Model_Usergroup' => array(

		array(

			'model' => 'App_Model_User', 

			'relationship' => 'one-to-many', 

			'key' => 'group_id'

		)

	)

);



?>