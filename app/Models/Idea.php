<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idea extends Model
{
    use HasFactory;

    // Añadimos esta propiedades para que los campos no se puedan modificar
    protected $fillable = ['user_id', 'title', 'description'];

    //Añadimos este campo para gestionar el formato de la fecha
    protected $casts = ['created_at' => 'datetime'];

    /**
     * Get the user that owns the Idea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The users that belong to the Idea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
