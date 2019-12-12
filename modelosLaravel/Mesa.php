<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesa';
    public $timestamps = false;

    protected $fillable = [
        'numero','imagen','disponible'
    ];

    public function mesaFacturas() {
        return $this->hasMany('App\MesaFactura');
    }
    
    public function facturas() {
        return $this->hasMany('App\Factura');
    }
}
