<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HistorialCompra extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'total', 'fecha'];
    protected $dates = ['fecha']; // Esto asegura que Laravel maneje el campo `fecha` como un objeto Carbon


    
    public function productos()
{
    return $this->hasMany(HistorialProducto::class);
}

}
