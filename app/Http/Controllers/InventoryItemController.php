<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use Illuminate\Http\Request;

class InventoryItemController extends Controller
{
    public function index()
    {
        $inventoryItems = InventoryItem::all();
        return view('inventory_items.index', compact('inventoryItems'));
    }

    public function create()
    {
        return view('inventory_items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        
        $inventoryItem = new InventoryItem();
        $this->save($inventoryItem, $request);
        return redirect()->route('inventory_items.index');
    }

    public function show(string $id)
    {
        $inventoryItem = InventoryItem::findOrFail($id);
        return view('inventory_items.show', compact('inventoryItem'));
    }

    public function edit(string $id)
    {
        $inventoryItem = InventoryItem::findOrFail($id);
        return view('inventory_items.edit', compact('inventoryItem'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        
        $inventoryItem = InventoryItem::findOrFail($id);
        $this->save($inventoryItem, $request);
        return redirect()->route('inventory_items.index');
    }

    public function destroy(string $id)
    {
        $inventoryItem = InventoryItem::findOrFail($id);
        $inventoryItem->delete();
        return redirect()->route('inventory_items.index')->with('success', 'Inventory item deleted successfully.');
    }

    private function save($inventoryItem, Request $request)
    {
        $inventoryItem->name = $request->name;
        $inventoryItem->quantity = $request->quantity;
        $inventoryItem->price = $request->price;
        $inventoryItem->save();
    }
}
