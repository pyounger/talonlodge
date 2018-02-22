<?php
class App_Utils_Image
{
	public static function get_filename($filename)
	{
        $ext = self::get_extension($filename);
        return sprintf('%s-%s.%s', cpf_config('APP.UPLOADS.PREFIX'), time(), $ext);
	}

	public static function get_filename_w_size($filename, $width, $height)
	{
        $ext = self::get_extension($filename);
        if (is_null($width) && is_null($height))
        {
            return sprintf('%s-%s-orig.%s', cpf_config('APP.UPLOADS.PREFIX'), time(), $ext);
        }
        else
        {
            return sprintf('%s-%s-%d-%d.%s', cpf_config('APP.UPLOADS.PREFIX'), time(), $width, $height, $ext);
        }
	}

	public static function get_path($filename, $path)
	{
        return sprintf('%s%s', $path, $filename);
	}

	public static function get_extension($string)
	{
		$parts = explode(".", $string);
   		return strtolower($parts[count($parts)-1]);
	}  		  		

	public static function resize_image($file_in, $file_out, $width, $height, $jpeg_quality = 100, $invert_scaling = false, $by_width_only = false, $by_height_only = false)
	{
		$width_orig = 0;
		$height_orig = 0;

		$width_start = $width;
		$height_start = $height;

		$params = getimagesize($file_in);
		$width_orig = $params[0];
		$height_orig = $params[1];
		$mime = $params['mime'];

		if ($width_orig == 0 || $height_orig == 0)
		{
			return;
		}

		$ratio_orig = $width_orig/$height_orig;
		if ($width_orig < $width && $height_orig < $height)
		{
			$width = $width_orig;
			$height = $height_orig;
		}
		else
		{
			$ratio_orig = $width_orig/$height_orig;
	
			if ($width/$height > $ratio_orig) 
			{
				if (!$invert_scaling)
					$width = $height*$ratio_orig;
				else
					$height = $width/$ratio_orig;
			} 
			else 
			{
				if (!$invert_scaling)
					$height = $width/$ratio_orig;
				else
					$width = $height*$ratio_orig;
			}
		}

		if ($by_width_only)
		{
			$width = $width_start;
			$height = $width/$ratio_orig;
		}

		if ($by_height_only)
		{
			$height = $height_start;
			$width = $height*$ratio_orig;
		}

		$width = round($width);
		$height = round($height);
		$temp_p = imagecreatetruecolor($width, $height);

		//loading and resizing image
		switch ($mime)
		{
			case image_type_to_mime_type(IMAGETYPE_JPEG):
				$temp = imagecreatefromjpeg($file_in);	
				imagecopyresampled($temp_p, $temp, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
				imagejpeg($temp_p, $file_out, $jpeg_quality);		
			break;

			case image_type_to_mime_type(IMAGETYPE_GIF):
				$temp = imagecreatefromgif($file_in);										
				imagecopyresampled($temp_p, $temp, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
				imagegif($temp_p, $file_out);		
			break;

			case image_type_to_mime_type(IMAGETYPE_PNG):
				$temp = imagecreatefrompng($file_in);										
				imagecopyresampled($temp_p, $temp, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
				imagepng($temp_p, $file_out);		
			break;
		}
		return array('width' => $width, 'height' => $height);
	}
	
	public static function crop($file_in, $file_out, $crop_width, $crop_height, $x, $y, $w, $h, $jpeg_quality = 100)
	{
		$width_orig = 0;
		$height_orig = 0;

		$params = getimagesize($file_in);
		$width_orig = $params[0];
		$height_orig = $params[1];
		$mime = $params['mime'];
		
		switch ($mime)
		{
			case image_type_to_mime_type(IMAGETYPE_GIF):
			case image_type_to_mime_type(IMAGETYPE_PNG):

				$img_r = imagecreatefrompng($file_in);
				$dst_r = ImageCreateTrueColor($crop_width, $crop_height);
				imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $crop_width, $crop_height, $w, $h);
				$transparency = imagecolortransparent($img_r);
				if ($transparency >= 0)
				{
					$trnprt_color  = imagecolorsforindex($img_r, $transparency);
					$transparency  = imagecolorallocate($dst_r, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
					imagefill($dst_r, 0, 0, $transparency);
					imagecolortransparent($dst_r, $transparency);
				}
				elseif (image_type_to_mime_type(IMAGETYPE_PNG))
				{
					imagealphablending($dst_r, false);
					$color = imagecolorallocatealpha($dst_r, 223, 221, 182, 127);
					imagefill($dst_r, 0, 0, $color);
					imagesavealpha($dst_r, true);
				}
				imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $crop_width, $crop_height, $w, $h);
				imagepng($dst_r, $file_out);
			break;
			case image_type_to_mime_type(IMAGETYPE_JPEG):
				$img_r = imagecreatefromjpeg($file_in);
				$dst_r = ImageCreateTrueColor($crop_width, $crop_height);
				imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $crop_width, $crop_height, $w, $h);
				imagejpeg($dst_r, $file_out, $jpeg_quality);
			break;
		}
	}
	
	public static function watermark($from, $wm, $alpha)
	{
		$main_img_obj = imagecreatefromjpeg($from);
		$watermark_img_obj = imagecreatefrompng($wm);
		$result = self::create_watermark( $main_img_obj, $watermark_img_obj, $alpha );
		imagejpeg($result, $from, 100);
	}

	
	# given two images, return a blended watermarked image
	public static function create_watermark( $main_img_obj, $watermark_img_obj, $alpha_level = 100 )
	{
		$alpha_level	/= 100;	# convert 0-100 (%) alpha to decimal

		# calculate our images dimensions
		$main_img_obj_w	= imagesx( $main_img_obj );
		$main_img_obj_h	= imagesy( $main_img_obj );
		$watermark_img_obj_w	= imagesx( $watermark_img_obj );
		$watermark_img_obj_h	= imagesy( $watermark_img_obj );

		# determine center position coordinates
		$main_img_obj_min_x	= floor( ( $main_img_obj_w / 2 ) - ( $watermark_img_obj_w / 2 ) );
		$main_img_obj_max_x	= ceil( ( $main_img_obj_w / 2 ) + ( $watermark_img_obj_w / 2 ) );
		$main_img_obj_min_y	= floor( 3 * ( $main_img_obj_h / 4 ) - ( $watermark_img_obj_h / 2 ) );
		$main_img_obj_max_y	= ceil( 3 * ( $main_img_obj_h / 4 ) + ( $watermark_img_obj_h / 2 ) ); 

		# create new image to hold merged changes
		$return_img	= imagecreatetruecolor( $main_img_obj_w, $main_img_obj_h );

		# walk through main image
		for( $y = 0; $y < $main_img_obj_h; $y++ ) {
			for( $x = 0; $x < $main_img_obj_w; $x++ ) {
				$return_color	= NULL;

				# determine the correct pixel location within our watermark
				$watermark_x	= $x - $main_img_obj_min_x;
				$watermark_y	= $y - $main_img_obj_min_y;

				# fetch color information for both of our images
				$main_rgb = imagecolorsforindex( $main_img_obj, imagecolorat( $main_img_obj, $x, $y ) );

				# if our watermark has a non-transparent value at this pixel intersection
				# and we're still within the bounds of the watermark image
				if (	$watermark_x >= 0 && $watermark_x < $watermark_img_obj_w &&
							$watermark_y >= 0 && $watermark_y < $watermark_img_obj_h ) {
					$watermark_rbg = imagecolorsforindex( $watermark_img_obj, imagecolorat( $watermark_img_obj, $watermark_x, $watermark_y ) );

					# using image alpha, and user specified alpha, calculate average
					$watermark_alpha	= round( ( ( 127 - $watermark_rbg['alpha'] ) / 127 ), 2 );
					$watermark_alpha	= $watermark_alpha * $alpha_level;

					# calculate the color 'average' between the two - taking into account the specified alpha level
					$avg_red		= self::_get_ave_color( $main_rgb['red'],		$watermark_rbg['red'],		$watermark_alpha );
					$avg_green	= self::_get_ave_color( $main_rgb['green'],	$watermark_rbg['green'],	$watermark_alpha );
					$avg_blue		= self::_get_ave_color( $main_rgb['blue'],	$watermark_rbg['blue'],		$watermark_alpha );

					# calculate a color index value using the average RGB values we've determined
					$return_color	= self::_get_image_color( $return_img, $avg_red, $avg_green, $avg_blue );

				# if we're not dealing with an average color here, then let's just copy over the main color
				} else {
					$return_color	= imagecolorat( $main_img_obj, $x, $y );

				} # END if watermark

				# draw the appropriate color onto the return image
				imagesetpixel( $return_img, $x, $y, $return_color );

			} # END for each X pixel
		} # END for each Y pixel

		# return the resulting, watermarked image for display
		return $return_img;

	} # END create_watermark()

	# average two colors given an alpha
	public static function _get_ave_color( $color_a, $color_b, $alpha_level ) {
		return round( ( ( $color_a * ( 1 - $alpha_level ) ) + ( $color_b	* $alpha_level ) ) );
	} # END _get_ave_color()

	# return closest pallette-color match for RGB values
	public static function _get_image_color($im, $r, $g, $b) {
		$c=imagecolorexact($im, $r, $g, $b);
		if ($c!=-1) return $c;
		$c=imagecolorallocate($im, $r, $g, $b);
		if ($c!=-1) return $c;
		return imagecolorclosest($im, $r, $g, $b);
	} # EBD _get_image_color()

	public static function _get_path($prefix, $filename, $type)
	{
		// default value
		$config_name = 'IMAGES';
		switch ($type)
		{
			case 'image': 		$config_name = 'IMAGES';		break;
			case 'thumb': 		$config_name = 'THUMBS';		break;
			case 'middle':		$config_name = 'MIDDLE';		break;
			case 'small':		$config_name = 'SMALL';			break;
			case 'large':		$config_name = 'LARGE';			break;
			case 'largest':		$config_name = 'LARGEST';		break;
			case 'details': 	$config_name = 'DETAILS';		break;
			case 'temp': 		$config_name = 'TEMP.ORIGINAL';	break;
			case 'temppreview':	$config_name = 'TEMP.PREVIEW';	break;
		}
		$path = cpf_config(sprintf('%s.%s', $prefix, $config_name));
		return sprintf('%s%s', $path, $filename); 
	}
	
}