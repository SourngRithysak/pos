<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BranchesContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class branchesContact_controller extends Controller
{
    public function index($id)
{
    $contacts = DB::table('tbl_branches_contact')
        ->join('tbl_branches', 'tbl_branches_contact.branches_id', '=', 'tbl_branches.id')
        ->where('tbl_branches_contact.status', '!=', 'deleted')
        ->where('tbl_branches_contact.branches_id', $id) 
        ->select(
            'tbl_branches_contact.id',
            'tbl_branches_contact.branches_id',
            'tbl_branches_contact.contact_title',
            'tbl_branches_contact.contact_name',
            'tbl_branches_contact.contact_number',
            'tbl_branches_contact.status',
            'tbl_branches.name as branch_name'
        )
        ->get(); 



        return view('admin.branches.branchesContact', compact('contacts'));
    }

    public function addContact(Request $request)
    {
        $request->validate([
            'branches_id' => 'required|exists:tbl_branches,id',
            'contact_name' => 'required|string|max:255',
            'contact_title' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:15',
            'status' => 'required',
        ]);

        $contact = BranchesContact::create([
            'branches_id' => $request->branches_id,
            'contact_name' => $request->contact_name,
            'contact_title' => $request->contact_title,
            'contact_number' => $request->contact_number,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true, 'data' => $contact]);
    }

    public function edit($id)
    {
        $contact = BranchesContact::find($id);

        if (!$contact) {
            return response()->json(['error' => 'Contact not found'], 404);
        }

        return response()->json($contact);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'branches_id' => 'required|exists:tbl_branches,id',
            'contact_name' => 'required|string|max:255',
            'contact_title' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:15',
            'status' => 'required',
        ]);

        $contact = BranchesContact::findOrFail($id);
        $contact->update([
            'branches_id' => $request->branches_id,
            'contact_name' => $request->contact_name,
            'contact_title' => $request->contact_title,
            'contact_number' => $request->contact_number,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }

    // Update ststus to "deleted"
    public function updateStatus(Request $request, $id)
    {
        $contact = BranchesContact::findOrFail($id);
        $contact->status = $request->status;
        $contact->save();

        return back()->with('error', 'Contact marked as deleted!');
    }
}
