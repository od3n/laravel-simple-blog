<?php

class Comment extends Eloquent
{
    protected $guarded = array();

    public static $rules = array(
        'post_id' => 'required',
        'author' => 'required',
        'content' => 'required'
    );

    public function post() {
        return $this->hasOne('Post', 'id', 'post_id');
    }
}
