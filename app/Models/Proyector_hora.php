<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyector_hora extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'proyector_id', 'horario', 'baja'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function proyector(){
        return $this->belongsTo(Proyectores::class);
    }
}
