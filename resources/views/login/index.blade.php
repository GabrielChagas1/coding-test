<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Annex - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="{{asset('app-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('app-assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('app-assets/css/style.css') }}" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                    @if(session('invalido'))
                    <div class="alert alert-danger alert-dismissible mt-5" role="alert">
                      Email ou senha inválidos!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  @endif
                <div class="card-body">
                    <h3 class="text-center mt-0">
                        <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Telium</a>
                    </h3>

                    <div class="p-3">
                        <form class="form-horizontal" action="{{route('login.entrar')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" value="admin" required="" name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" name="senha" value="admin" required="" placeholder="Senha">
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Logar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <!-- jQuery  -->
        <script src="{{asset('app-assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('app-assets/js/popper.min.js')}}"></script>
        <script src="{{asset('app-assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('app-assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('app-assets/js/detect.js')}}"></script>
        <script src="{{asset('app-assets/js/fastclick.js')}}"></script>
        <script src="{{asset('app-assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('app-assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('app-assets/js/waves.js')}}"></script>
        <script src="{{asset('app-assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('app-assets/js/jquery.scrollTo.min.js')}}"></script>

        <!-- App js -->
        <script src="{{('app-assets/js/app.js')}}"></script>

    </body>
</html>