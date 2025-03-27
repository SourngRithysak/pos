<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class exchange_controller extends Controller
{

    public function exchangeRate(){
        $currencies = Exchange::get();
        return view("admin.branches.exchangeRate", compact('currencies'));
    }


    public function edit($id)
    {
        $currency = Exchange::find($id);

        if (!$currency) {
            return response()->json(['error' => 'currency not found'], 404);
        }

        return response()->json($currency);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usd' => 'required|numeric',
            'khr' => 'required|numeric',
        ]);

        $currency = Exchange::findOrFail($id);
        $currency->update([
            'usd' => $request->usd,
            'khr' => $request->khr,
        ]);

        return response()->json(['success' => true]);
    }

}
