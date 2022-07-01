<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
	protected $table = 'lotes';
    protected $fillable = [
        'nombre', 'ocupado',
    ];
}
