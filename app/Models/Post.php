<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
  // The table associated with the model.
   protected $table = 'posts';
    // assigned field name
    protected $fillable = [
        'author_name',
        'title',
        'content',
    ];
     public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
