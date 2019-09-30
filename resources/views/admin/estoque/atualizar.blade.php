@extends('admin.dashboard')
@section('titulo', 'Editar Estoque')

@section('conteudo')
<div class="row">
        <div class="col-12">
                {!! $errors->first('produtoId', '<div class="alert alert-danger mt-2">Escolha um produto!</div>') !!}
                {!! $errors->first('fornecedorId', '<div class="alert alert-danger mt-2">Escoha um fornecedor</div>') !!}
                {!! $errors->first('quantidade', '<div class="alert alert-danger mt-2">:message</div>') !!}
                {!! $errors->first('descricao', '<div class="alert alert-danger mt-2">:message</div>') !!}
            <div class="card m-b-30 mt-5">
                <div class="card-body">
                    <h2 class="mt-0 header-title text-center text-primary">Editar Estoque</h4><br>
                    <form method="post" action="{{ route('admin.estoque.editar', $estoque->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Fornecedor</label>
                                <div class="col-sm-10">
                                    <select required class="custom-select" name="fornecedorId">
                                        <option value="" disabled selected>Escolher Fornecedor</option>
                                        @foreach ($fornecedores as $item)
                                            <option value="{{$item->id}}" {{$estoque->fornecedorId == $item->id ? 'selected' : ''}}>{{$item->nome}}</option>   
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Produto</label>
                            <div class="col-sm-10">
                                <input name="produtoId" value="{{$estoque->produtoId}}" hidden>
                                <select required class="custom-select" name="produtoId" disabled>
                                    <option value="" disabled selected>Escolher produto</option>             
                                    @foreach ($produtos as $item)
                                        <option value="{{$item->id}}" {{$estoque->produtoId == $item->id ? 'selected' : ''}}>{{$item->nome}}</option>   
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Quantidade</label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="number" name="quantidade" value="{{$estoque->quantidade}}" id="example-search-input">
                                <input hidden class="form-control" type="number" name="quantidade-antiga" value="{{$estoque->quantidade}}" id="example-search-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 my-2 control-label">Descrição</label>
                            <div class="col-md-10">
                                <div class="checkbox my-2">
                                    <div class="custom-control p-0">
                                        <textarea required id="textarea"  class="form-control" maxlength="100%" rows="9" name="descricao" placeholder="Descrição da entrada no estoque">{{$estoque->descricao}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div> <!--end row-->  
                            
                        <button type="submit" class="btn btn-primary ml-2 btn-block">Editar</button>    
                    </form>  
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@push('js')
    <script>
        setTimeout(function(){
            $('.alert').hide('slow');
        }, 5000);
    </script>
@endpush