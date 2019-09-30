@extends('admin.dashboard')
@section('titulo', 'Listar Produtos')

@section('conteudo')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                        @if ($produtosAbaixo->count() > 0)
                            <div class="alert alert-danger alert-dismissible mt-5" role="alert">
                                Os seguintes produtos estão acabando ou já acabaram!
                                @foreach ($produtosAbaixo as $item)
                                    <li class="text-white">{{$item->nome}}</li>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                        @endif
                        @if(session('cadastrar'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                          Dados salvos com sucesso!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      @endif
                      @if(session('exclusao'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                          Dados excluidos com sucesso!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                      @endif
                      @if(session('editar'))
                        <div class="alert alert-success alert-dismissible" role="alert">
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
                                <li class="breadcrumb-item active">Produtos</li>
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
                            <h1 class="mt-0 header-title text-primary my-4 text-center">Listagem Produtos</h1>    
                            <a href="{{ url('admin/produtos/adicionar')}}" class="btn btn-primary pull-right">Adicionar novo <i class="dripicons-plus" aria-hidden="true"></i></a>
                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>Valor</th>
                                        <th>Qtd Estoque</th>
                                        <th>Cadastro</th>
                                        <th>Situação</th>
                                        <th>Ativo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($produtos as $item)
                                    <tr id="produto-{{ $item->id}}">
                                        <td>{{ $item->codigo}}</td>
                                        <td>{{ $item->nome}}</td>
                                        <td>{{ $item->valor}}</td>
                                        <td>{{ $item->estoque}}</td>
                                        <td>{{date( 'd/m/Y' , strtotime($item->created_at))}}</td>
                                        <td>
                                            @if ($item->estoque < 3)
                                                <div style="height: 30px; width:30px; background: #e3342f;"></div>
                                            @else
                                                <div style="height: 30px; width:30px; background: #38c172;"></div>  
                                            @endif
                                            </td>
                                        <td>
                                            <div class="checkbox my-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="ativo" {{ isset($item->ativo) && $item->ativo == 1 ? 'checked' : '' }} disabled>
                                                    <label class="custom-control-label" for="customCheck2">Ativo</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-sm">
                                                <a style="color: #fff !important;" href="{{route('admin.produtos.atualizar', $item->id)}}">Editar <i class="dripicons-paperclip" aria-hidden="true"></i> </a>
                                            </button>   
                                            {{-- <form method="POST" action="{{ route('admin.fornecedores.excluir', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                
                                                {{ csrf_field() }}
                                                <button type="submit" rel="tooltip" class="btn btn-danger btn-sm"  onclick="return confirm(&quot;Confirma exclusão?\n\nTodos os produtos relacionados a esse Fornecedor, serão excluidos ? &quot;)">Excluir <i class="dripicons-trash" aria-hidden="true"></i> </button>
                                            </form> --}}
                                            <button class="btn btn-danger btn-sm excluir" produto="{{ $item->id}}">
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
        $('.excluir').click(function(){
            var id = $(this).attr('produto');
            var url = window.location.href.split('/admin')[0]+'/admin/produtos/excluir/'+ id
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
                  $('#produto-'+id).hide('slow');
                });
            });
        })
    });
  </script>
@endpush


               