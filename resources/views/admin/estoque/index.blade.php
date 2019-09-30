@extends('admin.dashboard')
@section('titulo', 'Listar Estoque')


@section('conteudo')
    <div class="page-content-wrapper ">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                        @if(session('cadastrar'))
                        <div class="alert alert-success alert-dismissible mt-5" role="alert">
                          Dados salvos com sucesso!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      @endif
                      @if(session('exclusao'))
                        <div class="alert alert-danger alert-dismissible mt-5" role="alert">
                          Dados excluidos com sucesso!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      @endif
                      @if(session('editar'))
                        <div class="alert alert-success alert-dismissible mt-5" role="alert">
                          Dados editados com sucesso!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      @endif
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="index.html#">Admin</a></li>
                                <li class="breadcrumb-item active">Estoque</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h1 class="mt-0 header-title text-primary my-4 text-center">Listagem Estoque</h1>    
                            <a href="{{ url('admin/estoque/adicionar')}}" class="btn btn-primary pull-right">Adicionar novo <i class="dripicons-plus" aria-hidden="true"></i></a>
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Fornecedor</th>
                                        <th>Produto</th>
                                        <th>Descricao</th>
                                        <th>Quantidade</th>
                                        <th>Data Cadastro</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($estoques as $item)
                                    <tr id="estoque-{{ $item->id}}">
                                        <td>{{ $item->id}}</td>
                                        <td>{{ $item->fornecedor}}</td>
                                        <td>{{ $item->produto}}</td>
                                        <td>{{ substr($item->descricao, 0, 30)}}</td>
                                        <td>{{ $item->quantidade}}</td>
                                        <td>{{date( 'd/m/Y' , strtotime($item->created_at))}}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm">
                                                <a style="color: #fff !important;" href="{{route('admin.estoque.atualizar', $item->id)}}">Editar <i class="dripicons-paperclip" aria-hidden="true"></i> </a>
                                            </button> 
                                            <button class="btn btn-danger excluir" estoque="{{$item->id}}">
                                                Excluir <i class="dripicons-trash" aria-hidden="true"></i>
                                            </button>  
                                           
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row --> 
    </div> <!-- Page content Wrapper -->

</div> <!-- content -->
@endsection
@push('js')
  <script>
    $(document).ready(function() {
        $('.dt-buttons > a:nth-child(4) span').text('Colunas Visíveis');
        $('.dt-buttons > a:first-child span').text('Copiar');
        $('.dataTables_empty').text('Sem dados para mostrar no momento');
        $('.dataTables_info').hide();

        //excluir fornecedor
        $("#datatable-buttons").on("click", ".excluir", function(){
            // your code goes here
            var id = $(this).attr('estoque');
            var url = window.location.href.split('/admin')[0]+'/admin/estoque/excluir/'+ id
            //alert($(this).attr('fornecedor'));
            swal({
            title: 'Você tem certeza?',
            text: "Todas as referências desse produto será excluido!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!'
            }).then(function () {
                $.post({
                    url: url,
                    type: 'POST',
                    data: {
                        "_token" : "{{ csrf_token() }}",
                    }
                }).done(function(msg){
                  $('#estoque-'+id).hide('slow');
                });
            });
        });
    });
  </script>
@endpush



               