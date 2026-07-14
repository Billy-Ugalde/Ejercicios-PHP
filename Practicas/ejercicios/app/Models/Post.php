<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    //    protected $table = 'posts';
    //    protected $primaryKey = 'post_id';
    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'content', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
