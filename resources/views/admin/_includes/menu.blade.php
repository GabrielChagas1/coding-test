<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('titulo')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
        <!-- Sweet Alert -->
        <link href="{{asset('app-assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
        {{-- dropify --}}
        <link href="{{asset('app-assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('app-assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
        <!-- DataTables -->
        <link href="{{asset('app-assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('app-assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{asset('app-assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('app-assets/plugins/morris/morris.css') }}" rel="stylesheet">

        <link href="{{asset('app-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('app-assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('app-assets/css/style.css') }}" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{route('admin.dashboard.index')}}" class="logo"><i class="mdi mdi-assistant"></i> Telium</a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="{{route('admin.dashboard.index')}}" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard</span>
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-gift"></i> <span> Fornecedores </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('admin.fornecedores.index')}}">Lista de fornecedores</a></li>
                                    <li><a href="{{route('admin.fornecedores.adicionar')}}">Adicionar fornecedor</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-animation"></i> <span> Produtos </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('admin.produtos.index')}}">Lista de produtos</a></li>
                                        <li><a href="{{route('admin.produtos.adicionar')}}">Adicionar produto</a></li>
                                    </ul>
                                </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Estoque </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('admin.estoque.index')}}">Listar entradas estoque</a></li>
                                    <li><a href="{{route('admin.estoque.adicionar')}}">Adicionar estoque</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->
            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <!-- Top Bar Start -->
                    <div class="topbar">
                        <nav class="navbar-custom">
                            <ul class="list-inline float-right mb-0">
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="index.html#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="{{asset('img/avatar-1.jpg')}}" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Bem-Vindo</h5>
                                        </div>
                                        <a class="dropdown-item" href="{{route('login.sair')}}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </nav>
                    </div>
                    <!-- Top Bar End -->