<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Permite preenchimento em massa
    protected $fillable = ['nome'];

    // Relacionamento: uma categoria tem muitos produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}