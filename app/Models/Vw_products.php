<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Name;

class Vw_products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'mota',
        'mau',
        'th',
        'idCat',
        'chitiet',
        'thutu',
        'anhien',
        'idv',
        'dungluong',	
        'gia',
        'images',	
        'variant',	
        'tonkho'
    ];
}
