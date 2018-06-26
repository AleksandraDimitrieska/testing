<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    public function questions()
    {
    	return $this->hasMany('App\Question');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag', 'technology_tag', 'technology_id', 'tag_id');
    }

    public function showIds()
    {
    	$array = [];
    	foreach($this->tags as $tag)
    	{
    		$array[] = $tag->id;
    	}

    	return $array;
    }
}
