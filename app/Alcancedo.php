<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Alcancedo extends Model
{
    use SoftDeletes;

    public $table = 'alcancedos';

    protected $dates = [
        'periodo_inicial',
        'periodo_final',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'usuario_id',
        'periodo_inicial',
        'periodo_final',
        'ubicacion',
        'nombre',
        'consumo',
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

    public function getPeriodoInicialAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }
    public function getPeriodoFinalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }
}
