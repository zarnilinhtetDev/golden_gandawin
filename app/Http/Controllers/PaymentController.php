<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Payment;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment($id)
    {
        $data = Invoice::find($id);
        $payment = Payment::where('invoice_id', $id)->get();
        return view('blade.payment.payment', compact('data', 'payment'));
    }
    public function payment_register(Request $request)
    {
        Payment::create($request->all());
        return back()->with('success', 'Add Payment Successful');
    }
    public function payment_delete($id)
    {
        $data = Payment::find($id);
        $data->delete();
        return back()->with('error', 'Payment Delete Successfully');
    }
    public function payment_edit($id)
    {
        $payment = Payment::find($id);
        return view('blade.payment.paymentEdit', compact('payment'));
    }
    public function payment_update(Request $request, $id)
    {
        $item = Payment::find($id);
        $item->update(request()->all());
        return redirect()->route('payment.show', ['id' => $id])->with('update', 'Payment updated successfully');
    }
}
