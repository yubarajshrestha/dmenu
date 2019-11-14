<?php

namespace YubarajShrestha\DMenu\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use YubarajShrestha\DMenu\DMenu;
use YubarajShrestha\DMenu\MenuItems;

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
        $m = new $model;
        $paginator = $m->getMenuItems();
        $data = collect($paginator->items())->map(function ($dMenu) {
            return $dMenu->dMenu();
        });
        return response()->json([
            'data' => $data,
            'current' => $paginator->currentPage(),
            'next' => $paginator->nextPageUrl(),
            'prev' => $paginator->previousPageUrl()
        ]);
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
