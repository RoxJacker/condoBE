<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
  protected $table = 'usuarios'; // Por si no usas migraciones

  protected $fillable = ['nombre', 'email', 'departamento_id'];

  public function departamento(): BelongsTo
  {
    return $this->belongsTo(Departamento::class);
  }

  public function multas(): HasMany
  {
    return $this->hasMany(Multa::class);
  }
}
