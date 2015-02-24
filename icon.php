<?php
require_once("db.php");
error_reporting(E_ALL);
$id=intval($_GET['id']);

$sQuery="SELECT * FROM icon WHERE id=$id";
	$result = mysql_query($sQuery);
	if ($result) {
		$row = mysql_fetch_array($result);
		$image_time=time();

           
	    header('Content-Length: '.strlen($row['icon']));
    	header("Content-type: image/".$row['icon_ext']);
		if (strlen($row['icon']) > 0) {
		    echo $row['icon'];
		} else {
			//Config
			$text = $row['description'];
			$margin = 2;
			
			$font = 3;
			$font_width = ImageFontWidth($font);
			$font_height = ImageFontHeight($font);
			
			$text_width = $font_width * strlen($text);
			$text_height = $font_height;
			
			$width = $text_width+($margin*2);
			$height = $text_height+($margin*2);
			
			$position_middle = ceil(($height - $text_height) / 2);
			$position_center = ceil(($width - $text_width) / 2);
			
			//Create the canvas
			$my_img = imagecreate( $width, $height );
			imagesetthickness ( $my_img, 1 );
			
			//Create some colors
			$background = imagecolorallocate( $my_img, 255, 255, 255 );
			$text_colour = imagecolorallocate( $my_img, 0, 0, 0 );
			$line_colour = imagecolorallocate( $my_img, 128, 255, 0 );
			
			//Create color and set a border
			$border = ImageColorAllocate($my_img, 100, 100, 100);
			imageRectangle($my_img, 0, 0, $width - 1, $height - 1, $border);

			//Create the text
			imagestring( $my_img, $font, $margin, $margin, $text, $text_colour );

			header( "Content-type: image/png" );
			imagepng( $my_img );
			
			imagecolordeallocate( $my_img, $background );
			imagedestroy( $my_img );
		}//end if
	} else {
		echo mysql_error();
	}//end if
    exit();
