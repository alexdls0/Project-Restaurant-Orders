<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $table = 'producto';
    public $timestamps = false;

    protected $fillable = [
        'nombre','precio','imagen','descripcion','destino','idCategoria'
    ];

    public function comandas() {
        return $this->hasMany('App\Comanda');
    }
    
    public function categoria() {
        return $this->belongsTo('App\Categoria', 'idCategoria');
    }
}
