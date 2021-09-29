<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable=['title','image','status'];

    public function getRules(){
        return [
            'title'=>'required|string',
            'image'=>'sometimes|image',
            'status'=>'required|in:active,inactive'
        ];
    }
}
