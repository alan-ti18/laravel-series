<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    public $timestamps = false; // usado sempre que não tiver o created_at e updated_at na tabela respectiva.

    public function season(){
        return $this->belongsTo(Season::class);
    }
}
