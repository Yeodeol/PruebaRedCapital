<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion_c extends Model
{
    use HasFactory;
    
    protected $table = 'cotizacion_c';
    protected $fillable = ['usuario_id','fecha_emision','total_bruto','fecha_registro'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
