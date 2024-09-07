<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    
    public function Posts():BelongsToMany
    {
        return $this->belongsToMany(Post::class)->where('status','approved');
    }
}
