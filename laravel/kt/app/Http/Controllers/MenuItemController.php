<?php
namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('restaurant')->paginate(5); // 5 món/trang
        return view('menu_items.index', compact('menuItems'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        return view('menu_items.create', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dish_name' => 'required|max:100',
            'price' => 'required|numeric|min:0.01',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        MenuItem::create($request->all());

        return redirect()->route('menu_items.index')
            ->with('success', 'Menu item created successfully!');
    }

    public function edit(MenuItem $menuItem)
    {
        $restaurants = Restaurant::all();
        return view('menu_items.edit', compact('menuItem', 'restaurants'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'dish_name' => 'required|max:100',
            'price' => 'required|numeric|min:0.01',
        ]);

        $menuItem->update($request->all());

        return redirect()->route('menu_items.index')
            ->with('success', 'Menu item updated successfully!');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu_items.index')
            ->with('success', 'Menu item deleted successfully!');
    }
}
