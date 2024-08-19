<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function seasons(){
        return $this->hasMany(Season::class, 'series_id', 'id'); // 'series_id' é a foreign key que será buscada no relacionamento e 'id' é a primary key da tabela
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $query) {
            $query->orderBy('nome');
        });
    }
}
