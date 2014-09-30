<?php

class Post extends Eloquent
{
    protected $guarded = array();

    public static $rules = array(
        'title' => 'required'
    );

    public function comments() {
        return $this->hasMany('Comment');
    }
}
