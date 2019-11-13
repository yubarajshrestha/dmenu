<?php

namespace YubarajShrestha\DMenu\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use YubarajShrestha\DMenu\DMenu;

class DMenuController extends Controller
{

    public function index() {
        $dmenu = config('dmenu.routes');
        $menus = [];
        foreach($dmenu as $menu) {
            $item = new DMenu($menu);
            array_push($menus, $item);
        }
        return view('dmenu.index', compact('menus'));
    }

    public function fetch($model) {
        $model = urldecode($model);
        return $model::paginate(2);
    }

    public function store() {
    	//
    }

    public function update() {
    	//
    }

    public function delete() {
    	//
    }

}
