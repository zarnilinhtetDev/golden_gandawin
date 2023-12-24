<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{

    public function price($id)
    {
        $car = Car::all();
        $cars = Car::find($id);
        $price = Price::with('car')->latest()->get();
        return view('blade.price.prices', compact('car', 'price', 'cars'));
    }
    public function priceRegister(Request $request)
    {

        request()->validate([
            "price" => "required|nullable",
            "car_id" => "required",
        ]);

        $price = new Price();
        $price->price = $request->price;

        $account = Car::find($request->input('car_id'));
        $account->price()->save($price);
        return redirect()->back()->with('success', 'Price Register is Successfull');
    }

    public function delete($id)
    {
        $price = Price::find($id);
        $price->delete();
        return redirect()->back()->with('deleteStatus', 'Price Delete is Successfull');
    }

    public function show($id)
    {

        $price = Price::find($id);
        return view('blade.price.pricesEdit', compact('price'));
    }

    public function update(Request $request, $id)
    {
        $price = Price::find($id);
        $price->price = $request->price;
        $price->update();
        return redirect()->back()->with('updateStatus', 'Price Update is Successfull');
    }
}
