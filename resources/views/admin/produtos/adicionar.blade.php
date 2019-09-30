@extends('admin.dashboard')
@section('titulo', 'Adicionar Produtos')

@section('conteudo')
<div class="row">
        <div class="col-12">
            {!! $errors->first('nome', '<div class="alert alert-danger mt-5">:message</div>') !!}
            {!! $errors->first('codigo', '<div class="alert alert-danger mt-2">:message</div>') !!}
            {!! $errors->first('img', '<div class="alert alert-danger mt-2">:message</div>') !!}

            <div class="card m-b-30 mt-5">
                <div class="card-body">
                    <h2 class="mt-0 header-title text-center text-primary">Cadastrar Produto</h4><br>
                    <form method="post" action="{{ route('admin.produtos.cadastrar') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Código</label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="text" value="" name="codigo" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="text" name="nome" value="" id="example-search-input">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Estoque</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="estoque" value="" id="example-search-input">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Valor</label>
                            <div class="col-sm-10">
                                <input class="form-control valor" required type="text" name="valor" value="" id="example-search-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 my-2 control-label">Ativo</label>
                            <div class="col-md-10">
                                <div class="checkbox my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="ativo">
                                        <label class="custom-control-label" for="customCheck2">Ativo</label>
                                    </div>
                                </div>
                            </div>
                        </div> <!--end row-->  
                            <div class="form-group row">
                                <label class="col-md-2 my-2 control-label">Imagem</label>
                                <div class="col-xl-10">
                                    <div class="card m-b-30">
                                        <input required type="file" id="input-file-now-custom-2" name="img" class="dropify" />
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary ml-2 btn-block">Adicionar</button>    
                    </form>  
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@push('js')
    <script>
        $(document).ready(function(){

            $('.valor').mask("#,##0.00", {reverse: true});
            setTimeout(function(){
                $('.alert').hide('slow');
            }, 8000)
        });
    </script>
@endpush