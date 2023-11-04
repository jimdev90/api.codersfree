<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, ApiTrait;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = [
        'name',
        'slug',
        'extract',
        'body',
        'category_id',
        'user_id',
        'status'
    ];

    //RELACION UNO A MUCHOS INVERSA
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //RELACION MUCHOS A MUCHOS
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }


    //RELACION UNO A MUCHOS POLIMORFICA
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
