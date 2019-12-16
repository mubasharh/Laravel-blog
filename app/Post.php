<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
	use SoftDeletes;
	protected $fillable = [
        'title', 'slug', 'thumbnail', 'category_id','content'
    ];

    protected $dates = ['deleted_at'];

    public function getThumbnailAttribute($thumbnail){
    	return asset('uploads/posts/'.$thumbnail);
    }
    public function category(){
    	return $this->belongsTo('App\Category', 'category_id','id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
