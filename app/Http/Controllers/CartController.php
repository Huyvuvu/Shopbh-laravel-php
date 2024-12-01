<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Vw_carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //Thông tin giỏ hàng - HTML
    public function index()
    {

        $iduser = Auth::id();
        $cart = Vw_carts::where('iduser', $iduser)->get();
        return view('cart.index', ['cart' => $cart]);
    }

    //Thêm và cập nhật sản phẩm vào giỏ hàng - POST - JSON
    public function addCart(Request $request)
    {

        try {

            $iduser = Auth::id();
            $idv = $request->input('idv');
            $sl = $request->input('sl');
            $item = Cart::where([['iduser', $iduser], ['idpv', $idv]])->get()->first();
            if ($item) {
                ///Cập nhật giỏ hàng
                Cart::where([['iduser', $iduser], ['idpv', $idv]])
                    ->update(['soluong' => ($item->soluong +  $sl)]);
                return response()->json(['error' => false, 'message' => 'Cập nhật vào giỏ hàng thành công']);
            } else {
                ///Thêm vào giỏ hàng
                Cart::create([
                    'iduser' => $iduser,
                    'idpv' => $idv,
                    'soluong' => $sl
                ]);
                return response()->json(['error' => false, 'message' => 'Thêm vào giỏ hàng thành công']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Lỗi khi thêm hoặc cập nhật giỏ hàng']);
        }
    }

    //Xóa sản phẩm khỏi giỏ hàng
    public function removeCart($id)
    {
        try {
            $iduser = Auth::id();
            Cart::where([['iduser', $iduser], ['idpv', $id]])->delete();
            return response()->json(['error' => false, 'message' => 'Xóa sản phẩm trong giỏ hàng thành công']);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Lỗi xóa sản phẩm trong giỏ hàng']);
        }
    }

    // CartController.php
    public function showCart()
    {
        // Assume you're getting the cart items from session or database
        $cart = session('cart', []);  // Or wherever you're storing the cart items
        
        // Calculate the total price of all items in the cart
        $total = collect($cart)->sum(function($item) {
            return $item['gia'] * $item['soluong'];  // Calculate the total for each item
        });

        // Return the view with the cart and total
        return view('cart', compact('cart', 'total'));
    }

    
}
