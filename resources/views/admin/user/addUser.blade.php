@extends('masterPage')
@section('content')

<div class="card">
    <div class="d-flex align-items-end row">
        <div>
            <form action="" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add New User</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col mb-3">
                                <label class="form-label">Name</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <input type="text" name="txtName" class="form-control" placeholder="Username" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <input type="password" name="txtPassword" class="form-control" placeholder="Password" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col mb-3">
                                <label class="form-label">Role</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <select name="txtRole" class="form-select">
                                        <option value="Admin">Admin</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Stocker">Stocker</option>
                                        <option value="Cashier">Cashier</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col mb-3">
                                <label class="form-label">Status</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <select name="txtStatus" class="form-select">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col mb-3">
                                <label class="form-label">Employee</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <select name="txtEmployee" class="form-select">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col mb-3">
                                <label class="form-label">Branch</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <select name="txtBranch" class="form-select">
                                        <option value="Active">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/admin/users" class="btn btn-outline-secondary">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection