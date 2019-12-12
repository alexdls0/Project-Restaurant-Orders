<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{

    protected $table = 'comanda';
    public $timestamps = false;

    protected $fillable = [
        'idFactura','idProducto','idEmpleado','unidades','precio','entregado'
    ];
    
    public function producto() {
        return $this->belongsTo('App\Producto', 'idProducto');
    }
    
    public function factura() {
        return $this->belongsTo('App\Factura', 'idFactura');
    }
    
    public function empleado() {
        return $this->belongsTo('App\Empleado', 'idEmpleado');
    }
    
    
}
