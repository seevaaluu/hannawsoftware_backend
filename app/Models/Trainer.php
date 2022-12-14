<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trainer';

    /**
     * Get the comments for the blog post.
     */
    public function pokemons()
    {
        return $this->hasMany(Pokemon::class);
    }
}
