@extends('masterPage')
@section('title','Department')
@section('content')

<!-- Add Department -->
<div class="row">
    <div class="col">
        <div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Add New Department</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/department/add" method="post">
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="unitDepartment" class="form-label">Department Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-rename'></i></span>
                                        <input type="text" id="unitDepartment" class="form-control" name="department_name" placeholder="Department Name" />
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


<!-- Edit Department -->
<div class="row">
    <div class="col">
        <div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Department</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/editDepartment" method="post">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" id="editDepartmentId" name="id"> 

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="editDepartmentName" class="form-label">Department Name</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class='bx bx-rename'></i></span>
                                        <input type="text" id="editDepartmentName" class="form-control" name="department_name" placeholder="Department Name">
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
                            <button type="submit" class="btn btn-primary">Update Unit</button>
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
                <h4 style="margin-bottom: 0px;"><strong><span><i>Departments-list</i></span></strong></h4>
                <a href="#" data-bs-toggle="modal"
                    data-bs-target="#addDepartmentModal" class="btn btn-primary"><i class="bx bx-add-to-queue"></i> Add New Units</a>
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
                            @foreach($departments as $department)
                            @if ($department->status != 'deleted')
                            <tr>
                                <td class="p-3 text-center"><strong>{{$i++}}</strong></td>
                                <td class="p-3 text-center">
                                    {{ $department->department_name }}
                                </td>
                                <td class="p-3 text-center">
                                    @if ($department->description)
                                    {{ $department->description }}
                                    @else
                                    No Description
                                    @endif
                                </td>
                                <td class="p-3 text-center">
                                    <span class="badge {{ $department->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($department->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#editDepartmentModal"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                            
                                            

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $departments->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>


@endsection