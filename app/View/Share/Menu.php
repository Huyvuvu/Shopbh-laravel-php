<?php
namespace App\View\Share;

use App\Models\Menu as ModelsMenu;

class Menu {
    public static function getMenu($idCha = NULL, $cN = 'nav-item nav-link') {

        $menu = ModelsMenu::where([['idCha', $idCha], ['anhien', 1]])->orderBy('thutu', 'desc')->get();
        $html = '';
        foreach($menu as $i){
             
            $child = Menu::getMenu($i->id, 'dropdown-item');
            if(strlen($child) > 0){
                $html .= '<ul class="nav-item dropdown">'.
                            '<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">'.$i->ten.'</a>'.
                            '<li class="dropdown1-menu m-0 bg-secondary rounded-0">'.
                                $child .
                            '</li>'.
                        '</ul>';
             }
             else{
                $html .= '<a href="/'.$i->slug.'" class="'.$cN.'">'.$i->ten.'</a>';
             }
        }
        return $html;
    }
}
?>