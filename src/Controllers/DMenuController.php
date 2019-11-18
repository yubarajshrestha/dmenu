<?php

namespace YubarajShrestha\DMenu\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use YubarajShrestha\DMenu\DMenu;
use YubarajShrestha\DMenu\MenuItems;
use Illuminate\Support\Facades\Validator;
use YubarajShrestha\DMenu\Models\DMenu as Menu;

class DMenuController extends Controller
{

    public function index() {
        // $dmenu = config('dmenu.routes');
        // $menus = [];
        // foreach($dmenu as $menu) {
        //     $item = new DMenu($menu);
        //     array_push($menus, $item);
        // }
        $menus = Menu::latest()->get();
        return view('dmenu.index', compact('menus'));
    }

    public function fetch(Request $request, $model) {
        $model = urldecode($model);
        $m = new $model;
        $paginator = $m->getMenuItems($request->get('per-page'));
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

    public function store(Request $request) {
    	$validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('dmenu.index')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $request->only(['name', 'description', 'enabled']);
        if(!isset($data['enabled'])) {
            $data['enabled'] = 0;
        } else {
            $data['enabled'] = (int) $data['enabled'];
        }

        $data['slug'] = Str::slug($request->name);

        try {
            Menu::create($data);
        } catch(Exception $e) {
            //
        }
        return redirect()->route('dmenu.index')->with('success', 'Menu successfully created.');
    }

    public function update() {
    	//
    }

    public function delete() {
    	//
    }
}
