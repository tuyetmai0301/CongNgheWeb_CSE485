<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Medicine;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('medicine')->paginate(5);
        return view('sales.index', compact('sales'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view('sales.create', compact('medicines'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer',
            'sale_date' => 'required|date',
            'customer_phone' => 'required|string',
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')
            ->with('success', 'Thêm thành công!');
    
    }

   
    public function edit(string $id)
    {
        $sale = Sale::findOrFail($id);
        $medicines = Medicine::all();

        return view('sales.edit', compact('sale', 'medicines'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer',
            'sale_date' => 'required|date',
            'customer_phone' => 'required|string',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update($request->all());

        return redirect()->route('sales.index')
            ->with('success', 'Cập nhật thành công!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Xóa thành công!');
    
    }
}
