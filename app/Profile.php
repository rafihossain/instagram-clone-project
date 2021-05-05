<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = [];
	
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function blankImage(){

    	$imageBlank = ($this->image) ? $this->image : 'profile/JXe4jh79qI2fmXOKL6hY37MvhOVA7BrQcuv5Z9B0.png';
    	return '/storage/'. $imageBlank;
    }
}
