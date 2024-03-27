<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SIK PRODI TI - LOGIN </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{asset ('template/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100" 
style="
  background: linear-gradient(180deg, rgba(0,27,120,0.9612219887955182) 0%, rgba(10,135,235,1) 70%);
">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">LOGIN <br> SIK PRODI TI</h4>
                                    <div style="display: flex;justify-content:center;">

                                        <img src="{{ asset('logo.png') }}" height="140" width="170" alt="">
                                    </div>
                                    <form method="POST" action="{{ route('post.login') }}">
                                      @csrf
                                        <div class="form-group">
                                            <label><strong>User Name</strong></label>
                                            <input type="text" name="name" class="form-control" placeholder="hello@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Kata Sandi</strong></label>
                                            <input type="password" name="password" class="form-control" value="">
                                        </div>
                                        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('template/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('template/js/custom.min.js') }}"></script>

</body>

</html>