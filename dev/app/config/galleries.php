<?php

/**

 * Common Settings

 */

$CPF_CONFIG['APP']['GALLERIES']['STORE_ORIGINAL_IMAGE'] = TRUE;

$CPF_CONFIG['APP']['GALLERIES']['DEFAULT_IMAGE_TYPES'] = array(

    'backend_tiny' => array(

        'type' => 'backend_tiny',

        'width' => 80,

        'height' => 60,

        'crop' => true,

        'resize' => 'both'

    ),

    'backend_thumb' => array(

        'type' => 'backend_thumb',

        'width' => 160,

        'height' => 120,

        'crop' => true,

        'resize' => 'both'

    ),

    'thumbnail' => array(

        'type' => 'thumbnail',

        'width' => 260,

        'height' => 180,

        'crop' => true,

        'resize' => 'both'

    ),

    'gallery_thumbnail' => array(

        'type' => 'gallery_thumbnail',

        'width' => 133,

        'height' => 88,

        'crop' => true,

        'resize' => 'both'

    ),

    'fullscreen' => array(

        'type' => 'fullscreen',

        'width' => 799,

        'height' => 495,

        'crop' => false,

        'resize' => 'both'

    ),

    'original' => array(

        'type' => 'original',

        'width' => null,

        'height' => null,

        'crop' => false,

        'resize' => 'none'

    )

);

$CPF_CONFIG['APP']['GALLERIES']['REQUIRED_IMAGE_TYPES'] = array('thumbnail', 'fullscreen');

$CPF_CONFIG['APP']['GALLERIES']['RESIZE_TYPES'] = array('both', 'width', 'height');

$CPF_CONFIG['APP']['GALLERIES']['TYPES'] = array(

    'photo' => array(

        'id' => 'photo',

        'title' => 'backend.galleries.photo_gallery'
        

    ),

    'video' => array(

        'id' => 'video',

        'title' => 'backend.galleries.video_gallery'

    ),

    'slideshow' => array(

        'id' => 'slideshow',

        'title' => 'backend.galleries.slideshow'

    )

);



/* Photos */

$CPF_CONFIG['APP']['PHOTOS']['URL'] = 'uploads/photos/';

$CPF_CONFIG['APP']['PHOTOS']['URLS']['BACKEND'] = $CPF_CONFIG['APP']['PHOTOS']['URL'] . 'backend/';

$CPF_CONFIG['APP']['PHOTOS']['URLS']['FRONTEND'] = $CPF_CONFIG['APP']['PHOTOS']['URL'] . 'frontend/';

$CPF_CONFIG['APP']['PHOTOS']['URLS']['TEMP'] = $CPF_CONFIG['APP']['PHOTOS']['URL'] . 'temp/';

$CPF_CONFIG['APP']['PHOTOS']['PATHES']['BACKEND'] = CPF_ROOT_DIR . $CPF_CONFIG['APP']['PHOTOS']['URLS']['BACKEND'];

$CPF_CONFIG['APP']['PHOTOS']['PATHES']['FRONTEND'] = CPF_ROOT_DIR . $CPF_CONFIG['APP']['PHOTOS']['URLS']['FRONTEND'];

$CPF_CONFIG['APP']['PHOTOS']['PATHES']['TEMP'] = CPF_ROOT_DIR . $CPF_CONFIG['APP']['PHOTOS']['URLS']['TEMP'];

$CPF_CONFIG['APP']['PHOTOS']['JPEG_QUALITY'] = 100;





/* Videos */

$CPF_CONFIG['APP']['GALLERIES']['VIDEO_SETTINGS'] = array(

    'video_width' => 260,

    'video_height' => 180

);

?>