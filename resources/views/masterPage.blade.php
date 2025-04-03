<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>POS - Admin - @yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo.png')}}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
  <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
  <script src="{{asset('assets/js/config.js')}}"></script>

  <!-- Include jsPDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <!-- Include jsPDF AutoTable plugin -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- JsBarcode library -->
  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js"></script>

  <style>
    .search-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .quantity-selector {
      display: inline-flex;
      align-items: center;
      justify-content: space-between;
      width: 80px;
      background-color: #f7f9fc;
      border-radius: 8px;
      padding: 6px 10px;
      border: 1px solid #e1e4e8;
      box-sizing: border-box;
      font-family: sans-serif;
    }

    .quantity-btn {
      background: none;
      border: none;
      font-size: 1.2rem;
      color: #1f3c68;
      cursor: pointer;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background-color 0.2s ease;
    }

    .quantity-btn:hover {
      background-color: #e9edf3;
    }

    .quantity-value {
      font-size: 15px;
      font-weight: 600;
      color: #1f3c68;
      margin: 0 4px;
      text-align: center;
      width: 20px;
    }

    #barcodeContainer {
      display: block;
      margin-top: 20px;
    }

    .product-category {
      margin-bottom: 20px;
    }

    .product-category h5 {
      margin-bottom: 10px;
      font-weight: bold;
      text-align: left;
    }

    .barcode-row {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      justify-content: flex-start;
    }

    .barcode-label {
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 10px;
      text-align: center;
      background-color: #fff;
      width: 180px;
    }

    .barcode-label h6 {
      margin: 0 0 5px;
      font-weight: bold;
      font-size: 14px;
    }

    .barcode-label p {
      margin: 4px 0;
      font-size: 14px;
    }

    .barcode-canvas {
      display: block;
      margin: 8px auto;
    }

    .barcode-text {
      font-size: 12px;
      margin: 0;
    }
  </style>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="/admin" class="app-brand-link">
            <h3 class="app-brand-text  menu-text fw-bolder ms-2">Mart</h3>
          </a>
          <a href="#" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <ul class="menu-inner py-1">
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Main</span>
          </li>
          <li class="menu-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('/admin/dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-line-chart"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Inventory</span>
          </li>

          <li class="menu-item {{ Request::is('admin/products', 'admin/addProduct', 'admin/stock', 'admin/printBarcode') ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle">
              <i class='menu-icon tf-icons bx bx-package'></i>
              <div data-i18n="Layouts">Products</div>
            </a>
            <ul class="menu-sub {{ Request::is('admin/products', 'admin/addProduct', 'admin/stock', 'admin/printBarcode') ? 'show' : '' }}">
              <li class="menu-item {{ Request::is('admin/products') ? 'active':'' }}">
                <a href="{{ url('/admin/products') }}" class="menu-link">
                  <div data-i18n="Without menu">Products</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('admin/addProduct*') ? 'active':'' }}">
                <a href="{{ url('/admin/addProduct') }}" class="menu-link">
                  <div data-i18n="Without menu">Create Product</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('admin/stock') ? 'active':'' }}">
                <a href="{{ url('/admin/stock') }}" class="menu-link">
                  <div data-i18n="Without menu">Stock</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('admin/printBarcode') ? 'active':'' }}">
                <a href="{{ url('/admin/printBarcode') }}" class="menu-link">
                  <div data-i18n="Without menu">Print Barcode</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-item {{ Request::is('admin/category*', 'admin/subCategory*') ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle">
              <i class='menu-icon tf-icons bx bx-purchase-tag-alt'></i>
              <div data-i18n="Layouts">Categories</div>
            </a>
            <ul class="menu-sub {{ Request::is('admin/category*', 'admin/subCategory*') ? 'show' : '' }}">
              <li class="menu-item {{ Request::is('admin/category*') ? 'active' : '' }}">
                <a href="{{ url('/admin/category') }}" class="menu-link">
                  <div data-i18n="Without menu">Categories</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('admin/subcategory*') ? 'active' : '' }}">
                <a href="{{ url('/admin/subcategory') }}" class="menu-link">
                  <div data-i18n="Without menu">Sub Categories</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-item {{ Request::is('admin/unit*') ? 'active':'' }}">
            <a href="{{ url('/admin/unit') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-tag"></i>
              <div data-i18n="Analytics">Units</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Stock</span>
          </li>

          <li class="menu-item {{ Request::is('admin/stockIn') ? 'active':'' }}">
            <a href="{{ url('/admin/stockIn') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layer-plus"></i>
              <div data-i18n="Analytics">Stock in</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/stockOut') ? 'active':'' }}">
            <a href="{{ url('/admin/stockOut') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layer-minus"></i>
              <div data-i18n="Analytics">Stock out</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/stockAdjustment') ? 'active':'' }}">
            <a href="{{ url('/admin/stockAdjustment') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layer"></i>
              <div data-i18n="Analytics">Stock Adjustment</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/stockTransfer') ? 'active':'' }}">
            <a href="{{ url('/admin/stockTransfer') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-buildings"></i>
              <div data-i18n="Analytics">Stock Transfer</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Sale</span>
          </li>


          <li class="menu-item {{ Request::is('admin/sale') ? 'active':'' }}">
            <a href="{{ url('/admin/sale') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cart"></i>
              <div data-i18n="Analytics">Sales</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/invoice') ? 'active':'' }}">
            <a href="{{ url('/admin/invoice') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-receipt"></i>
              <div data-i18n="Analytics">Invoices</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/saleReturn') ? 'active':'' }}">
            <a href="{{ url('/admin/saleReturn') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
              <div data-i18n="Analytics">Sales Return</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Promo</span>
          </li>

          <li class="menu-item {{ Request::is('admin/card', 'admin/createCard') ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle">
              <i class='menu-icon tf-icons bx bx-id-card'></i>
              <div data-i18n="Layouts">Membership Card</div>
            </a>
            <ul class="menu-sub {{ Request::is('admin/card', 'admin/createCard') ? 'show' : '' }}">
              <li class="menu-item {{ Request::is('admin/card') ? 'active' : '' }}">
                <a href="{{ url('/admin/card') }}" class="menu-link">
                  <div data-i18n="Without menu">Card</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('admin/createCard') ? 'active' : '' }}">
                <a href="{{ url('/admin/createCard') }}" class="menu-link">
                  <div data-i18n="Without menu">Create Card</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">People</span>
          </li>

          <li class="menu-item {{ Request::is('admin/customer') ? 'active' : '' }}">
            <a href="{{ url('/admin/customer') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-group"></i>
              <div data-i18n="Analytics">Customer</div>
            </a>
          </li>

          <li class="menu-item {{ Request::is('admin/supplier') ? 'active' : '' }}">
            <a href="{{ url('/admin/supplier') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Analytics">Supplier</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Purchases</span>
          </li>

          <li class="menu-item {{ Request::is('admin/purchase') ? 'active' : '' }}">
            <a href="{{ url('/admin/purchase') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-archive"></i>
              <div data-i18n="Analytics">Purchases</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Report</span>
          </li>

          <li class="menu-item {{ Request::is('admin/saleReport') ? 'active' : '' }}">
            <a href="{{ url('/admin/saleReport') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-bar-chart"></i>
              <div data-i18n="Analytics">Sales Report</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/purchaseReport') ? 'active' : '' }}">
            <a href="{{ url('/admin/purchaseReport') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-pie-chart-alt-2"></i>
              <div data-i18n="Analytics">Purchase Report</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/inventoryReport') ? 'active' : '' }}">
            <a href="{{ url('/admin/inventoryReport') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-component"></i>
              <div data-i18n="Analytics">Inventory Report</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/expenseReport') ? 'active' : '' }}">
            <a href="{{ url('/admin/expenseReport') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-archive-out"></i>
              <div data-i18n="Analytics">Expense Report</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/incomeReport') ? 'active' : '' }}">
            <a href="{{ url('/admin/incomeReport') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-archive-in"></i>
              <div data-i18n="Analytics">Income Report</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/endOfDayClosingReport') ? 'active' : '' }}">
            <a href="{{ url('/admin/endOfDayClosingReport') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-task"></i>
              <div data-i18n="Analytics">End of day Closing</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/vatReport') ? 'active' : '' }}">
            <a href="{{ url('/admin/vatReport') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-data"></i>
              <div data-i18n="Analytics">VAT Report</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">HRM</span>
          </li>

          <li class="menu-item {{ Request::is('admin/employee') ? 'active' : '' }}">
            <a href="{{ url('/admin/employee') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Analytics">Employees</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/department') ? 'active' : '' }}">
            <a href="{{ url('/admin/department') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-group"></i>
              <div data-i18n="Analytics">Departments</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/users') ? 'active' : '' }}">
            <a href="{{ url('/admin/users') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user-circle"></i>
              <div data-i18n="Analytics">Users</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Branches</span>
          </li>

          <li class="menu-item {{ Request::is('admin/branches') ? 'active' : '' }}">
            <a href="{{ url('/admin/branches') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-buildings"></i>
              <div data-i18n="Analytics">Branches</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Branches</span>
          </li>

          <li class="menu-item {{ Request::is('admin/exchangeRate') ? 'active' : '' }}">
            <a href="{{ url('/admin/exchangeRate') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-badge-dollar"></i>
              <div data-i18n="Analytics">Exchange Rate</div>
            </a>
          </li>

        </ul>
      </aside>

      
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">{{ Auth::guard('admin')->user()->username }}</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col">

                @yield('content')

              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/js/menu.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>