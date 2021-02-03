<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Huella extends Model
{
    use SoftDeletes;

    public $table = 'huellas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'usuario_id',
        'alcance_uno',
        'alcance_dos',
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
