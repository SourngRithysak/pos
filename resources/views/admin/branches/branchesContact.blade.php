@extends('masterPage')
@section('title','Branch Contacts')
@section('content')

<!-- Add Branch Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Add New Branch Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="branchContactForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="branches_id" id="branches_id"> <!-- Store Branch ID -->
                    
                    <div class="row">
                        <!-- Contact Name -->
                        <div class="col-md-4 mb-3">
                            <label for="contact_name" class="form-label">Contact Name</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bx-rename'></i></span>
                                <input type="text" id="contact_name" class="form-control" name="contact_name" placeholder="Contact Name"  />
                            </div>
                        </div>
                        
                        <!-- Contact Title -->
                        <div class="col-md-4 mb-3">
                            <label for="contact_title" class="form-label">Contact Title</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                <select id="contact_title" class="form-select" name="contact_title" >
                                    <option value="" disabled selected>Select Title</option>
                                    <option value="Mr">Mr.</option>
                                    <option value="Mrs">Mrs.</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms.</option>
                                    <option value="Dr">Dr.</option>
                                    <option value="Prof">Prof.</option>
                                    <option value="Sir">Sir</option>
                                    <option value="Madam">Madam</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Contact Number -->
                        <div class="col-md-4 mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bx-phone'></i></span>
                                <input type="text" id="contact_number" class="form-control" name="contact_number" placeholder="Contact Number" />
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="status" value="active">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Branches -->
<div class="row">
    <div class="col">
        <div class="modal fade" id="editBranchesModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Branch</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editBranchesForm">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" id="editBranchId" name="id"> <!-- Store Branch ID -->
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="editContactName" class="form-label">Contact Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-rename'></i></span>
                                        <input type="text" id="editContactName" class="form-control" name="contact_name" placeholder="Contact Name" />
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="editContactTitle" class="form-label">Contact Title</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                        <select id="editContactTitle" class="form-select" name="contact_title">
                                            <option value="Mr">Mr.</option>
                                            <option value="Mrs">Mrs.</option>
                                            <option value="Miss">Miss</option>
                                            <option value="Ms">Ms.</option>
                                            <option value="Dr">Dr. </option>
                                            <option value="Prof">Prof. </option>
                                            <option value="Sir">Sir </option>
                                            <option value="Madam">Madam </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="editContactNumber" class="form-label">Contact Number</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-phone'></i></span>
                                        <input type="text" id="editContactNumber" class="form-control" name="contact_number" placeholder="Contact Number" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="editStatus" class="form-label">Status</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                        <select id="editStatus" class="form-select" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Update Branch</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>




<!-- Read Data -->
@if(session('success'))
<div class="alert alert-danger alert-dismissible">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card">
    <div class="d-flex align-items-end row">
        <div>
            <div class="d-flex justify-content-between align-items-center card-header">
                <h4 style="margin-bottom: 0px;"><strong><span><i>Branch Contacts-list</i></span></strong></h4>
                <a href="#" data-bs-toggle="modal"
                    data-bs-target="#addBranchesModal" class="btn btn-primary"><i class="bx bx-add-to-queue"></i> Add New Branch</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            <!-- All items -->
                        </caption>
                        <thead class="p-3 text-center">
                            <tr>
                                <th class="col-1"><strong>№</strong></th>
                                <th class="col-2"><strong>Branch Name</strong></th>
                                <th class="col-2"><strong>Contact Name</strong></th>
                                <th class="col-2"><strong>Contact Number</strong></th>
                                <th class="col-2"><strong>Status</strong></th>
                                <th class="col-1"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($contacts as $contact)
                            <tr>
                                <td class="p-3 text-center"><strong>{{ $i++ }}</strong></td>
                                <td class="p-3 text-center">{{ $contact->branch_name }}</td>
                                <td class="p-3 text-center">{{ $contact->contact_title }}. {{ $contact->contact_name }}</td>
                                <td class="p-3 text-center">{{ $contact->contact_number }}</td>
                                <td class="p-3 text-center">
                                    <span class="badge {{ $contact->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($contact->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-id="{{ $contact->id }}"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            <form action="{{ route('branches.contacts.delete', $contact->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="deleted" />
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this contact?');" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <a href="/admin/branches" class="btn btn-outline-secondary">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#branchContactForm').submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('branches.contacts.add') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        alert("Contact added successfully!");
                        $('#contactModal').modal('hide');
                        location.reload();
                    } else {
                        alert("Failed to add contact.");
                    }
                },
                error: function (xhr) {
                    alert("Error: " + xhr.responseJSON.message);
                }
            });
        });
    });

    function setBranchId(branchId) {
        $('#branches_id').val(branchId);
    }
</script>

@endsection