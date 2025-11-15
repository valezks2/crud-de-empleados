<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleados';
    protected $tprimaryKey='id';
    protected $fillable=[
        'nombre',
        'apellido',
        'cargo',
        'departamento'
        ];
    
    use HasFactory;
}