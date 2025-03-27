@extends('cashierpage')
@section('title','Sale')
@section('content')

<div class="col-12 order-1 mb-4">
    <div class="card">
        <div class="d-flex justify-content-between align-items-center card-header">
            <h3 style="margin-bottom: 0px;"><strong><span><i>Sale</i></span></strong></h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col mb-3">
                                <label class="form-label">Name</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                    <input type="text" name="txtName" class="form-control" placeholder="Name" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col mb-3">
                                <label class="form-label">Membership</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-id-card"></i></span>
                                    <input type="text" name="txtCardNumber" class="form-control" placeholder="Card Number" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col mb-3">
                                <label class="form-label">Payment Method</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-credit-card"></i></span>
                                    <select name="txtPaymentMethod" class="form-select">
                                        <option value="Cash">Cash</option>
                                        <option value="Card">Card & Mobile</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col mb-3">
                                <label class="form-label">Product Barcode</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bx-barcode-reader'></i></span>
                                    <video id="video" autoplay></video>
                                    <input type="text" id="result" name="txtProductBarcode" class="form-control" placeholder="Product Barcode" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped ">
                            <thead class="p-3 text-center">
                                <tr class="text-nowrap">
                                    <th class="col-1"><strong>№</strong></th>
                                    <th class="col"><strong>Image</strong></th>
                                    <th class="col-2"><strong>Product</strong></th>
                                    <th class="col-2"><strong>Barcode</strong></th>
                                    <th class="col"><strong>Unit</strong></th>
                                    <th class="col"><strong>Quantity</strong></th>
                                    <th class="col"><strong>Price ($)</strong></th>
                                    <th class="col"><strong>Discount</strong></th>
                                    <th class="col"><strong>Total</strong></th>
                                    <th class="col-1"><strong>Remove</strong></th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">

                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-0 mt-3">
                        <div class="col-md-8">
                            <span class="text-black">Total Return Product: 1</span>
                        </div>
                        <div class="col-md-4 text-end">
                            <span class="text-black">Total Return Quantity: 2</span>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row justify-content-end m-0">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-2 p-0">
                                    <div class="d-flex justify-content-between align-items-center card-header">
                                        <h4 class="mb-0"><strong><span><i>Total</i></span></strong></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-4 text-end">
                                    <strong class="text-black" id="subtotal">$ 0</strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <span class="text-black">VAT (10%)</span>
                                </div>
                                <div class="col-md-4 text-end">
                                    <strong class="text-black">$2.00</strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <span class="text-black">Membership Discount</span>
                                </div>
                                <div class="col-md-4 text-end">
                                    <strong class="text-black">$00.00</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-8">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-4 text-end">
                                    <strong class="text-black">$22.00</strong>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="/admin/users" class="btn btn-outline-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection