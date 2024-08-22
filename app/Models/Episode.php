<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    protected $casts = ['completed' => 'boolean'];  /* Está informando que o atributo 'completed' do BD deve ser tratado como um booleano. */
    public $timestamps = false; // usado sempre que não tiver o created_at e updated_at na tabela respectiva.

    public function season(){
        return $this->belongsTo(Season::class);
    }
}
