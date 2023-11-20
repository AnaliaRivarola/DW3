<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    public $table = 'cargos';
     protected $fillable = [
    	'id',
    	'nombre',
    	'descripcion',
    	'sector',
    	'empresa',
        'id_cargo'	
    ];
}
