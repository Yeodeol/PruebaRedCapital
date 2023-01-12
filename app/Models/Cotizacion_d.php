<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion_d extends Model
{
    use HasFactory;
    protected $table = 'cotizacion_d';
    protected $fillable = ['cotizacion_id','producto_sku','cantidad','precio_unitario','fecha_registro'];
}
