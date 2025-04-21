<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'Usuario';
    //protected $primaryKey = 'UsuarioID';
    public $timestamps = false;
    protected $fillable = [
        'Correo',        
        'Nombre',
        'Password',
        'Rol',        
    ];
    
}
