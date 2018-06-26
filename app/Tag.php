<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function technologies()
    {
    	return $this->belongsToMany('App\Technology', 'technology_tag', 'tag_id', 'technology_id');
    }

    public function selectedTechIds()
    {
    	$array = [];
    	foreach($this->technologies as $technology)
    	{
    		$array[] = $technology->id;
    	}
    	return $array;
    }
}
