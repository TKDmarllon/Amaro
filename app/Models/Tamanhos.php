<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamanhos extends Model
{
    use HasFactory;
    protected $table='tamanhos';
    protected $fillable=['tamanhos','produtos_id'];

    public function Produtos(){
    return $this->belongsTo(Produtos::class);
}
}
