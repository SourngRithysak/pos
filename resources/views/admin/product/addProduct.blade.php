@extends('masterPage')
@section('content')

<div class="card">
    <div class="d-flex justify-content-between align-items-center card-header">
        <h4 style="margin-bottom: 0px;"><strong><span><i>Create New Product</i></span></strong></h4>
    </div>
    <div class="d-flex align-items-end row">
        <div>
            <form action="/admin/addProductSubmit" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-label">Category:</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bxs-category'></i></span>
                                <select name="category_id" class="form-select">
                                    <option value="">Choose Categories</option>
                                    <option value="1">Manager</option>
                                    <option value="2">Stocker</option>
                                    <option value="3">Cashier</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label">Sale unit:</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bxs-hand-up'></i></span>
                                <select name="sale_unit_id" class="form-select">
                                    <option value="">Choose Sale unit</option>
                                    <option value="1">Manager</option>
                                    <option value="2">Stocker</option>
                                    <option value="3">Cashier</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label">Price in sale unit:</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bx-dollar-circle'></i></span>
                                <input type="number" name="priceInSaleUnit" class="form-control" placeholder="Price in sale unit" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-label">Discount:</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bxs-discount'></i></span>
                                <input type="number" name="discount" class="form-control" placeholder="Discount" required />
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label">Products:</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bxl-product-hunt'></i></span>
                                <input type="text" name="product_name" class="form-control" placeholder="Name" required />
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label">Barcode:</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class='bx bx-barcode'></i></span>
                                <input type="text" name="barcode" class="form-control" placeholder="Barcode" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-6 mb-3">
                            <label class="form-label">Status:</label>
                            <div style="display: flex; justify-content: left; align-items: center;">
                                <div class="form-check" style="padding-right: 10px;">
                                    <label class="form-check-label" for="active"> Active </label>
                                    <input name="status" class="form-check-input" type="radio" value="" id="active" checked />
                                </div>
                                <div class="form-check">
                                    <input name="status" class="form-check-input" type="radio" value="" id="inactive" />
                                    <label class="form-check-label" for="inactive"> Inactive </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="formFile" class="form-label">Image:</label>
                            <input class="form-control" name="image" type="file" id="formFile" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="checkbox" class="form-label mb-4"></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="buikUnit" />
                                <label class="form-check-label" for="buikUnit"> Is it has bulk unit? </label>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $("#bulkUnitForm").hide();
                                    $("#buikUnit").click(function() {
                                        $("#bulkUnitForm").slideToggle('slow');
                                    });
                                });
                            </script>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="checkbox" class="form-label mb-4"></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="iskit" />
                                <label class="form-check-label" for="iskit"> Is kit? </label>
                            </div>
                        </div>
                    </div>

                    <div id="bulkUnitForm">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Bulk unit:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bx-card'></i></span>
                                    <input type="number" name="bulk_unit_id" class="form-control" placeholder="Card Number" />
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Price in Bulk unit:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-discount'></i></span>
                                    <input type="number" name="memberDiscount" class="form-control" placeholder="member Discount" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Discount:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-discount'></i></span>
                                    <input type="number" name="cardNumber" class="form-control" placeholder="Discount" />
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Conversion rate:</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bxs-discount'></i></span>
                                    <input type="number" name="conversion_rate" class="form-control" placeholder="Conversion rate" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn rounded-pill btn-secondary">Clear</button>
                    <button type="submit" class="btn rounded-pill btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection