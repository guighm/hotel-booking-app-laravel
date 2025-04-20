<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hoteis';
    protected $fillable = ['nome', 'endereco', 'telefone', 'email', 'descricao'];
}
