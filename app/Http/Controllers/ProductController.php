<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Vw_products;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //Danh mục sản phẩm == category
    public function index(string $cat, int $p = 1){
        $size = 3;
        //Cần lấy dữ liệu
        //Toàn bộ sản phẩm theo $cat
        //Lấy idCat
        $idCat = Menu::where('slug', $cat)->first()->idCat;
        //Lấy toàn bộ Category có id = $idCat or parent_id = $idCat
        //hàm pluck chuyển đổi tất cả id thành 1 mảng
        $listIdCat = Category::where('id', $idCat)
        ->orWhere('parent_id', $idCat)->pluck('id')->toArray();
        $skip = ($p - 1) * $size;
        $sanPham = Vw_products::whereIn('idCat', $listIdCat)->skip($skip)->take($size)->get();
        $sotrang = ceil(count(Vw_products::whereIn('idCat', $listIdCat)->get())/$size);
        
        return view('Product.index', [
            'sp' => $sanPham, 
            'sotrang' => $sotrang, 
            'page' => $p, 
            'url' => $cat
        ]);
    }
    /// 
    //Chi tiết sản phẩm = detail
    public function detail(string $cat, String $slug){
        $sanPham = Vw_products::where('slug', $slug)->first();
        return view('Product.detail',['sp' => $sanPham, 'cat' => $cat]);
    }
}
