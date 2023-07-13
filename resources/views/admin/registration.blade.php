<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>registration</title>
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo p-1 text-center">

                 <img class="img-fluid" width="150" height="40" src="{{ asset('img/logo/main-logo.svg') }}" loading="lazy" alt="Re search and tell">

              </div>

              <h6 class="font-weight-light">Registration to continue.</h6>
              <form class="pt-3" action="{{url('admin-registration')}}" method="post">
                @csrf
              <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="name" placeholder="Username" name="name" required>
                  @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email" required>
                  @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" required>
                  @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="form-check ml-4">
                  <input type="checkbox" class="form-check-input" id="check">
                  <label class="form-check-label" for="check">Show Password</label>
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <!-- endinject -->

  <script type='text/javascript'>
        $(document).ready(function(){
            $('#check').click(function(){
                $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
            });
        });

  </script>

  <script>
        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);
</script>


</body>

</html>
