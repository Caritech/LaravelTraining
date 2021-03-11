<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "post";
    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'user_id'
    ];
    //protected $guarded = [];

    public $appends = ['foo_bar'];

    public function getFooBarAttribute()
    {
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'post_id', 'id');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like', 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
