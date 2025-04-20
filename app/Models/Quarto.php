<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    protected $table = 'quartos';
    protected $hidden = ['hotel_id', 'created_at', 'updated_at'];

    protected $fillable = ['disponivel'];
}
