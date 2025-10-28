<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'quantidade'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}