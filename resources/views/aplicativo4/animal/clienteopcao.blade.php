@extends('base.master')

@section('content')
<div id="master-panel" class="panel">
    <div class="panel-body">
        <div class="row mb-3">
            <h3><b>Pet : {{$cliente->nome}}</b> <i>  >>> Proprietário : {{$cliente->proprietario->nome}}</i></h3>
        </div>
        <div class="row tecnologiaButton">
            @if(Auth::user()->can('ANIMAL-E')) 
                <div id="botao1" class="mx-3">
                    <div data-url="{{config('app.url')}}/aplicativo4/animal/editar/{{$cliente->id}}" title="Dados do pet - Cliente"
                        class="btn btn-md btn-info">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-linecons-doc"></i>
                        </span>
                        <span class="button-content">
                            Dados do Pet
                        </span>
                    </div>
                </div>
            @endif    
            @if(Auth::user()->can('ANIMAL-E')) 
                <div id="botao1" class="mx-3">
                    <div data-url="{{config('app.url')}}/aplicativo4/animal/historico/{{$cliente->id}}" title="Historico do pet - Cliente"
                        class="btn btn-md btn-warning">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-linecons-doc"></i>
                        </span>
                        <span class="button-content">
                            Consulta / Histórico
                        </span>
                    </div>
                </div>
            @endif    
            @if(Auth::user()->can('ANIMAL-E')) 
                <div id="botao1" class="mx-3">
                    <div data-url="{{config('app.url')}}/aplicativo4/animal/peso/{{$cliente->id}}" title="Historico de peso do Pet"
                        class="btn btn-md btn-danger">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-tachometer"></i>
                        </span>
                        <span class="button-content">
                            Peso (histórico)
                        </span>
                    </div>
                </div>
            @endif              
            @if(Auth::user()->can('ANIMAL-E')) 
                <div id="botao1" class="mx-3">
                    <div data-url="{{config('app.url')}}/aaplicativo4/animal/peso/{{$cliente->id}}" title="Historico de vacinas"
                        class="btn btn-md btn-purple">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-eyedropper"></i>
                        </span>
                        <span class="button-content">
                            Vacinas
                        </span>
                    </div>
                </div>
            @endif              
            @if(Auth::user()->can('ANIMAL-E')) 
                <div id="botao1" class="mx-3">
                    <div data-url="{{config('app.url')}}/aaplicativo4/animal/peso/{{$cliente->id}}" title="Serviços utilizados da clinica"
                        class="btn btn-md btn-azure">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-stethoscope"></i>
                        </span>
                        <span class="button-content">
                            Serviços
                        </span>
                    </div>
                </div>
            @endif              
            @if(Auth::user()->can('ANIMAL-E')) 
                <div id="botao1" class="mx-3">
                    <div data-url="{{config('app.url')}}/aaplicativo4/animal/peso/{{$cliente->id}}" title="Produtos utilizados da clinica"
                        class="btn btn-md btn-black">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-list-ul"></i>
                        </span>
                        <span class="button-content">
                            Produtos 
                        </span>
                    </div>
                </div>
            @endif              


            @if(Auth::user()->can('ANIMAL-A') || Auth::user()->can('ANIMAL-E') || Auth::user()->can('ANIMAL-R') || Auth::user()->can('ANIMAL-V')) 
                <div class="mx-3">
                    <div data-url="{{config('app.url')}}/aaplicativo2/projeto/documento/{{$cliente->id}}" title="Anexos - Documentos" class="btn btn-md btn-yellow">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-linecons-attach"></i>
                        </span>
                        <span class="button-content">
                            Documentos
                        </span>
                    </div>
                </div>
            @endif   



            @if(Auth::user()->can('PROJETO2-CLIENTEPF-A') || Auth::user()->can('PROJETO2-CLIENTEPF-E') || Auth::user()->can('PROJETO2-CLIENTEPF-R') || Auth::user()->can('PROJETO2-CLIENTEPF-V')) 
                <div id="botao2" class="mx-1">
                    <div data-url="{{config('app.url')}}/aplicativo2/projeto/clientepf/{{$projeto->id}}" title="Clientes - Pessoa FÍsica participantes do projeto" class="btn btn-md btn-black">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-users"></i>
                        </span>
                        <span class="button-content">
                            Clientes-PF
                        </span>
                    </div>
                </div>
            @endif    
            @if(Auth::user()->can('PROJETO2-CLIENTEPJ-A') || Auth::user()->can('PROJETO2-CLIENTEPJ-E') || Auth::user()->can('PROJETO2-CLIENTEPJ-R') || Auth::user()->can('PROJETO2-CLIENTEPJ-V')) 
                <div class="mx-1">
                    <div data-url="{{config('app.url')}}/aplicativo2/projeto/clientepj/{{$projeto->id}}" title="Clientes - Pessoa Jurídica participantes do proejto" class="btn btn-md btn-black"> {{-- success--}}
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-users"></i>
                        </span>
                        <span class="button-content">
                            CLientes-PJ
                        </span>
                    </div>
                </div>
            @endif    
            @if(Auth::user()->can('PROJETO2-ETAPA-A') || Auth::user()->can('PROJETO2-ETAPA-E') || Auth::user()->can('PROJETO2-ETAPA-R') || Auth::user()->can('PROJETO2-ETAPA-V')) 
                <div class="mx-1">
                    <div data-url="{{config('app.url')}}/aplicativo2/projeto/etapa/{{$projeto->id}}" title="Etapas ou Atividades do projeto" class="btn btn-md btn-azure">
                        <span class="glyph-icon icon-separator">
                                <i class="glyph-icon icon-sign-in"></i>
                        </span>
                        <span class="button-content">
                            Etapas
                        </span>
                    </div>
                </div>  
            @endif
            @if(Auth::user()->can('PROJETO2-DOCUMENTO-A') || Auth::user()->can('PROJETO2-DOCUMENTO-E') || Auth::user()->can('PROJETO2-DOCUMENTO-R') || Auth::user()->can('PROJETO2-DOCUMENTO-V')) 
                <div class="mx-1">
                    <div data-url="{{config('app.url')}}/aplicativo2/projeto/documento/{{$projeto->id}}" title="Anexos - Documentos" class="btn btn-md btn-yellow">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-linecons-attach"></i>
                        </span>
                        <span class="button-content">
                            Documentos
                        </span>
                    </div>
                </div>
            @endif   
            @if(Auth::user()->can('PROJETO2-RECEITA-A') || Auth::user()->can('PROJETO2-RECEITA-E') || Auth::user()->can('PROJETO2-RECEITA-R') || Auth::user()->can('PROJETO2-RECEITA-V')) 
                <div class="mx-1">
                    <div data-url="{{config('app.url')}}/aplicativo2/projeto/receita/{{$projeto->id}}" title="Receitas do projeto de cooperação" class="btn btn-md btn-success">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-linecons-money"></i>
                        </span>
                        <span class="button-content">
                            Receitas
                        </span>
                    </div>
                </div>    
            @endif            
            @if(Auth::user()->can('VISUPROJETO2-VISAO-V')) 
                <div class="mx-1">
                    <div data-url="{{config('app.url')}}/aplicativo2/projeto/visao/{{$projeto->id}}" title="Visão geral das informações do Projeto"
                        class="btn btn-md btn-warning">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-linecons-eye"></i>
                        </span>
                        <span class="button-content">
                            Visão geral
                        </span>
                    </div>
                </div>
            @endif
        </div>

        <div id="clienteopcao-content"></div>
        
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $('.btn').click(function (e) {
        $('#clienteopcao-content').load($(this).attr('data-url'), function (result) {
            body_sizer();
        });
    });
</script>
@endsection