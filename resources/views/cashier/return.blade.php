@extends('cashierpage')
@section('title','Sale Return')
@section('content')

<div class="col-12 order-1 mb-4">
    <div class="card">
        <div class="d-flex justify-content-between align-items-center card-header">
            <h3 style="margin-bottom: 0px;"><strong><span><i>Sales Return</i></span></strong></h3>
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

                </div>
            </form>
            <div class="col-12 order-1 mb-4">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center card-header">
                        <h3 style="margin-bottom: 0px;"><strong><span><i>Return</i></span></strong></h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col mb-3">
                                            <label class="form-label">Invoices №</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-rename"></i></span>
                                                <input type="text" name="txtName" class="form-control" placeholder="Name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col mb-3">
                                            <label class="form-label">Product Barcode</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class='bx bx-barcode-reader'></i></span>
                                                <input type="text" name="txtProductBarcode" class="form-control" placeholder="Product Barcode" required />
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
                                            <tbody>
                                                <tr>
                                                    <td class="p-3 text-center"><strong>1</strong></td>
                                                    <td class="p-2 text-center"><img src="../assets/img/avatars/1.png" class="w-px-50 h-auto" /></td>
                                                    <td class="p-3 text-center">Product</td>
                                                    <td class="p-3 text-center">12345</td>
                                                    <td class="p-3 text-center">Can</td>
                                                    <td class="p-3 text-center">2</td>
                                                    <td class="p-3 text-center">$10.00</td>
                                                    <td class="p-3 text-center">--</td>
                                                    <td class="p-3 text-center">$20.00</td>
                                                    <td class="p-3 text-center">x</td>
                                                </tr>
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

                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-12 order-1 mb-4">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center card-header">
                        <h3 style="margin-bottom: 0px;"><strong><span><i>Exchange</i></span></strong></h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="col mb-3">
                                            <label class="form-label">Product Barcode</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class='bx bx-barcode-reader'></i></span>
                                                <input type="text" name="txtProductBarcode" class="form-control" placeholder="Product Barcode" required />
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
                                            <tbody>
                                                <tr>
                                                    <td class="p-3 text-center"><strong>1</strong></td>
                                                    <td class="p-2 text-center"><img src="../assets/img/avatars/1.png" class="w-px-50 h-auto" /></td>
                                                    <td class="p-3 text-center">Product</td>
                                                    <td class="p-3 text-center">12345</td>
                                                    <td class="p-3 text-center">Can</td>
                                                    <td class="p-3 text-center">2</td>
                                                    <td class="p-3 text-center">$10.00</td>
                                                    <td class="p-3 text-center">--</td>
                                                    <td class="p-3 text-center">$20.00</td>
                                                    <td class="p-3 text-center">x</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mb-0 mt-3">
                                        <div class="col-md-8">
                                            <span class="text-black">Total Exchange Product: 1</span>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <span class="text-black">Total Exchange Quantity: 2</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection