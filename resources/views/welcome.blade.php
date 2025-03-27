<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>POS - Welcome</title>
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
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
  <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
  <script src="{{asset('assets/js/config.js')}}"></script>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card">
          <div class="card-body">
            <div class="app-brand justify-content-center">
              <a href="/" class="app-brand-link gap-2">
                <span class="app-brand-text demo text-body fw-bolder" style="text-transform: none;">Welcome Back! 👋</span>
              </a>
            </div>
            <h4 class="mb-2">Select your role to login!</h4>
            <h5 class="text-center"><a href="/admin/login"><span>Admin</span></a></h5>
            <h5 class="text-center"><a href="/cashier/login"><span>Cashier</span></a></h5>
            <h5 class="text-center"><a href="/stockkeeper/login"><span>Stock keeper</span></a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('assets/vendor/js/menu.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>