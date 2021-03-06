@extends('base.master')

{{-- @section('css')
<style media="print">
    #page-content {
        width: 100%;
        margin-left: 130px;
    }
    #page-header, #page-title, #botaoimp {
        display: none;
    }
    li {
        font-size: 13px; 
    }
</style>
@endsection --}}

@section('content')
<div id="master-panel" class="panel">
    <div class="panel-body">
        <div class="row mb-3">
            {{-- <button id="botaoimp" onclick="imprimeteste()">Impressão</button> --}}
            <h3>Cliente :<b> {{$clientepf->nome}} </b>  CPF:  <b>{{$clientepf->cpf}} </b></h3>
        </div>
        <div class="row tecnologiaButton">
            {{-- <div class="form-group col-md-1"></div> --}}
            {{-- <div class="form-group col-md-2"> --}}
                @if(Auth::user()->can('CLIENTE3-DADOS-A') || Auth::user()->can('CLIENTE3-DADOS-E') || Auth::user()->can('CLIENTE3-DADOS-R') || Auth::user()->can('CLIENTE3-DADOS-V')) 
                    <div id="botao1" class="mx-1">
                        <div data-url="{{config('app.url')}}/aplicativo3/paciente/clientepf/editar/{{$clientepf->id}}" title="Dados pessoais do cliente"
                            class="btn btn-md btn-info">
                            <span class="glyph-icon icon-separator">
                                <i class="glyph-icon icon-linecons-note"></i>
                            </span>
                            <span class="button-content">
                                Informação pessoal
                            </span>
                        </div>
                    </div>
                @endif    
            {{-- </div> --}}
            {{-- <div class="form-group col-md-1"></div> --}}
            {{-- <div class="form-group col-md-2"> --}}
                @if(Auth::user()->can('CLIENTE3-FORMULARIO-A') || Auth::user()->can('CLIENTE3-FORMULARIO-E') || Auth::user()->can('CLIENTE3-FORMULARIO-R') || Auth::user()->can('CLIENTE3-FORMULARIO-V')) 
                    <div id="botao1a" class="mx-2">
                        <div data-url="{{config('app.url')}}/aplicativo3/paciente/formulario/{{$clientepf->id}}" title="História pregressa do cliente" class="btn btn-md btn-purple">
                            <span class="glyph-icon icon-separator">
                                <i class="glyph-icon icon-linecons-doc"></i>
                            </span>
                            <span class="button-content">
                                Primeira Consulta
                            </span>
                        </div>
                    </div>
                @endif  

                @if(Auth::user()->can('CLIENTE3-HISTORICO-A') || Auth::user()->can('CLIENTE3-HISTORICO-E') || Auth::user()->can('CLIENTE3-HISTORICO-R') || Auth::user()->can('CLIENTE3-HISTORICO-V')) 
                    <div id="botao2" class="mx-2">
                        <div data-url="{{config('app.url')}}/aplicativo3/paciente/historico/{{$clientepf->id}}" title="Histórico de atendimento do cliente" class="btn btn-md btn-success">
                            <span class="glyph-icon icon-separator">
                                <i class="glyph-icon icon-navicon"></i>
                            </span>
                            <span class="button-content">
                                Evolução - consulta
                            </span>
                        </div>
                    </div>
                @endif  
            {{-- </div>   --}}
            {{-- <div class="form-group col-md-2"> --}}
                @if(Auth::user()->can('CLIENTE3-DOCUMENTO-A') || Auth::user()->can('CLIENTE3-DOCUMENTO-E') || Auth::user()->can('CLIENTE3-DOCUMENTO-R') || Auth::user()->can('CLIENTE3-DOCUMENTO-V')) 
                    <div id="botao3" class="mx-2">
                        <div data-url="{{config('app.url')}}/aplicativo3/paciente/documento/{{$clientepf->id}}" title="Anexos - Documentos" class="btn btn-md btn-yellow">
                            <span class="glyph-icon icon-separator">
                                <i class="glyph-icon icon-linecons-attach"></i>
                            </span>
                            <span class="button-content">
                                Documentos (anexo)
                            </span>
                        </div>
                    </div>
                @endif   
            {{-- </div> --}}
            @if(Auth::user()->can('VISUCLIENTE3-V')) 
                <div class="mx-2">
                    <div data-url="{{config('app.url')}}/aplicativo3/paciente/visao/{{$clientepf->id}}" title="Visão geral das informações do cliente"
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

        <div id="projeto-content"></div>
        
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    // esta funcao é para o primeiro clque inicil - info)
    $('.btn').click(function (e) {
        $('#projeto-content').load($(this).attr('data-url'), function (result) {
            body_sizer();
            // console.log('here');
        });
    });

    // function imprimeteste(){
    //     win = window.open(); 
    //     win.document.writeln('aaaaaaaa');
    //     win.print();  
    //     win.close();
    //         // window.print();
    // }

</script>
@endsection