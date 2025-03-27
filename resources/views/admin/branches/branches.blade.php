@extends('masterPage')
@section('title','Branches')
@section('content')

<!-- Add Branches -->
<div class="row">
    <div class="col">
        <div class="modal fade" id="addBranchesModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Add New Branch</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="branchesForm">
                        <div class="modal-body">
                            @csrf

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="name" class="form-label">Branch Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-rename'></i></span>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Branch Name" />
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-building-house'></i></span>
                                        <input type="text" id="address" class="form-control" name="address" placeholder="Address" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-map-pin'></i></span>
                                        <input type="text" id="city" class="form-control" name="city" placeholder="City" />
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-map-pin'></i></span>
                                        <input type="text" id="country" class="form-control" name="country" placeholder="Country" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-chat'></i></span>
                                        <input type="text" id="description" class="form-control" name="description" placeholder="Description" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="contact_name" class="form-label">Contact Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-rename'></i></span>
                                        <input type="text" id="contact_name" class="form-control" name="contact_name" placeholder="Contact Name" />
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="contact_title" class="form-label">Contact Title</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                        <select id="contact_title" class="form-select" name="contact_title">
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
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
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
                                    <label for="editName" class="form-label">Branch Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-rename'></i></span>
                                        <input type="text" id="editName" class="form-control" name="name" placeholder="Branch Name">
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="editAddress" class="form-label">Address</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-building-house'></i></span>
                                        <input type="text" id="editAddress" class="form-control" name="address" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="editCity" class="form-label">City</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-map-pin'></i></span>
                                        <input type="text" id="editCity" class="form-control" name="city" placeholder="City">
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="editCountry" class="form-label">Country</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-map-pin'></i></span>
                                        <input type="text" id="editCountry" class="form-control" name="country" placeholder="Country">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="editDescription" class="form-label">Description</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-chat'></i></span>
                                        <input type="text" id="editDescription" class="form-control" name="description" placeholder="Description">
                                    </div>
                                </div>
                            </div>
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
<div class="alert alert-success alert-dismissible">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card">
    <div class="d-flex align-items-end row">
        <div>
            <div class="d-flex justify-content-between align-items-center card-header">
                <h4 style="margin-bottom: 0px;"><strong><span><i>Branches-list</i></span></strong></h4>
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
                                <th class="col-2"><strong>Name</strong></th>
                                <th class="col-2"><strong>Address</strong></th>
                                <th class="col-2"><strong>City</strong></th>
                                <th class="col-2"><strong>Country</strong></th>
                                <th class="col-1"><strong>Contact Name</strong></th>
                                <th class="col-1"><strong>Contact Number</strong></th>
                                <th class="col"><strong>Description</strong></th>
                                <th class="col-1"><strong>Status</strong></th>
                                <th class="col-1"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($branches as $branch)
                            @if ($branch->status != 'deleted')
                            <tr>
                                <td class="p-3 text-center"><strong>{{$i++}}</strong></td>
                                <td class="p-3 text-center">{{ $branch->branch_name }}</td>
                                <td class="p-3 text-center">{{ $branch->address }}</td>
                                <td class="p-3 text-center">{{ $branch->city }}</td>
                                <td class="p-3 text-center">{{ $branch->country }}</td>
                                <td class="p-3 text-center">{{ $branch->contact_title }}. {{ $branch->contact_name }}</td>
                                <td class="p-3 text-center">{{ $branch->contact_number }}</td>
                                <td class="p-3 text-center">
                                    @if ($branch->description)
                                    {{ $branch->description }}
                                    @else
                                    No Description
                                    @endif
                                </td>
                                <td class="p-3 text-center">
                                    <span class="badge {{ $branch->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($branch->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item editBranchBtn" data-id="{{ $branch->branch_id }}"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            <form action="{{ route('branches.delete', $branch->branch_id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="deleted" />
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this branch?');" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $branches->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // Add branch
        $('#branchesForm').on('submit', function(e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "{{ route('branches.add') }}",
                data: formData,
                success: function(response) {
                    alert(response.success);
                    $('#addBranchesModal').modal('hide'); // Close modal
                    $('#branchesForm')[0].reset(); // Reset form
                },
                error: function(xhr) {
                    alert("Something went wrong!");
                }
            });
        });

        // Open edit modal and fetch Category data
        $(".editBranchBtn").click(function() {
            let BId = $(this).data("id");

            $.ajax({
                url: "/admin/branches/" + categoryId + "/edit",
                type: "GET",
                success: function(response) {
                    console.log(response); // Debugging

                    $("#editCategoryId").val(response.id);
                    $("#editCategoryName").val(response.category_name);
                    $("#editDescription").val(response.description);
                    $("#editStatus").val(response.status).change();

                    $("#editBranchesModal").modal("show");
                },
                error: function() {
                    alert("Failed to fetch category data.");
                }
            });
        });

        // Handle form submission for update
        $("#editBranchesForm").on("submit", function(e) {
            e.preventDefault();

            let categoryId = $("#editCategoryId").val();
            let formData = $(this).serialize();

            $.ajax({
                url: "/admin/branches/" + categoryId,
                type: "PUT",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        alert("Category updated successfully!");
                        $("#editBranchesModal").modal("hide");
                        location.reload(); // Refresh the page
                    } else {
                        alert("Error updating category.");
                    }
                },
                error: function() {
                    alert("Something went wrong!");
                }
            });
        });

    });
</script>



@endsection