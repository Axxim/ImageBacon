<?php

class Gallery_Controller extends Base_Controller
{

    public $restful = true;

    public function get_index()
    {
        $images = Image::where_public(1)->get();

        return View::make('gallery.index', array('images' => $images));
    }

    public function get_image($key) 
    {
        $image = Image::where('id', '=', $key)->first();

        return View::make('gallery.image', array('image' => $image));
    }

}
