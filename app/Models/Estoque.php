<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    protected $table='estoque';
    protected $fillable=['pp','p','m','g','gg','produtos_id'];

    public function Produtos(){
    return $this->belongsTo(Produtos::class);
}
}
