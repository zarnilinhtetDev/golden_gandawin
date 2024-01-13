<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Sell;
use App\Models\Invoice;
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
    public function store_invoice(Request $request, $id)
    {

        // Validate the incoming request data
        $count = count($request->item_name);

        // Create a new Invoice instance and fill it with the request data
        $invoice = new Invoice();
        $invoice->invoice_number = $request->input('invoice_number');
        $invoice->payment_duedate = $request->input('payment_duedate');
        $invoice->invoice_date = $request->input('invoice_date');
        $invoice->customer_id = $request->input('customer_id');
        $invoice->customer_name = $request->customer_name;
        $invoice->address = $request->address;
        $invoice->phone = $request->phone;
        $invoice->total = $request->total;
        $invoice->discount_cash = $request->discount_cash;
        $invoice->commercial_text = $request->commercial_text;
        $invoice->super_total = $request->super_total;
        $invoice->paid = $request->paid;
        $invoice->balance = $request->balance;
        $invoice->save();

        $last_id = $invoice->id;

        for ($i = 0; $i < $count; $i++) {
            $result = new Sell;
            $result->invoiceid = $last_id;
            // $result->customer_name = $request->customer_name;
            // $result->address = $request->address;
            // $result->phone = $request->phone;
            $result->item_code = $request->item_code[$i];
            $result->item_name = $request->item_name[$i];
            $result->product_qty = $request->product_qty[$i];
            $result->product_price = $request->product_price[$i];
            $result->discount_percent = $request->discount_percent[$i];
            $result->discount = $request->discount[$i];
            $result->foc = $request->foc[$i];
            $result->save();
        }

        return redirect(url('invoiceManage'))->with('success', 'Invice Created Successful');
    }
    public function invoiceManage()
    {
        $details = Invoice::latest()->get();
        return view('blade.invoice.invoice_manage', compact('details'));
    }
    public function invoiceDetail($id)
    {
        $datas = Invoice::find($id);

        $product = Sell::where('invoiceid', $id)->get();
        return view('blade.invoice.invoice_detail', compact('datas', 'product',));
    }
    public function invoiceManageDetail($id)
    {
        $details = Invoice::latest()->get();
        return view('blade.invoice.invoice_manage_detail', compact('details'));
    }
}
