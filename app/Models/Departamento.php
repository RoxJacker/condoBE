<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departamento extends Model
{
  protected $fillable = ['nombre'];

  public function usuarios(): HasMany
  {
    return $this->hasMany(Usuario::class);
  }

  public function multas(): HasMany
  {
    return $this->hasMany(Multa::class);
  }
}