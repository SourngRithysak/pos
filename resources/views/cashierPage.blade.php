<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>POS - Cashier - @yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo.png')}}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>

</head>
<style>
  video {
    width: 0;
  }

  /* #result { margin-top: 20px; font-size: 1.2em; color: #333; } */
</style>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="/cashier" class="app-brand-link">
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
          <li class="menu-item {{ Request::is('cashier/dashboard') ? 'active' : '' }}">
            <a href="{{ url('/cashier/dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-line-chart"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Sale</span>
          </li>


          <li class="menu-item {{ Request::is('cashier/sales') ? 'active':'' }}">
            <a href="{{ url('/cashier/sales') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cart"></i>
              <div data-i18n="Analytics">Sales</div>
            </a>
          </li>
          </li>
          <li class="menu-item {{ Request::is('cashier/saleReturn') ? 'active':'' }}">
            <a href="{{ url('/cashier/saleReturn') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
              <div data-i18n="Analytics">Sales Return</div>
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
                          <span class="fw-semibold d-block">{{ Auth::guard('cashier')->user()->username }}</span>
                          <small class="text-muted">Cashier</small>
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
                    <a class="dropdown-item" href="{{ route('cashier.logout') }}">
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
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <script>
    const codeReader = new ZXing.BrowserMultiFormatReader();
    const videoElement = document.getElementById('video');
    const resultElement = document.getElementById('result');
    const proCode = [];
    const proQTY = [];
    const proPrice = [];
    var index = 1;

    function increaseQTY(code) {
      for (var i = 0; i < proCode.length; i++) {
        if (proCode[i] == code) {
          proQTY[i] += 1;
          $(`#qty-${code}`).val(proQTY[i]);
        }
      }
      updatePrice();
    }

    function decreaseQTY(code) {
      for (var i = 0; i < proCode.length; i++) {
        if (proCode[i] == code) {
          if (proQTY[i] > 1) {
            proQTY[i] -= 1;
            $(`#qty-${code}`).val(proQTY[i]);
          } else {
            $(`#product-${code}`).remove();
            proCode.splice(i, 1)
            proQTY.splice(i, 1)
            proPrice.splice(i, 1)
          }
        }
      }
      updatePrice();
    }

    function deleteProduct(code) {
      for (var i = 0; i < proCode.length; i++) {
        if (proCode[i] == code) {
          $(`#product-${code}`).remove();
          proCode.splice(i, 1)
          proQTY.splice(i, 1)
          proPrice.splice(i, 1)
        }
      }
      updatePrice();
    }

    function updatePrice() {
      var subprice = 0;
      for (var i = 0; i < proCode.length; i++) {

        subprice += proPrice[i] * proQTY[i];

        // console.log(subprice);
        $("#subtotal").text(`$ ${subprice}`);
      }
    }
    codeReader.getVideoInputDevices().then((videoInputDevices) => {
      if (videoInputDevices.length > 0) {
        codeReader.decodeFromVideoDevice(videoInputDevices[0].deviceId, 'video', (result, err) => {
          if (result) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $(function() {
              $.post('/testingSendData', {
                barcode: result.text
              }, function(respone) {
                if (respone == "error") {
                  swal("Error", "Unknown product", "error");
                } else {
                  beep(300, 1500);
                  var arr = respone.split("//");
                  var check = false;

                  for (var i = 0; i < proCode.length; i++) {
                    if (proCode[i] == arr[0]) {
                      proQTY[i] += 1;
                      check = true;
                      $(`#qty-${arr[0]}`).val(proQTY[i]);
                      updatePrice();
                    }
                  }

                  if (!check) {
                    console.log(proCode.length);
                    proCode[proCode.length] = arr[0];
                    proQTY[proQTY.length] = 1;
                    proPrice[proPrice.length] = arr[4];
                    $("#tableBody").append(
                      `<tr id="product-${arr[0]}">
                                      <td class="p-3 text-center"><strong>${index}</strong></td>
                                      <td class="p-2 text-center"><img src="{{asset('assets/images/${arr[3]}')}}" class="w-px-50 h-auto" /></td>
                                      <td class="p-3 text-center">${arr[1]}</td>
                                      <td class="p-3 text-center">${arr[0]}</td>
                                      <td class="p-3 text-center">${arr[2]}</td>
                                      <td class="p-3 text-center" ><div class="d-flex"><button type="button" onclick="decreaseQTY(${arr[0]})">-</button><input type="text" class="text-center" style="width:35px" id="qty-${arr[0]}" value="1" readonly/><button type="button" onclick="increaseQTY(${arr[0]})">+</button></div></td>
                                      <td class="p-3 text-center">$10.00</td>
                                      <td class="p-3 text-center">--</td>
                                      <td class="p-3 text-center">$ ${arr[4]}</td>
                                      <td class="p-3 text-center" onclick="deleteProduct(${arr[0]})">x</td>
                                    </tr>`);
                    index++;
                    updatePrice();
                  }

                }

              })
            });
            resultElement.value = `Barcode: ${result.text}`;
          }
        });
      } else {
        resultElement.value = 'No camera found';
      }
    }).catch((err) => {
      console.error(err);
      resultElement.value = 'Error accessing camera';
    });
  </script>

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