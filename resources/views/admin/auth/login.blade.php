<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onpropify Admin</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body class="vertical-layout vertical-menu-modern" data-open="click" data-menu="vertical-menu-modern" data-col="" data-framework="laravel">
    <div class="auth-wrapper auth-basic px-2 d-flex justify-content-center">
        <div class="auth-inner my-2 col-4">

            <!-- Login basic -->
            @if(\Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ \Session::get('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{ \Session::forget('success') }}
            @if(\Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ \Session::get('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card mt-5 mb-0">
                <div class="card-header text-center">
                    <h2 class="brand-text text-primary ms-1"><b>Onpropify</b></h2>
                    <h5 class="brand-text text-primary ms-1">Administración</h5>
                </div>
                <div class="card-body">
 
                    <form class="auth-login-form mt-2" action="{{route('admin.loginPost')}}" method="post">
                        @csrf

                        <div class="mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email') }}" autofocus />
                            @if ($errors->has('email'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
 
                        <div class="mb-1">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="password" name="password" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                            @if ($errors->has('password'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Ingresar</button>
                    </form>
                    
                </div>
            </div>
            <!-- /Login basic -->
        </div>
    </div>
</body>
 
</html>