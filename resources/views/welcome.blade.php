@extends('admin.dashboard')
@section('titulo', 'Dashboard Telium')

@section('conteudo')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="index.html#">Annex</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

                    
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30 text-white card-danger">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round" style="background: #fff;">
                                        <i class="mdi mdi-webcam" style="color: #ec536c;"></i>
                                    </div>
                                </div>
                                <div class="col-9 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0">{{$produtosAbaixo->count()}}</h5>
                                        <p class="mb-0">Produtos Acabando</p>                                                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->

                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round ">
                                        <i class="mdi mdi-basket"></i>
                                    </div>
                                </div>
                                <div class="col-9 align-self-center text-center">
                                    <div class="m-l-10 ">
                                        <h5 class="mt-0 round-inner">{{$produtos}}</h5>
                                        <p class="mb-0 text-muted">Produtos</p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="col-3 align-self-center">
                                    <div class="round">
                                        <i class="mdi mdi-rocket"></i>
                                    </div>
                                </div>
                                <div class="col-9 align-self-center text-center">
                                    <div class="m-l-10">
                                        <h5 class="mt-0 round-inner">{{$fornecedores}}</h5>
                                        <p class="mb-0 text-muted">Fornecedores</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round">
                                            <i class="mdi mdi-account-multiple"></i>
                                        </div>
                                    </div>
                                    <div class="col-9 align-self-center text-center">
                                        <div class="m-l-10">
                                            <h5 class="mt-0 round-inner">{{$usuarios}}</h5>
                                            <p class="mb-0 text-muted">Usuários</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
            </div>                                                
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->
</div> <!-- content -->
 @endsection