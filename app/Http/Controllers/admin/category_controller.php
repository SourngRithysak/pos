<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class category_controller extends Controller
{
    public function category()
    {
        $categories = Category::where('status', '!=', 'deleted')->whereNull('parent_id')->paginate(10);
        return view("admin.category.Category", compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',
        ]);

        $category = Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true, 'data' => $category]);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }

    // Update ststus to "deleted"
    public function updateStatus(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->status = $request->status;
        $category->save();

        return back()->with('error', 'Category marked as deleted!');
    }
}
