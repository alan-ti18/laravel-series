<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function season(){
        return $this->hasMany(Season::class, 'series_id', 'id'); // 'series_id' é a foreign key que será buscada no relacionamento e 'id' é a primary key da tabela
    }
}
