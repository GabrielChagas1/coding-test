{{-- Incluindo o topo do site --}}
@include('admin._includes.menu')

{{-- Incluindo o corpo do nosso site --}}
@yield('conteudo')

{{-- Incluindo o rodapé do nosso site --}}
@include('admin._includes.rodape')