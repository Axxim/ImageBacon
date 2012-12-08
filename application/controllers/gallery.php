<?php

class Gallery_Controller extends Base_Controller
{

    public $restful = true;

    public function get_index()
    {
        $images = Image::where_public(1)->get();

        return View::make('gallery.index', array('images' => $images));
    }

}
