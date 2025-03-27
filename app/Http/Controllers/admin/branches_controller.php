<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branches;
use App\Models\BranchesContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class branches_controller extends Controller
{
    public function branches()
    {
        $branches = Branches::join('tbl_branches_contact', 'tbl_branches.id', '=', 'tbl_branches_contact.branches_id')
            ->where('tbl_branches.status', '!=', 'deleted')
            ->select(
                'tbl_branches.id as branch_id',
                'tbl_branches.name as branch_name',
                'tbl_branches.address',
                'tbl_branches.city',
                'tbl_branches.country',
                'tbl_branches.status',
                'tbl_branches_contact.contact_name',
                'tbl_branches_contact.contact_title',
                'tbl_branches_contact.contact_number',
            )
            ->paginate(10);

        return view("admin.branches.branches", compact('branches'));
    }

    public function addBranches(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'description' => 'nullable|string',
            'contact_name' => 'required|string|max:255',
            'contact_title' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:15',
            'status' => 'required|in:active,inactive',
        ]);

        DB::beginTransaction();

        try {
            // Create a new branch
            $branch = new Branches();
            $branch->name = $request->name;
            $branch->address = $request->address;
            $branch->city = $request->city;
            $branch->country = $request->country;
            $branch->description = $request->description ?? null;
            $branch->status = $request->status;
            $branch->save(); // Save first to get ID

            // Create a new branch contact
            $contact = new BranchesContact();
            $contact->contact_name = $request->contact_name;
            $contact->contact_title = $request->contact_title ?? null;
            $contact->contact_number = $request->contact_number;

            // Use relationship to save contact under the branch
            $branch->contacts()->save($contact);

            DB::commit();

            return response()->json([
                'success' => 'Category added successfully!',
                'branch' => $branch,
                'contact' => $contact,
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // Update ststus to "deleted"
    public function updateStatus(Request $request, $id)
    {
        $branch = Branches::findOrFail($id);
        $branch->status = $request->status;
        $branch->save();

        return back()->with('error', 'Branch marked as deleted!');
    }
}
