<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Alcanceuno extends Model
{
    use SoftDeletes;

    public $table = 'alcanceunos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'usuario_id',
        'lugar',
        'equipo',
        'tipo',
        'cantidad_inicial',
        'cantidad_anual',
        'factor_emision',
        'emisiones_totales',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function usuario()
    {
        return $this->belongsTo(Organizacion::class, 'usuario_id');
    }
}
