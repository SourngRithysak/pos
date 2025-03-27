@extends('masterPage')
@section('title','Categories')
@section('content')


<!-- Add Category -->
<div class="row">
    <div class="col">
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="categoryForm">
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="categoryName" class="form-label">Category Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-rename'></i></span>
                                        <input type="text" id="categoryName" class="form-control" name="category_name" placeholder="Category Name" />
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-chat'></i></span>
                                        <input type="text" id="description" class="form-control" name="description" placeholder="Description" />
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

<!-- Edit Category -->
<div class="row">
    <div class="col">
        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editCategoryForm">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" id="editCategoryId" name="id"> <!-- Store Category ID -->

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="editCategoryName" class="form-label">Category Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-rename'></i></span>
                                        <input type="text" id="editCategoryName" class="form-control" name="category_name" placeholder="Category Name">
                                    </div>
                                </div>
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
                            <button type="submit" class="btn btn-primary">Update Category</button>
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
                <h4 style="margin-bottom: 0px;"><strong><span><i>Categories-list</i></span></strong></h4>
                <a href="#" data-bs-toggle="modal"
                    data-bs-target="#addCategoryModal" class="btn btn-primary"><i class="bx bx-add-to-queue"></i> Add New Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            <!-- All of items -->
                        </caption>
                        <thead class="p-3 text-center">
                            <tr>
                                <th class="col-1"><strong>№</strong></th>
                                <th class="col-3"><strong>Name</strong></th>
                                <th class="col"><strong>Description</strong></th>
                                <th class="col-2"><strong>Status</strong></th>
                                <th class="col-2"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($categories as $category)
                            @if ($category->status != 'deleted')
                            <tr>
                                <td class="p-3 text-center"><strong>{{$i++}}</strong></td>
                                <td class="p-3 text-center">
                                    {{ $category->category_name }}
                                </td>
                                <td class="p-3 text-center">
                                    @if ($category->description)
                                    {{ $category->description }}
                                    @else
                                    No Description
                                    @endif
                                </td>
                                <td class="p-3 text-center">
                                    <span class="badge {{ $category->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($category->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item editCategoryBtn" data-id="{{ $category->id }}"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="deleted" />
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this category?');" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
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
                {{ $categories->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // Add category
        $("#categoryForm").on("submit", function(e) {
            e.preventDefault(); // Prevent form from refreshing

            $.ajax({
                url: "{{ route('categories.add') }}", // Update with your route
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        alert("Category added successfully!");
                        $("#addCategoryModal").modal("hide"); // Hide modal
                        $("#categoryForm")[0].reset(); // Reset form fields
                        location.reload(); // Refresh the page or update table dynamically
                    } else {
                        alert("Error adding category.");
                    }
                },
                error: function(xhr) {
                    alert("Something went wrong!");
                },
            });
        });

        // Open edit modal and fetch Category data
        $(".editCategoryBtn").click(function() {
            let categoryId = $(this).data("id");

            $.ajax({
                url: "/admin/categories/" + categoryId + "/edit",
                type: "GET",
                success: function(response) {
                    console.log(response); // Debugging

                    $("#editCategoryId").val(response.id);
                    $("#editCategoryName").val(response.category_name);
                    $("#editDescription").val(response.description);
                    $("#editStatus").val(response.status).change();

                    $("#editCategoryModal").modal("show");
                },
                error: function() {
                    alert("Failed to fetch category data.");
                }
            });
        });

        // Handle form submission for update
        $("#editCategoryForm").on("submit", function(e) {
            e.preventDefault();

            let categoryId = $("#editCategoryId").val();
            let formData = $(this).serialize();

            $.ajax({
                url: "/admin/categories/" + categoryId,
                type: "PUT",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        alert("Category updated successfully!");
                        $("#editCategoryModal").modal("hide");
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