<?php 
	/**
	 * 
	 */
	// include composer autoload
	require_once __DIR__ . '/../vendor/autoload.php';

	use Intervention\Image\ImageManagerStatic as Image;
	class Imageclass
	{
		
		function __construct()
		{
			# code...
		}

		
		public function grabImage($image_url, $image_file){
		    $fp = fopen ($image_file, 'w+');              // open file handle

		    $ch = curl_init($image_url);
		    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // enable if you want
		    curl_setopt($ch, CURLOPT_FILE, $fp);          // output to file
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);      // some large value to allow curl to run for a long time
		    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 || Raju Image Downlaod');
		    // curl_setopt($ch, CURLOPT_VERBOSE, true);   // Enable this line to see debug prints
		    curl_exec($ch);

		    curl_close($ch);                              // closing curl handle
		    fclose($fp);                                  // closing file handle	

		    $name = $this->addWaterMark($image_file);

		    return $name;	
		}

		public function addWaterMark($imageFile)
		{
			$watermark 	= Image::make('storage/watermark.png');

			$name 		= 'watermarked_'.uniqid().'.png';

			$img            = Image::make($imageFile);
            $img->insert($watermark, 'bottom-right',10,10);
            $img->save('storage/water/'.$name);

            unlink($imageFile);

			// echo "<img src='storage/water/".$name."'>";
			return $name;
		}
	}
?>