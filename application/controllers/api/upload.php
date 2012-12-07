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
			$ext = File::extension($image['name']);

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
			$i->nsfw = false;

			$i->save();

			// Upload to S3
			S3::put_object(S3::input_file($image['tmp_name'], false), 'ImageBacon', $name, S3::ACL_PUBLIC_READ, array(), $image['type']);
		}

		return Response::json(array('status' => true, 'name' => $name, 'url' => 'http://i.mgba.co/n/'.$name));
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