<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    ///nếu tên bản không phải là menus thì cần phải khai báo rõ
    //protected $table = 'menus';

    //Nếu bảng không có trường created_at và updated_at
    //public $timestamps = false;

    protected $fillable = [
        'ten',
        'idCha',
        'idCat',
        'mota',
        'anhien',
        'thutu',
        'slug'
    ];
}
