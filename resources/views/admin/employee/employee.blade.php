@extends('masterPage')
@section('content')

<div class="row">
    <div class="col">
        <div class="modal fade" id="employeeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Employee form</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label class="form-label">Branches:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                    <select name="branches" class="form-select">
                                        <option value="">Choose Branches</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Stocker">Stocker</option>
                                        <option value="Cashier">Cashier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">First Name:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <input type="text" name="txtName" class="form-control" placeholder="Enter First-name" required />
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Departments:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                    <select name="departments" class="form-select">
                                        <option value="">Choose Departments</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Stocker">Stocker</option>
                                        <option value="Cashier">Cashier</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label class="form-label">Title of Courtesy:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                    <select name="toc" class="form-select">
                                        <option value="">Choose Title of Courtesy</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Stocker">Stocker</option>
                                        <option value="Cashier">Cashier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Report to:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                    <select name="reportTo" class="form-select">
                                        <option value="">Choose Reports</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Stocker">Stocker</option>
                                        <option value="Cashier">Cashier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="hire-date-input" class="form-label">Hire Date:</label>
                                <input class="form-control" name="hireDate" type="date" value="2025-03-01" id="hire-date-input" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label class="form-label">Contact Title:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <input type="text" name="contactTitle" class="form-control" placeholder="Contact Title" required />
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Contact:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <input type="text" name="contact" class="form-control" placeholder="Contact" required />
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Status:</label>
                                <div style="display: flex; justify-content: left; align-items: center;">
                                    <div class="form-check" style="padding-right: 10px;">
                                        <label class="form-check-label" for="active"> Active </label>
                                        <input
                                            name="status"
                                            class="form-check-input"
                                            type="radio"
                                            value=""
                                            id="active"
                                            checked />
                                    </div>
                                    <div class="form-check">
                                        <input
                                            name="status"
                                            class="form-check-input"
                                            type="radio"
                                            value=""
                                            id="inactive" />
                                        <label class="form-check-label" for="inactive"> Inactive </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <textarea class="form-control" id="address" rows="3"></textarea>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" id="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="d-flex align-items-end row">
        <div>
            <div class="d-flex justify-content-between align-items-center card-header">
                <h4 style="margin-bottom: 0px;"><strong><span><i>Employees</i></span></strong></h4>
                <a href="#" data-bs-toggle="modal"
                    data-bs-target="#employeeModal" class="btn btn-primary"><i class="bx bx-add-to-queue"></i> Create Employees</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            All of items
                        </caption>
                        <thead class="p-3 text-center">
                            <tr>
                                <th class="col-1"><strong>№</strong></th>
                                <th class="col"><strong>Name</strong></th>
                                <th class="col"><strong>Role</strong></th>
                                <th class="col"><strong>Campus</strong></th>
                                <th class="col-2"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            {{-- @foreach($cus as $rw) --}}
                            <tr>
                                <td class="p-3 text-center"><strong>1</strong></td>
                                <td class="p-3 text-center">
                                    <p class="mb-2">Ra Smach</p>
                                    <p class="mb-2"></p>
                                    <p class="mb-2"></p>
                                    <p class="mb-2"></p>
                                </td>
                                <td class="p-3 text-center">Admin</td>
                                <td class="p-3 text-center">Cambodia</td>
                                <td class="p-3 text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="" class="dropdown-item"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="">
                                                <input type="hidden" name="txtCusStatus" class="form-control" placeholder="Enter Customer Status" value="0" />
                                                <button type="submit" onclick="return confirm('Are you sure to delete?');" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
                {{-- {{$cus->links()}} --}}
            </div>
        </div>
    </div>
</div>

@endsection