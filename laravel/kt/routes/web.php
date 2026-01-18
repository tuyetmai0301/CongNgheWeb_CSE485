<?php
use App\Http\Controllers\MenuItemController;

Route::get('/', function() {
    return redirect()->route('menu_items.index');
});

Route::resource('menu_items', MenuItemController::class);
