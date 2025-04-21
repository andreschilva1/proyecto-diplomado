<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaventa extends Model
{
    use HasFactory;
    protected $table = 'Notaventa';
    //protected $primaryKey = 'NotaventaID';
    public $timestamps = false;

    protected $fillable = [
        'Fecha',        
        'Montototal',
        'idUsuario',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
    
}
