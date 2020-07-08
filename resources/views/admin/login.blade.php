<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>
Car-Pool
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesdesign" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary bg-pattern">
<div class="home-btn d-none d-sm-block">
<a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
</div>

<div class="account-pages my-5 pt-sm-5">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="text-center mb-5">
<h1 class="text-white-50 mb-4" style="color: white !important;"> Car-Pool</h1>
</div>
</div>
</div>
<!-- end row -->

<div class="row justify-content-center">
<div class="col-xl-5 col-sm-8">
<div class="card">
<div class="card-body p-4">
<div class="p-2">
<h5 class="mb-5 text-center">Sign in to continue to Car-pool</h5>
<form class="login_form"  id="form" enctype="multipart/form-data">
<div class="row">
<div class="col-md-12">
    <div class="form-group form-group-custom mb-4">
        <input type="text" class="form-control" id="username" required name="email" id="emailaddress" placeholder="Email" maxlength="74" data-validation="required length email" data-validation-length="8-74" data-validation-error-msg-email="Please enter valid email address">
        <label for="username">Email</label>
          <span class="text-danger">{{ $errors->first('email') }}</span>
    </div>

    <div class="form-group form-group-custom mb-4">
        <input type="password" class="form-control" name="password" required id="password"  placeholder="Password" maxlength="30" data-validation="required length" data-validation-length="8-30" data-validation-error-msg-length="Password should have atleast 8 characters.">
        <label for="userpassword">Password</label>
        <span class="text-danger">{{ $errors->first('password') }}</span>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" id="customControlInline">
                <label class="custom-control-label" for="customControlInline">Remember me</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-md-right mt-3 mt-md-0">
                <!-- <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a> -->
            </div>
        </div>
    </div>
    <div class="mt-4">
        <button class="btn btn-success btn-block waves-effect waves-light submit_button" type="submit">Log In</button>
    </div>
    <div class="mt-4 text-center">
        <!-- <a href="auth-register.html" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a> -->
    </div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- end row -->
</div>
</div>
<!-- end Account pages -->

<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
<script src="{{asset('assets/js/jquery.form-validator.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('js/login.js')}}"></script>


<?php

if (session()->has('success')) {
    $alertMessage = session()->get('success'); ?>
<script>
var alertMessage = "<?php echo $alertMessage ?>";

//alert(alertMessage);
$.toast({
heading: '',
text: alertMessage,
position: 'top-right',
loaderBg: '#5ba035',
icon: 'success',
hideAfter: 5000,
stack: 1
});

</script>
<?php
}?>

</body>
</html>
