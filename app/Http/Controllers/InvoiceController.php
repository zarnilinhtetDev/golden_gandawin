<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $customers = Customer::find($id);
        return view('blade.invoice.invoice', compact('customers'));
    }

    public function autocompleteItemCode(Request $request)
    {
        $query = $request->get('query');
        $items = Item::where('Synthetic', 'like', '%' . $query . '%')->pluck('Synthetic');
        return response()->json($items);
    }
    public function getItemData(Request $request)
    {
        $result = Item::where('', $request->product)->first();

        if (!$result) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($result);
    }
}
