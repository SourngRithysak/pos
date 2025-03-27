@extends('masterPage')
@section('content')

<div class="card">
    <div class="d-flex align-items-end row">
        <div>
            <div class="d-flex justify-content-between align-items-center card-header">
                <h4 style="margin-bottom: 0px;"><strong><span><i>Products-list</i></span></strong></h4>
                <a href="{{ url('/admin/addProduct') }}" class="btn btn-primary"><i class="bx bx-add-to-queue"></i> Add New Product</a>
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
                                <th class="col-2"><strong>Barcode</strong></th>
                                <th class="col-2"><strong>Image</strong></th>
                                <th class="col-3"><strong>Product's Info</strong></th>
                                <th class="col-3"><strong>Product's Price</strong></th>
                                <th class="col-1"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="p-3 text-center"><strong>1</strong></td>
                                <td class="p-3 ">
                                    <p class="mb-0"></p>
                                </td>
                                <td class="p-3 text-center">
                                    <div class="list-unstyled users-list m-0 avatar-group  ">
                                        <i data-bs-toggle="tooltip" title="" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs">
                                            <img src="" alt="Picture" style="width: 80px; height:auto;" />
                                        </i>
                                    </div>
                                </td>
                                <td class="p-3">
                                </td>
                                <td class="p-3">
                                </td>
                                <td class="p-3 text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="#">
                                                <input type="hidden" name="txtProStatus" class="form-control" placeholder="Enter Product Status" value="0" />
                                                <button type="submit" onclick="return confirm('Are you sure to delete?');" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection