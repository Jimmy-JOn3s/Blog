<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    Protected $fillable=['text','post_id','user_id','status'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
