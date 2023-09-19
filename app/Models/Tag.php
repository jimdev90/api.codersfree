<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory, ApiTrait;

    //RELACION MUCHOS A MUCHOS
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
