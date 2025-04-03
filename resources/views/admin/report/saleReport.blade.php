@extends('masterPage')
@section('content')

<div class="card">
    <div class="d-flex align-items-end row">
        <div>
            <div class="d-flex justify-content-between align-items-center card-header">
                <h4 style="margin-bottom: 0px;"><strong><span><i>Sale-Report</i></span></strong></h4>
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
                <div class="search-container">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-search"></i></span>
                        <input type="text" name="txtSearch" class="form-control" placeholder="Search" />
                    </div>

                    <div class="dropdown" style="padding-left: 10px;">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="columnDropdown" data-bs-toggle="dropdown">
                            Select Fields
                        </button>
                        <div class="dropdown-menu">
                            <ul aria-labelledby="columnDropdown">
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="0" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Id </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="1" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Sale Date </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="2" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Customer </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="3" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Invoice </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="4" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Exchange Rate </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="5" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Vat </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="6" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Subtotal </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="7" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Member Discount </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="8" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Total </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input column-toggle" type="checkbox" data-column="9" checked />
                                    <label class="form-check-label" for="defaultCheck3"> Action </label>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>

                <div style="display: flex; flex-direction: row; padding-left: 20px; align-items: center;">
                    <label class="form-label" for="start-date" style="padding-top: 10px;">Start Date:</label>
                    <div style="padding-left: 10px;">
                        <input class="form-control" id="start-date" name="startDate" type="date" />
                    </div>

                    <label class="form-label" for="end-date" style="padding-left: 10px; padding-top: 10px;">End Date:</label>
                    <div style="padding-left: 10px;">
                        <input class="form-control" id="end-date" name="endDate" type="date" />
                    </div>

                    <div style="padding-left: 10px;">
                        <button class="btn btn-icon btn-primary" id="filter-button">
                            <i class="bx bx-search"></i>
                        </button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                
                <script>

                </script>

                <div class="table-responsive text-nowrap">
                    <table class="table" id="saleReport">
                        <caption class="ms-4">
                            All of items
                        </caption>
                        <thead class="p-3 text-center">
                            <tr>
                                <th><strong>№</strong></th>
                                <th><strong>Sales Date</strong></th>
                                <th><strong>Customer</strong></th>
                                <th><strong>Invoice</strong></th>
                                <th><strong>Exchange Rate</strong></th>
                                <th><strong>VAT</strong></th>
                                <th><strong>Subtotal</strong></th>
                                <th><strong>Member Dis.</strong></th>
                                <th><strong>Total</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            {{-- @foreach($cus as $rw) --}}
                            @foreach($sales as $sale)
                            <tr>
                                <td class="text-center"><strong>{{ $i }}</strong></td>
                                <td class="text-center"><strong>{{ \Carbon\Carbon::parse($sale['sale_date'])->format('d-M-Y') }}</strong></td>
                                <td class="text-center"><strong>{{ $sale['customer_name'] }}</strong></td>
                                <td class="text-center"><strong>{{ $sale['invoice_no'] }}</strong></td>
                                <td class="text-center"><strong>{{ $sale['currency_rate'] }}</strong></td>
                                <td class="text-center"><strong>{{ $sale['vat'] }}$</strong></td>
                                <td class="text-center"><strong>{{ $sale['subtotal'] }}$</strong></td>
                                <td class="text-center"><strong>{{ $sale['member_discount'] }}$</strong></td>
                                <td class="text-center"><strong>{{ $sale['total'] }}$</strong></td>
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