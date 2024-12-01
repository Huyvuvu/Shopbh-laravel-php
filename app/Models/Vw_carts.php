<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Name;

class Vw_carts extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'images',	
        'gia',
        'iduser',
        'idpv',
        'soluong'
    ];
}
