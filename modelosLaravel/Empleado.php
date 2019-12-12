<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{

    protected $table = 'empleado';
    public $timestamps = false;

    protected $fillable = [
        'nombre','apellido','telefono','imagen','username','password','gerente'
    ];

    public function comandas() {
        return $this->hasMany('App\Comanda');
    }
    
    public function facturas() {
        return $this->hasMany('App\Factura');
    }
}
