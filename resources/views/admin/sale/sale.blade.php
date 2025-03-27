@extends('masterPage')
@section('content')

<div class="row">
    <div class="col">
        <div class="modal fade" id="saleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Sale form</h5>
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
                                <label class="form-label">Users:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-user-circle'></i></span>
                                    <select name="users" class="form-select">
                                        <option value="">Choose Users</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Stocker">Stocker</option>
                                        <option value="Cashier">Cashier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Customers:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                    <select name="customers" class="form-select">
                                        <option value="">Choose Customer name</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Stocker">Stocker</option>
                                        <option value="Cashier">Cashier</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label class="form-label">Currency Rate:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <input type="text" name="currencyRate" class="form-control" placeholder="Contact Title" required />
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="sale-date-input" class="form-label">Sale Date:</label>
                                <input class="form-control" name="saleDate" type="date" value="2025-03-01" id="sale-date-input" />
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Products:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxl-product-hunt'></i></span>
                                    <select name="products" class="form-select">
                                        <option value="">Choose Products</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Stocker">Stocker</option>
                                        <option value="Cashier">Cashier</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label class="form-label">Units:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <input type="text" name="unit" class="form-control" placeholder="Units" required />
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Quantity</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bx-plus-circle'></i></span>
                                    <input type="number" name="qty" class="form-control" placeholder="Quantity" required />
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Price</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-dollar-circle'></i></span>
                                    <input type="number" name="price" class="form-control" placeholder="Price" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="discount" class="form-label">Discount:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-discount'></i></span>
                                    <input type="number" name="discount" class="form-control" placeholder="Discount" required />
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="checkbox" class="form-label mb-4"></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="membershipCard" />
                                    <label class="form-check-label" for="membershipCard"> Has membership card? </label>
                                </div>
                                <script>
                                    $(document).ready(function() {

                                        $("#membershipForm").hide();

                                        $("#membershipCard").click(function() {
                                            $("#membershipForm").slideToggle('slow');
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="row" id="membershipForm">
                            <div class="col-6 mb-3">
                                <label class="form-label">Card Number:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bx-card' ></i></span>
                                    <input type="number" name="cardNumber" class="form-control" placeholder="Card Number" required />
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Member Discount:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-discount'></i></span>
                                    <input type="number" name="memberDiscount" class="form-control" placeholder="member Discount" required />
                                </div>
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
                <h4 style="margin-bottom: 0px;"><strong><span><i>Sale List</i></span></strong></h4>
                <a href="#" data-bs-toggle="modal"
                    data-bs-target="#saleModal" class="btn btn-primary"><i class="bx bx-add-to-queue"></i> Create Sales</a>
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