@extends('masterPage')
@section('content')

<div class="card">
    <div class="d-flex align-items-end row">
        <div>
            <div class="d-flex justify-content-between align-items-center card-header">
                <h4 style="margin-bottom: 0px;"><strong><span><i>Inventory-Report</i></span></strong></h4>
                <div>
                    <!-- PDF Button -->
                    <button id="exportPDF" class="btn btn-icon btn-danger me-2">
                        <i class="bx bxs-file-pdf" style="font-size: 30px;"></i>
                    </button>

                    <!-- CSV Button -->
                    <button id="exportCSV" class="btn btn-icon btn-success">
                        <i class="bx bxs-file-export" style="font-size: 30px;"></i>
                    </button>

                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center card-header">
                <div class="search-container" style="display: flex; flex-direction: row;">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-search"></i></span>
                        <input type="text" name="txtSearch" class="form-control" placeholder="Search" />
                    </div>

                    <div class="dropdown" style="margin-left: 20px;">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="columnDropdown" data-bs-toggle="dropdown">
                            Choose Columns
                        </button>
                        <div class="dropdown-menu">
                            <ul aria-labelledby="columnDropdown">
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="0" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Customer Name </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="1" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Reference </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="2" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Date </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="3" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Status </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="4" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Grand Total </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="5" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Paid </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="6" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Due </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="7" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Payment Status </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="8" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Biller </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="9" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Action </label>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

                <div style="display: flex; flex-direction: row;">
                    <button style="margin-right: 10px;" id="filter-dropdown" class="btn btn-icon btn-primary">
                        <span class="tf-icons bx bx-filter-alt"></span>
                    </button>

                    <script>
                        $(document).ready(function() {

                            $("form").hide();

                            $("#filter-dropdown").click(function() {
                                $("form").slideToggle('slow');

                                $(this).find("span").toggleClass("bx-filter-alt bx-x");
                            });
                        });
                    </script>

                    <select class="form-select" id="sort-by-date" aria-label="Sort-By-Date">
                        <option selected>Sort-By-Date</option>
                        <option value="1">21-2-2025</option>
                        <option value="2">22-2-2025</option>
                        <option value="3">23-2-2025</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/saleReport') }}">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-3">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <select class="form-select" aria-label="customer-selection">
                                    <option selected>Choose Customer Name</option>
                                    <option value="1">Kane</option>
                                    <option value="2">Denny</option>
                                    <option value="3">David</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-stop-circle"></i></span>
                                <select class="form-select" aria-label="status-selection">
                                    <option selected>Choose Status</option>
                                    <option value="1">Kane</option>
                                    <option value="2">Denny</option>
                                    <option value="3">David</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-file"></i></span>
                                <input type="text" name="txtName" class="form-control" placeholder="Enter Reference" />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-stop-circle"></i></span>
                                <select class="form-select" aria-label="payment-status-selection">
                                    <option selected>Choose Payment Status</option>
                                    <option value="1">Kane</option>
                                    <option value="2">Denny</option>
                                    <option value="3">David</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-2">
                            <button class="btn btn-primary">
                                <span class="tf-icons bx bx-search"></span>
                                Search
                            </button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="saleReport">
                        <caption class="ms-4">
                            All of items
                        </caption>
                        <thead class="p-3 text-center">
                            <tr>
                                <th><strong>№</strong></th>
                                <th><strong>Date</strong></th>
                                <th><strong>Product</strong></th>
                                <th><strong>Unit</strong></th>
                                <th><strong>Stock in</strong></th>
                                <th><strong>Stock out</strong></th>
                                <th><strong>Stock adjustment</strong></th>
                                <th><strong>Stock return</strong></th>
                                <th><strong>Restock qty</strong></th>
                                <th><strong>Defective qty</strong></th>
                                <th><strong>Kit transaction</strong></th>
                                <th><strong>Closing Stock</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            {{-- @foreach($cus as $rw) --}}
                            @foreach($inventories as $inventory)
                            <tr>
                                <td class="text-center"><strong>{{ $inventory['id'] }}</strong></td>
                                <td class="text-center"><strong>{{ \Carbon\Carbon::parse($inventory['closing_date'])->format('d-M-Y') }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['product_name'] }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['unit_name'] }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['stock_in'] }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['stock_out'] }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['stock_adjustment'] }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['stock_return'] }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['restock_quantity'] }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['defective_quantity'] }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['kit_transaction'] }}</strong></td>
                                <td class="text-center"><strong>{{ $inventory['closing_stock'] }}</strong></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item"><i class="bx bx-show me-1"></i> Sale Detail</a>
                                            <a href="#" class="dropdown-item"><i class="bx bx-edit me-1"></i> Edit</a>
                                            <a href="#" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            {{-- @endforeach --}}
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            $(".column-toggle").change(function() {

                                var columnIndex = $(this).data("column");

                                var nthChildIndex = columnIndex + 1;

                                var isChecked = $(this).is(":checked");

                                if (isChecked) {
                                    $("#saleReport th:nth-child(" + nthChildIndex + "), #saleReport td:nth-child(" + nthChildIndex + ")").show();
                                } else {
                                    $("#saleReport th:nth-child(" + nthChildIndex + "), #saleReport td:nth-child(" + nthChildIndex + ")").hide();
                                }
                            });
                        });

                        // PDF
                        document.getElementById("exportPDF").addEventListener("click", function() {
                            const {
                                jsPDF
                            } = window.jspdf;
                            var doc = new jsPDF();

                            doc.autoTable({
                                html: '#saleReport'
                            });

                            doc.save("sale_report.pdf");
                        });

                        // Export to CSV files
                        document.getElementById("exportCSV").addEventListener("click", function() {
                            var csv = [];
                            var rows = document.querySelectorAll("#saleReport tr");

                            for (var i = 0; i < rows.length; i++) {
                                var row = [],
                                    cols = rows[i].querySelectorAll("td, th");
                                for (var j = 0; j < cols.length; j++) {

                                    row.push('"' + cols[j].innerText + '"');
                                }
                                csv.push(row.join(","));
                            }

                            var csvFile = new Blob([csv.join("\n")], {
                                type: "text/csv"
                            });
                            var downloadLink = document.createElement("a");
                            downloadLink.download = "sale_data.csv";
                            downloadLink.href = window.URL.createObjectURL(csvFile);
                            downloadLink.style.display = "none";
                            document.body.appendChild(downloadLink);
                            downloadLink.click();
                        });
                    </script>

                </div>
                {{-- {{$cus->links()}} --}}
            </div>
        </div>
    </div>
</div>

@endsection