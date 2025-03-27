<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>POS - Stock keeper - @yield('title')</title>
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
      position: relative;
      display: inline-block;
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
          <a href="/stockkeeper" class="app-brand-link">
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
          <li class="menu-item {{ Request::is('stockkeeper/dashboard') ? 'active' : '' }}">
            <a href="{{ url('/stockkeeper/dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-line-chart"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Stock</span>
          </li>

          <li class="menu-item {{ Request::is('stockkeeper/stockIn') ? 'active':'' }}">
            <a href="{{ url('/#/stockIn') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layer-plus"></i>
              <div data-i18n="Analytics">Stock in</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('stockkeeper/stockOut') ? 'active':'' }}">
            <a href="{{ url('/#/stockOut') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layer-minus"></i>
              <div data-i18n="Analytics">Stock out</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('stockkeeper/stockAdjustment') ? 'active':'' }}">
            <a href="{{ url('/#/stockAdjustment') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layer"></i>
              <div data-i18n="Analytics">Stock Adjustment</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('stockkeeper/stockTransfer') ? 'active':'' }}">
            <a href="{{ url('/#/stockTransfer') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-buildings"></i>
              <div data-i18n="Analytics">Stock Transfer</div>
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
                          <span class="fw-semibold d-block">{{ Auth::guard('stockkeeper')->user()->username }}</span>
                          <small class="text-muted">Stock keeper</small>
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
                    <a class="dropdown-item" href="{{ route('stockkeeper.logout') }}">
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