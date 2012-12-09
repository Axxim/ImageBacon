<?php

class Api_Upload_Controller extends Base_Controller {

	public $restful = true;

	public function __construct() 
	{
		session_start();

		Config::set('application.profiler', false);
	}

	public function get_index() 
	{
		return "get out";
	}

	public function post_index() 
	{
		$files = Input::file();

		// Loop over, validate, upload.
		foreach($files as $key => $image) {
			// Validate image

			if(!File::is(array('png','gif','jpeg','jpe','jpg','tiff','bmp'), $image['tmp_name'])) {
				throw new Exception('Image format not recognized, contact luke@axxim.net');
			}

			// Get the extension
			$ext = strtolower(File::extension($image['name']));

			$unique = $this->unique();
			$name   = $unique.'.'.$ext;

			// Create the image
			$i = new Image();

			$i->id = $unique;
			$i->file_name = $name;
			$i->file_name_old = $image['name'];
			$i->file_size = $image['size'];
			$i->file_type = $image['type'];
			$i->file_tmp = $image['tmp_name'];
			$i->public = true; // Option for this pl0x
			$i->nsfw = false;
			if (Auth::check()) {
				$i->user_id = Auth::user()->id;
			} else {
				$i->user_id = null;
			}

			$i->save();

			// Upload to S3
			S3::put_object(S3::input_file($image['tmp_name'], false), 'ImageBacon', $name, S3::ACL_PUBLIC_READ, array(), $image['type']);

			$this->gen_thumb($image['tmp_name'], $name, $image['type']);
		}

		return Response::json(array('status' => true, 'name' => $name, 'url' => 'https://imagebacon.com/n/'.$unique, 'image' => 'https://i.mgba.co/'.$name));
	}
 
	private function gen_thumb($image, $name, $mime, $height = 180, $width = 260)
	{
		$image = WideImage::load($image);
		$thumb = $image->crop('center', 'center', $width * 2, $height * 2)->resize($width, $height);

        S3::put_object($thumb->asString('jpg'), 'ImageBacon', 'thumb/'.$name, S3::ACL_PUBLIC_READ, array(), $mime);
	}

	private function unique($len = 5)
	{
		$hex = md5("imagebacon" . uniqid("n", true));

	    $pack = pack('H*', $hex);
	    $tmp =  base64_encode($pack);

	    $uid = preg_replace("#(*UTF8)[^A-Za-z0-9]#", "", $tmp);

	    $len = max(4, min(128, $len));

	    while (strlen($uid) < $len)
	        $uid .= gen_uuid(22);

	    return 'n'.substr($uid, 0, $len);
	}

}