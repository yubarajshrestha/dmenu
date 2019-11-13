<?php
	$routeName = 'd-menu';
	if($data = config('dmenu')) {
		$routeName = $data['route-name'];
	}
    Route::get($routeName, 'YubarajShrestha\DMenu\Controllers\DMenuController@index')->name('dmenu.index');
    Route::get($routeName . '/{model}/fetch', 'YubarajShrestha\DMenu\Controllers\DMenuController@fetch')->name('dmenu.fetch');
    Route::post($routeName, 'YubarajShrestha\DMenu\Controllers\DMenuController@store')->name('dmenu.store');
    Route::put($routeName . '/{id}', 'YubarajShrestha\DMenu\Controllers\DMenuController@update')->name('dmenu.update');
    Route::delete($routeName . '/{id}', 'YubarajShrestha\DMenu\Controllers\DMenuController@delete')->name('dmenu.delete');