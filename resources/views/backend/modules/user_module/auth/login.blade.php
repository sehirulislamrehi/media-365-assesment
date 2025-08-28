<!DOCTYPE html>
<html lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
     <meta name="keywords" content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
     <meta name="author" content="pixelstrap">
     <link rel="icon" href="{{ asset('backend/images/favicon/png') }} " type="image/x-icon">
     <link rel="shortcut icon" href="{{ asset('backend/images/favicon/png') }} " type="image/x-icon">
     <title>QoDesign - Login</title>

     <link rel="preconnect" href="https://fonts.googleapis.com/">
     <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome.css') }}">

     <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/bootstrap.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css') }}">
     <link id="color" rel="stylesheet" href="{{ asset('backend/css/color-1.css') }}" media="screen">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/sweetalert2.css') }}">
</head>

<body>
     <!-- loader starts-->
     <div class="loader-wrapper">
          <div class="loader">
               <div class="loader4"></div>
          </div>
     </div>
     <!-- loader ends-->
      
     <!-- login page start-->
     <div class="container-fluid p-0">
          <div class="row m-0">
               <div class="col-12 p-0">
                    <div class="login-card login-dark">
                         <div>
                              <div>
                                   <a class="logo" href="">
                                        <!-- <img class="img-fluid for-dark" src="{{ asset('backend/images/logo/logo.svg') }} " alt="looginpage">
                                        <img class="img-fluid for-light" src="{{ asset('backend/images/logo/logo_dark.png') }} " alt="looginpage"> -->
                                   </a>
                              </div>
                              <div class="login-main">
                                   <form class="theme-form ajax-form" action="{{ route('admin.do.login') }}" method="POST">
                                        @csrf
                                        <h4>Sign in to account </h4>

                                        <!-- email -->
                                        <div class="form-group">
                                             <label class="col-form-label">Email Address</label>
                                             <input class="form-control" name="email" type="email" required="" placeholder="Test@gmail.com">
                                        </div>

                                        <!-- password -->
                                        <div class="form-group">
                                             <label class="col-form-label">Password </label>
                                             <div class="form-input position-relative">
                                                  <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                                  <div class="show-hide">
                                                       <span class="show"></span>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="form-group mb-0">
                                             <div class="text-end mt-3">
                                                  <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
          <script src="{{ asset('backend/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
          <script src="{{ asset('backend/js/sweet-alert/sweetalert.min.js') }}"></script>
          <script src="{{ asset('backend/js/ajax_form_submit.js') }}"></script>
          <script src="{{ asset('backend/js/script.js') }}"></script>
     </div>
</body>

</html>