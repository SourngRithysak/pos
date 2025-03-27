<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class subCategory_controller extends Controller
{
    public function subcategory()
    {
        $subcategories = Category::where('status', '!=', 'deleted')->whereNull('parent_id')->paginate(10);
        return view("admin.category.subCategory", compact('subcategories'));
        
    }

    public function addSubcategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',
        ]);

        $subcategory = Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true, 'data' => $subcategory]);
    }

    public function edit($id)
    {
        $subcategory = Category::find($id);

        if (!$subcategory) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($subcategory);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',
        ]);

        $subcategory = Category::findOrFail($id);
        $subcategory->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }

    // Update ststus to "deleted"
    public function updateStatus(Request $request, $id)
    {
        $subcategory = Category::findOrFail($id);
        $subcategory->status = $request->status;
        $subcategory->save();

        return back()->with('error', 'Category marked as deleted!');
    }
}
