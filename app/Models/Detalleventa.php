<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleventa extends Model
{
    use HasFactory;
    protected $table = 'Detalleventa';    
    public $timestamps = false;

    protected $fillable = [
        'Cantidad',
        'idProducto',
        'idNotaVenta',
    ];
    
    // Define las relaciones si las tienes
}
