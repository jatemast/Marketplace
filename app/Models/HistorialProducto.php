<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialProducto extends Model
{
    use HasFactory;
    protected $fillable = [
        'historial_compra_id',
        'producto_id',
        'cantidad',
        'precio',
    ];

    public function historialCompra()
    {
        return $this->belongsTo(HistorialCompra::class);
    }

    public function producto()
{
    return $this->belongsTo(Producto::class);
}

}
