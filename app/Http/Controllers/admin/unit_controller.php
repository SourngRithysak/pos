<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class unit_controller extends Controller
{

    function unit()
    {
        $units = Unit::where('status', '!=', 'deleted')->paginate(10);
        return view("admin.unit.unit", compact('units'));
    }

    public function addUnit(Request $request)
    {
        $request->validate([
            'unit_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',
        ]);

        $unit = Unit::create([
            'unit_name' => $request->unit_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Unit added successfully!');

    }

    public function edit($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return response()->json(['error' => 'Unit not found'], 404);
        }

        return response()->json($unit);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update([
            'unit_name' => $request->unit_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }

    // Update ststus to "deleted"
    public function updateStatus(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->status = $request->status;
        $unit->save();

        return back()->with('error', 'Unit marked as deleted!');
    }
}
