<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Multa extends Model
{
  public $timestamps = false; // <-- Agrega esta línea

  protected $fillable = ['descripcion', 'fecha', 'usuario_id', 'departamento_id'];

  public function usuario(): BelongsTo
  {
    return $this->belongsTo(Usuario::class);
  }

  public function departamento(): BelongsTo
  {
    return $this->belongsTo(Departamento::class);
  }
}