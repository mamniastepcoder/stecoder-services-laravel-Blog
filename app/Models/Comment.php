<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // table name 
    protected $table = 'comments';
    // table field name
    protected $fillable = [
        'id',
        'content',
        'post_id',
        'user_id',
    ];
    
    public function post()
{
    return $this->belongsTo(Post::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}
