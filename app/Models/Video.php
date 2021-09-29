<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable=['title','summary','video_link','video_id','status','added_by'];

    public function getRules(){
        return [
            'title'=>'required|string',
            'summary'=>'nullable|string',
            'video_link'=>'required|string',
            'video_id'=>'nullable|string',
            'status'=>'required|in:active,inactive'
        ];
    }
}
