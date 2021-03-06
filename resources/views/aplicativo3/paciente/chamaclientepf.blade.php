@extends('base.master')

@section('content')
<div id="master-panel" class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="peso">Nome</label>
                <input type="text" id="vnome" name="vnome" class="valor form-control" style="display:inline-block" placeholder="Digite o nome" data-parsley-required/>
            </div>
            @php($zz='')
            <div class="row tecnologiaButton">
                <div id="botao1" class="mx-4 my-4">
                    <div data-url="{{config('app.url')}}/aplicativo4/proprietario/cliente/{{$zz}}" title="Busca nome do cliente [digite * para todos os clientes]"
                        class="btn btn-md btn-success">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-linecons-search"></i>
                        </span>
                        <span class="button-content">
                            Busca Cliente
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div id="chamaclientepf-content"></div>
        
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $('.btn').click(function (e) {
        zz = $('#vnome').val();
        // console.log(zz);
        re = / /gi;
        zz = zz.replace(re,'-');
        // console.log(zz);
        $( "#chamaclientepf-content" ).load( "{{config('app.url')}}/aplicativo3/paciente/chamaclientepf/"+ zz, function() {
            body_sizer(); 
        });
    });
</script>
@endsection