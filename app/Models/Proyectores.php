<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectores extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'numero_serie', 'baja'];
}
