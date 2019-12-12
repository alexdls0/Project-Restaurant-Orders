<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{

    protected $table = 'factura';
    public $timestamps = false;

    protected $fillable = [
        'numeroMesa','horaInicio','idEmpleadoInicio','horaCierre','idEmpleadoCierre','total'
    ];

    public function comandas() {
        return $this->hasMany('App\Comanda');
    }
    
    public function empleadoInicio() {
        return $this->belongsTo('App\Empleado', 'idEmpleadoInicio');
    }
    
    public function mesa() {
        return $this->belongsTo('App\Mesa', 'numeroMesa');
    }
    
    public function empleadoCierre() {
        return $this->belongsTo('App\Empleado', 'idEmpleadoCierre');
    }
}
