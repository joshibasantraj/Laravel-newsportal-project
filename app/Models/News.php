<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable=['is_sticky','title','summary','desc','news_date','added_by','reported_by','location','image','status','cat_id'];


    public function getRules(){
        return [
            'title'=>'required|string',
            'summary'=>'required|string',
            'desc'=>'nullable|string',
            'news_date'=>'required|string',
            'added_by'=>'required|exists:users,id',
            'reported_by'=>'required|exists:users,id',
            'location'=>'nullable|string',
            'image'=>'sometimes|image',
            'is_sticky'=>'sometimes|in:1'
        ];
    }

    public function added_by_info(){
        return $this->hasone('App\Models\User','id','added_by');
    }

    public function reporter_info(){
        return $this->hasone('App\Models\User','id','added_by');
    }

    public function category_info(){
        return $this->belongsTo('App\Models\Category','cat_id','id');
    }

}
