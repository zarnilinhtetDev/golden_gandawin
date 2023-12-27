<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function item()
    {
        $products = Item::all();
        return view('blade.items.item', compact('products'));
    }
    public function item_store(Request $request, Item $item)
    {
        $item->create($request->all());
        return back()->with('success', 'Product Created Successfull');
    }
    public function product_delete($id)
    {
        $data = Item::find($id);
        $data->delete();
        return back()->with('error', 'Product Delete Successfully');
    }
    public function product_update($id)
    {
        $product = Item::find($id);
        return view('blade.items.itemupdate', compact('product'));
    }
    public function update_product(Request $request, $id)
    {
        $item = Item::find($id);
        $item->update(request()->all());
        return redirect(url('product'))->with('update', 'Product updated Successfully');
    }
}
