<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'desc',
        'image',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            
            $user = $post->user;
            if ($user) {
                $user->posts_num = $user->posts()->count() - 1;
                $user->save();
            }
        });
    }

}
