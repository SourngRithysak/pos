<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>POS - Login as Admin</title>
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
                <span class="app-brand-text demo text-body fw-bolder" style="text-transform: none;">Login as Admin</span>
              </a>
            </div>
            <form class="mb-3" action="{{ route('admin.authenticate') }}" method="POST">
              @csrf
              <h4 class="mb-2">Welcome Back! 👋</h4>
              <p class="mb-4">Please sign-in to your account.</p>
              @if(Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }}</div>
              @endif

              @if(Session::has('error'))
              <div class="alert alert-danger">{{ Session::get('error') }}</div>
              @endif
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" autofocus />
                @error('username')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3 form-password-toggle">
                <label for="password" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  @error('password')
                  <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="mb-3 mt-4">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
              </div>
            </form>
            <p class="text-center">
              <a href="/" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                <span>Back</span>
              </a>
            </p>
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