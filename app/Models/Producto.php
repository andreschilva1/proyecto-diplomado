<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'Producto';
    //protected $primaryKey = 'ProductoID';
    public $timestamps = false;
    protected $fillable = [
        'Nombre',
        'Precio',
        'Stock',
        'Url',
        'idCategoria',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'idCategoria', 'id');
    }
}
