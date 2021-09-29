<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=['title','summary','status','image','added_by'];

    public function getRules(){
        return [
            'title'=>'required|string',
            'summary'=>'nullable|string',
            'status'=>'required|in:active,inactive',
            'added_by'=>'required|exists:users,id',
            'image'=>'sometimes|image|max:50000'
        ];
    }

    public function added_by_info(){
        return $this->hasOne('App\Models\User','id','added_by');
    }

    public function news_info(){
        return $this->hasMany('App\Models\News','cat_id','id');
    }
}
