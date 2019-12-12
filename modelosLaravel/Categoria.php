<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $table = 'categoria';
    public $timestamps = false;

    protected $fillable = [
        'nombre','imagen'
    ];

    public function productos() {
        return $this->hasMany('App\Producto');
    }
}
