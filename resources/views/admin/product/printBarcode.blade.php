@extends('masterPage')
@section('content')

<div class="card">

    <div class="d-flex align-items-end row">
        <div>
            <div class="d-flex justify-content-between align-items-center card-header">
                <h4 style="margin-bottom: 0px;"><strong><span><i>Print Barcode</i></span></strong></h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/saleReport') }}">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="">Product</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-search"></i></span>
                                <input type="text" name="txtName" class="form-control" placeholder="Search Product by Codename" />
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="p-3">
                                    <tr>
                                        <th class="text-left"><strong>Product</strong></th>
                                        <th class="text-center"><strong>SKU</strong></th>
                                        <th class="text-center"><strong>Code</strong></th>
                                        <th class="text-center"><strong>Qty</strong></th>
                                        <th class="text-center"><strong>Actions</strong></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0" id="product-table">
                                    <tr data-product="Nike Jordan" data-price="400">
                                        <td class="text-left"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Nike Jordan</strong></td>
                                        <td class="text-center">PT001</td>
                                        <td class="text-center">HG3FKH8</td>
                                        <td class="text-center">
                                            <div class="quantity-selector">
                                                <button class="quantity-btn decrement">-</button>
                                                <span id="quantityValue" class="quantity-value qty">1</span>
                                                <button class="quantity-btn increment">+</button>
                                            </div>
                                        </td>
                                        <td class="text-center"><button type="button" class="btn rounded-pill btn-icon btn-danger delete"><i class='bx bx-x me-1'></i></button></td>
                                    </tr>
                                    <tr data-product="Apple Series 5 Watch" data-price="800">
                                        <td class="text-left"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Apple Series 5 Watch</strong></td>
                                        <td class="text-center">PT002</td>
                                        <td class="text-center">TEUIU7</td>
                                        <td class="text-center">
                                            <div class="quantity-selector">
                                                <button class="quantity-btn decrement">-</button>
                                                <span id="quantityValue" class="quantity-value qty">2</span>
                                                <button class="quantity-btn increment">+</button>
                                            </div>
                                        </td>
                                        <td class="text-center"><button type="button" class="btn rounded-pill btn-icon btn-danger delete"><i class='bx bx-x me-1'></i></button></td>
                                    </tr>
                                    <tr data-product="Apple Series 9 Watch" data-price="1200">
                                        <td class="text-left"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Apple Series 9 Watch</strong></td>
                                        <td class="text-center">PT003</td>
                                        <td class="text-center">FEUDS9</td>
                                        <td class="text-center">
                                            <div class="quantity-selector">
                                                <button class="quantity-btn decrement">-</button>
                                                <span id="quantityValue" class="quantity-value qty">3</span>
                                                <button class="quantity-btn increment">+</button>
                                            </div>
                                        </td>
                                        <td class="text-center"><button type="button" class="btn rounded-pill btn-icon btn-danger delete"><i class='bx bx-x me-1'></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <div style="display: flex; flex-direction: row;">
                        <div class="form-check form-switch" style="margin-right: 30px;">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                            <label class="form-check-label" for="flexSwitchCheckChecked">Show Product</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                            <label class="form-check-label" for="flexSwitchCheckChecked">Show Price</label>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="btn btn-primary"
                        id="openModalAndGenerate">
                        <i class='bx bx-barcode'></i>
                        Generate Barcode
                    </button>

                    <div class="modal fade" id="barcodeModal" aria-labelledby="barcodeModalLabel" tabindex="-1" style="display: none" aria-hidden="true">
                        <div class="modal-dialog modal-xl" style="width: 66.7%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="barcodeModalLabel">Generate Barcode</h5>

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"></button>

                                </div>
                                <div class="modal-body" id="barcodeModalLabel">

                                    <div id="barcodeContainer">

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" style="margin-left: 10px;" id="exportPDF"><i class='bx bx-download'></i> Download PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            const storeName = "Grocery Alpha";

                            // QTY BUTTONS
                            $(document).on("click", ".increment", function() {
                                let qty = $(this).siblings(".qty");
                                qty.text(parseInt(qty.text()) + 1);
                            });

                            $(document).on("click", ".decrement", function() {
                                let qty = $(this).siblings(".qty");
                                let value = parseInt(qty.text());
                                if (value > 1) {
                                    qty.text(value - 1);
                                }
                            });

                            // DELETE ROW
                            $(document).on("click", ".delete", function() {
                                $(this).closest("tr").remove();
                            });

                            // ---------------------------------------
                            // MAIN BUTTON: Generate & Open Modal
                            // ---------------------------------------
                            $("#openModalAndGenerate").click(function() {
                                // 1) Clear previous barcodes
                                $("#barcodeContainer").empty();

                                // 2) Build product groups
                                let productGroups = {};

                                $("#product-table tr").each(function() {
                                    let productName = $(this).data("product");
                                    let price = $(this).data("price");
                                    let code = $(this).find("td:nth-child(3)").text().trim();
                                    let qty = parseInt($(this).find(".qty").text());

                                    if (!code || qty < 1) return;

                                    if (!productGroups[productName]) {
                                        productGroups[productName] = [];
                                    }

                                    for (let i = 0; i < qty; i++) {
                                        productGroups[productName].push({
                                            code,
                                            price
                                        });
                                    }
                                });

                                // 3) Generate barcodes per category
                                for (let productName in productGroups) {
                                    // Create product-category container
                                    let productCategory = document.createElement("div");
                                    productCategory.className = "product-category";

                                    // Heading
                                    let heading = document.createElement("h5");
                                    heading.textContent = productName;
                                    productCategory.appendChild(heading);

                                    // Row for barcodes
                                    let barcodeRow = document.createElement("div");
                                    barcodeRow.className = "barcode-row";

                                    productGroups[productName].forEach(({
                                        code,
                                        price
                                    }) => {
                                        let labelDiv = document.createElement("div");
                                        labelDiv.className = "barcode-label";

                                        labelDiv.innerHTML = `
                                            <h6>${storeName}</h6>
                                            <p>${productName}</p>
                                            <p>Price: $${price}</p>
                                            <canvas class="barcode-canvas"></canvas>
                                            <p class="barcode-text">${code}</p>
                                        `;
                                        barcodeRow.appendChild(labelDiv);

                                        let canvas = labelDiv.querySelector(".barcode-canvas");
                                        JsBarcode(canvas, code, {
                                            format: "CODE128",
                                            lineColor: "#000",
                                            width: 1.2,
                                            height: 50,
                                            margin: 0,
                                            displayValue: false
                                        });
                                    });

                                    productCategory.appendChild(barcodeRow);
                                    document.getElementById("barcodeContainer").appendChild(productCategory);
                                }

                                $("#barcodeModal").modal("show");
                            });

                            // Export to PDF
                            $("#exportPDF").click(async function() {
                                try {
                                    const container = document.getElementById("barcodeContainer");
                                    const canvas = await html2canvas(container, {
                                        scale: 2
                                    });
                                    const imgData = canvas.toDataURL("image/png");

                                    const {
                                        jsPDF
                                    } = window.jspdf;
                                    const pdf = new jsPDF({
                                        orientation: "p",
                                        unit: "mm",
                                        format: "a4"
                                    });

                                    const pdfWidth = pdf.internal.pageSize.getWidth();
                                    const pdfHeight = pdf.internal.pageSize.getHeight();
                                    const margin = 5;
                                    const availableWidth = pdfWidth - margin * 2;

                                    const canvasAspect = canvas.width / canvas.height;
                                    const imgHeight = availableWidth / canvasAspect;

                                    pdf.addImage(imgData, "PNG", margin, margin, availableWidth, imgHeight);
                                    pdf.save("printBarcode.pdf");
                                } catch (error) {
                                    console.error("PDF generation error:", error);
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection