@extends('masterPage')
@section('content')


<!-- Edit Currency -->
<div class="row">
    <div class="col">
        <div class="modal fade" id="editCurrencyModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Currency</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="currencyForm">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" id="editCurrencyId" name="id"> <!-- Store Currency ID -->

                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="usd" class="form-label"><img src="{{asset('assets/images/usd.svg')}}" width="15px"> USD - United States Dollar</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">$</span>
                                        <input type="text" id="usd" name="usd" class="form-control" placeholder="USD" />
                                    </div>
                                </div>
                                <div class="col mb-0">
                                    <label for="khr" class="form-label"><img src="{{asset('assets/images/khr.svg')}}" width="15px"> KHR - Cambodian Riel</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">៛</span>
                                        <input type="text" id="khr" name="khr" class="form-control" placeholder="KHR" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Update Currency</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="card">
    <div class="d-flex align-items-end row">
        <div>
            <div class="d-flex justify-content-between align-items-center card-header">
                <h4 style="margin-bottom: 0px;"><strong><span><i>Exchange Rate</i></span></strong></h4>
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
                                <th class="col-4"><img src="{{asset('assets/images/usd.svg')}}" width="15px"><strong> USD - United States Dollar</strong></th>
                                <th class="col-1"><strong>to</strong></th>
                                <th class="col-4"><img src="{{asset('assets/images/khr.svg')}}" width="15px"><strong> KHR - Cambodian Riel</strong></th>
                                <th class="col-2"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($currencies as $currency)
                            <tr>
                                <td class="p-3 text-center"><strong>1</strong></td>
                                <td class="p-3 text-center">$ {{ $currency->usd }}</td>
                                <td class="p-3 text-center">=</td>
                                <td class="p-3 text-center">{{ $currency->khr }} ៛</td>
                                <td class="p-3 text-center">
                                    <button class="dropdown-item editCurrencyBtn" data-id="{{ $currency->id }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $(document).ready(function() {

        // Open edit modal and fetch data
        $(".editCurrencyBtn").click(function() {
            let currencyId = $(this).data("id");

            $.ajax({
                url: "/admin/exchangeRate/" + currencyId + "/edit",
                type: "GET",
                success: function(response) {
                    console.log(response); // Debugging

                    $("#editCurrencyId").val(response.id);
                    $("#usd").val(response.usd);
                    $("#khr").val(response.khr).change();

                    $("#editCurrencyModal").modal("show");
                },
                error: function() {
                    alert("Failed to fetch currency data.");
                }
            });
        });

        // Handle form submission for update
        $("#currencyForm").on("submit", function(e) {
            e.preventDefault();

            let currencyId = $("#editCurrencyId").val();
            let formData = $(this).serialize();

            $.ajax({
                url: "/admin/exchangeRate/" + currencyId,
                type: "PUT",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        alert("Currency updated successfully!");
                        $("#editCurrencyModal").modal("hide");
                        location.reload(); // Refresh the page
                    } else {
                        alert("Error updating currency.");
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