<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index () {
        $cat = Category::select()->get();
        return view('admin.category.index', ['cat' => $cat]);
    }

    public function add(Request $request) {

        $cat = Category::select()->get();
        try{
            if($request->isMethod('POST')){
                $ten = $request->input('ten');
                $parent_id = $request->input('parent_id');
                $mota = $request->input('mota');
                Category::create([
                    'ten' => $ten,
                    'parent_id' => $parent_id,
                    'mota' => $mota
                ]);
            }
            $request->session()->flash('success', 'Thêm danh mục thành công');
        }
        catch(Expression $e){
            $request->session()->flash('error', 'Lỗi thêm danh mục');
        }
        return view('admin.category.add', ['cat' => $cat]);
    }

    public function edit($id, Request $request){
        
        try{

            $parentCat = Category::select()->get();
            $cat = Category::find($id);

            if($request->isMethod('POST')){
                $ten = $request->input('ten');
                $parent_id = $request->input('parent_id');
                $mota = $request->input('mota');
                $cat->ten = $ten;
                $cat->parent_id = $parent_id;
                $cat->mota = $mota;
                $cat->save();
                $request->session()->flash('success', 'Sửa danh mục thành công');
            }

            return view('admin.category.edit', ['cat' => $cat, 'parentCat' => $parentCat]);
        }catch(Expression $e){
            $request->session()->flash('error', 'Lỗi sửa danh mục ');
            return redirect()->to('/admin/category');
            
        }
    }

    public function delete($id, Request $request){
        try{
            Category::find($id)->delete();;
            $request->session()->flash('success', 'Xóa thành công'); 
        }catch(Expression $e){
            $request->session()->flash('error', 'Lỗi sửa danh mục '); 
        }
        return redirect()->to('/admin/category');
    }
}
