<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function profit()
    {
        $profits = Profit::all();
        return view('blade.profit.profit', compact('profits'));
    }
    public function profit_register(Request $request)
    {
        Profit::create($request->all());
        return redirect()->back()->with('success', 'Profit created Successfully');
    }
    public function profit_delete($id)
    {
        $delete = Profit::find($id);
        $delete->delete();
        return back()->with('delete_success', 'Profit deleted successful');
    }
    public function profit_update($id)
    {
        $show = Profit::find($id);
        return view('blade.profit.profit_update', compact('show'));
    }
    public function profit_edit(Request $request, $id)
    {
        $request->validate([
            'profit_date' => 'required|date',
            'customer_name' => 'required|string',
            'voucher' => 'required|string',
            'voucher_date' => 'nullable|date',
            'sale' => 'nullable|numeric',
            'buy' => 'nullable|numeric',
            'profit' => 'nullable|numeric',
        ]);

        $update = Profit::find($id);

        // Update the model with the new data
        $update->update([
            'profit_date' => $request->input('profit_date'),
            'customer_name' => $request->input('customer_name'),
            'voucher' => $request->input('voucher'),
            'voucher_date' => $request->input('voucher_date'),
            'sale' => $request->input('sale'),
            'buy' => $request->input('buy'),
            'profit' => $request->input('profit'),

        ]);

        return redirect(url('profit'))->with('updatedata', 'Profit updated successfully');
    }
}
