<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Organizacion extends Model
{
    use SoftDeletes;

    public $table = 'organizacions';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_usuario',
        'nombre',
        'tipo',
        'sector',
        'fecha',
        'superficie',
        'direccion',
        'empleados',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function usuarioAlcanceunos()
    {
        return $this->hasMany(Alcanceuno::class, 'usuario_id', 'id');
    }

    public function usuarioAlcancedos()
    {
        return $this->hasMany(Alcancedo::class, 'usuario_id', 'id');
    }

    public function usuarioHuellas()
    {
        return $this->hasMany(Huella::class, 'usuario_id', 'id');
    }

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }
    

}
