@extends('masterPage')
@section('content')

<div class="row">
    <div class="col">
        <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Name</label>
                                <input type="text" id="nameLarge" class="form-control" placeholder="Enter Name" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailLarge" class="form-label">Email</label>
                                <input type="text" id="emailLarge" class="form-control" placeholder="xxxx@xxx.xx" />
                            </div>
                            <div class="col mb-0">
                                <label for="dobLarge" class="form-label">DOB</label>
                                <input type="text" id="dobLarge" class="form-control" placeholder="DD / MM / YY" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
                <h4 style="margin-bottom: 0px;"><strong><span><i>Stock-Out List</i></span></strong></h4>
                <a href="#" data-bs-toggle="modal"
                    data-bs-target="#largeModal" class="btn btn-primary"><i class="bx bx-add-to-queue"></i> Add New Stock-Out</a>
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
                                <td class="p-3 ">
                                    <p class="mb-2"></p>
                                    <p class="mb-2"></p>
                                    <p class="mb-2"></p>
                                    <p class="mb-2"></p>
                                </td>
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