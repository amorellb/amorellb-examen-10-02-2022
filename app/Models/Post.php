<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'posts';

    protected $fillable = ['title', 'summary', 'post_content', 'expiry', 'commentable', 'access', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
