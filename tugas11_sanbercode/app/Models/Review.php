<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";
    protected $fillable = ['content','point','user_id','film_id'];

    public function createBy(){
        return $this->belongsTo( User::class,'user_id');
    }
}
