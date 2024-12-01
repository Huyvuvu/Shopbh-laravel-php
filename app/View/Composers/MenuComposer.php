<?php
//B1. Tạo file comporser trong thư mục  App\View\Composers
namespace App\View\Composers;

use App\View\Share\Menu;
use Illuminate\View\View;


class MenuComposer {

    public function compose (View $view){
        $view->with('menu', Menu::getMenu());
    }
}

//B1. Tạo file comporser
//B2. Đăng ký comporser
//B3. Sử dụng