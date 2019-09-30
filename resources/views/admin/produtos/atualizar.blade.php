@extends('admin.dashboard')
@section('titulo', 'Editar Produtos')

@section('conteudo')
<div class="row">
        <div class="col-12">
            {!! $errors->first('nome', '<div class="alert alert-danger mt-5">:message</div>') !!}
            {!! $errors->first('codigo', '<div class="alert alert-danger mt-2">:message</div>') !!}
            {!! $errors->first('img', '<div class="alert alert-danger mt-2">:message</div>') !!}
            <div class="card m-b-30 mt-5"> 
                <div class="card-body">
                    <h2 class="mt-0 header-title text-center text-primary">Editar Produto</h4><br> 
                    <img src="{{asset($produto->img)}}" alt="Imagem Atual" class="rounded shadow img-atual pull-right" style="margin-top: -70px;
                    margin-bottom: 30px;" height="90" width="90">
                    <form method="post" action="{{ route('admin.produtos.editar', $produto->id) }}" autocomplete="off" class="form-horizontal" style="clear: both;" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Código</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" type="text" value="{{ $produto->codigo }}" name="codigo" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" name="nome" value="{{ $produto->nome }}" id="example-search-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-2 col-form-label">valor</label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" name="valor" value="{{ $produto->valor}}" id="example-search-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 my-2 control-label">Ativo</label>
                            <div class="col-md-10">
                                <div class="checkbox my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="ativo" {{ isset($produto["ativo"]) && $produto->ativo == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck2">Ativo</label>
                                    </div>
                                </div>
                            </div>
                        </div> <!--end row-->  
                        <div class="form-group row">
                            <label class="col-md-2 my-2 control-label">Imagem</label>
                            <div class="col-xl-10">
                                <div class="card m-b-30">
                                    <input type="file" id="input-file-now-custom-2" name="img" class="dropify" />
                                    <input type="text" name="imagem_antiga" id="imagem" value="{{ $produto->img}}" hidden/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-2 btn-block">Editar</button>    
                    </form>  
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@push('js')
  <script>
    $(document).ready(function() {
        //excluir fornecedor
        $('.img-atual').mousemove(function(){
            $(this).removeClass('shadow');
        });
        $('.img-atual').mouseleave(function(){
            $(this).addClass('shadow');
        });
    });
  </script>
@endpush