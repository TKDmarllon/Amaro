<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
     protected $table='produtos';
     protected $fillable=['nome','valor','cor','sku','genero'];

public function Estoque()
{
    return $this->hasMany(Estoque::class,'produtos_id');
}
}